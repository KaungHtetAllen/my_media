<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    //set action log
    public function setActionLog(Request $request){
        $data = [
            'user_id'=>$request->userId,
            'post_id'=>$request->postId,
        ];
        ActionLog::create($data); //insert

        $posts = ActionLog::where('post_id',$data['post_id'])->get();
        return response()->json([
            'message'=>'Action Log create success',
            'posts'=>$posts
        ]);
    }
}
