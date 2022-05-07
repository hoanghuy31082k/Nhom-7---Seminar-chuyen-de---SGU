<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddtoCart extends Component
{
    public $item;
    public function addtocart($id){
        $book = Book::find($id);
        Cart::add(['id'=>$book->id,'name'=>'item','qty'=> 1,'price'=> '0','weight'=>100]);
        $this->emit('cartUpdated');
    }
    public function render()
    {
        return view('livewire.addto-cart');
    }
}
