<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css" rel="stylesheet">
    <script src="/js/script.js"></script>
    <title> LifeSearch </title>
</head>
<body>
    <header>
        <nav>
            <a class="logo" href="/"> LifeSearch </a>
            
            <div onclick="show()" class="mobile_menu">
                <div class="line1"> </div>
                <div class="line2"> </div>
                <div class="line3"> </div>
            </div>

            <ul class="nav-list">
                <li> <a class="menu" href="/"> Home </a> </li>
                <li> <a class="menu" href="/project/create"> Criar </a> </li>
                @guest
                <li> <a class="menu" href="/login"> Login </a> </li>
                <li> <a class="menu" href="/register"> Cadastrar </a> </li>
                @endguest
                @auth
                <li> <a class="menu" href="/dashboard"> Perfil </a> </li>
                <li> 
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="menu" onclick="event.preventDefault();this.closest('form').submit();"> Sair </a>
                    </form>
                </li>                
                @endauth
            </ul>
        </nav>
    </header>

    <section class="home">

        @if(count($projects) > 0)
            <div>
                <p class="dashboard-title"> Aqui estao seus eventos, {{$user->name}}: </p>
            </div>

            <div class="projects-menu-container">
                @foreach($projects as $project)
                    <div class="project-container">

                        <a href="/projects/show/{{ $project->id }}"> 
                            <img class="project-image" src="/img/projects/{{ $project->image }}">
                        </a>

                        <p class="project-title"> {{ $project->title }} </p>

                        <form action="/projects/delete/{{ $project->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="excluir"> Excluir </button>
                        </form>

                        <a href="/projects/edit/{{ $project->id }}"> 
                            <button class="editar"> Editar </button>
                        </a>

                    </div>
                @endforeach
            </div>
        @else
            <div class="projects-menu-container">
                <p style="color:white; font-size: 40px"> Voce ainda nao criou nenhum projeto, {{$user->name}}... </p>
            </div>
        @endif
    </section>

    </body>
</html>