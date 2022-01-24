@extends('lyout')

@section('content')
    <div class="d-flex align-items-center justify-content-center">
    <form action="{{route('posts.update',['post'=>$post->id])}}" method="post" class="col-8">
        @csrf
        @method('PUT')
@include('posts._form')
        <button type="submit" class="btn btn-primary form-control"> Update! </button>
    </form>
</div>
@endsection


