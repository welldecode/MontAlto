<?php

namespace App\Livewire\Web;

use App\Mail\ReservationCreatedMail;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.web')]
class Reservas extends Component
{

    public $name, $rg, $cpf, $phone, $address, $email;
    public  $pickup_date, $return_date;

    public ?int $product_id = null; // id do produto selecionado
    public $products; // lista de produtos
    public $totalSteps = 2;
    public $currentStep = 1;


    protected $rules = [
        'name' => 'required|string|max:255',
        'cpf' => 'required|string|max:14',
        'email' => 'required|email',
        'product_id' => 'required|exists:products,id',
        'pickup_date' => 'required|date|after_or_equal:today',
        'return_date' => 'required|date|after:pickup_date',
    ];




    public function save()
    {
        $this->validate();

        $reservation = Reservation::create([
            'name' => $this->name,
            'rg' => $this->rg,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'product_id' => $this->product_id,
            'pickup_date' => $this->pickup_date,
            'return_date' => $this->return_date,
        ]);

        // Email para o cliente
        Mail::to($reservation->email)->send(new ReservationCreatedMail($reservation));
        session()->flash('message', 'Reserva realizada com sucesso!');
        $this->reset();
    }

    public function mount()
    {

        $this->dispatch('refreshSelect2');
        $this->products = Product::all();

        // opcional: já selecionar o primeiro produto
        if ($this->products->isNotEmpty() && !$this->product_id) {
            $this->product_id = $this->products->first()->id;
        }

        $this->dispatch('refreshSelect2');
    }
    public function updatedProductId($value)
    {
        // Se quiser, pode validar ou converter
        $this->product_id = (int) $value;
    }

    public function render()
    {
        return view('livewire.web.reservas', [
            'products' => Product::all(),
        ]);
    }


    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->dispatch('refreshSelect2');
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        $this->dispatch('refreshSelect2');
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'name' => 'required|string|max:255',
                'cpf' => 'required|string|max:14',
                'email' => 'required|email',
                'phone' => 'required|string',
                'address' => 'required|string',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'product_id' => 'required|string|max:255',
                'pickup_date' => 'required|date|after_or_equal:today',
                'return_date' => 'required|date|after:pickup_date',
            ]);
        }
    }
}
