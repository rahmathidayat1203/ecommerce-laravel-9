@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Profile')}}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif

                        <form action="{{ route('edit_profile') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="role" class="form-control" placeholder="Email" value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" placeholder="Password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Change profile details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->is_admin ? 'Admin' : 'Member' }}</p>

    <form action="{{ route('edit_profile') }}" method="post">
        @csrf
        <label>Name</label>
        <br>
        <input type="text" name="name" value="{{ $user->name }}"><br>
        <label>Password</label>
        <br>
        <input type="password" name="password"><br>
        <label>Confirm Password</label>
        <br>
        <input type="password" name="password_confirmation"><br>
        <button type="submit">Change profile details</button>
    </form>
</body>

</html> --}}
