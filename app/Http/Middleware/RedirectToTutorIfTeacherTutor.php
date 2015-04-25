<?php namespace App\Http\Middleware;

use Closure;

class RedirectToTutorIfTeacherTutor {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if( $request->user()->isATeacherTutor() ){
			return redirect('home/tutor');
		}

		return $next($request);
	}

}
