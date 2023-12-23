@extends('admin.layouts.content-wrapper')
@section('title', 'jsGrid')
@section('sub-title', 'jsGrid')
@section('admin.pages.content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">jsGrid</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div id="jsGrid1"></div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@push('styles-page')
  <!-- jsGrid -->
  <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid-theme.min.css') }}">
@endpush

@push('scripts-page')
<!-- jsGrid -->
<script src="{{ asset('plugins/jsgrid/demos/db.js') }}"></script>
<script src="{{ asset('plugins/jsgrid/jsgrid.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#jsGrid1").js') }}Grid({
        height: "100%",
        width: "100%",

        sorting: true,
        paging: true,

        data: db.clients,

        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married" }
        ]
    });
  });
</script>
@endpush

