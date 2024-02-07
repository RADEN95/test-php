<x-guest-layout title="Login">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email"
                   class="form-label ">{{ __('Email Address') }}</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password"
                   class="form-label ">{{ __('Password') }}</label>

            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" name="password"
                   autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3 d-flex justify-content-between">
            {{--            <div>--}}
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            {{--            </div>--}}
            <div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            <div class="mt-3 d-flex justify-content-between">
                <div>
                    Belum punya akun silahkan <a href="{{route('register')}}">Daftar</a>
                </div>
                <div>
                    <a href="{{route('home')}}" class="fw-bold text-decoration-none">Home</a>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
