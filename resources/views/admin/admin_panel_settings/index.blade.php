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
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data))
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <td class="width30">اسم الشركة</td>
                                <td>{{ $data['system_name'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">كود الشركة</td>
                                <td>{{ $data['com_code'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">حالة الشركة</td>
                                <td>{{ $data['active'] ? 'مفعل' : 'معطل' }}</td>
                            </tr>
                            <tr>
                                <td class="width30">عنوان الشركة</td>
                                <td>{{ $data['address'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">هاتف الشركة</td>
                                <td> {{ $data['phone'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30"> رسالة التنبية اعلي الشاشة للشركة</td>
                                <td> {{ $data['general_alert'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30">لوجو الشركة</td>
                                <td>
                                    <div class="image">
                                        <img class="custom_img"
                                            src="{{ asset('assets/admin/uploads') . '/' . $data['photo'] }}"
                                            alt="لوجو الشركة">
                                    </div>

                                </td>


                            </tr>
                            <tr>
                                <td class="width30"> تاريخ اخر تحديث</td>
                                <td>

                                    @if ($data['updated_by'] > 0 and $data['updated_by'] != null)
                                        {{ date('d-m-Y , H:i', strtotime($data['updated_at'])) }}

                                        بواسطة
                                        {{ $data['updated_by_admin'] }}
                                    @else
                                        لايوجد تحديث
                                    @endif
                                    <button class="btn btn-primary ml-10" style="float: left;"><a
                                            href="{{ route('admin.adminpanelsettingEdit') }}"
                                            class="text-white">تعديل</a></button>
                                </td>
                            </tr>

                        </table>
                    @else
                        لاتوجد بيانات حاليا
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
