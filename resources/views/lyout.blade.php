<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>  @section('title')
            Hello
            @show </title>
</head>
<body>
<div
    class="d-flex align-items-center justify-content-between flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Laravel Blog</h5>
    <nav class=" d-flex align-items-center justify-content-evenly my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{ route('home') }}">Home</a>
        <a class="p-2 text-dark" href="{{ route('contact') }}">Contact</a>


        <a class="p-2 text-dark" href="{{ route('posts.index') }}">Blog Posts</a>


        @if(Auth::check() && Auth::user()->is_admin)
            <a class="p-2 text-dark" href="{{ route('posts.create') }}">Add Blog Post</a>
        @endif



        @auth

            <a class="p-2 text-dark" href="{{ route('logout') }}">Log out</a>
            <a href="#">

                {{ auth()->user()->name }}
                @if ( auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="" height="25">
                @endif


            </a>
        @endauth

        @guest
            <a class="p-2 text-dark" href="{{ route('create_user') }}">Registry</a>
            <a class="p-2 text-dark" href="{{ route('login.create') }}">Login</a>

        @endguest
    </nav>
</div>

{{--    <li><a href="{{route('blog-post',['id'=>1])}}">Blog post</a></li>--}}

<div class="container">


    @if (session()->has('status'))
        <p style="color:green;">
            {{session()->get('status')}}

        </p>
    @endif
    @if (!empty($errors))
     @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
      @endif
    @yield('content')

</div>
<script src="{{asset('/js/app.js')}}"></script>
<footer class="text-muted">
    <div class="container">
{{--        <p class="float-right">--}}
{{--            <a href="#">Back to top</a>--}}
{{--        </p>--}}
        <p>&copy; {{ date('Y') }}</p>

        <ul>
{{--            @foreach($rubrics as $rubric)--}}
{{--                <li><a href="#">{{ $rubric->title }}</a></li>--}}
{{--            @endforeach--}}
        </ul>

    </div>
</footer>
</body>
</html>
