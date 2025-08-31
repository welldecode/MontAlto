<?php

namespace App\Livewire\Web;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.web')]
class Frotas extends Component
{

    use WithPagination;


    // Filtros
    public $categoria = 'todos';     // features->tipo
    public $transmissao = 'todas';   // features->transmissao
    public $pessoas = 'todas';       // features->espaco
    public $precoTipo = 'Diária';    // price->Mensal, Diária, etc
    public $price = 100000;             // valor máximo do filtro de preço


    protected $queryString = [
        'categoria',
        'transmissao',
        'pessoas',
        'precoTipo',
        'price',
    ];

    public function updating($field)
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->categoria = 'todos';
        $this->transmissao = 'todas';
        $this->pessoas = 'todas';
        $this->precoTipo = 'Diária';
        $this->price = 10000;
    }
    public function mount()
    {
        $this->categoria = 'todos';
        $this->transmissao = 'todas';
        $this->pessoas = 'todas';
        $this->precoTipo = 'Diária';
        $this->price = 10000;
    }

    public function render()
    {
        $query = Product::query();
        // Categoria (ajuste: usar os mesmos valores do banco!)
        if ($this->categoria !== 'todos') {
            $query->where('features->categoria', $this->categoria);
        }

        // Transmissão (só aplica se existir no JSON)
        if ($this->transmissao !== 'todas') {
            $query->where('features->tipo', $this->transmissao);
        }

        // Pessoas (ajuste: usar o mesmo valor do JSON -> "7 Pessoas")
        if ($this->pessoas !== 'todas') {
            $query->where('features->espaco', $this->pessoas);
        }

        // Preço (usa o tipo escolhido, ex: Mensal) 
        $query->where("price->{$this->precoTipo}", '<=', $this->price);

        $cars = $query->paginate(9);

        return view('livewire.web.frotas', [
            'cars' => $cars,
        ]);
    }
}
