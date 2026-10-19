<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public Function store(Request $request){
        $request->validate([
            'title'=>['required','string'],
            'author'=>['required','string'],
            'publicationyear'=>['required','integer','min:1998','max:2070'],

        ]);
        Book::query()->create([
            'title'=>$request->title,
            'author'=>$request->author,
            'publicationyear'=>$request->publicationyear,


        ]);
        return "stored";
    }

    public Function index(){
        return Book::query()->get();
    }

    public function show($id){
        return Book::query()->where('id',$id)->first();
    }

    public Function update($id,Request $request){
        $request->validate([
            'title'=>['nullable','string'],
            'author'=>['nullable','string'],
            'publicationyear'=>['nullable','integer','min:1998','max:2070'],
        ]);

        Book::query()->where('id',$id)->update([

            'title'=>$request->title,
            'author'=>$request->author,
            'publicationyear'=>$request->publicationyear,

        ]);
        return "updated";
    }

    public function destroy($id){
        Book::query()->where('id',$id)->delete();
        return 'deleted';
    }
}
