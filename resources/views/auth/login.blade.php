@extends('layouts.app')

@section('content')

    <div class="body_form" >
        <form method="POST" action="{{ route('login') }}" class="form-signin">
            @csrf
            <img class="mb-4 aguias_imagem" src="{{ asset('assets/imagens/aguias.png') }}" alt="" width="130" height="130">
            <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
            <label for="inputEmail" class="sr-only">Endereço de email</label>
            <input id="login" type="text" placeholder="Login" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>

            @if ($errors->has('login'))
                <span class="invalid-feedback" role="alert">
                    {{-- <strong>{{ $errors->first('login') }}</strong> --}}
                    <strong>Login Invalido, por favor digite o login corretamente!</strong>
                </span>
            @endif

            <label for="inputPassword" class="sr-only">Senha</label>
            <input id="password" type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            {{-- <strong>{{ $errors->first('password') }}</strong> --}}
                            <strong>Senha Inválida, por favor digite a senha corretamente!</strong>
                        </span>
                    @endif
            <div class="checkbox mb-3">
                <label>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

        </form>
    </div>

@endsection


@push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
