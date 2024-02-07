<x-guest-layout title="Register">
    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label ">{{ __('Name') }}</label>

            <div class="">
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email"
                   class="form-label ">{{ __('Email Address') }}</label>

            <div class="">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password"
                   class="form-label ">{{ __('Password') }}</label>

            <div class="">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror" name="password"
                >

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password-confirm"
                   class="form-label ">{{ __('Confirm Password') }}</label>

            <div class="">
                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation">
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
            <div class="mt-3 d-flex justify-content-between">
                <div>
                    Sudah punya akun silahkan <a href="{{route('login')}}">Login</a>
                </div>
                <div>
                    <a href="{{route('home')}}" class="fw-bold text-decoration-none">Home</a>
                </div>
            </div>
        </div>
    </form>

</x-guest-layout>
