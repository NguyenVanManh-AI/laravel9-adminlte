@extends('admin.layouts.content-wrapper')
@section('title', 'Simple Search Form')
@section('sub-title', 'Simple Search Form')
@section('admin.pages.content')
<div class="container-fluid">
  <h2 class="text-center display-4">Search</h2>
  <div class="row">
      <div class="col-md-8 offset-md-2">
          <form action="simple-results.html">
              <div class="input-group">
                  <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                  <div class="input-group-append">
                      <button type="submit" class="btn btn-lg btn-default">
                          <i class="fa fa-search"></i>
                      </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection

@push('styles-page')

@endpush

@push('scripts-page')

@endpush
