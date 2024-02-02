@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-between">
        <h1 class="text-success">Tasks for me</h1>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-secondary " href="#" data-bs-toggle="dropdown"
                aria-expanded="false">Tasks</a>
            <ul class="dropdown-menu">
                <li class="text-primary"><input type="radio" name="task-selector" id="all-tasks" value="0">All Tasks
                </li>
                <li class="text-danger"><input type="radio" name="task-selector" id="new-tasks" value="1">New</li>
                <li class="text-warning"><input type="radio" name="task-selector" id="process-tasks" value="2">In
                    Process
                </li>
                <li class="text-success"><input type="radio" name="task-selector" id="finished-tasks"
                        value="3">Finished
                </li>

            </ul>
        </div>
    </div>


    <div class="row mt-5 d-flex justify-content-around">

        @foreach ($tasks as $task)
            <div class="col-8  col-md-5 bg-white d-flex flex-column align-items-center mt-5">
                <div class="container-fluid d-flex justify-content-between">
                    <h4>{{ $task->title }}</h4>
                    <ul class="dropdown">
                        <select
                            class="bg-light border-secondary task-status-change
                            {{ $task->status == 1 ? 'text-danger' : '' }} 
                            {{ $task->status == 2 ? 'text-warning' : '' }}
                            {{ $task->status == 3 ? 'text-success' : '' }}
                            text-center rounded"
                            style="all:unset;" data-taskid='{{ $task->id }}'>
                            <option class="text-danger" value="1" @if ($task->status == '1') selected @endif>New
                            </option>
                            <option class="text-warning" value="2" @if ($task->status == '2') selected @endif>In
                                Process </option>
                            <option class="text-success" value="3" @if ($task->status == '3') selected @endif>
                                Finished </option>

                        </select>

                    </ul>
                </div>
                <div class="container  d-flex flex-column align-items-center">
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

                    {{-- @dd($adminFirstName) --}}
                    <div class="d-flex flex-column align-items-end ">
                        <p class="text-secondary">Created
                            by{{ ' ' . $task->adminInfo->firstName . ' ' . $task->adminInfo->lastName }}</p>
                        <p class="text-secondary">Created at{{ ' ' . $task->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach()
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.task-status-change').change(function() {
                let taskId = $(this).data('taskid');
                let taskStatus = $(this).val();

                let data = [taskStatus, taskId];

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "{{ route('user.change.status') }}",
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
