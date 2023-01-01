<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Widok zadania</title>
</head>

<body>
    <div class="container">
        <div class="row py-5">
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <small>
                    <p>
                        <a href="{{ route('tasks.index') }}">
                            &larr; Wróć do listy zadań
                        </a>
                    </p>
                </small>
            </div>
            @if(session()->has('status'))
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <div class="alert @if(session('status')['success']) alert-success @else alert-danger @endif" role="alert">
                    {{ session('status')['message'] }}
                </div>
            </div>
            @endif
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <h1>{{ $task->title }}</h1>
                <p>
                    <b>Utworzone:</b>
                    {{ $task->created_at->format('Y-m-d') }}
                </p>
                @if($task->content)
                <p>{{ $task->content }}</p>
                @endif
                <p>
                    Status zadania:


                    @switch($task->status)
                    @case(\App\Models\Task::getStatus('Active'))
                    Aktywne
                    @break
                    @case(\App\Models\Task::getStatus('Completed'))
                    Zakończone
                    @break
                    @endswitch
                </p>
                <div class="d-flex">
                    <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-success">
                        Edytuj
                    </a>
                    <form action="{{ route('tasks.delete', ['task' => $task]) }}" method="POST" novalidate> 
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Usuń</button>
                        </form>
                </div>

            </div>
        </div>

</body>

</html>