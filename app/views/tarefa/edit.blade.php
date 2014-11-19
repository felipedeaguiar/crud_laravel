@extends('layouts.padrao')

@section('content')


@include('perfil.menu')

@if($errors->has())
<ul class="feedback">
    @foreach($errors->all() as $message)

    <li>{{ $message }}</li>

    @endforeach
</ul>
@endif

  {{ Form::open(array(
            'url' => 'editar/tarefa/'.$tarefa->id,
            'class'  => 'well col-xs-3 col-md-6'
        )) }}
            
            <div class="form-group">
                {{ Form::text('titulo', $tarefa->titulo, array('class' => 'form-control input-lg', 'autofocus', 'placeholder' => 'Título tarefa')) }}
            </div>
          
             <div class="form-group">
                {{ Form::textarea('descricao', $tarefa->descricao, array('class' => 'form-control input-lg', 'placeholder' => 'Descrição da tarefa')) }}
            </div>
            
                <div class="form-group">
                
             
                {{Form::label('relacao', 'Relacionada ao projeto:')}}
                {{ Form::select('projetos', $projetos) }}
            </div>
              
        <?php    
        
        $data_inicio = implode("/",array_reverse(explode("-",date('Y-m-d', strtotime($tarefa->data_inicio_tarefa)))));   
        $data_final = implode("/",array_reverse(explode("-",date('Y-m-d', strtotime($tarefa->data_final_tarefa)))));   
        
        
        
        ?> 
        
          <div class="form-group">
                
             
                {{Form::label('andamento', 'Andamento:')}}
                {{ Form::select('andamento', array('Não iniciado' => 'Não iniciado', 'Em andamento' => 'Em andamento', 'Finalizada' => 'Finalizada')) }}
            </div>
                     
            <div class="form-group">
                {{ Form::text('data-inicio', $data_inicio, array('class' => 'form-control input-lg date')) }}
            </div>
            
            
             <div class="form-group">
                {{ Form::text('data-final', $data_final, array('class' => 'form-control input-lg date')) }}
            </div>
                  
            @if (Session::has('sucesso'))
                <div class="alert alert-success">Editado com sucesso</div>
            @endif
               @if (Session::has('error'))
                <div class="alert alert-success">Cadastrado com sucesso</div>
            @endif
            
      
            {{ Form::submit('Editar tarefa', array('class' => 'btn btn-lg btn-primary btn-block')) }}

        {{ Form::close() }}
        
        
@stop