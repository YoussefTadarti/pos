@extends('layouts.admin')
@section('title', 'تعديل بيانات الخزنة')
@section('contentHeader', 'تعديل بيانات الخزنة ')
@section('contentHeaderLink')
    <a href="{{ route('admin.index') }}">تعديل بيانات الخزنة</a>
@endsection
@section('contentHeaderActive', 'تعديل')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الخزنة </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if ($data)
                        <form action="{{ route('admin.treasuries.update', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>اسم الخزنة</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', $data['name']) }}" placeholder="أدخل اسم الخزنة" />
                            </div>
                            @error('name')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div for="is_master" class="form-group">
                                <label>نوع الخزنة</label>
                                <select class="form-control" name="is_master" id="is_master">
                                    <option disabled selected value="">--ماهو نوع الخزنة؟--</option>
                                    <option @if ($data['is_master']) selected @endif value="1">رئيسية</option>
                                    <option @if (!$data['is_master']) selected @endif value="0">فرعية</option>
                                </select>
                            </div>
                            @error('is_master')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>أخر مصروف</label>
                                <input type="number" id="last_exchange" name="last_exchange" class="form-control"
                                    value="{{ old('last_exchange', $data['last_exchange']) }}"
                                    placeholder="أدخل أخر مصروف " />
                            </div>
                            @error('last_exchange')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>أخر مدخول</label>
                                <input type="number" id="last_collect" name="last_collect" class="form-control"
                                    value="{{ old('last_collect', $data['last_collect']) }}" placeholder="أدخل أخر مدخول" />

                            </div>
                            @error('last_collect')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div for="active" class="form-group">
                                <label>حالة الخزنة</label>
                                <select class="form-control" name="active" id="active">
                                    <option disabled selected value="">-- كيف هي حالة الخزنة؟--</option>
                                    <option @if ($data['active']) selected @endif value="1">مفعلة</option>
                                    <option @if (!$data['active']) selected @endif value="0">مغلقة</option>
                                </select>
                            </div>
                            @error('active')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div class="form-group text-center">
                                <button class="btn btn-primary">تعديل</button>
                                <button class="btn btn-danger">
                                    <a class='text-light' href="{{ route('admin.treasuries') }}">إلغاء</a>
                                </button>
                            </div>

                        </form>
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
