@extends('layouts.admin')

@section('title')

@section('content')
@if (count($errors) > 0)
   <div class="alert alert-danger">
     <p>Une erreur est survenue dans le formulaire</p>
   </div>
@endif

   {{--Name--}}
 <form action="{{route('robot.update', $robot->id)}}" method="post" enctype="multipart/form-data">
   {{csrf_field()}}
   {{method_field('PUT')}}
   <!--<input type="hidden" name="_method" value="PUT">-->
   <div class="row">
     <div class="input-field col s3">
   <input type="text" name="name" value="{{$robot->name}}">
    	@if($errors->has('name')) <span>{{$errors->first('name')}}</span>
   		 @endif
     </div>
   </div>
   
   {{--Description--}}
   <div class="row">        
           <div class="input-field col s12">
             <textarea  class="materialize-textarea" name="description"  >
             	{{$robot->description}}
             </textarea>
             <label >Description</label>
           </div>    
   </div>

    {{--Tag--}}
   <div class="row">
       <p><label class="input-field col s12">Tags du robot</label></p>
       @foreach ($tags as $id => $name)
         <div class="col s3">
           <input id="{{ $id }}" {{ $robot->isTag($id)? 'checked' : '' }} type="checkbox" name="tags[]" value="{{ $id }}"/>
           <label for="{{ $id }}"> {{ $name }} </label>
         </div>
       @endforeach
   </div>

     {{--Categorie--}}
   <div class="row">
     <div class="input-field col s12">
           <select class="prisc" name="category_id">
               <option value="0" {{$robot->category? '' : 'selected'}}>Non catégorisé</option>
               @foreach($categories as $id=>$title)
               <option {{($robot->category? $robot->category->id == $id : false)? 'selected':''}} value="{{$id}}" >{{$title}}</option>          
               @endforeach
             </select>
             <label>Selection des catégories</label>
     </div>
   </div>

  
  @if ($robot->link != null)
 <div class="row">

    <img src="{{url('images',$robot->link)}}">
     <p>
      <input type="checkbox" id="supp" name="supp" />
      <label for="supp">Suprimer</label>
    </p>

    
 </div>
  @endif  
 

        <div class="file-field input-field">
          <div class="btn">
              <span>File</span>
                <input type="file" name="link">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
      </div>
    
   
     {{--Publication--}}
   <div class="row">
       <div class="col s12">
         <div class="switch">
           <label>
             Unpublished
             <input type="checkbox" name="published_at" value="on" {{ ($robot->published_at!= null)?  'checked' : ''}}>
             <span class="lever"></span>
             Published
           </label>
         </div>
       </div>
     </div>

     {{--Submit--}}
     <div class="row">
       <div class="col s12">
           <button class="btn waves-effect waves-light" type="submit" name="action">Update
               <i class="material-icons right"></i>
           </button>
       </div>
     </div>




   
 </form>
@endsection