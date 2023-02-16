<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/register.css" rel="stylesheet">
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
    <div class="register-container">
        <p class="register-title"> LifeSearch </p>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="register">
                <x-jet-label style="color: white;" for="name" value="{{ __('Name') }}" />
                <x-jet-input style="height: 30px; border-radius: 10px;" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="register">
                <x-jet-label style="color: white;" for="email" value="{{ __('Email') }}" />
                <x-jet-input style="height: 30px; border-radius: 10px;" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="register">
                <x-jet-label style="color: white;" for="password" value="{{ __('Password') }}" />
                <x-jet-input style="height: 30px; border-radius: 10px;" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="register">
                <x-jet-label style="color: white;" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input style="height: 30px; border-radius: 10px;" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
                <button class="register-button">
                    {{ __('Register') }}
                </button>
        </form>
        </div>
    </section>
</body>
</html>
