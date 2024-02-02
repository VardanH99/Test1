@extends('layouts.app')
@section('content')
   
    <h1 class="text-success">All Tasks</h1>
    <div class="container-fluid d-flex flex-column justify-content-around align-items-center">
        <div class=" btn btn-secondary rounded-circle d-flex justify-content-center align-items-center"
            style="aspect-ratio: 1 / 1 ; width:8%;" id="add-task-btn">
            <i class="fa-solid fa-plus fa-2xl"></i>
        </div>
        <div class="container-fluid mt-3 d-flex flex-column justify-content-around align-items-center" id="add-task-form"
            style="display: none !important;">
            <form method="post" action="{{ route('admin.create.task') }}"
                class="bg-secondary d-flex flex-column align-items-center " style="width: 100%;">
                @csrf
                <div class="container mt-5 form-group text-light d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label for="title">Task's title</label>
                        <input type="text" class="form-controll text-dark " name="title" id="title"
                            placeholder="title">
                    </div>

                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Users</a>
                        <ul class="dropdown-menu text-dark text-center">
                           
                            @foreach ($users as $user)
                                <li>{{ $user->firstName }}
                                    <input type="radio" name="userId" value="{{ $user->id }}" id="">
                                </li>
                            @endforeach
                            <li>Nobody
                                <input type="radio" name="userId" value="" id="">
                            </li>
                        </ul>
                    </div>
                </div>
                <textarea class=" mt-5 " name="description" id="description" placeholder="Create new task"
                    style="min-height: 30vh; width:70%;"></textarea>

                <div class="container-fluid">
                    <h5 class="text-primary">#Tags</h5>
                </div>
                <div class="container d-flex justify-content-center">
                    <select class="form-control" name="selTags[]" multiple="multiple" style="width: 60%">
                        @foreach ($tags as $tag)
                            
                        <option>{{$tag->name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-5">Add Task</button>
            </form>
        </div>
    </div>



    <div class="row mt-3 d-flex justify-content-around">

        @foreach ($tasks as $task)
       
        
            <div class="col-8 col-sm-5 bg-white d-flex flex-column align-items-center mt-5">
                <div class="container-fluid d-flex justify-content-between">
                    <h4>{{ $task->title }}</h4>
                    @if ($task->status == '1')
                        <p class="text-danger">New</p>
                    @elseif($task->status == '2')
                        <p class="text-warning">In Process</p>
                    @else
                        <p class="text-success">Finished</p>
                    @endif
                </div>
                <div class="container  d-flex flex-column align-items-center">
                    @if ($task->userId)
                        <a class="text-primary" href="{{ route('one.user.page', ['userId' => $task->userId]) }}">
                            For {{ $task->userInfo->firstName . ' ' . $task->userInfo->lastName }}</a>
                    @endif
                    <p>{{ $task->description }}</p>
                </div>
                <div class="container d-flex justify-content-around">
                    @if ($task->taskTags)
                        @foreach ($task->taskTags as $taskTag)
                        <p class="text-primary">{{"#".$taskTag->tags->name}}</p>
                    @endforeach
                    @endif
                    
                </div>
                <div class="container-fluid d-flex justify-content-end">

                    <p class="text-secondary">Created by{{ $task->adminInfo->firstName . ' ' . $task->adminInfo->lastName }}
                    </p>

                </div>
            </div>
        @endforeach()
    </div>

    <script>
        $(document).ready(function() {
            $("#add-task-btn").click(function() {
                if ($("#add-task-form").css("display") === "none") {
                    $("#add-task-form").css("display", "flex");
                } else if ($("#add-task-form").css("display") === "flex") {
                    $("#add-task-form").attr("style", "display: none !important");;

                }
            });
        });
    </script>
@endsection
