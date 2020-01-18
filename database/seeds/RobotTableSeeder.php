<?php

use Illuminate\Database\Seeder;

class RobotTableSeeder extends Seeder
{

	public function run()
    {
      
      $uploads = public_path('images'); // fonction laravel qui donne le chemin du dossier public => public/images
      
      // récupère les noms des images dans le dossier dans un tableau
      $files = File::allFiles($uploads); 
      
      foreach($files as $file)
      {
       
        File::delete($file); // supprime les images dans le dossier
        
      }
      
      // attention pour passer la variable, qui se trouve dans le contexte englobant, dans le scope de la fonction anonyme
      // utilisez use 
      factory(App\Robot::class, 10)->create()->each(function($robot) use ($uploads) {
        
        $id=array(1,2,3);
        shuffle($id); // mélange les indices mais ne retourne pas un tableau
        
        $uri = str_random(12) . '.jpg';
        
        // http://lorempicsum.com/futurama/400/200/[1-9]
        
        $fileName = file_get_contents('https://i.picsum.photos/id/'.rand(1,90).'/200/300.jpg');
      
        File::put($uploads.'/'.$uri, $fileName);
        
        
        $robot->link = $uri;

				$robot->tags()->attach($id);
        
        $robot->save();
        
      });
    }
}
