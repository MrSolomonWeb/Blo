@extends('lyout')

@section('content')
    <div class="d-flex align-items-center justify-content-center">
    <form action="{{route('posts.store')}}" method="post" class="col-8">
        @csrf
        @include('posts._form')
<button type="submit" class="btn btn-primary form-control"> Create! </button>
    </form>
    </div>
@endsection


