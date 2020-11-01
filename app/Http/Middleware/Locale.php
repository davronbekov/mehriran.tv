<?php


namespace App\Http\Middleware;

use Closure;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->method() === 'GET') {
            $segment = $request->segment(1);

            $ignore = [
                'auth', 'admin'
            ];

            if(in_array($segment, $ignore)){
                return $next($request);
            }

            $locales = [
                'ru', 'en', 'tj',
            ];

            if (!in_array($segment, $locales)) {
                $segments = $request->segments();
                $segments = array_prepend($segments, 'en');

                return redirect()->to(implode('/', $segments));
            }

            app()->setLocale($segment);
        }

        return $next($request);
    }
}
