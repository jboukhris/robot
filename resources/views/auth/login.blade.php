@extends('layouts.auth_master')

@section('title', 'Home page')



@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="{{url('login')}}" >
          {{csrf_field()}}
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    <input name="email" type="email" class="validate">
                    @if($errors->has('email')) <span>{{$errors->first('email')}}</span>@endif
                    <label for="email">Email</label>
                </div>
        
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" type="password" class="validate">
                    @if($errors->has('password')) <span>{{$errors->first('password')}}</span>@endif
                    <label for="password">Password</label>
                </div>
            </div>
      
        </div>
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
          </button>
      </form>
    </div>






@endsection