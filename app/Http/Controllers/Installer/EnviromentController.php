<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EnviromentController extends Controller
{
    public function update(Request $request)
    {
        $values = $request->except('_token', '_nextUrl', '_actionInstaller');

        // If value is not set, ignore it and set other in .env file using modifyEnv
        foreach ($values as $key => $value) {
            if ($value === null) {
                continue;
            }

            modifyEnv($key, $value);
        }


        switch ($request->_actionInstaller) {
            case 'email':
                try {
                    Mail::raw('Test email from ' . config('app.name'), function ($message) {
                        $message->to(config('mail.from.address'))->subject(__('Test email from :app', ['app' => config('app.name')]));
                    });
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
                break;
            case 'database':
                try {
                    DB::connection()->getPdo();
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
                break;
            case 'cache':
                try {
                    cache()->put('test', 'test', 60);
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
        }

        return redirect($request->_nextUrl);
    }

    public function finish(Request $request)
    {
        Artisan::call('migrate:fresh', [
            '--seed' => true,
            '--force' => true,
        ]);
        $output = Artisan::output();
        modifyEnv('APP_DEBUG', false);
        modifyEnv('APP_ENV', 'production');
        modifyEnv('APP_URL', $request->getSchemeAndHttpHost());
        return view('installer.finish')
            ->with('title', __('Installation completed'))
            ->with('testResults', [
                'email' => Mail::raw('Test email from ' . config('app.name'), function ($message) {
                    $message->to(config('mail.from.address'))->subject(__('Test email from :app', ['app' => config('app.name')]));
                }) ? __(':service is working', ['service' => 'Email']) : __(':service is not working', ['service' => 'Email']),
                'database' => DB::connection()->getPdo() ? __(':service is working', ['service' => 'Database']) : __(':service is not working', ['service' => 'Database']),
                'cache' => cache()->put('test', 'test', 60) ? __(':service is working', ['service' => 'Cache']) : __(':service is not working', ['service' => 'Cache']),
            ])
            ->with('message', __('The installation has been completed successfully. You can now login to your account.'));
    }
}
