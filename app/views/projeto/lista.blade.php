@extends('layouts.padrao')

@section('content')


@include('perfil.menu')


<div class="panel panel-default" style="margin-top: 232px;">
      <!-- Default panel contents -->
      <div class="panel-heading">Lista de Projetos</div>
      <div class="panel-body">

      </div>

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>Título</th>
            <th>Escopo</th>
            <th>Data de início</th>
            <th>Previsão de entrega</th>
          </tr>
        </thead>
        <tbody>
         @foreach($projetos as $projeto)   
          <tr>
       <?php //conversão de data mysql para formato brasileiro
         $data_inicio = implode("/",array_reverse(explode("-",date('Y-m-d', strtotime($projeto->data_inicio)))));  
         $data_final = implode("/",array_reverse(explode("-", $projeto->data_final)));   ?>   
            <td><a href="{{url('get/projeto/' . $projeto->id )}}">{{$projeto->titulo}}</a></td>
            <td>{{$projeto->escopo}}</td>
            <td>{{$data_inicio}}</td>
            <td>{{$data_final}}</td>
          </tr>
          @endforeach
      
        </tbody>
      </table>
    </div>

@stop