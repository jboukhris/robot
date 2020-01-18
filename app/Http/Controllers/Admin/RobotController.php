<?php
namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Robot;
use App\Category;
use File;
use Illuminate\Http\Request;
use App\Http\Requests\RobotRequest;
use App\Http\Controllers\Controller;

class RobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $robots = Robot::all();

        return view('back.robot.index', ['robots' => $robots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id'); // select id, title from categories  et retourne collection array
        $tags = Tag::pluck('name', 'id');

  
        return view('back.robot.create', compact('categories', 'tags'));
    }  
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RobotRequest $request)
   {
      
      $robot = Robot::create( $request->all() );//récupère tous les infos de la table et les    

    if ($request->hasFile('link')) 
    {
      $extension = $request->link->extension();
    $uri = str_random(9) . '.' . $extension;
    $path = $request->link->storeAs('images', $uri);

      $robot->link = $uri;

      $robot->save();
    }  


       $robot->saveTags($request->tags);  // mettre de la logique métier dans le modèle

       dump($robot->tags);    

       session()->flash('flashMessage', 'robot bien ajouté');

       return redirect()->route('robot.index'); // redirection
       //return back(); // retourne sur la page précédente      
       

                                                       
     
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $robot = Robot::find($id);
        $categories = Category::pluck('title','id');
        $tags = Tag::pluck('name', 'id');

        return view('back.robot.edit', compact('robot','categories','tags'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RobotRequest $request, $id)
    {
        
        $robot = Robot::find($id);

        $robot->update($request->all());
        $tags = $request->tags ? $request->tags : [];
        $robot->tags()->sync($tags);
      
       if($request->supp == 'supp')
        {
            $fileName = 'images/' . $robot->link;
          
            if( File::exists($fileName) ){
                File::delete($fileName);
            }
           
               $robot->link = null;
               $robot->save();
        }

        if($request->hasFile('link'))
        {
           
            $fileName = 'images/' . $robot->link;
          
            if( File::exists($fileName) )
            {
                File::delete($fileName);
            }
            
            $ext = $request->link->extension();
            $linkName = str_random(12) . '.' . $ext;
            $request->link->storeAs('images', $linkName );

            $robot->link = $linkName;
            $robot->save();
          
        }
        
        session()->flash('flashMessage', 'mise à jour réussi');

        return redirect()->route('robot.index');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    }
}
