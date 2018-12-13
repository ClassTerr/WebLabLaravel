<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use \Validator;
use Session;

class BooksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = ["#fcc278","#009c8b","#9c9688","#db2e0f","#e3b005","#a9afad","#fe7b21","#aea98c","#705e1e","#939894","#b4aa91","#725d64","#7a4930","#800020","#603060","#9a9c43","#2c63a0","#658539","#b06010"];

        $books = Book::paginate(10);

        for ($i=0; $i < count($books); $i++) { 
            $books[$i]->color = $colors[$i % count($colors)];
        }

        return view("books.index", compact('books'));
    }

    public function manage()
    {
        $this->middleware('is-admin');
        $books = Book::paginate(10);
        return view("books.manage", compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'year' => 'numeric',
            'link' => 'required'
        ]);

        $book= new \App\Book;
        $book->name=$request->get('name');
        $book->author=$request->get('author');
        $book->year=$request->get('year');
        $book->link=$request->get('link');
        $book->save();
        
        return redirect('books/manage')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return view("books.details", compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'year' => 'numeric',
            'link' => 'required'
        ]);

        $book->name=$request->get('name');
        $book->author=$request->get('author');
        $book->year=$request->get('year');
        $book->link=$request->get('link');
        $book->save();
        return redirect('books/manage')->with('success', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $name = $book->name;
        $book->delete();
        return redirect('books/manage')->with('success','Book "' . $name . '" has been successfully deleted');
    }
}
