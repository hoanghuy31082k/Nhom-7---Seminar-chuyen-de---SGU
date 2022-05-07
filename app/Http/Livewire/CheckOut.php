<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CheckOut extends Component
{
    public function delete($rowId){
        Cart::remove($rowId);
        $this->emit('cartUpdated');
    }
    public function render()
    {
        return view('livewire.check-out',[
            'carts'=>Cart::content()
        ]);
    }
}
