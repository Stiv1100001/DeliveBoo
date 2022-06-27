@extends('layouts.app')

@section('content')
<div class="container justify-content-center align-items-center">
    <div class="row justify-content-center">

        <div class="col-md-6 card create-box">
            <form id="create-dish" class="rounded-3 p-3" action="{{ route('admin.dishes.store') }}" method="POST"
                enctype="multipart/form-data" id="form">
                @csrf

                <div class="alert alert-danger d-none" id="error">
                    <p id="error-message"></p>
                </div>


                <div class="col-12">
                    <h1 class="text-center fw-bold text-dark mb-5">Aggiungi un piatto</h1>

                    <div class="mb-3 group">
                        <input type="text" name="name" id="name" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="name">Inserisci nome piatto</label>

                        @error('name')
                        <div class="alert mt-2 alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label" value="{{ old('description') }}">Inserisci
                            descrizione piatto</label>
                        <textarea class=" form-control" name="description" id="description" rows="5"></textarea>
                        @error('description')
                        <div class="alert mt-2 alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Inserisci ingredienti piatto</label>
                        <textarea class="form-control" name="ingredients" id="ingredients"
                            rows="5">{{ old('ingredients') }}</textarea>
                        @error('ingredients')
                        <div class="alert mt-2 alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Inserisci prezzo piatto</label>
                        <input type="number" min="0.0" step="0.1" name="price" id="price" class="form-control">
                        @error('price')
                        <div class="alert mt-2 alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" name="availability" id="availability" value="1"
                            checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Disponibile
                        </label>
                    </div>
                </div>
            </form>
            <button type="" id="btn-submit-dish-create"
                class="px-3 btn btn-dark text-white rounded-pill mb-3">Aggiungi</button>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/validation.js') }}" defer></script>
@endsection
