<?php

class PerfilController extends BaseController
{
        
        
public function index(){
       
   $user = Auth::user();
   return View::make('perfil.index')->with('usuario', $user);  
    
    
}    

public function getPerfil($id_user){
    
    
    $user = Auth::user();
    return View::make('perfil.edit')->with('usuario', $user);  
    
    
}

public function editPerfil(){
    
    
   
    $file = Input::file('file');
    
    if(($file)){
        
    $destinationPath = 'public/assets/uploads'; 
    Input::file('file')->move($destinationPath, Input::file('file')->getClientOriginalName());
    
    }
      $rules = array(
        'username' => array('required'),
        'sex' => array('required'),
        'cpf' => array('required'),
        'file' => array('required')
        
    );

    $validation = Validator::make(Input::all(), $rules);
       
        if ($validation -> fails()) {
            
           $user = Auth::user();
           return Redirect::to('get/perfil/'.$user->id)->withErrors($validation);
                  
        }
        
         $user = Auth::user();
         $user = Usuario::find($user->id);
         $user -> cpf = Input::get('cpf');
         $user -> sexo = Input::get('sex');
         $user -> imagem_perfil = Input::file('file')->getClientOriginalName();
   
         if($user->update()){
             
              return Redirect::to('get/perfil/'.$user->id) -> with('sucesso', 1);
             
         }   
  
}    
        
         
     public function sair(){
         
         
         
     }       
        
        
        
        
                
}


    