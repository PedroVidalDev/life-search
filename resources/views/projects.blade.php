<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/project.css" rel="stylesheet">
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
        
            <form class="home">
                <input type="text" class="search" id="search" name="search" placeholder="Nome do projeto">
                <input type="submit" class="submit" id="submit" name="submit" value="Submit">
            </form>

            @if($search)
                <p class="text-search"> Buscando por: {{$search}} </p>
            @else

            @endif

            <div class="projects-menu-container">
                @foreach($projects as $project)
                    <div class="project-container">
                        <img class="project-image" src="/img/projects/{{ $project->image }}">
                        <p class="project-title"> {{ $project->title }} </p>
                        <p class="project-owner"> {{ $project->user->name }} </p>
                        <a href="/projects/show/{{ $project->id }}"> 
                            <button class="saiba-mais"> Saiba Mais </button>
                        </a>
                    </div>
                @endforeach
            </div>
        
    </section>
</body>
</html>