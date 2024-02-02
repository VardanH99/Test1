@extends('layouts.app')
@section('content')
    
        
        @foreach ($users as $user)
        <div class="container">
            <a class="text-primary" href="{{ route('one.user.page', ['userId' => $user->id]) }}">
                {{ $user->firstName . ' ' . $user->lastName }}</a>
            </div>
        @endforeach
 
@endsection
