@extends('user.layouts.content-wrapper')
@section('title', 'Product')
@section('sub-title', 'Product')
@section('user.pages.content')
<div class="container">
    <h1><i class="fa-solid fa-boxes-packing"></i> INFOR USER</h1>
    <h1>{{ auth()->guard('user')->user()->name }}</h1>
    <h1 ><a href="{{ route('user.logout') }}" class="text-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></h1>
</div>
@endsection

@push('styles-page')

@endpush

@push('scripts-page')

@endpush
