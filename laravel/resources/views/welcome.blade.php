<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>index</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('sass/min.css')}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body dir="rtl">

@php
    $allbooks = App\Models\books::latest()->get();
    $products = App\Models\books::latest()->get();
@endphp
@include('sweetalert::alert')
<header>




    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color : white ;">
                {{--                <img src="image/brand.jpeg" class="brand" alt="">--}}
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li>
                        <input name="search" class="search" type="search" placeholder="ابحث عن كتاب">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"
                           style="color: rgb(24, 30, 24) ; font-size: larger;">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: rgb(24, 30, 24) ; font-size: larger;">الكتب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true" style="color:rgb(24, 30, 24) ;">عن
                            المنصة</a>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 main-section">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                                        <i class="" aria-hidden="true"></i> سلة المشتريات <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="row total-header-section">
                                            <div class="col-lg-6 col-sm-6 col-6">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                            </div>
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                                <p>المجموع: <span class="text-info"> {{ $total }} SAR </span></p>
                                            </div>
                                        </div>
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                <div class="row cart-detail">
                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                        <img src="{{ $details['image'] }}" />
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                        <p>{{ $details['name'] }}</p>
                                                        <span class="price text-info"> SAR {{ $details['price'] }}</span> <span class="count"> الكمية:{{ $details['quantity'] }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                <a href="{{ route('cart') }}" class="btn btn-primary btn-block">مشاهدة السلة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('login'))

                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="text-sm text-gray-700 dark:text-gray-500 underline"></a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}" tabindex="-1" aria-disabled="true"
                                   style="color: rgb(24, 30, 24) ; font-size: x-large;">
                <span class="material-symbols-outlined" style="font-size: x-large;">
                  login
                  </span>
                                </a>

                @endauth
            </div>
            @endif

            </li>
            </ul>
        </div>
        </div>
    </nav>
</header>
<div class="">
    <div class="hedpage">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="tex container">
                        <h1></h1>
                        <h2>الكتب العلمية بين يديك</h2>
                        <small class="sml">خير جليس في الزمان كتاب</small>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="imges">

                    </div>
                </div>


                <!-- <div class="col-lg-4 col-md-12 col-sm-12">
                   <button class="btnshop">اشتر الان</button>
                 </div> -->
            </div>
        </div>

    </div>
</div>

<div class="senterPage">
    <div class="container">
        <hr>

        <div class="container">
            <div class="row proudct">


                <div class="row">
                    @foreach($products as $product)
                        <div class="col-xs-18 col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img src="{{ $product->image }}" alt="">
                                <div class="caption">
                                    <h4>اسم الكتاب :{{ $product->name }}</h4>
                                    <p>وصف الكتاب :{{ $product->description }}</p>
                                    <p><strong>السعر: </strong> {{ $product->price }}SAR </p>
                                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">إضافة لسلة</a> </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



            </div>

        </div>
        <br><br><br><br>

    </div>

    <div class="container fuitser">
        <hr>
        <div class="row fua">
            <div class="col-lg-4 c0l-md-12 col-sm-12">
                <div class="card crsd-fet">
            <span class="icn material-symbols-outlined">
              credit_card
            </span>
                    <p class="fet">جميع وسائل الدفع الالكتروني متاحه
                    <p>
                </div>
            </div>
            <div class="col-lg-4 c0l-md-12 col-sm-12">
                <div class="card crsd-fet">
            <span class="icn material-symbols-outlined">
              24mp
            </span>
                    <p class="fet">متاح على مدار الساعه</p>
                </div>
            </div>
            <div class="col-lg-4 c0l-md-12 col-sm-12">
                <div class="card crsd-fet">
            <span class="icn material-symbols-outlined">
              rocket_launch
            </span>
                    <p class="fet">سرعة بالتوصيل و الاستلام</p>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <hr>--}}
{{--            <div class="col-lg-4 col-md-12 col-sm-12">--}}
{{--                <div class="container">--}}
{{--                    <h3 class="msg"> نسعد بتواصلك معنا </h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-12 col-sm12">--}}
{{--                <form action="" method="post" enctype="multipart/form-data">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleFormControlInput1">البريد الالكتروني</label>--}}
{{--                        <input type="email" class="form-control" name="email"--}}
{{--                               placeholder="name@example.com">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="exampleFormControlTextarea1">ضع رسالتك هنا ...</label>--}}
{{--                        <textarea class="form-control" name="masg" rows="3"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <br>--}}
{{--                        <button class="btn btn-mg btn-primary" type="submit" name="add">إرسال</button>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--    </div>--}}




</div>
</div>

<footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase"> عن المنصة</h5>

                <p>
                    تهدف هذه المنصة لتسهيل توفر الكتب العلمية لطلبة العلم من خلال تداول الكتب بين الطلبة
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase"></h5>

                <p>

                </p>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(158, 154, 154, 0.2);">
        © 2022 Copyright:
        <a class="text-dark" href="">442</a>
    </div>
    <!-- Copyright -->
</footer>
<script src="{{asset('sass/min.css')}}"></script>









<br/>






</body>

</html>
