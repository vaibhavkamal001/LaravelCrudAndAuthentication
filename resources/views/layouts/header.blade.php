<div class="nav">
    <ul>
        @auth
            <li><a href="{{route("dashboard")}}">Task</a></li>
            <li><a href="{{route("logOut")}}">LogOut</a></li>    
        @endauth

        @guest
            <li><a href="{{route("login")}}">Login</a></li>
            <li><a href="{{route("register")}}">Register</a></li>    
        @endguest
    </ul>
</div>