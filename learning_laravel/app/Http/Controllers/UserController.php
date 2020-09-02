<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function user () {
        return view("user");
    }

    public function addUser (Request $request) {

        $validatedData  = $request->validate([
            'user_name' => ['required', 'max:30', 'min:2'],
            'user_email' => ['required', 'unique:app_users', 'max:30', 'min:4']
        ]);

        $user = DB::table('app_users');
        $db = [];
        $db["user_name"] = $request->user_name;
        $db["user_email"] = $request->user_email;
        $db["user_password"] = $request->user_password;
        $user->insert($db);
        return Redirect()->route("create_user")->with(['message'=>'Data successfully inserted!']);
    }

    public function allUsers () {
        $users = DB::table('app_users')->get();
        return view("all_users", ['users'=>$users]);
    }

    public  function viewUser($id) {
        $user  = DB::table('app_users')->where('id', $id)->first();
        return view('user_view', ['user'=>$user]);
    }

    public function allPosts () {
        $posts = DB::table('posts')
            ->join('app_users', 'posts.user_id', 'app_users.id')
            ->select('posts.*', 'app_users.user_name')
            ->get();
        return view("all_posts", ['posts'=>$posts]);
    }

    public function postPage () {
        $users = DB::table('app_users')->get();
        return view("post", ['users'=>$users]);
    }

    public function addPost (Request $request) {
        $post = DB::table('posts');
        $data = [];
        $data['post_title'] = $request->post_tittle;
        $data['post_description'] = $request->post_desc;

        $file = $request->file('post_image');
        $image = hexdec(uniqid()).".".$file->getClientOriginalExtension();
        $upload_to = "public/images/";
        $file->move($upload_to, $image);
        $image_url = $upload_to.$image;


        $data['post_image'] = $image_url;
        $data['slug'] = $request->post_slug;
        $data['user_id'] = $request->post_by;

        $post->insert($data);

        return Redirect()->back();

    }

    public function deletePost(Request $request, $id){

        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->post_image;

        $deleted = DB::table('posts')->where('id', $id)->delete();

        if ($deleted) {
            unlink($image);
        }
        return Redirect()->back();
    }
}
