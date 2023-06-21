@extends('layouts.admin')
@section('title', 'الرئيسية')
@section('contentHeader', 'الرئيسية')
@section('contentHeaderLink')
    <a href="{{ route('admin.index') }}">الرئيسية</a>
@endsection
@section('contentHeaderActive', 'عرض')
@section('content')
    الرئيسية
@endsection
