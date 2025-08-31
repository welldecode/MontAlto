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
use Livewire\WithPagination;

#[Layout('components.layouts.web')]
class Search extends Component
{
    use WithPagination;

    public $car_model;
    public $monthly_pay;
    public $year;

    // Monta os parâmetros a partir da query string
    public function mount()
    {
        $this->car_model   = request('car_model');
        $this->monthly_pay = request('monthly_pay');
        $this->year        = request('year');
    }

    public function render()
    {
        $query = Product::query();

        if ($this->car_model) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->car_model . '%')
                    ->orWhere('year', 'like', '%' . $this->car_model . '%');
            });
        }

        if ($this->monthly_pay) {
            $query->whereRaw("CAST(JSON_UNQUOTE(JSON_EXTRACT(price, '$.Mensal')) AS DECIMAL(10,2)) <= ?", [$this->monthly_pay]);
        }

        if ($this->year) {
            $query->where('year', $this->year);
        }

        $carros = $query->paginate(12);

        return view('livewire.web.search', [
            'carros' => $carros,
        ]);
    }
}
