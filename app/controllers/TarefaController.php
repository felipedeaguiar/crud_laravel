<?php

class TarefaController extends BaseController {

    public function index()
    {
        $user = Auth::user();
        $projetos = Projeto::lists('titulo', 'id');
        
   
       return View::make('tarefa.index')->with('usuario', $user)->with('projetos', $projetos);
    }

   public function addTarefa(){
       
        $rules = array(
        'titulo' => array('required'),
        'descricao' => array('required'),
        'data-inicio' => array('required'),
        'data-final' => array('required')
        
    );
    
    $validation = Validator::make(Input::all(), $rules);
    
    if ($validation -> fails()) {
            
           $user = Auth::user();
           return Redirect::to('cadastrar/tarefa')->withErrors($validation);
                  
        }
    else{
        
        $tarefa = new Tarefa;
        $tarefa->titulo = Input::get("titulo");
        $tarefa->descricao = Input::get("descricao");
        $tarefa->projeto = Input::get("projetos");
        $tarefa->data_inicio_tarefa = implode("-",array_reverse(explode("/", Input::get("data-inicio"))));
        $tarefa->data_final_tarefa = implode("-",array_reverse(explode("/", Input::get("data-final"))));
        
        if($tarefa->save()){
            
           return Redirect::to('cadastrar/tarefa') -> with('sucesso', 1);

        }
        else{
            
            return Redirect::to('cadastrar/tarefa') -> with('error', 1); 
            
        }
      }
   } 


public function getTarefa($id_tarefa){
    
    $tarefa = Tarefa::find($id_tarefa);
    $projetos = Projeto::lists('titulo', 'id');

    return View::make('tarefa.edit')->with('tarefa', $tarefa)->with('projetos', $projetos);
}

 public function listaTarefas(){
     
     $tarefa = new Tarefa;
     $tarefas = $tarefa->projetos();
     
    foreach ($tarefas as $tarefa) {
        
        var_dump($tarefa->id);
    }
     
     
 }
}