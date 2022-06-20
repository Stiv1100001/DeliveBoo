@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center p-0 mb-5">
            <div class="card-header text-uppercase align-items-center d-flex justify-content-between">
                <h6 class="m-0">Home</h6>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body py-4">
                    <div class="row justify-content-center mb-3">
                        <div class="col-12">
                            <img src="{{asset('storage/' . Auth::user()->image_url) }}"
                                alt="{{Auth::user()->name_resturant}}" class="rounded-circle border border-4 border-dark" id="user-img-home">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-6">
                            <h1 class="fw-bold">Benvenuto, il tuo ristorante {{ Auth::user()->name_restaurant }} è
                                stato registrato</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <em class="text-align-start text-secondary">Grazie per esserti registrato al nostro sito
                                DeliveBoo, clicca su il bottone menu, per inserire, modificare e cancellare i tuoi
                                piatti</em>
                        </div>
                        <div class="col-12 d-block">
                            <a class="text-decoration-none text-white fw-bold btn btn-dark mt-3"
                                    href="{{ route('admin.dishes.index') }}">Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
