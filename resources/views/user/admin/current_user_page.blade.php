@extends('layouts.app')
@section('content')


@foreach ($user->tasks as $task)
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
      
            <h4 class="text-primary" href="{{route('one.user.page', ['userId' => $task->userId])}}" >
                For {{ $user->firstName. ' ' . $user->lastName}}</h4>
        
        <p>{{ $task->description }}</p>
    </div>
    <div class="container-fluid d-flex justify-content-end">

        <p class="text-secondary">Created by{{ $task->adminInfo->firstName . ' ' . $task->adminInfo->lastName }}</p>

    </div>
</div>
@endforeach()
    
@endsection