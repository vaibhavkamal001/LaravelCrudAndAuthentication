@extends('layouts.master')

@section('body')

<div class="form">
    <div class="register-form">
        <form action="{{route("register")}}" method="post">
            @csrf
            <div class="field">
                <label for="name">name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="field">
                <label for="email">email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="field">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="register-btn">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
    
@endsection