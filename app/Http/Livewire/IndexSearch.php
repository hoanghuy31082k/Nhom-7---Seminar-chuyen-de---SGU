<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class IndexSearch extends Component
{
    public $kw,$result;

    public function render()
    {
        $this->results=Book::where('title','LIKE',"%$this->kw%")->orWhere('author','LIKE',"%$this->kw%")->get();
        return view('livewire.index-search');
    }
}
