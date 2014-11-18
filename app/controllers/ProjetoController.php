<?php

class ProjetoController extends BaseController
{
            
                    
public function index(){
       
   $user = Auth::user();
   return View::make('projeto.index')->with('usuario', $user);  
    
    
}    
            
public function addProjeto(){
       
        $rules = array(
        'titulo' => array('required'),
        'escopo' => array('required'),
        'data-inicio' => array('required'),
        'data-final' => array('required')
        
       );
    
    $validation = Validator::make(Input::all(), $rules);
    
    if ($validation -> fails()) {
            
           $user = Auth::user();
           return Redirect::to('cadastrar/projeto')->withErrors($validation);
                  
        }
    else{
        
        $user = Auth::user();
        $projeto = new Projeto;
        $projeto->titulo = Input::get("titulo");
        $projeto->escopo = Input::get("escopo");
        $projeto->data_inicio = implode("-",array_reverse(explode("/", Input::get("data-inicio"))));
        $projeto->data_final = implode("-",array_reverse(explode("/", Input::get("data-final"))));
        $projeto->usuario = $user->id;
        
        if($projeto->save()){
            
           return Redirect::to('cadastrar/tarefa') -> with('sucesso', 1);

        }
        else{
            
            return Redirect::to('cadastrar/tarefa') -> with('error', 1); 
            
        }
    }
}

public function getProjeto($id_projeto){
    
   $tarefas = Projeto::find($id_projeto)->tarefas()->get();
   $projeto = Projeto::find($id_projeto)->get(); 
   return View::make('projeto.')->with('tarefas', $tarefas)->with('projeto', $projeto);  
    
}

public function listarProjetos(){
    
    $user = Auth::user();
    $projetos = Projeto::all();
    return View::make('projeto.lista')->with('projetos', $projetos)->with('usuario', $user);  
}            
            
}


?>          
        
        