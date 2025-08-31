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
class QuemSomos extends Component
{
    public function render()
    {
        return view('livewire.web.quem-somos');
    }
}
