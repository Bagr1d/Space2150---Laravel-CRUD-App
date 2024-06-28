<!DOCTYPE html> 
<html> 
    @include('partials.head') 
    <body>   
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">   
    <h2>Login</h2>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="form-inline" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div id="authInput">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div id="authInput">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div id="authInputCheckbox">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>
        </div>

        <div id="authInputButtons">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-4">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <br><br>
    [ INFO ]
    <br>
    [ Email: admin@admin.com ]
    <br>
    [ Password: adminadmin ]
    </div>
</body> 
</html>
