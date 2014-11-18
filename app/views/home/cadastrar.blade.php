@extends('layouts.padrao')
@include('templates.menu')
@section('content')
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
    
@if($errors->has())
<ul class="feedback">
    @foreach($errors->all() as $message)

    <li>{{ $message }}</li>

    @endforeach
</ul>
@endif


        {{ Form::open(array(
            'url' => 'cadastrar/usuario',
            'class'  => 'well'
        )) }}
            
            <div class="form-group">
                {{ Form::email('email', '', array('class' => 'form-control input-lg', 'autofocus', 'placeholder' => 'E-mail')) }}
            </div>
          
             <div class="form-group">
                {{ Form::text('username', '', array('class' => 'form-control input-lg', 'placeholder' => 'Nome de usuário')) }}
            </div>
          
            <div class="form-group">
                {{ Form::password('senha', array('class' => 'form-control input-lg', 'placeholder' => 'Senha')) }}
            </div>
         
            @if (Session::has('sucesso'))
                <div class="alert alert-success">Cadastrado com sucesso</div>
            @endif
               @if (Session::has('error'))
                <div class="alert alert-success">Cadastrado com sucesso</div>
            @endif
    
            <label class="checkbox">
                {{ Form::checkbox('remember', 'remember', true) }} Lembre-se de mim
            </label>
            
            {{ Form::submit('Cadastrar usuário', array('class' => 'btn btn-lg btn-primary btn-block')) }}

        {{ Form::close() }}
        
        
    </div>
</div>
@stop