@extends('admin.layout', ['title' => __('Servers')])
@section('content')
    <!-- Table with servers and actions -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Servers') }}</h3>
            <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#modal-server-new" class="btn btn-primary">
                    <i class="fas fa-plus"></i> {{ __('Add server') }}
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Server name') }}</th>
                        <th>{{ __('Server address') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servers as $server)
                        <tr>
                            <td>{{ $server->id }}</td>
                            <td>{{ $server->name }}</td>
                            <td>{{ $server->address }}</td>
                            <td>{{ $server->image }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modal-server-{{ $server->id }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('admin.servers.destroy', $server) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer mb-0 pb-0">
            {{ $servers->links() }}
        </div>
    </div>
    @include('admin.server.server-form')

    @foreach($servers as $server)
        @include('admin.server.server-form', ['server' => $server])
    @endforeach
@endsection
