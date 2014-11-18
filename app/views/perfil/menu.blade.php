<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Sistema<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('perfil')}}">Home</a></li>   
            <li><a href="{{url('listar/projetos')}}">Lista de Projetos</a></li>     
            <li><a href="{{url('get/perfil', Auth::user()->id)}}">Editar Perfil</a></li>    
            <li><a href="{{url('cadastrar/tarefa')}}">Cadastrar Tarefa</a></li>   
            <li><a href="{{url('cadastrar/projeto')}}">Cadastrar Projeto</a></li>   
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
         <li><a class=""><span class="glyphicon glyphicon-user"></span> Seja bem vindo <b>{{Auth::user()->nome}}</b></a></li>   
         <li><a href="{{url('perfil/sair')}}" class=""><span class="glyphicon glyphicon-off"></span> Sair</b></a></li>   
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="row">
  <div class="perfil col-xs-3 col-md-2">
    <a href="#" class="thumbnail">
     {{ HTML::image('assets/uploads/'. Auth::user()->imagem_perfil, 'Smile', array('id' => 'smile')) }}
    </a>
     <h2 class="username"><b>{{Auth::user()->nome}}</b></h2>
  </div>
