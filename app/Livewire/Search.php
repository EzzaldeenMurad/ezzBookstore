<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Http\Request;
use Livewire\Component;

class Search extends Component
{
    protected $books;
    protected $title;
    public function search(Request $request)
    {
        $this->books = Book::where('title', 'like', "%{$request->search}%")->paginate(12);
        $this->title = 'نتائج البحث عن: ' . $request->search;

    }
    public function render()
    {
        return view('livewire.search');
    }
}
