@extends('installer.layout')
@section('step', 'Email settings')
@section('content')
    <form action="{{ route('installer.environment') }}" method="POST">
        @csrf
        <h1>{{ config('app.name') }} - Email settings</h1>

        <input name="_actionInstaller" value="email" hidden>

        <div class="mb-3">
            <label for="mail_driver" class="form-label">Mail driver</label>
            <select class="form-select" name="MAIL_MAILER" aria-label="Mail driver">
                <option selected disabled>Mail driver</option>
                <option value="smtp">SMTP</option>
                <option value="log">Log</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="mail_host" class="form-label">Mail host</label>
            <input type="text" class="form-control" id="mail_host" name="MAIL_HOST" value="">
        </div>

        <div class="mb-3">
            <label for="mail_port" class="form-label">Mail port</label>
            <input type="text" class="form-control" id="mail_port" name="MAIL_PORT" value="">
        </div>

        <div class="mb-3">
            <label for="mail_username" class="form-label">Mail username</label>
            <input type="text" class="form-control" id="mail_username" name="MAIL_USERNAME" value="">
        </div>

        <div class="mb-3">
            <label for="mail_password" class="form-label">Mail password</label>
            <input type="password" class="form-control" id="mail_password" name="MAIL_PASSWORD" value="">
        </div>

        <div class="mb-3">
            <label for="mail_encryption" class="form-label">Mail encryption</label>
            <select class="form-select" name="MAIL_ENCRYPTION" aria-label="Mail encryption">
                <option selected disabled>Mail encryption</option>
                <option value="tls">TLS</option>
                <option value="ssl">SSL</option>
                <option value="">None</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="mail_from_address" class="form-label">Mail from address</label>
            <input type="text" class="form-control" id="mail_from_address" name="MAIL_FROM_ADDRESS" value="">
        </div>

        <div class="mb-3">
            <label for="mail_from_name" class="form-label">Mail from name</label>
            <input type="text" class="form-control" id="mail_from_name" name="MAIL_FROM_NAME" value="">
        </div>

        <input name="_nextUrl" value="{{ route('installer.cache') }}" hidden>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('installer.database') }}" class="btn btn-secondary w-100">Back</a>
            </div>
            <div class="col-md-6 text-end">
                <button type="submit" class="btn btn-primary w-100">Next</button>
            </div>
        </div>
    </form>
@endsection
