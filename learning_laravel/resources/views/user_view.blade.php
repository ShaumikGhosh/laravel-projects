<!Doctype HTML>
<html lang="en">
<head>
    <title>Users</title>
</head>
<body>
@<a href="{{ Route("create_user") }}">Create User</a>
@<a href="{{ Route("all_posts") }}">Visit Posts</a>
<table border="1">
    <tbody>
        <tr>
            <td>User ID: </td>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <td>User Name: </td>
            <td>{{ $user->user_name }}</td>
        </tr>
        <tr>
            <td>User Email: </td>
            <td>{{ $user->user_email }}</td>
        </tr>
        <tr>
            <td>User Password: </td>
            <td>{{ $user->user_password }}</td>
        </tr>
    </tbody>
</table>
</body>
</html>
