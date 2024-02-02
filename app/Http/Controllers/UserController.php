<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userTasks(){
        $tasks = Task::with('adminInfo')->with('taskTags')->where('userId', Auth::user()->id)->orderBy('id','DESC')
        ->get();

 

        return view('user.user_tasks',['tasks'=>$tasks]);
    }
    public function userChangeStatus(Request $request){
        // $data = json_decode($request['data']);
        
        $status = $request['0'];
        $id = $request['1'];

        Task::where('id', '=', $id)->update(['status' => $status]);
        return redirect()->back();

        

    }
}
