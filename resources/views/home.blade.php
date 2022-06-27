@extends('layouts.app')

@section('content')
<div class="w-100" id="background-home-admin">
    <div class="w-100 h-100 my-opacity d-flex justify-content-center align-items-center">
        <div class="container abril-fatface-font">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="fw-bold  welcome text-white mb-5">Benvenuto, il tuo ristorante {{
                        Auth::user()->name_restaurant }} è
                        stato registrato</h1>
                </div>
                <div class="col-12 text-center">
                    <a class="text-decoration-none fw-bold btn btn-outline-light border border-2 border-light rounded fs-2"
                        href="{{ route('admin.dishes.index') }}">Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
