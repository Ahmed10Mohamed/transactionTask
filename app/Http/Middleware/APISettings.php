<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;


class APISettings
{
    public $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $api_key = $request->header('x-api-key');
        if($api_key == 'mwDA9w')
        {

            // get the response after the request is done
            $response = $next($request);

             // return the response
            return $response;
        }
        else
        {
            return response()->json(['success'=>false, 'code'=>405, 'message'=>'Un-Authorized Access'], 405);
        }
    }
}
