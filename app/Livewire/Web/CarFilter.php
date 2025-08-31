<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

class CarFilter extends Component
{  public $car_model;
    public $monthly_pay;
    public $year;

    public $carros = [];

    public function buscar()
    {
        $query = Carro::query();

        if ($this->car_model) {
            $query->where('modelo', 'like', '%' . $this->car_model . '%')
                  ->orWhere('marca', 'like', '%' . $this->car_model . '%');
        }

        if ($this->monthly_pay) {
            $query->where('valor_mensal', '<=', $this->monthly_pay);
        }

        if ($this->year) {
            $query->where('ano', $this->year);
        }

        $this->carros = $query->get();
    }

    public function render()
    {
        return view('livewire.web.car-filter');
    }
}