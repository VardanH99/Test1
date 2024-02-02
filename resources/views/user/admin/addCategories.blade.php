@extends('layouts.app')
@section('content')
 
    <h2 class="text-success">categories</h2>

    <div class="container d-flex flex-column">
        <form class="form-group" action="{{route('admin.create.category')}}" method="POST">
            @csrf
            <div class="container d-flex flex-column">

                <input type="text" name="name" placeholder="Add Category">

                @php
                    $defCount = '-';
                @endphp
                <select name="parentCategory">
                    <option value="">Root category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @if ($category->subCategories)
                            @include('user.admin.subcat', [
                                'category' => $category,
                                'defCount' => $defCount,
                            ])
                        @endif
                    @endforeach


                </select>



                <button type="submit" class="btn btn-success mt-5">Add category</button>
            </div>

        </form>
    </div>
@endsection









{{-- <li class="nav-item   dropend">
                            <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">categori 1</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">subcategori 1.1</a>
                                    <a class="dropdown-item text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">subcategori 1.2</a>
                                </li>
                            </ul>
                        </li>

                       <li class="nav-item   dropend">
                            <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">categori 2</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">subcategori 2.1</a>
                                    <a class="dropdown-item text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">subcategori 2.2</a>
                                </li>
                            </ul>
                        </li>

                       <li class="nav-item   dropend">
                            <a class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">categori 3</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">subcategori 3.1</a>
                                    <a class="dropdown-item text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">subcategori 3.2</a>
                                </li>
                            </ul>
                        </li> --}}
