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
            'url' => 'perfil/editar',
            'class'  => 'well col-xs-3 col-md-6', 'files' => true
        )) }}
            
            <div class="form-group">
                {{ Form::email('email', $usuario->email, array('class' => 'form-control input-lg', 'autofocus', 'placeholder' => 'E-mail', 'disabled'=>'disabled')) }}
            </div>
          
             <div class="form-group">
                {{ Form::text('username', $usuario->nome, array('class' => 'form-control input-lg', 'placeholder' => 'Nome de usuário')) }}
            </div>
            
              <div class="form-group">
                {{ Form::text('cpf', $usuario->cpf, array('class' => 'form-control input-lg', 'placeholder' => 'CPF')) }}
            </div>
          
          
            @if (Session::has('sucesso'))
                <div class="alert alert-success">Atualizado com sucesso</div>
            @endif
               @if (Session::has('error'))
                <div class="alert alert-success">Cadastrado com sucesso</div>
            @endif
            
            <div class="form-group">
                <input type="radio" name="sex" value="masculino"> Masculino
                <input type="radio" name="sex" value="feminino"> Feminino
            </div>
            <div class="form-group">
            <label>Imagem Perfil <input type="file" name="file" id=""></label>
            </div>
            {{ Form::submit('Editar Perfil', array('class' => 'btn btn-lg btn-primary btn-block')) }}

        {{ Form::close() }}
        
        
    </div>
</div>
</div>

@stop