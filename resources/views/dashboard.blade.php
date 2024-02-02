@extends('layouts.app')
@section('content')

<h1 class="text-success">{{Auth::user()->role == 'admin' ? 'Admin' : 'User'}} dashboard</h1>

    
@endsection