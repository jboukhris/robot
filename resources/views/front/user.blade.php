@extends('layouts.master')

@section('title', 'Home page')


@section('content')
    <div class="container">
        <div class="row">
            {{ $robots->links() }}

        @foreach ($robots as $robot)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{url('images',$robot->link)}}" alt="...">
                    <div class="caption">
                        <h3>{{$robot->name}}</h3>
                        <p>{{$robot->category->title}}</p>
                        <p><a href="{{url('robot', $robot->id)}}" class="btn btn-primary" role="button">Button</a></p>
                        @include('partials.meta')
                    </div>
                </div>
            </div>
            @endforeach

            {{ $robots->links() }}
        </div>
    </div>
@endsection

