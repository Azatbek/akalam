<?php namespace App\Http\Middleware;

use Closure;

class LocalesRedirect {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
			$segment = app()['request']->segment(1);

			if ($segment != 'admin' && $segment != '_debugbar')
			{
				if (!in_array($segment, config('app.locales')))
					return redirect('/' . app()->getLocale() . '/' . app()['request']->path());
			}
			else{
				app()->setLocale('ru');
			}
		
		return $next($request);
	
	}

}