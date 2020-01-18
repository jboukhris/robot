<div class="row">
<nav>
    <div class="container">
    <div class="nav-wrapper">

        <a href="{{route('home')}}" class="brand-logo">ROBOT</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">

            @foreach($categories as $category)
                
                <li><a href="{{url('category', [$category->id,$category->slug])}}">{{$category->title}}</a></li>
            @endforeach
                <li><a href="{{url('login')}}">sign in </a></li>

        </ul>
        <ul class="side-nav" id="mobile-demo">
            @foreach($categories as $category)

                <li><a href="{{url('category', $category->id )}}">{{$category->title}}</a></li>
            @endforeach
            <li><a href="{{url('login')}}">sign in </a></li>
        </ul>
    </div>
    </div>
</nav>
</div>