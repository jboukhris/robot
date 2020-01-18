<nav>
    <div class="collection">
        <a class="collection-item" href="">Engineers Robots</a>
        @foreach ($users as $user)
            <a class="collection-item" href="{{url('robot/user', $user->id)}}">{{$user->name}}, <small>number robots {{$user->robots? $user->robots->count() : 0 }}</small></a>
        @endforeach
    </div>
</nav>