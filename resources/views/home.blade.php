@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center p-0 mb-5">
            <div class="card-header text-uppercase align-items-center d-flex justify-content-between">
                <h6 class="m-0">Home</h6>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body py-5">
                    <div class="row justify-content-center mb-5">
                        <div class="col-12">
                            <h1 class="fw-bold">Benvenuto, il tuo ristorante {{ Auth::user()->name_restaurant }}</p>è stato registrato</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <p class="text-align-start text-secondary">Grazie per esserti registrato al nostro sito DeliveBoo, clicca su il bottone menu, per inserire, modificare e cancellare i tuoi piatti</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="card text-white col-4 card p-0">
                            <img src="{{asset('/storage') . '/' . Auth::user()->image_url}}" alt="{{Auth::user()->name_resturant}}" class="card-img">
                            <div class="card-img-overlay d-flex justify-content-center align-items-end">
                                <a class="text-decoration-none text-white fw-bold btn btn-dark" href="{{ route('admin.dishes.index') }}">Menu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
