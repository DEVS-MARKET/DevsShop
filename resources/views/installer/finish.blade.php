@extends('installer.layout')
@section('step', 'Finish')
@section('content')
    <h1>{{ config('app.name') }} - {{ $title }}</h1>
    <p class="lead">{{ $message }}.</p>
    <p class="lead">Configuration tests results:</p>
    @foreach($testResults as $result)
        <div class="alert alert-info" role="alert">
            <p>{{ $result }}</p>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="/" class="btn btn-primary w-100">Finish</a>
        </div>
    </div>

    <script>
        setTimeout(() => {
            fetch('{{ route('installer.finish.lock') }}', {
                method: 'GET',
            })
        })
    </script>
@endsection
