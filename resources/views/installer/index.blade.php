@extends('installer.layout')
@section('step', 'System Requirements')
@section('content')
    <h1>{{ config('app.name') }} - System Requirements</h1>
    @php
        $minPhp = '8.2.0';
        $minExtensions = [
            'bcmath',
            'ctype',
            'fileinfo',
            'json',
            'mbstring',
            'openssl',
            'pdo',
            'tokenizer',
            'xml',
        ];
    @endphp

    @if(!version_compare(phpversion(), $minPhp, '<='))
        <div class="alert alert-success" role="alert">
            PHP version is <strong>{{ phpversion() }}</strong> and meets the minimum requirement of <strong>{{ $minPhp }}</strong>.
        </div>
    @else
        <div class="alert alert-success" role="alert">
            Congratulations! Your server meets the minimum PHP requirement. Required PHP version is <strong>{{ $minPhp }}</strong> and your server is running <strong>{{ phpversion() }}</strong>.
        </div>
    @endif

    @foreach($minExtensions as $extension)
        @if(!extension_loaded($extension))
            <div class="alert alert-danger" role="alert">
                <strong>{{ $extension }}</strong> extension is missing.
            </div>
        @else
            <div class="alert alert-success" role="alert">
                <strong>{{ $extension }}</strong> extension is enabled.
            </div>
        @endif
    @endforeach

    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-primary w-100">Back</a>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('installer.database') }}" class="btn btn-primary w-100">Next</a>
        </div>
    </div>
@endsection
