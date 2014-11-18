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
            'url' => 'cadastrar/projeto',
            'class'  => 'well col-xs-3 col-md-6'
        )) }}
            
            <div class="form-group">
                {{ Form::text('titulo', '', array('class' => 'form-control input-lg', 'autofocus', 'placeholder' => 'Título projeto')) }}
            </div>
          
             <div class="form-group">
                {{ Form::textarea('escopo', '', array('class' => 'form-control input-lg', 'placeholder' => 'Descrição do projeto')) }}
            </div>
            
            <div class="form-group">
                {{ Form::text('data-inicio', '', array('class' => 'form-control input-lg date', 'placeholder' => 'Data início')) }}
            </div>
            
             <div class="form-group">
                {{ Form::text('data-final', '', array('class' => 'form-control input-lg date', 'placeholder' => 'Previsão fim')) }}
            </div>
                  
            @if (Session::has('sucesso'))
                <div class="alert alert-success">Cadastrado com sucesso</div>
            @endif
               @if (Session::has('error'))
                <div class="alert alert-success">Cadastrado com sucesso</div>
            @endif
            
      
            {{ Form::submit('Adicionar tarefa', array('class' => 'btn btn-lg btn-primary btn-block')) }}

        {{ Form::close() }}
        
@stop