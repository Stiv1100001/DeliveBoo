@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center fw-bold text-dark mb-5">Modifica il tuo piatto</h1>
        </div>
        <div class="col-6">
            <form class="border border-3 border-primary rounded p-3 bg-info"
                action="{{route('admin.dishes.update', $dish)}}" method="POST" id="form">
                @csrf
                @method('PUT')

                <div class="alert alert-danger d-none" id="error">
                    <p id="error-message"></p>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">Modifica il nome del piatto</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$dish->name}}">
                    @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Modifica la descrizione del piatto</label>
                    <input type="text" name="description" id="description" class="form-control"
                        value="{{$dish->description}}">
                    @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="ingredients" class="form-label">Modifica gli ingredienti del piatto</label>
                    <input type="text" name="ingredients" id="ingredients" class="form-control"
                        value="{{$dish->ingredients}}">
                    @error('ingredients')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="price" class="form-label">Modifica Il prezzo del piatto</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{$dish->price}}">
                    @error('price')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="availability" id="availability" value="1"
                        {{$dish->availability == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="exampleRadios1">
                        Piatto disponibile
                    </label>
                </div>
                {{-- <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="availability" id="availability" value="0"
                        {{$dish->availability == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="availability">
                        Piatto non disponibile
                    </label>
                </div> --}}

                <button id="btn-submit-dish-edit" class="btn btn-dark text-white">Invia</button>

            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/validation.js') }}" defer></script>
@endsection
