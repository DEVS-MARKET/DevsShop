@php use App\Models\Server; @endphp
@php
    $formRoute = isset($server) ? route('admin.servers.update', $server) : route('admin.servers.store');
    $method = isset($server) ? 'PUT' : 'POST';
@endphp
<div class="modal fade" id="modal-server-{{ isset($server) ? $server->id : 'new' }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ isset($server) ? __('Edit :resource', ['resource' => $server->name]) : __('Create :resource', ['resource' => 'server']) }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ $formRoute }}" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __('Server name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $server->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="address">{{ __('Server address') }}</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $server->address ?? '' }}">
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">{{ __('Image') }}</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
