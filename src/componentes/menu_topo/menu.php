<style>
  .MenuLogin{
    min-width:250px;
    margin:0 10px 0 10px;
  }
</style>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <img src="img/logo_h60.png" style="height:40px;" alt="Sistema de Gestão QrAtivos">
    <!-- <a class="navbar-brand" href="#">Navbar scroll</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href='?s=1'>Link</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Link
                </a>
                <ul class="dropdown-menu  dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
                    <li class="MenuLogin">
                      <ul class="list-group  list-group-flush">
                        <li class="list-group-item" aria-disabled="true">
                          <i class="fa-solid fa-user"></i> Dados Pessoais
                        </li>
                        <li class="list-group-item">
                          <i class="fa-solid fa-key"></i> Senha de Acesso
                        </li>
                        <li class="list-group-item">
                          <i class="fa-solid fa-calendar-check"></i> Atividades
                        </li>
                        <li class="list-group-item">
                        <i class="fa-solid fa-right-from-bracket"></i> Sair
                        </li>
                      </ul>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
  </div>
</nav>