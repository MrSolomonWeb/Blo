@extends('lyout')

@section('content')
    {{--    <div class="d-flex align-items-center justify-content-center">--}}



    @forelse ($posts as $post)
        <p>

        <h3>

            <a href="{{route('posts.show',['post'=>$post->id])}}"> {{$post->title}}   </a>

            <p class="text-muted">Added {{\Carbon\Carbon::parse($post->created_at)->format('m.d.Y H:i:s')}}
            by {{ $post->user->name}}
            </p>

            @if(Auth::check() && Auth::user()->is_admin)
<div class='container-fluid'>
<div class='row'>

           @if ($post->comment_count)
           <p>  {{ $post->comment_count }} comments </p>
          @else
          <p> No comments yet ! </p>

           @endif

                <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-info ml-5 mr-3">Edit</a>

                <form action="{{route('posts.destroy',['post'=>$post->id])}}" method="post" class="fm_inline">


                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"> Delete!</button>
                </form>
            @endif
</div></div>
        </h3>

        </p>

    @empty
        <p>No blog post yet</p>
    @endforelse
    {{--    </div>--}}
@endsection

