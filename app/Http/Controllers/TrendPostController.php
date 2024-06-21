<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    //direct trend post page
    public function index(){
        $posts = ActionLog::select('action_logs.*','posts.*')
        ->leftJoin('posts','action_logs.post_id','posts.id')
        ->paginate(5);
        return view('admin.trend_post.index',compact('posts'));
    }
}
