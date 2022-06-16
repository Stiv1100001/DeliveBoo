@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 card create-box">
                <form class="rounded p-3" action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <h1 class="text-center fw-bold text-dark mb-5">Aggiungi un piatto</h1>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Inserisci nome piatto</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Inserisci descrizione piatto</label>
                        <input type="text" name="description" id="description" class="form-control">
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Inserisci ingredienti piatto</label>
                        <input type="text" name="description" id="description" class="form-control">
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Inserisci prezzo piatto</label>
                        <input type="text" name="ingredients" id="ingredients" class="form-control">
                        @error('ingredients')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-3">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Disponibilità</label>
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    </div>

                    <button type="submit" class="px-3 btn btn-dark text-white rounded-pill">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection

