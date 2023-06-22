@extends('layouts.admin')
@section('title', 'تعديل بيانات الضبط العام ')
@section('contentHeader', 'تعديل بيانات الضبط ')
@section('contentHeaderLink')
    <a href="{{ route('admin.index') }}"> تعديل بيانات الضبط العام </a>
@endsection
@section('contentHeaderActive', 'تعديل')
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
                        <form action="{{ route('admin.adminpanelsettingUpdate') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>اسم الشركة</label>
                                <input type="text" id="system_name" name="system_name" class="form-control"
                                    value="{{ $data['system_name'] }}" oninvalid="setCustomValidity('من فضلك إملء الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}" placeholder="أدخل اسم الشركة" />
                            </div>
                            @error('system_name')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>عنوان الشركة</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    value="{{ $data['address'] }}" placeholder="أدخل عنوان الشركة" />
                            </div>
                            @error('address')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>هاتف الشركة</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{ $data['phone'] }}" placeholder="أدخل رقم هاتف الشركة" />
                            </div>
                            @error('phone')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> رسالة تنبيه</label>
                                <input type="text" id="general_alert" name="general_alert" readonly class="form-control"
                                    value="{{ $data['general_alert'] }}" placeholder="لا توجد رسالة تنبيه" />
                            </div>
                            <div class="form-group">
                                <label>شعار الشركة</label>
                                <div class="image">
                                    <img class="custom_img" src="{{ asset('assets/admin/uploads/' . $data['photo']) }}"
                                        alt="لوجو الشركة" />
                                    <input class="form-control mb-3 mt-3" type="file" name="photo" id="photo"
                                        style="display: none;">

                                    <button type='submit' class="btn btn-sm btn-danger" id="update_img">تغيير صورة</button>

                                    <button type='submit' class="btn btn-sm btn-danger" id="cancel_update_img"
                                        style="display: none">إلغاء</button>
                                </div>
                                @error('photo')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary">حفظ التعديلات</button>
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
@section('script')
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
@endsection
