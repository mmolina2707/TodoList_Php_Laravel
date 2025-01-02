<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']); // Para agregar tareas
Route::patch('/tasks/{task}', [TaskController::class, 'update']); // Para completar tareas
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']); // Para eliminar tareas
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Mostrar el formulario de edición
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Actualizar la tarea
Route::patch('/tasks/{task}/toggle-completed', [TaskController::class, 'toggleCompleted'])->name('tasks.toggle-completed');

