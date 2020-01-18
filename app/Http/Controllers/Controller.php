<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
	protected $nbPaginate;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

      public function __construct()
    {
        view()->composer('partials.nav', function($view)
        {
            $categories = DB::table('categories')->select('title', 'slug', 'id')->get();
            $view->with('categories', $categories);
        });

        view()->composer('partials.second_nav', function($view)
        {
            $users = \App\User::all(); // model eloquent
            $view->with('users', $users);
        });
    
        $this->nbPaginate = env('NUMBER_PAGINATE', 2);
     }

}
