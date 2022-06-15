@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-4 py-2 bg-dark text-white">
                <h1 class="card-title fw-bold text-center mb-3">{{$dish->name}}</h1>
                <div class="card-body">
                    <p class="card-text">Description: {{$dish->description}}</p>
                    <p class="card-text">ingredients: {{$dish->ingredients}}</p>
                    <p class="card-text">Price: {{$dish->price}}</p>
                    <p class="card-text">Created: {{$dish->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection