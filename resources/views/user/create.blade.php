@extends('lyout')

@section('title')@parent:: Registration @endsection

{{--@section('header')--}}
{{--    @parent--}}
{{--@endsection--}}

@section('content')




    <div class="container">

        <form method="post" action="{{ route('store_user') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group mb-3">
                <label for="gender">Chose gender</label>
            <select name="gender" aria-label="Default select example value="{{ old('gender') }}">
                <option selected>Your gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>

            </select>
            </div>

            <div class="form-group mb-3">
                <label for="born">Born</label>
                <input type="date" class="form-control" id="born" name="born" value="{{ old('born') }}">
            </div>


            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control-file" id="avatar" name="avatar">
            </div>


            <button type="submit" class="btn btn-primary">Send</button>

        </form>

    </div>
@endsection
