<!DOCTYPE html>
<html lang="{{ request()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.index') }}" class="nav-link">{{ __('Home') }}</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="https://devsmarket.eu" class="brand-link">
            <img src="https://avatars-githubusercontent.webp.se/u/151873933?s=200&v=4" alt="DevsMarket Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Hello, {{ auth()->user()->name }}</a>
                </div>
            </div>

            @include('admin.components.sidebar')
        </div>
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> {{ config('app.version') }}
        </div>
        <strong>Copyright &copy; 2024-{{ now()->format('Y') }} <a href="https://www.khaller.com">Krzysztof Haller</a> & <a href="https://devsmarket.eu">Devs Market</a>.</strong> All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
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
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/adminlte.min.js') }}"></script>
@yield('scripts')

</body>
</html>
