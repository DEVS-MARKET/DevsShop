@extends('installer.layout')
@section('step', 'Database')
@section('content')
    <form action="{{ route('installer.environment') }}" method="POST">
        @csrf
        <h1>{{ config('app.name') }} - Database</h1>
        <input name="_actionInstaller" value="database" hidden>
        <div class="mb-3">
            <select class="form-select" name="DB_CONNECTION" aria-label="Database driver">
                <option selected disabled>Database driver</option>
                <option value="mysql">MySQL</option>
                <option value="pgsql">PostgreSQL</option>
                <option value="sqlite">SQLite</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="timezone" class="form-label">Timezone</label>
            <select class="form-select" name="APP_TIMEZONE" aria-label="Timezone">
                <option selected disabled>Timezone</option>
                @foreach(timezone_identifiers_list() as $timezone)
                    <option value="{{ $timezone }}">{{ $timezone }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="db_host" class="form-label">Database Host</label>
            <input type="text" class="form-control" id="db_host" name="DB_HOST" value="">
        </div>
        <div class="mb-3">
            <label for="db_port" class="form-label">Database Port</label>
            <input type="text" class="form-control" id="db_port" name="DB_PORT" value="">
        </div>
        <div class="mb-3">
            <label for="db_database" class="form-label">Database Name</label>
            <input type="text" class="form-control" id="db_database" name="DB_DATABASE" value="">
        </div>
        <div class="mb-3">
            <label for="db_username" class="form-label">Database Username</label>
            <input type="text" class="form-control" id="db_username" name="DB_USERNAME" value="">
        </div>
        <div class="mb-3">
            <label for="db_password" class="form-label">Database Password</label>
            <input type="password" class="form-control" id="db_password" name="DB_PASSWORD" value="">
        </div>

        <input name="_nextUrl" value="{{ route('installer.email') }}" hidden>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('installer.index') }}" class="btn btn-secondary w-100">Back</a>
            </div>
            <div class="col-md-6 text-end">
                <button type="submit" class="btn btn-primary w-100">Next</button>
            </div>
        </div>
    </form>
@endsection
