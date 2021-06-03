@extends('admin.layouts._form')

@section('title', 'login')

@section('content')
<div class="card-body text-center">
    <div class="mb-4">
        <i class="feather icon-unlock auth-icon"></i>
    </div>
    <h3 class="mb-4">Login</h3>

    <form action="{{ Route('loginpost') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email"  name="email" value="{{old('email')}}" required>
        </div>

        <div class="input-group mb-4">
            <input type="password" class="form-control" placeholder="password" name="password" required>
        </div>

        <div class="form-group text-left">
            <div class="checkbox checkbox-fill d-inline">
                <input type="checkbox" id="checkbox-fill-a1" name="remember" value="true" {{ old('remember') ? 'checked' : '' }}>
                <label for="checkbox-fill-a1" class="cr"> Save Details</label>
            </div>
        </div>

        <button class="btn btn-primary shadow-2 mb-4" type="submit">Login</button>
    </form>
    
    <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html">Reset</a></p>
    <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html">Signup</a></p>
</div>
@endsection