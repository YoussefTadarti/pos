@extends('layouts.admin')
@section('title', 'الضبط العام')
@section('contentHeader', 'الضبط')
@section('contentHeaderLink')
    <a href="{{ route('admin.index') }}">الضبط</a>
@endsection
@section('contentHeaderActive', 'عرض')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title card_title_center">بيانات الخزانات</h3>
                    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                    <input type="hidden" id="ajax_search_url" value="{{ route('admin.treasuries.ajax_search') }}">
                    <button class="btn btn-success"><a class="text-light"
                            href="{{ route('admin.treasuries.create') }}">إضافة
                            خزنة</a> </button>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-4">
                        <input class="form-control mb-3" type="text" id="search_by_name" placeholder="بحث بالإسم">

                    </div>

                    <div id="ajax_responce_serarchDiv">
                        @if ($data->isNotEmpty())
                            <table class="table table-bordered">
                                <thead class="thead-custom">
                                    <tr>
                                        <th scope="col">رقم الخزنة</th>
                                        <th scope="col">اسم الخزنة</th>
                                        <th scope="col">نوع</th>
                                        <th scope="col">المصاريف</th>
                                        <th scope="col">المداخيل</th>
                                        <th scope="col">الحالة</th>
                                        <th scope="col">إجراءات</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $info)
                                        <tr>
                                            <th scope="row">{{ $info->id }}</td>
                                            <td>{{ $info->name }}</td>
                                            <td>{{ $info->is_master ? 'رئيسية' : 'فرعية' }}</td>
                                            <td>{{ $info->last_exchange }}</td>
                                            <td>{{ $info->last_collect }}</td>
                                            <td>{{ $info->active ? 'مفعلة' : 'مغلقة' }}</td>
                                            <td>
                                                <button class="btn btn-primary">
                                                    <a class="text-light"
                                                        href="{{ route('admin.treasuries.edit', $info->id) }}">تعديل</a>
                                                </button>
                                                <button class="btn btn-info">
                                                    <a class="text-light" href="">المزيد</a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="mt-3 d-flex justify-content-center">
                                {{ $data->links() }}
                            </div>
                        @else
                            لاتوجد بيانات حاليا
                        @endif
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/admin/js/treasurie.js') }}"></script>
@endsection
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>

</script> --}}
