<div class="row">
	 

	@foreach ($robot->tags as $tag)
		<div class="col-sm-6 col-md-2">
		
			@if (!empty($name)  && $name == $tag->name)
				l<a  href="{{url('tags', $tag->id)}}"  class="btn-large disabled">{{$tag->name}}</a>
			@else
				<a  href="{{url('tags', $tag->id)}}" class="waves-effect waves-light btn">{{$tag->name}}</a>
			@endif
		
		</div>
	@endforeach
	 
</div>


             