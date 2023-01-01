<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj zadanie</title>
</head>

<body>
    <div class="container">
        <div class="row py-5 mb-3">
            <div class="col sm-12 col-lg-8 offset-lg-2 mb-3">
                <p>
                    <a href="{{ route('tasks.update', ['task' => $task]) }}">
                        &larr; Wróć do zadania
                        <b>{{$task->title}}</b>
                    </a>
                </p>
                <p>
                    <a href="{{ route('tasks.index') }}">
                        &larr; Wróć do listy zadań
                    </a>
                </p>
                <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST" novalidate>
                    <div class="form-group mb-3">
                        <label class="mb-3" for="title">
                            Tytuł zadania
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Wyjść z psem" value="{{ old('title', $task->title) }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-3" for="content">Treść zadania</label>
                        <textarea class="form-control" name="content" id="content">{{old('content', $task->content)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="mb-3" for="status">
                            Status zadania
                        </label>
                        @php
                        $activeStatus = \App\Models\Task::getStatus('Active');
                        $completedStatus = \App\Models\Task::getStatus('Completed');
                        @endphp
                        <select class="form-select mb-3" id="status" name="status">
                            <option value="{{ $activeStatus }}" @if($activeStatus == $task->status) selected @endif>
                                Aktywne
                            </option>
                            <option value="{{ $completedStatus }}" @if($completedStatus == $task->status) selected @endif>
                                Zakończone
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Edytuj zadanie
                    </button>
                    @method('PUT')
                    @csrf
                </form>
            </div>
        </div>
    </div>

</body>

</html>