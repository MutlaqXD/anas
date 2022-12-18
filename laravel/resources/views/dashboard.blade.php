@extends('layouts.app')

@section('main')

    @php
        $allbooks = App\Models\books::latest()->get();
    @endphp
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">

        <div class="container-fluid py-4">
            <div class="boks card-body p-0 pb-2" style="height: 300px;">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th width="5%">Sl</th>
                        <th>اسم الكتاب</th>
                        <th> السعر </th>
                        <th width="20%">العمليات</th>

                    </thead>


                    <tbody>

                    @foreach ($allbooks as $key => $item)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->price }} </td>
                            <td>
                                <a href="{{ route('books.edit', $item->id) }}" class="btn btn-info active"
                                   title="Edit Data">  تحرير<i class="icon-pencil-alt"></i> </a>

                                <a href="{{ route('books.delete', $item->id) }}" class="btn btn-danger sm"
                                   title="Delete Data" id="delete">حذف  <i class="icon-trash"></i>
                                </a>

                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    @endsection

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

