<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Image;


class BooksController extends Controller
{

    // View Books in admin Dashbord
    public function BooksAll(){

        $allbooks = books::latest()->get();
        return view('admin.books.books_all', compact('allbooks'));

    }

    // View Books in admin Dashbord
    public function BooksShow(){

        $allbooks = books::latest()->get();
        return view('admin.books.books_all', compact('allbooks'));

    }// End Method

    // Convert the user to page add

    public function BooksAdd()
    {
        return view('admin.books.addBooks');
    } // End Method


    // insert Book to databace imge
    public function BooksStore(Request $request)
    {

        $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(100,150)->save('upload/imgebook/'.$name_gen);
            $save_url = 'upload/imgebook/'.$name_gen;


        books::insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $save_url,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now() ]);

        /** finshed back to home  */
        alert()->success('SuccessAlert','تمت اضافة الكتاب بنجاح');
        return redirect()->back();

    }// End Method


    //Convert the user to page edit with get data Book
    public function BooksEdit($id)
    {

        $book = books::findOrFail($id);
        return view('admin.books.editBook', compact('book'));
    } // End Method

    // Ubdate Book in databace
    public function BooksUpdate(Request $request)
    {

        $books_id = $request->id;

        books::findOrFail($books_id)->update([
            'image' => $request->image,
            'price' => $request->price,
            'description' => $request->description,
            'updated_at' => Carbon::now()

        ]);
        return redirect()->back();
        }//End Method


    // Delet Book in databace
    public function BooksDelete($id)
    {

        books::findOrFail($id)->delete();
        alert()->error('Delet','تم حذف الكتاب بنجاح');
        return redirect()->back();

    } // End Method
}
