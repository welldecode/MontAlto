<?php

namespace App\Livewire\App\Components;


use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Sidebar extends Component
{

      public $items = [];

    public function mount($items = [])
    {
        $this->items = array_map(function ($item) {
            if (isset($item['routeName'])) {
                $item['current'] = Request::routeIs($item['routeName']);
            } else {
                $item['current'] = false;
            }
            return $item;
        }, $items);
    }

    public function render()
    {
        return view('livewire.app.components.sidebar', [
            'items' => $this->items,
        ]);
    } 
}
