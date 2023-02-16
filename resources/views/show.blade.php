<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/show.css" rel="stylesheet">
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
        <div class="show-container">
            <div class="ajuste-project">
                <div class="img-banner" style="background-image: url('/img/projects/{{ $project->image }}');"></div>
                <div class="text-show">
                    <p class="title-show"> {{ $project->title }} </p>
                    <div class="items-show">
                    @foreach($project->items as $item)
                        <p class="tec-show">{{ $item }}-</p><br>
                    @endforeach
                    </div>
                    <br>
                    <p class="description-show"> {{ $project->description }} </p><br>
                    <a href="{{ $project->repository }}"> <p class="repo-show"> Repositorio: {{ $project->repository }} </p> </a>
                </div>
            </div>
            <p class="indica-comentario"> v Comentarios v</p>
        </div>

    </section>

    <section class="comment-section">
        <div class="commentary-send-div">
            <form action="/projects/show/{{$project->id}}/comment" method="POST">
                @csrf
                <input type="text" name="commentary" class="commentary-input" id="commentary-input" placeholder="Digite seu comentario aqui">
                <input type="submit"  class="submit" id="submit" name="submit" value="Submit">
            </form>
            <div class="commentary-div">
                @foreach($comments as $comment)
                    <br>
                    <div>
                        <p class="comment-title"> {{ $comment->user_name }} </p>
                        <p class="comment-body"> {{ $comment->commentary }} </p>
                    </div>
                    <br>
                    <hr>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>