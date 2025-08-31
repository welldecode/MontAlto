<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Illuminate\Auth\Events\Lockout;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

#[Layout('components.layouts.admin')]
class Create extends Component
{
    use   WithFileUploads;


    public $grid_price = [];
    public $i = 1;
    public $message = [];

    public $name, $description, $year, $tipo, $espaco, $status;
    public $attachments = [];

    public $prices = [
        'Diária' => '',
        'Semanal' => '',
        'Quinzenal' => '',
        'Mensal' => '',
    ];


    public array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'year' => ['required', 'string', 'max:255'],
        'attachments.*' => ['image', 'max:2048'],
    ];

    public function render()
    {
        return view('livewire.admin.products.create');
    }


    public function save()
    {
        $this->validate();


        // Verificar se já existe um producto salvo 
        if (Product::where('name', $this->name)->exists()) {
            Toaster::info('Produto já existente!');
            return;
        }
    $images = [];

        if ($this->attachments) {
            foreach ($this->attachments as $file) {
                $path = $file->store('products', 'public');
                $images[] = $path; // guarda só o caminho
            }
        }
        Product::create([
            'name' => $this->name,
            'description' => ($this->description ? $this->description : 'Nenhuma Descrição definida'),
            'year' => $this->year,
            'price' => $this->prices,
            'features' => [
                'tipo' => $this->tipo,
                'espaco' => $this->espaco,
                'status' => $this->status,
            ],
        'images' => $images, // json com array de imagens
        ]);
        Toaster::success('Produto criado com sucesso!');
        $this->reset();
    }
}
