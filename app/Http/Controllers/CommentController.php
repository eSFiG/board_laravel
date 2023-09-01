<?php


namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {

    public function save($id, CommentRequest $request) {
        $data = $request->validated();
        $data['task_id'] = $id;
        $data['owner_id'] = Auth::id();
        $comment = new Comment();
        $comment->fill($data)->save();
        return redirect('/task/'.$id);
    }

    public function delete(Comment $id) {
        $c_id = $id->task_id;
        $id->delete();
        return redirect('/task/'.$c_id);
    }
}
