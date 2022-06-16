@extends('layouts.app')

@section('content')

{{-- <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$dish->name}}</h5>
                <p class="card-text">{{$dish->description}}</p>
                <p class="card-text">{{$dish->ingredients}}</p>
                <p class="card-text"><small class="text-muted">{{$dish->created_at}}</small></p>
            </div>
        </div>
    </div>
</div> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-4 py-2 bg-dark text-white">
                <h1 class="card-title fw-bold text-center mb-3">{{$dish->name}}</h1>
                <div class="card-body">
                    <p class="card-text">Descrizione: {{$dish->description}}</p>
                    <p class="card-text">ingredienti: {{$dish->ingredients}}</p>
                    <p class="card-text">Prezzo: {{$dish->price}}</p>
                    <p class="card-text">Creato il: {{$dish->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
