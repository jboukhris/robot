
@extends('layouts.admin')

@section('title')


@section('content')
    <div class="row">
        <div class="col l2">
           <a href="{{route('robot.create')}}" class="waves-effect waves-light btn">creation</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
          
	
            @if( $flash = session('flashMessage') )
                <div class="container flash">
                    <div class="col s12">{{$flash}}</div>
                </div>
            @endif
            
            <table>

    			<th>Robot</th>
    			<th>User</th>
    			<th>Category</th>
    			<th>Tags</th>
    			<th>action</th>
					
                    @foreach ($robots as $robot)

        		          <tr>
        				    <td>
                                <a href="#">{{$robot->name}}</a>
                            </td>
        				    <td>
                                @if( $robot->user != null ) {{$robot->user->name}} @else pas d'user 
                                @endif 
                            </td>
        		
    				        <td>
                                @if( $robot->category != null ) {{$robot->category->title}}
                                @else non catégorisé
                                @endif
                            </td>
    				        <td>	
    				              @forelse($robot->tags as $tag)
    				               {{$tag->name}}
    				              @empty
    				                   <p>NULL</p>
    				              @endforelse
        				    </td>
                            <td>
                                @if( $robot->published_at != null ) {{$robot->published_at}} 
                                @else pas de date 
                                @endif
                            </td>
						
                            <td>
                                <button class="btn" >
                                     <a href="{{route('robot.edit', $robot->id)}}" > update</a>
                                </button>
                            </td>

                            <td>
                                <button class="btn" > Suprimer </button>
                            </td>
        		          </tr>
            			
            	       @endforeach
            		
			</table>
         
        </div>
      
    </div>
@endsection