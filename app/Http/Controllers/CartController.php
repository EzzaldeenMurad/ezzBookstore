<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addToCart(Request $request)
    {
        $book = Book::find($request->id);
        if (auth()->user()->booksInCart->contains($book)) {
            $newQuantity = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
            if ($newQuantity > $book->number_of_copies) {
                return response()->json(['message' =>  'لم تتم إضافة الكتاب، لقد تجاوزت عدد النسخ الموجودة لدينا، أقصى عدد موجود بإمكانك حجزه من هذا الكتاب هو ' . ($book->number_of_copies - auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies) . ' كتاب']);
            } else {
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => $newQuantity]);
            }
        } else {
            if ($request->quantity <= $book->number_of_copies) {
                auth()->user()->booksInCart()->attach($request->id, ['number_of_copies' => $request->quantity]);
            } else {
                return response()->json(['message' =>
                'لم تتم إضافة الكتاب، لقد تجاوزت عدد النسخ الموجودة لدينا، أقصى عدد موجود بإمكانك حجزه من هذا الكتاب هو ' .
                    ($book->number_of_copies - $request->quantity) . ' كتاب']);
            }
        }
        $num_of_product = auth()->user()->booksInCart()->count();

        return response()->json(['num_of_product' => $num_of_product]);
    }
    public function viewCart()
    {
        $items = auth()->user()->booksInCart;
        // $book =   auth()->user()->booksInCart()->where('book_id',$items-> );
        return view('cart', compact(['items']));
    }
    public function removeOne(Request $request, Book $book)
    {
        $request->validate([
            'number_of_copies' => 'required|numeric|min:1|max:300',
        ]);
        // $oldQuantity = auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
        // if ($request->number_of_copies > 1) {
        auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => $request->number_of_copies]);
        // } else {
        //     auth()->user()->booksInCart()->detach($book->id);
        // }

        return redirect()->back();
    }
    public function removeAll(Book $book)
    {
        auth()->user()->booksInCart()->detach($book->id);

        return redirect()->back();
    }
}
