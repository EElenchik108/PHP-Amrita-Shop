@extends('adminlte::page')

@section('title', 'Add product')

@section('content_header')
    <h1>Add product</h1>
    
@stop

@section('content')

@include('admin._massages')

    <form action="/admin/product" method="POST" enctype="multipart/form-data">
        
        @include('admin.product._form')

    </form>
@stop

@section('js')
<script>
    function handleFileSelect(evt) {
        var file = evt.target.files; // FileList object
        var f = file[0];
        // Only process image files.
        if (!f.type.match('image.*')) {
            alert("Image only please....");
        }
        var reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
            return function(e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb"  style="width: 100px" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
                document.getElementById('output').insertBefore(span, null);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
        document.getElementById('mainImage').style.display = "none";
    }
    document.getElementById('img').addEventListener('change', handleFileSelect, false);
    </script>

<script>
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {
            // Only process image files.
            if (!f.type.match('image.*')) {
                alert("Image only please....");
            }
            var reader = new FileReader();
            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb"  style="width: 100px" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
                    document.getElementById('outputMulti').insertBefore(span, null);
                };
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
            document.getElementById('imagesAdditional').style.display = "none";
        }
    }
    document.getElementById('images').addEventListener('change', handleFileSelect, false);
    </script>

@endsection