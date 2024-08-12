<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServerRequest;
use App\Models\Server;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ServerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function __invoke(): View|Factory|Application
    {
        return view('admin.server.index')
            ->with('servers', Server::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServerRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('servers', 'public');
        Server::create($data);
        return redirect()->route('admin.servers.index')->with('success', __(':resource was successfully created', ['resource' => 'Server']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServerRequest $request, Server $server)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('servers', 'public');
        }
        $server->update($data);
        return redirect()->route('admin.servers.index')->with('success', __(':resource was successfully updated', ['resource' => 'Server']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Server $server)
    {
        $server->delete();
        return redirect()->route('admin.servers.index')->with('success', __(':resource was successfully deleted', ['resource' => 'Server']));
    }
}
