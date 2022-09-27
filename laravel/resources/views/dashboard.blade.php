@extends('layouts.app')

@section('main')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">

        <div class="container-fluid py-4">


            <div class="row my-4">
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row mb-3">
                                <div class="col-6">

                                </div>
                                <div class="col-6 my-auto text-start">

                                </div>
                            </div>
                        </div>
                        <div class="boks card-body p-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الغلاف</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">اسم الكتاب
                                        </th>

                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">السعر
                                        </th>

                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">تحرير
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">حذف
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td  class=" text-uppercase  text-xxs font-weight-bolder ">math</td>
                                        <td  class=" text-uppercase  text-xxs font-weight-bolder">math</td>

                                        <td  class="text-center text-uppercase  text-xxs font-weight-bolder">free</td>
                                        <td  class="text-center text-uppercase  text-xxs font-weight-bolder"><a href="" class="btn btn-sm btn-success">تحرير</a> </td>
                                        <td  class="text-center text-uppercase  text-xxs font-weight-bolder"><a href="" class="btn btn-sm btn-danger">حذف</a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <br>
                <hr>
                <h6>اضافة كتاب جديد</h6>
                <div class="col-sm-12 col-md-6 col-lg-8">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-6">
                                <input name="Name" type="text" value="" class="form-control" placeholder="اسم الكتاب" required>

                            </div>

                        </div>


                        <div class="col-6" style="margin-top: 25px">
                            <input name="loction" type="text" value="" class="form-control" id="" placeholder="السعر" required>

                        </div>
                    </form>
                </div>


                <div class="col-6 form-group">
                    <br>
                    <textarea name="ditls" value="" class="form-control" id="exampleTextarea" rows="" placeholder="وصف مختصر "
                              required></textarea>

                </div>

                <div class="form-group">
                    <label> ارفق الصور</label>
                    <input name="image" type="file" class="form-control-file" required>


                    <br>
                    <small id="fileHelp" class="form-text text-muted">يرجا ارفاق صورة لغلاف الكتاب</small>
                </div>
                <div class="col-6">
                    <button type="submit" name="add" class="send">إرسال</button>
                </div>

                </form>

            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <!-- فوتر -->
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </footer>
        </div>
    </main>
@endsection
