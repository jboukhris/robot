@extends('layouts.admin')

@section('title')


@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
      <p>Une erreur est survenue dans le formulaire</p>
    </div>
@endif

<form action="{{route('robot.store')}}" method="POST" enctype="multipart/form-data">
 {{csrf_field()}}
	<div class="row">
		<div class="input-field col s12">
			<input type="text" name="name" class="validate" value="{{old('name')}}">
			<label class="active" for="first">Name</label>
		</div>
		
		<div class="input-field col s12">
			<textarea name="description" class="materialize-textarea">{{old('description')}}</textarea>
			<label for="textarea1">Description</label>
		</div>

		
       <div class="input-field col s12">
           <select class="prisc"  name="category_id" >
             <option value="" disabled selected>Choose your category</option>
              <option value="0">Non catégorisé</option>
             @foreach ($categories as $id => $title)
             <option {{ (old('category_id') == $id) ? 'selected' : '' }} value="{{$id}}">{{$title}}</option>
             @endforeach
           </select>
           <label>Category</label>
            @if($errors->has('category_id')) <span>{{$errors->first('category_id')}}</span>@endif
       </div>
    <div class="row">
		<div class="input-field col s12">
			<label for="tags">Tags</label><br>
			@foreach ($tags as $key => $value)
			<p>
      			<input {{( !empty(old('tags')) && in_array($key,old('tags')) == true )? 'checked' : '' }} type="checkbox" name="tags[]" id="{{$key}}" value="{{$key}}" />
      			<label for="{{$key}}">{{$value}}</label>
    		</p>

			@endforeach
		</div>
	</div>
		<!-- upload de la photo -->

	
    		<div class="file-field input-field">
     		 	<div class="btn">
        			<span>File</span>
        				<input type="file" name="link">
      			</div>
      			<div class="file-path-wrapper">
        			<input class="file-path validate" type="text" placeholder="Upload one or more files">
      			</div>
    	</div>
  	
        
		
		<!-- Checkbox publier le robot -->
		<div class="col s12"><br>
		<label for="publier">Publier</label><br><br>
			<input type="checkbox" id="published_at" name="published_at" {{( !empty(old('published_at')) && old('published_at') == 'on' )? 'checked' : '' }}/>
     		<label for="published_at">Publier</label>
		</div>
    

		<!-- Bouton submit -->
		<div class="col s12"><br>
			<button class="btn waves-effect waves-light" type="submit" name="action">Créer
    			<i class="material-icons right">send</i>
  			</button>
        </div>
</form>

@endsection