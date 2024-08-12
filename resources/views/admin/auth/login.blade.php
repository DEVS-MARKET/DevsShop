<!DOCTYPE html>
<html lang="{{ request()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | {{ __('Login') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#">{{ config('app.name') }}</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Sign in') }}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/adminlte.min.js') }}"></script>

@if($errors->any())
    <script>
        const notyf = new Notyf({
            duration: 8000,
            position: {
                x: 'right',
                y: 'top',
            }
        });
        @foreach($errors->all() as $error)
            notyf.error('{{ $error }}');
        @endforeach
    </script>
@endif

@if($success = \Illuminate\Support\Facades\Session::get('success'))
    <script>
        const notyf = new Notyf({
            duration: 8000,
            position: {
                x: 'right',
                y: 'top',
            }
        });
        notyf.success('{{ $success }}');
    </script>
@endif
</body>
</html>
