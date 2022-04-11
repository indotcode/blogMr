<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function like(int $id): JsonResponse
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $model = new Like();
        $data = [];
        $first = $model->where('post_id', $id)->where('ip', $ip)->first();
        if($first === null){
            $model->post_id = $id;
            $model->ip = $ip;
            $model->save();
            $data['status'] = 1;
        } else {
            $model->destroy($first->id);
            $data['status'] = 0;
        }
        return response()->json($data, 200);
    }

    public function view(int $id): JsonResponse
    {
        $model = Post::find($id);
        $model->view = $model->view + 1;
        $model->save();
        return response()->json('', 200);
    }

    public function createComment(Request $request, int $post_id): JsonResponse
    {
        $model = new Comment();
        $model->parent = 0;
        $model->post_id = $post_id;
        $model->title = $request->post('title');
        $model->message = $request->post('message');
        $model->save();
        return response()->json($model, 200);
    }
}
