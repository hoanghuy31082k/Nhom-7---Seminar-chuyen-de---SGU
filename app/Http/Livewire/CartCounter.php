<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = [
        'cartUpdated' => 'render'
    ];
    public function render()
    {
        return view('livewire.cart-counter',[
            'cart'=>Cart::content()->groupBy('id')->count()
        ]);
    }
}
