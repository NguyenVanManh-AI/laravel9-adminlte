<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Error</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,401,401i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/themes/dist/css/adminlte.min.css') }}">
    {{-- bootstrap 4 --}}
    <link rel="stylesheet"
        href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- bootstrap 4 --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>
        #main {
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
            height: 100vh;
        }

        #main > div {
            width: 30%;
        }
        .img-error {
          width: 100%;
        }
        .img-error img {
          max-width: 100%;
          border-radius: 20px;
        }
        .text-error {
          margin-top: 6%;
          width: 100%;
          color: silver;
          text-align: center;
        }
        h5 {
          margin-bottom: 4%;
        }
    </style>
</head>

<body>
    <div id="main">
        <div>
            <div class="img-error">
                <img src="{{ asset('image/errors/404.jpg') }}" alt="Error 401">
            </div>
            <div class="text-error">
              <h5>Error 404 - PAGE NOT FOUND</h5>
              <a href="http://localhost:8000/"><button type="button" class="btn btn-primary"><i class="fa-solid fa-house"></i> Home Page</button></a>
            </div>
        </div>
    </div>
</body>

</html>
