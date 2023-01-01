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
  
  <nav class="d-flex w-100 justify-content-between mb-3">
  <ul class="nav nav-pills" id="myStatus">
    <li class="nav-item">
      <a class="nav-link active" id="tasks-active-tab" href="#tasks-active" data-toggle="pill">Aktywne</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tasks-completed-tab" href="#tasks-completed" data-toggle="pill">Zakończone</a>
    </li>
  </ul>

  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="btn btn-success"  href="{{ route('tasks.add') }}">Dodaj nowe zadanie</a>
    </li>
  </ul>
</nav>

<script>
    $(document).ready(function() {
        $('#myStatus a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    });
</script>
</body>
</html>