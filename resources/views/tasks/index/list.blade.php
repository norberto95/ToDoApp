<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="tab-content">
    <div class="tab-pane fade show active" id="tasks-active">
      <div class="row">
        @forelse($activeTasks as $activeTask)
        <div class="col-sm-12">
          <div class="card bg-light mb-3">
            <div class="card-body">
              <h5 class="card-title">
                {{$activeTask->title}}
              </h5>
              @if($activeTask->content)
              <p class="card-text">
                {{Str::limit($activeTask->content, 50)}}
              </p>
              @endif
              <div class="btn-group">
              <form action="{{ route('tasks.update', ['task' => $activeTask]) }}" method="POST" novalidate>
                <input type="hidden" name="title" value="{{$activeTask->title}}">
                <input type="hidden" name="content" value="{{$activeTask->content}}">
                <input type="hidden" name="status" value="{{Task::getStatus('Completed')}}">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-success">
                  Oznacz jako zakończone
                </button>
              </form>

                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Więcej
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="{{ route('tasks.show', ['task' => $activeTask]) }}">Szczegóły</a></li>
                    <li><a class="dropdown-item" href="{{ route('tasks.edit', ['task' => $activeTask]) }}">Edytuj</a></li>
                    <form action="{{ route('tasks.delete', ['task' => $activeTask]) }}" method="POST" novalidate> 
                    @method('DELETE')
                    @csrf
                    <li><button class="dropdown-item" type="submit">Usuń</button></li>
                    </form>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-sm-12">
          <p>Wszystkie zadania są zakończone</p>
        </div>
        @endforelse
      </div>
    </div>

    <div class="tab-pane fade" id="tasks-completed">
      <div class="row">
        @forelse($completedTasks as $completedTask)
        <div class="col-sm-12">
          <div class="card bg-light mb-3">
            <div class="card-body">
              <h5 class="card-title">
                {{$completedTask->title}}
              </h5>
              @if($completedTask->content)
              <p class="card-text">
                {{Str::limit($completedTask->content, 50)}}
              </p>
              @endif
              <div class="btn-group">
              <form action="{{ route('tasks.update', ['task' => $completedTask]) }}" method="POST" novalidate>
                <input type="hidden" name="title" value="{{$completedTask->title}}">
                <input type="hidden" name="content" value="{{$completedTask->content}}">
                <input type="hidden" name="status" value="{{Task::getStatus('Active')}}">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-success">
                  Oznacz jako aktywne
                </button>
              </form>

                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Więcej
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="{{ route('tasks.show', ['task' => $completedTask]) }}">Szczegóły</a></li>
                    <li><a class="dropdown-item" href="{{ route('tasks.edit', ['task' => $completedTask]) }}">Edytuj</a></li>
                    <form action="{{ route('tasks.delete', ['task' => $completedTask]) }}" method="POST" novalidate> 
                    @method('DELETE')
                    @csrf
                    <li><button class="dropdown-item" type="submit">Usuń</button></li>
                    </form>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-sm-12">
          <p>Tutaj pojawią się twoje zakończone zadania</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</body>

</html>