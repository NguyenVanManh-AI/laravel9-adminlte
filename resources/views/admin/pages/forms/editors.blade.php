@extends('admin.layouts.content-wrapper')
@section('title', 'Editors')
@section('sub-title', 'Editors')
@section('admin.pages.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Summernote
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <textarea id="summernote">
          Place <em>some</em> <u>text</u> <strong>here</strong>
        </textarea>
                </div>
                <div class="card-footer">
                    Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples
                    and information about the plugin.
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        CodeMirror
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <textarea id="codeMirrorDemo" class="p-3">
<div class="info-box bg-gradient-info">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
<div class="info-box-content">
<span class="info-box-text">Bookmarks</span>
<span class="info-box-number">41,410</span>
<div class="progress">
<div class="progress-bar" style="width: 70%"></div>
</div>
<span class="progress-description">
70% Increase in 30 Days
</span>
</div>
</div>
        </textarea>
                </div>
                <div class="card-footer">
                    Visit <a href="https://codemirror.net/">CodeMirror</a> documentation for more examples and information
                    about the plugin.
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
@endsection

@push('styles-page')
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/codemirror/theme/monokai.css') }}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{ asset('plugins/simplemde/simplemde.min.css') }}">
@endpush

@push('scripts-page')
    <!-- CodeMirror -->
    <script src="{{ asset('plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endpush
