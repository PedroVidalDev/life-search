<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css" rel="stylesheet">
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
    <p class="login-title"> LifeSearch </p>
    <div class="login-container">

        <x-jet-validation-errors class="mb-4" style="color: white;"/>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login">
                <x-jet-label style="color: white;" for="email" value="{{ __('Email') }}" />
                <x-jet-input style="height: 30px; border-radius: 10px;" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="login">
                <x-jet-label style="color: white;" for="password" value="{{ __('Password') }}" />
                <x-jet-input style="height: 30px; border-radius: 10px;" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="login">
                <label style="color: #fff;" for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" style="color: rgb(226, 203, 255);" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
                <button class="login-button">
                    {{ __('Log in') }}
                </button>
        </form>
        </div>
    </section>
</body>
</html>