<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RobotRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
       return true;//autorisation à true sinon on ne peut pas passer, on a deja l'autorisation login /password qui vérifie les autorisations
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
       return [
            // on valide les champs avant d'insérer un robot, il s'occupe de la redirection
               'name' => 'required|max:100',  // rules, requis et ne dépasse pas 100 caractères
               'category_id' => 'integer',
               'tags.*' => 'integer',// vérifie que dans le tableau on a des entiers, pour lister les elements ds un tableau, tag.* fait un foreach sur les elements et le type
               'link' => 'image|max:1000',
               'published_at' => 'in:on',
         
       ];
   }
}