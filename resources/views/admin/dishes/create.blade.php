@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center fw-bold text-dark mb-5">Add a new dish</h1>
            </div>

            <div class="col-6">
                <form class="border border-3 border-primary rounded p-3 bg-info" action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Enter the name of the new dish</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Enter the description of the dish</label>
                        <input type="text" name="description" id="description" class="form-control">
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Enter the ingredients of the dish</label>
                        <input type="text" name="ingredients" id="ingredients" class="form-control">
                        @error('ingredients')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Enter the price of the dish</label>
                        <input type="text" name="price" id="price" class="form-control">
                        @error('price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" name="availability" id="availability" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Visibile 
                        </label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" name="availability" id="availability" value="0">
                        <label class="form-check-label" for="availability">
                            Non visibile
                        </label>
                    </div>

                    <button type="submit" class="btn btn-dark text-white">Public</button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
    
