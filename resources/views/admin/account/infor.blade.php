@extends('admin.layouts.content-wrapper')
@section('title', 'Admin Information')
@section('sub-title', 'Admin Information')
@section('admin.pages.content')
<div class="container-fluid">
    <h1><i class="fa-solid fa-boxes-packing"></i> INFOR ADMIN</h1>
    <h1>{{ auth()->guard('admin')->user()->name }}</h1>
    <h1 ><a href="{{ route('admin.logout') }}" class="text-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></h1>
</div>
@endsection

@push('styles-page')
@endpush

@push('scripts-page')

@endpush


