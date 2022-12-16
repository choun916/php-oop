<?php
namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('success', function ($data=[]) {
            return Response::json([
                'status'  => 'OK',
                'data' => $data,
            ]);
        });

        Response::macro('error', function ($message='', $status=400) {
            return Response::json([
                'status'  => 'ERROR',
                'message' => $message,
            ], $status);
        });
    }
}
