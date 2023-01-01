<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj zadanie</title>
</head>

<body>
    <div class="container">
        <div class="row py-5 mb-3">
            <div class="col sm-12 col-lg-8 offset-lg-2 mb-3">
                <p>
                    <a href="{{ route('tasks.index') }}">
                        &larr; Wróć do listy zadań
                    </a>
                </p>
                <form action="{{ route('tasks.store') }}" method="POST" novalidate>
                    <div class="form-group mb-3">
                        <label class="mb-3" for="title">
                            Tytuł zadania
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"id="title" name="title" placeholder="Wyjść z psem" value="{{old('title')}}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-3" for="content">Treść zadania</label>
                        <textarea class="form-control" name="content" id="content">{{old('content')}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Dodaj zadanie
                    </button>
                    <input type="hidden" name="status" value="{{ $defaultStatus }}">
                    @csrf
                    @method("POST")
                </form>
            </div>
        </div>
    </div>

</body>

</html>