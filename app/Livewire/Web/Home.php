<?php

namespace App\Livewire\Web;

use App\Models\Product;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.web')]
class Home extends Component
{
    public $car_model;
    public $monthly_pay;
    public $year;

    public function buscar()
    {
        // Redireciona para a rota de listagem com query params
        return redirect()->route('carros.index', [
            'car_model'   => $this->car_model,
            'monthly_pay' => $this->monthly_pay,
            'year'        => $this->year,
        ]);
    }


    public function render()
    {
        return view('livewire.web.home', [
         'featuredProducts' => Product::mostViewed(6)->get()
        ]);
    }
}
