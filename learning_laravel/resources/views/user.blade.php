<!Doctype HTML>
<html lang="en">
    <head>
        <title>Users</title>
    </head>
    <body>
        <a href="{{ Route("all_users") }}">View Users</a>
        <form method="post" action="{{Route('add_user')}}">
            @csrf
            <label for="user_name">User Name</label>
            <input type="text" name="user_name" id="user_name"/>
            <br>
            <label for="user_email">User Email</label>
            <input type="email" name="user_email" id="user_email"/>
            <br>
            <label for="user_password">User Password</label>
            <input type="text" name="user_password" id="user_password"/>
            <br>
            <button type="submit">Create User</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
    </body>
</html>
