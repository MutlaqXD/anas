
@extends('layouts.app')

@section('form')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">
        @include('sweetalert::alert')
        <div class="container-fluid py-4">

            <div class="row">
                <br>
                <hr>
                <h6>اضافة كتاب جديد</h6>
                <div class="col-sm-12 col-md-6 col-lg-12">

                    <form action="{{route('books.store')}}" method="POST"   enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" >
                        <div class="form-group row">
                            <div class="col-6">
                                <input name="name" type="text"  value=""
                                       class="form-control" placeholder="اسم الكتاب" required>

                            </div>
                        </div>

                        <div class="col-6" style="margin-top: 25px">
                            <input name="price" type="text"  value=""
                                  class="form-control" id="" placeholder="السعر" required>
                        </div>

                        <div class="col-6 form-group">
                            <br>
                            <textarea name="description"  value=""
                                      class="form-control" id="" rows="" placeholder="وصف مختصر "
                                      required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02"> ارفق صورة الغلاف</label>

                                <input  name="image" class="input-file" type="file">

                        <div class="col-6">
                            <button type="submit" name="add" class="btn btn-md btn-success">إرسال</button>
                        </div>


                    </form>

                </div>
                @endsection
            </div>
        </div>
    </main>


