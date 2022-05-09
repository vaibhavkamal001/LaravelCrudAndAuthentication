@extends('layouts.master')

@section('body')

<div class="form">
    <div class="login-form">
        <form action="{{route("login")}}" method="post">
            @csrf
            <div class="field">
                <label for="email">email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="field">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="login-btn">
                <button type="submit">LogIn</button>
            </div>
        </form>
    </div>
</div>
    
@endsection