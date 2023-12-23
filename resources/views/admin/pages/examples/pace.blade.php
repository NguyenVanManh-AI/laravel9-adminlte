@extends('admin.layouts.content-wrapper')
@section('title', 'Pace')
@section('sub-title', 'Pace')
@section('admin.pages.content')
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          You can Change Pace Styles, Checkout the <a href="https://adminlte.io/docs/3.1/" target="_blank" rel="noopener noreferrer">AdminLTE Official Docs</a> in Online.
          <br>
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection

@push('styles-page')
  <!-- pace-progress -->
  <link rel="stylesheet" href="{{ asset('plugins/pace-progress/themes/black/pace-theme-flat-top.css') }}">
@endpush

@push('scripts-page')
  <!-- pace-progress -->
  <script src="{{ asset('plugins/pace-progress/pace.min.js') }}"></script>
@endpush
