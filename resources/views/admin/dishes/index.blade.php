@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 py-2 edit-messsage">
            @if(session('message'))
            <div class="alert alert-success">
                <p>{{session('message')}}</p>
            </div>
            @endif
        </div>

        <div class="col-12 card text-center p-0 mb-5">
            <div class="card-header text-uppercase align-items-center d-flex justify-content-between">
                <h6 class="m-0">Menu</h6>
                <a href="{{route('admin.dishes.create')}}">
                    <button class="btn btn-warning fw-bold">Aggiungi piatto</button>
                </a>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">
                        @forelse ($dishes as $dish)
                        <div class="col">
                            <div class="card">
                                <div class="row g-0">
                                    {{-- <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div> --}}
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="{{route('admin.dishes.show', $dish)}}"
                                                class="card-title">{{$dish->name}}</a>
                                            <p class="card-text">{{$dish->description}}</p>
                                            <p class="card-text">{{$dish->price}} €</p>
                                            <p class="card-text"><small class="text-muted">{{$dish->created_at}}</small>
                                            </p>
                                            <div class="buttons d-flex justify-content-center">
                                                <a class="me-3" href="{{route('admin.dishes.edit', $dish)}}">
                                                    <button class="btn btn-primary">Modifica</button>
                                                </a>
                                                <form action="{{route('admin.dishes.destroy', $dish)}}" method="POST"
                                                    class="delete" dish-model="{{$dish->model}}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col">
                            <div class="card-body">
                                <p>Non ci sono piatti da mostrare.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <table class="table table-dark table-hover col-12">
        <thead>
            <tr>
                <th class="fw-bold text-primary fs-2">Nome</th>
                <th class="fw-bold text-primary fs-2">Descrizione</th>
                <th class="fw-bold text-primary fs-2">Ingredienti</th>
                <th class="fw-bold text-primary fs-2">Prezzo</th>
                <th class="text-center">
                    <a href="{{route('admin.dishes.create')}}">
                        <button class="btn btn-warning fw-bold">Aggiungi piatto</button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dishes as $dish)
            <tr>
                <th>
                    <a href="{{route('admin.dishes.show', $dish)}}">{{$dish->name}}</a>
                </th>
                <th>
                    {{$dish->description}}
                </th>
                <th>
                    {{$dish->ingredients}}
                </th>
                <th>
                    {{$dish->price}} €
                </th>
                <th class="d-flex justify-content-center">
                    <a class="me-2" href="{{route('admin.dishes.edit', $dish)}}">
                        <button class="btn btn-primary">Modifica</button>
                    </a>
                    <form action="{{route(" admin.dishes.destroy", $dish)}}" method="POST" class="delete"
                        dish-model="{{$dish->model}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </th>
            </tr>
            @empty
            <tr>
                <th colspan="3">Non ci sono piatti da mostrare</th>
            </tr>
            @endforelse
        </tbody>
    </table> --}}
</div>
</div>
@endsection
