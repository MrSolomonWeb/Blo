@extends('lyout')

@section('content')
<div class="container">
    <form action="send" method="post">

        @csrf
<div class="alert alert alert-success">
    <div class="mb-3">
        <label for="name" class="form-label">Yur name</label>
        <input type="text" class="form-control"  name="name" >
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" rows="5" name="text"></textarea>
    </div>
</div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

@endsection



