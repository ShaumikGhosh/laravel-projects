<!Doctype HTML>
<html lang="en">
<head>
    <title>Users</title>
</head>
<body>
@<a href="{{ Route("create_user") }}">Create User</a>
@<a href="{{ Route("all_posts") }}">Visit Posts</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->user_name }}</td>
            <td>{{ $user->user_email }}</td>
            <td>{{ $user->user_password }}</td>
            <td>
                <a href="user/edit/{{ $user->id }}">Edit</a>
                /
                <a href="user/delete/{{ $user->id }}">Delete</a>
                /
                <a href="user/view/{{ $user->id }}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
