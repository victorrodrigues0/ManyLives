<?php

// Todos os imports

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post; // Adicionando o Model Post para o middleware 


//Rota index
Route::get('/', [PostController::class, 'index'])->name('index');

// Outras rotas do site
Route::get('/adicionar_post', [PostController::class,'adicionar_post'])->name('adicionar_post')->middleware('auth');
Route::post('/cadastro_post', [PostController::class,'cadastro_post'])->name('cadastro_post')->middleware('auth');
Route::get('/dash', [PostController::class, 'dash'])->name('dash')->middleware('auth');
Route::get('/vizualizar_post/{id}', [PostController::class, 'vizualizar_post'])->name('vizualizar_post');
Route::get('/search_index', [PostController::class, 'search_index'])->name('search_index');
Route::get('/search_user_posts', [PostController::class, 'search_user_posts'])->name('search_user_posts');
Route::get('/like/{id}', [PostController::class, 'like'])->name('like');	

// Rotas do perfil
Route::get('/perfil', [PostController::class,'perfil'])->name('perfil')->middleware('auth');
Route::put('/atualizar_perfil/{id}', [PostController::class,'atualizar_perfil'])->name('atualizar_perfil')->middleware('auth');

Route::get('/user_posts/{id}', [PostController::class, 'user_posts'])->name('user_posts')->middleware('auth');
Route::get('/tela_editar_post/{id}', [PostController::class, 'tela_editar_post'])->name('tela_editar_post')->middleware('auth');
Route::put('/editar_post/{id}', [PostController::class, 'editar_post'])->name('editar_post')->middleware('auth');
Route::put('/editar_post/{id}', [PostController::class, 'editar_post'])->name('editar_post')->middleware('auth');
Route::delete('/deletar_post/{id}', [PostController::class, 'deletar_post'])->name('deletar_post')->middleware('auth');

// Testes
Route::get('/all_posts', [PostController::class, 'all_posts'])->name('all_posts');
Route::get('/teste-one', [PostController::class,'teste_one'])->name('teste-one');
Route::post('/upload/{id}', [PostController::class,'upload'])->name('upload');

// Rota para o middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index']);
})->name('dashboard');
