<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Validação CSRF
Route::when('*', 'csrf', array('post'));

// Visitante
Route::get('/',
        array(
            'as' => 'home', 
            'uses' => 'HomeController@getIndex'
            )
        );

Route::get('entrar', 'HomeController@getEntrar');
Route::get('cadastrar', 'HomeController@getCadastrar');
Route::post('cadastrar/usuario', 'HomeController@cadastrarUsuario');
Route::post('entrar', 'HomeController@postEntrar');
Route::get('sair', 'HomeController@getSair');


// Verifica se o usuário está logado
Route::group(array('before' => 'auth'), function()
{
  
    
    Route::group(array('before' => 'auth.admin'), function()
    {
        Route::get('perfil', 'PerfilController@index');
        Route::get('get/perfil/{id}', 'PerfilController@getPerfil');
        Route::post('perfil/editar', 'PerfilController@editPerfil');
        Route::get('perfil/sair', 'PerfilController@sair');
        Route::get('cadastrar/tarefa', 'TarefaController@index');
        Route::post('cadastrar/tarefa', 'TarefaController@addTarefa');
        Route::get('cadastrar/projeto', 'ProjetoController@index');   
        Route::post('cadastrar/projeto', 'ProjetoController@addProjeto');   
        Route::get('listar/projetos', function(){
            
          $tarefas = Projeto::find(2)->tarefas()->get();
       
              foreach ($tarefas as $tarefa) {
                  
                  echo $tarefa->titulo . "</br>";
              }
              
          
        });
    });
});

