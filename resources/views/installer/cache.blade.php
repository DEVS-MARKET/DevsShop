@extends('installer.layout')
@section('step', 'Cache')
@section('content')
    <form action="{{ route('installer.environment') }}" method="POST">
        @csrf
        <h1>{{ config('app.name') }} - Cache</h1>
        <input name="_actionInstaller" value="cache" hidden>
        <div class="mb-3">
            <label for="cache_driver" class="form-label">Cache driver</label>
            <select class="form-select" name="CACHE_STORE" aria-label="Cache driver">
                <option selected disabled>Cache driver</option>
                <option value="file">File</option>
                <option value="database">Database</option>
                <option value="redis">Redis</option>
                <option value="array">Local array</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="session_driver" class="form-label">Session driver</label>
            <select class="form-select" name="SESSION_DRIVER" aria-label="Session driver">
                <option selected disabled>Session driver</option>
                <option value="file">File</option>
                <option value="database">Database</option>
                <option value="redis">Redis</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="queue_driver" class="form-label">Queue driver</label>
            <select class="form-select" name="QUEUE_CONNECTION" aria-label="Queue driver">
                <option selected disabled>Queue driver</option>
                <option value="database">Database</option>
                <option value="file">File</option>
                <option value="redis">Redis</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="redis_host" class="form-label">Redis host</label>
            <input type="text" class="form-control" name="REDIS_HOST" id="redis_host" placeholder="Redis host">
        </div>

        <div class="mb-3">
            <label for="redis_password" class="form-label">Redis password</label>
            <input type="password" class="form-control" name="REDIS_PASSWORD" id="redis_password" placeholder="Redis password">
        </div>

        <div class="mb-3">
            <label for="redis_port" class="form-label">Redis port</label>
            <input type="text" class="form-control" name="REDIS_PORT" id="redis_port" placeholder="Redis port">
        </div>

        <input name="_nextUrl" value="{{ route('installer.finish') }}" hidden>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('installer.email') }}" class="btn btn-secondary w-100">Back</a>
            </div>
            <div class="col-md-6 text-end">
                <button type="submit" class="btn btn-primary w-100">Next</button>
            </div>
        </div>
    </form>
@endsection
