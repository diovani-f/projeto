<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de veiculos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=inicio">Inicio</a>
        </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Veiculo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=veiculo-cadastrar">Cadastrar Veiculo</a></li>
            <li><a class="dropdown-item" href="?page=veiculo-listar">Listar Veiculo</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Marca
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=marca-cadastrar">Cadastrar Marca</a></li>
            <li><a class="dropdown-item" href="?page=marca-listar">Listar Marca</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Modelo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=modelo-cadastrar">Cadastrar Modelo</a></li>
            <li><a class="dropdown-item" href="?page=modelo-listar">Listar Modelo</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categoria
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cat-cadastrar">Cadastrar Categoria</a></li>
            <li><a class="dropdown-item" href="?page=cat-listar">Listar Categoria</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Pessoa
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=p-cadastrar">Cadastrar Pessoa</a></li>
            <li><a class="dropdown-item" href="?page=p-listar">Listar Pessoa</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Propriedade
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=propriedade-cadastrar">Cadastrar Propriedade</a></li>
            <li><a class="dropdown-item" href="?page=propriedade-listar">Listar Propriedade</a></li>
          </ul>
        </li>
        

    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col">


    <?php
    include('conf.php');
    switch(@$_REQUEST['page']){
      case 'marca-listar':
        include('marca-listar.php');
        break;
      case 'marca-cadastrar':
        include('marca-cadastrar.php');
        break;
      case 'marca-editar':
        include('marca-editar.php');
        break;
      case 'marca-salvar':
        include('marca-salvar.php');
        break;
      
      case 'modelo-listar':
        include('modelo-listar.php');
          break;
      case 'modelo-cadastrar':
        include('modelo-cadastrar.php');
        break;
      case 'modelo-editar':
        include('modelo-editar.php');
        break;
      case 'modelo-salvar':
        include('modelo-salvar.php');
        break;
      
      case 'cat-listar':
        include('cat-listar.php');
          break;
      case 'cat-cadastrar':
        include('cat-cadastrar.php');
        break;
      case 'cat-editar':
        include('cat-editar.php');
        break;
      case 'cat-salvar':
        include('cat-salvar.php');
        break;

      case 'veiculo-listar':
        include('veiculo-listar.php');
          break;
      case 'veiculo-cadastrar':
        include('veiculo-cadastrar.php');
        break;
      case 'veiculo-editar':
        include('veiculo-editar.php');
        break;
      case 'veiculo-salvar':
        include('veiculo-salvar.php');
        break;

        case 'cat-listar':
          include('cat-listar.php');
            break;
        case 'cat-cadastrar':
          include('cat-cadastrar.php');
          break;
        case 'cat-editar':
          include('cat-editar.php');
          break;
        case 'cat-salvar':
          include('cat-salvar.php');
          break;
  
        case 'p-listar':
          include('p-listar.php');
            break;
        case 'p-cadastrar':
          include('p-cadastrar.php');
          break;
        case 'p-editar':
          include('p-editar.php');
          break;
        case 'p-salvar':
          include('p-salvar.php');
          break;

          case 'propriedade-listar':
            include('propriedade-listar.php');
              break;
          case 'propriedade-cadastrar':
            include('propriedade-cadastrar.php');
            break;
          case 'propriedade-editar':
            include('propriedade-editar.php');
            break;
          case 'propriedade-salvar':
            include('propriedade-salvar.php');
            break;

          case 'inicio':
            include('inicio.php');
              break;
        
      default:
    }
    ?>
     </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>


  </body>
</html>