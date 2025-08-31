<?php
namespace App\Livewire\Admin\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Breadcrumb extends Component
{
    public array $items = [];


    public function mount()
    {
        $segments = Request::segments(); // ['pt-BR', 'dashboard', 'admin', 'product']
       
        // Remove o primeiro segmento se for uma localização suportada
        $supportedLocales = array_keys(LaravelLocalization::getSupportedLocales());
 
        if (!empty($segments) && in_array($segments[0], $supportedLocales)) {
            array_shift($segments); // remove 'pt-BR'
        } 
        $url = '';
        $segments = Request::segments();
        $supportedLocales = array_keys(LaravelLocalization::getSupportedLocales());
         
        if (!empty($segments) && in_array($segments[0], $supportedLocales)) {
            array_shift($segments); // remove o locale
        }
         
        // Só adiciona "Dashboard" se o primeiro segmento não for "dashboard"
        if (!empty($segments) && $segments[0] !== 'dashboard') {
            $this->items[] = [
                'label' => __('Dashboard'),
                'url' => route('home'),
            ];
        }
        
        $url = '';
        foreach ($segments as $segment) {
            $url .= '/' . $segment;
        
            $localizedUrl = LaravelLocalization::getLocalizedURL(app()->getLocale(), $url);

            // Verifica se a rota realmente existe para esse caminho
            $hasRoute = collect(Route::getRoutes())->contains(function ($route) use ($localizedUrl) {
                return rtrim(url($route->uri()), '/') === rtrim($localizedUrl, '/');
            });
             
            $this->items[] = [
                'label' => $this->translate($segment),
                'url' => $hasRoute ? $localizedUrl : null,
            ];
        }
        
        if (!empty($this->items)) {
            $this->items[array_key_last($this->items)]['url'] = null;
        }
    }

    
    private function translate($key)
    {
        $key = str_replace(['-', '_'], ' ', $key);
        $key = ucwords($key); // "product-edit" → "Product Edit"
        return __($key);
    }

    public function render()
    {
        return view('livewire.admin.components.breadcrumb');
    }
}