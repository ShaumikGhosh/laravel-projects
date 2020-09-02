<!Doctype HTML>
<html lang="en">
    <head>
        <title>Users</title>
    </head>
    <body>
        @<a href="{{ Route("all_users") }}">View Users</a>
        <form method="post" action="{{Route('add_post')}}" enctype="multipart/form-data">
            @csrf
            <label for="post_title">Post Title</label>
            <input type="text" name="post_tittle" id="post_title"/>
            <br>
            <label for="post_desc">Post Desc</label>
            <textarea name="post_desc" id="post_desc"></textarea>
            <br>
            <label for="post_slug">Post Slug</label>
            <input type="text" name="post_slug" id="post_slug"/>
            <br>
            <label for="post_image">Image</label>
            <input type="file" name="post_image" id="post_image"/>
            <br>
            <label for="post_by">Post By</label>
            <select name="post_by" id="post_by">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->user_name}}</option>
                @endforeach
            </select>
            <br>
            <button type="submit">Create Post</button>
        </form>
    </body>
</html>
