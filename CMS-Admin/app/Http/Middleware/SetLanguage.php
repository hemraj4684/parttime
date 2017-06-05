<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;


use App,Auth;
use Closure;
use Config;
use Lang;
use Session;

class SetLanguage  {

	public function __construct(Request $request)
	{
		$this->request = $request;

// fix for setting App::locale
		$lang = Session::get('locale');
		if ($lang == null) {
//			\App::setLocale($lang);
//			\App::setLocale(Session::get('locale'));
			Session::set('locale', Config::get('app.locale'));
		}
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
        if(Auth::user()){
            app()->setLocale(Auth::user()->locale);
        }elseif($locale = Session::has('locale')){
            app()->setLocale($locale);
        }


        return $next($request);
    }

}
