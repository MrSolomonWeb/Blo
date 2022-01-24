@extends('lyout')

@section('content')
<h1>{{$post->title}}</h1>
<p>{{$post->content}}</p>

    <p>Added {{\Carbon\Carbon::parse($post->created_at)->format('m.d.Y H:i:s')}}</p>


@if  (now()->diffInMinutes($post->created_at) < 5)
    <strong>New!</strong>

@endif
<h4>  Comments  </h4>

@forelse ($post->comment as $comment)

<p>{{ $comment->content }},    </p>

<p class="text-muted">
 added {{\Carbon\Carbon::parse($comment->created_at)->format('m.d.Y H:i:s')  }}
</p>

@empty

<p> No comments yet</p>

@endforelse

@endsection

