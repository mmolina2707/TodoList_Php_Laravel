<!doctype html>
<html lang="en">
    <head>
        <title>TodoList App Php Laravel</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
            <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
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
                
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-primary table-striped table-hover">
                
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Nombre de la Tarea</th>
                                <th scope="col">Accion</th>   
                                <th scope="col">      </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td data-label="Status">
                                        <form action="/tasks/{{ $task->id }}/toggle-completed" method="POST" style="display:inline">
                                            @method('PATCH')
                                            @csrf
                                            <input 
                                                type="checkbox" 
                                                name="completed" 
                                                onchange="this.form.submit()" 
                                                {{ $task->completed ? 'checked' : '' }}>
                                        </form>   
                                    </td>
                                    <td data-label="Nombre de la Tarea">
                                        <form action="/tasks/{{ $task->id }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="text" id="title" name="title" value="{{ $task->title }}" required>
                                    </td>
                                    <td data-label="Accion">
                                        <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                        </form>
                                    </td>
                                    <td data-label="Accion2">
                                        <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach   
                        </tbody>
                        
                        
    </main>

        <footer class="bg-light text-center py-3" style="position: fixed; bottom: 0; width: 75%;">
            <p>© 2024 TodoList Application</p>
        </footer>
        
</body>
</html>

