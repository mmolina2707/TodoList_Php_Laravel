<!doctype html>
<html lang="en">
<head>
    <title>TodoList App Php Laravel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <style>
        .task-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .task-title {
            flex-grow: 1;
            margin-left: 10px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
<main class="container-fluid px-2 px-sm-4 my-4">
    <div class="card">
        <div class="card-header text-center text-md-start">
            <h4>TodoList</h4>
        </div>

        <div class="card p-3">
            <div class="card-body">
                <h3 class="card-title text-left">Tarea:</h3>
            
                <form class="row g-2" action="/tasks" method="POST">
                    @csrf
                    <div class="col-12 col-md-10">
                        <input type="text" class="form-control" name="title" placeholder="Nueva tarea" required>
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-success w-100">Agregar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-3">
            @foreach ($tasks as $task)
                <div class="card shadow-sm mb-3">
                    <div class="card-body task-card">
                        <!-- Checkbox -->
                        <form action="/tasks/{{ $task->id }}/toggle-completed" method="POST" style="display:inline">
                            @method('PATCH')
                            @csrf
                            <input 
                                type="checkbox" 
                                name="completed" 
                                onchange="this.form.submit()" 
                                {{ $task->completed ? 'checked' : '' }}>
                        </form>
                        
                        <!-- Título de la tarea -->
                        <!--<span class="task-title {{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                            {{ $task->title }}
                        </span>-->

                        <!-- Botón de actualizar -->
                        <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline">
                            @method('PATCH')
                            @csrf
                            <input type="text" id="title" name="title" value="{{ $task->title }}" class="form-control form-control-sm d-inline-block" style="width: auto;">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Actualizar</button>
                        </form>

                        <!-- Botón de eliminar -->
                        <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm ms-2">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<footer class="bg-light text-center py-3 mt-auto">
    <p>© 2024 TodoList Application</p>
</footer>
</body>
</html>
