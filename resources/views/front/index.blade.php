@extends('layouts.master')

@section('title', 'Home page')


@section('content')
    <div class="container">
        <div class="row">
            {{ $robots->links() }}

        @foreach ($robots as $robot)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a href="{{url('robot', $robot->id)}}">Button</a>
                        <img src="{{url('images',$robot->link)}}" alt="...">
                    </a>
                    <div class="caption">
                        <h3>{{$robot->name}}</h3>
                        <p>{{ ($robot->category == null ? '' : $robot->category->title) }}</p>
                        <p>{{url('robot', $robot->description)}}</p>
                        @include('partials.meta')
                    </div>
                </div>
            </div>
            @endforeach

            {{ $robots->links() }}
        </div>
    </div>
@endsection

