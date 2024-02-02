<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Tags;
use App\Models\Task;
use App\Models\Task_tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    public function adminAddTask(){
        return view('user.admin.add_task');
    }

    public function adminCreateTask(Request $request){

        
        
        $tagsArr = $request["selTags"];
        $title = $request['title'];
        $userId = $request['userId'];
        $description = $request['description'];
        $adminId = Auth::user()->id;

        //Create Task in same tabel
       
        $newTask = Task::create([
            'title' => $title,
            'userId' => $userId,
            'description' => $description,
            'adminId' => $adminId,
        ]);
        $newTaskId = $newTask->id;
        
        if ($tagsArr) {
            //Create Tags in same tabel

        $allTagsArr = collect();
        
        foreach ($tagsArr as $tag) {
            if (!Tags::where('name', $tag)->first()) {
                $newTag = Tags::create([
                    "name" => $tag,
                ]);

            }
            $allTagsArr->push(Tags::select("id")->where("name", $tag)->first());
            
        }
        //Create task_tags
        foreach ($allTagsArr as $tag) {
            
            $newTask_Tags = Task_tag::create([
                "tagId"=> $tag->id,
                "taskId"=> $newTaskId,
            ]);
        }
        }
        



        return redirect('/admin/all/tasks');
    }


    public function adminAllTasks(){
        $tasks = Task::with('userInfo')->with('adminInfo')->with('taskTags')->orderBy('id','desc')->get(); 
        $users = User::where('role', 'user')->get();
        $tags = Tags::get();
        return view('user.admin.all_tasks', ['tasks' => $tasks, 'users'=> $users, 'tags' => $tags]);
    }
    public function usersPage(){
        $users = User::where('role','user')->get();
        return view('user.admin.users_page', ['users'=> $users]);
    }
    public function oneUserPage(Request $request){
        $user = User::where('id', $request->userId)->with('tasks')->first();
        


        return view('user.admin.current_user_page', ['user' =>  $user] );
    }





    public function adminAddCategories(){
        $categories = Categories::whereNull('parentId')->with('subCategories')->get();


        return view('user.admin.addCategories', ['categories'=> $categories]);
    }
   
  
    public function adminCreateCategory(Request $request){
        $category = Categories::create([
            'name'=> $request->name,
            'parentId' => $request->parentCategory,
        ]);
    
        return back();
    }
    
}
