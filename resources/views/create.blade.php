<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/create.css" rel="stylesheet">
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
                <li> <a onclick="hid()" class="menu" href="/"> Home </a> </li>
                <li> <a onclick="hid()" class="menu" href="/project/create"> Criar </a> </li>
                @guest
                <li> <a onclick="hid()" class="menu" href="/login"> Login </a> </li>
                <li> <a onclick="hid()" class="menu" href="/register"> Cadastrar </a> </li>
                @endguest
                @auth
                <li> <a onclick="hid()" class="menu" href="/dashboard"> Perfil </a> </li>
                <li> <a onclick="hid()" class="menu" onclick="event.preventDefault();this.closest('form').submit();"> Sair </a> </li>
                @endauth
            </ul>
        </nav>
    </header>

    <section class="home">
        <div class="container-create">
            <form action="/project" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ajustador-create">
                    <label> Tituto do Projeto: </label>
                    <input class="title" type="text" name="title" placeholder="Nome do Projeto">
                </div>

                <div class="ajustador-create">
                    <label> Descricao do Projeto: </label>
                    <textarea class="description" type="text" name="description" placeholder="Descricao do Projeto"></textarea>
                </div>

                <div class="ajustador-create">
                    <label> Tecnologias utilizas no Projeto: </label>
                    <table>
                        <tr>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Javascript"> Javascript
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="PHP"> PHP
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="C++"> C++
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="HTML/CSS"> HTML/CSS
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Python"> Python
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Ruby"> Ruby
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Node.js"> Node.js
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Vue.js"> Vue.js
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Express.js"> Express.js
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Laravel"> Laravel
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="C#"> C#
                                </div>
                            </td>
                            <td>
                                <div class="options">
                                    <input type="checkbox" name="items[]" value="Flask"> Flask
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>

                <div class="ajustador-create">
                    <label for="image"> Imagem do Projeto: </label>
                    <input class="image" type="file" id="image" name="image">
                </div>

                <div class="ajustador-create">
                    <label> Link do Repositorio do Projeto: </label>
                    <input class="repositorio" type="text" name="repository" placeholder="Repositorio do Projeto">
                </div>

                <div class="ajustador-create">
                    <input class="submit" type="submit" name="submit" value="Criar">
                </div>
            </form>

        </div>
    </section>
</body>
</html>