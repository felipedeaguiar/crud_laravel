@extends('layouts.padrao')

@section('content')


@include('perfil.menu')


<div class="panel panel-default" style="margin-top: 232px;">
      <!-- Default panel contents -->
      <div class="panel-heading">Tarefas do Projeto: <b>{{ $projeto->titulo }}</b></div>
      <div class="panel-body">

      </div>

      <!-- Table -->
     
      <table class="table">
        <thead>
          <tr>
            <th>Título</th>
            <th>Descricao</th>
            <th>Data de início</th>
            <th>Previsão de entrega</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tarefas as $tarefa)   
           <tr>
       <?php //conversão de data mysql para formato brasileiro
         $data_inicio = implode("/",array_reverse(explode("-",date('Y-m-d', strtotime($tarefa->data_inicio_tarefa)))));  
         $data_final = implode("/",array_reverse(explode("-",date('Y-m-d', strtotime($tarefa->data_final_tarefa)))));?>
            <td><a href="{{url('get/tarefa/' . $tarefa->id )}}">{{$tarefa->titulo}}</a></td>
            <td>{{$tarefa->descricao}}</td>
            <td>{{$data_inicio}}</td>
            <td>{{$data_final}}</td>       
          </tr>
     @endforeach
      
        </tbody>
      </table>
    </div>

@stop