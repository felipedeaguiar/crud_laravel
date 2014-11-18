<?php


class Tarefa extends Eloquent {
    
 
     protected $table = 'tarefa';
     public $timestamps = false;
 

 public function projetos(){
    
  return  $this->belongsTo('projeto', 'projeto');
    
}


    
}  
