@extends('layouts.app')
@section('form')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">

        <div class="container-fluid py-4">

            <div class="row">
                <br>
                <hr>
                <h6>تعديل الكتاب     <b>{{$book->name}}</b> </h6>

                <div class="col-sm-12 col-md-6 col-lg-12">

                    <form action="{{route('books.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $book->id }}">
                        <div class="form-group row">
                            <div class="col-6">
                                <input name="name" type="text" value="{{$book->name}}"
                                       class="form-control">

                            </div>
                        </div>

                        <div class="col-6" style="margin-top: 25px">
                            <input name="price" type="text" value="{{$book->price}}"
                                   class="form-control">
                        </div>

                        <div class="col-6 form-group">



                            <br>


                            <textarea class="form-control" type="text" name = 'description'
                                      rows="3"> {{ old('description', $book->description) }}</textarea>

                        </div>


                        <div class="col-6">
                            <button type="submit" name="add" class="btn btn-md btn-success">تعديل</button>
                        </div>


                    </form>

                </div>
                @endsection
            </div>
        </div>
    </main>
