@extends('admin.layouts._form')

@section('title', 'Register')

@section('content')
<div class="card-body text-center">
    <div class="mb-4">
        <i class="feather icon-user-plus auth-icon"></i>
    </div>
    <h3 class="mb-4">Sign up</h3>

    <form action="{{Route('registerpost')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="name" value="{{old('name')}}" required autofocus>
        </div>

        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email"  name="email" value="{{old('email')}}" required>
        </div>

        <div class="input-group mb-4">
            <input type="password" class="form-control" placeholder="password" name="password" required>
        </div>

        <div class="input-group mb-4">
            <input type="password" class="form-control" placeholder="Confirm password" name="confirmPassword" required>
        </div>

        <button class="btn btn-primary shadow-2 mb-4">Sign up</button>

    </form>

    <p class="mb-0 text-muted">Allready have an account? <a href="{{route('login')}}"> Log in</a></p>
</div>
@endsection