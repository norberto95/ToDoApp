<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje zadania</title>
</head>

<body>
    <div class="container">
        <div class="row py-5">
            @if(session()->has('status'))
            <div class="col-sm-12">
                <div class="alert @if(session('status')['success']) alert-success @else alert-danger @endif" role="alert">
                    {{ session('status')['message'] }}
                </div>
            </div>
            @endif
            <div class="col sm-12 col-lg-8 offset-lg-2">
                @include('tasks.index.nav')
                @include('tasks.index.list')
            </div>
        </div>
    </div>

</body>

</html>