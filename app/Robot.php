<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Robot extends Model
{

  protected $fillable = [
    'name',
    'description',
    'category_id',
    'published_at',
  ];


 
   public function setCategoryIdAttribute($value) // mutateur, accès a toutes les valeurs qu on ve mettre dans la table robot
     
   {
   
     //$this->attributes['category_id'] = ;
     
      //dump($value); die;
     
      if($value == 0)
      {
        $this->attributes['category_id'] = null;
      }else{

       $this->attributes['category_id'] = $value;
      }
   

   }

   public function setPublishedAtAttribute($value) // mutateur pour la date
     
   {
   

      if($value == null)
      {
        $this->attributes['published_at'] = null;
      }else{

       $this->attributes['published_at'] = Carbon::now();
      }
   

   }

   public function getPublishedAtAttribute($date)// pour afficher la date au format français
   {
     if ($date != null)
     {
       return Carbon::parse($date)->format('d/m/Y');
     }
     
   }


   public function saveTags($tags)//il enverra null si c vide, et un tableau si c'est rempli
   {
     
     if(!empty($tags))//si c différent de vide
       $this->tags()->attach($tags);// on peut implémenter de la logique métier dan le model
   }


  public function category()
 {
   
       return $this->belongsTo(Category::class); // relie la table robots à la table categories ManyToOne
                                                 // entité propriétaire
                                                 
       
 }


 public function user()
 {
                                                 
       return $this->belongsTo(User::class); // relie la table robots à la table users ManyToOne
 }


 public function tags()
 {
 
   return $this->belongsToMany(Tag::class); // permet de récupérer tous les tags d'un robot
   
 }

public function isTag($tagId)
 {
   
     if(count($this->tags)>0){

     foreach($this->tags as $tag)
     {
     
         if($tag->id == $tagId) return true;
       
     }

 }
     return false;
   
 }
   
 

}