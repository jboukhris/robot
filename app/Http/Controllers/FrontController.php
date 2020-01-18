<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class FrontController extends Controller
{
    public function index()
    {
        $robots = \App\Robot::Paginate($this->nbPaginate);
        return view('front.index', ['robots' => $robots]);
    }

    public function  showRobotsByCat ($id, $slug = null) 
    {
        $robots = \App\Category::find($id)->robots()->paginate($this->nbPaginate);
        return view('front.category', ['robots' => $robots,]);
    }

    public function  showRobotsByTag ($id)
    {
        $tag = \App\Tag::find($id);
        $name = $tag->name; // nom du tag
        $robots = $tag->robots()->paginate($this->nbPaginate);
        return view('front.tags', ['name' => $name, 'robots' => $robots]);
    }

    public function showRobot($id)
    {
        $robot = \App\Robot::find($id);
        return  view('front.single', ['robot' => $robot]);
    }

    public function showRobotsByUser($id) 
    {
        $user = \App\User::find($id);
        $robots = $user->robots()->paginate($this->nbPaginate);

        // ['robots'=> $robots, 'user' => $user]  <=> compact('robots', 'user');
        return view('front.user', compact('robots', 'user'));
    }
   
}


        