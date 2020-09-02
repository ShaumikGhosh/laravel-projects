<!Doctype HTML>
<html lang="en">
<head>
    <title>Users</title>
</head>
<body>
@<a href="{{ Route("create_user") }}">Create User</a>
@<a href="{{ Route("all_posts") }}">Visit Posts</a>
@<a href="{{ Route("post_page") }}">Create Post</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Slug</th>
            <th>Posted By</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->post_title}}</td>
            <td>{{$post->post_description}}</td>
            <td>
                <img src="{{$post->post_image}}" alt="none" width="100">
            </td>
            <td>{{$post->slug}}</td>
            <td>{{$post->user_name}}</td>
            <td>
                <a href="">Edit</a>
                /
                <a href="post/delete/{{$post->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
