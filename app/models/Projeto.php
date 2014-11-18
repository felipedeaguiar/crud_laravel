<?php

class Projeto extends Eloquent {
    
 
     protected $table = 'projeto';
     public $timestamps = false;
 
 
public function tarefas(){
    
    return $this->hasMany('Tarefa', 'projeto');
    
} 
    

    
}  
