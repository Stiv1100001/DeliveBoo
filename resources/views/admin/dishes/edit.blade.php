@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center fw-bold text-dark mb-5">Modify your dish</h1>
            </div>
            <div class="col-6">
                <form class="border border-3 border-primary rounded p-3 bg-info" action="{{route('admin.dishes.update', $dish)}}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label for="name" class="form-label">Edit the name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$dish->name}}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Edit the description</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$dish->description}}">
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    
                    <div class="mb-3">
                        <label for="ingredients" class="form-label">Edit the ingredients</label>
                        <input type="text" name="ingredients" id="ingredients" class="form-control" value="{{$dish->ingredients}}">
                        @error('ingredients')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    
                    <div class="mb-3">
                        <label for="price" class="form-label">Edit the price</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{$dish->price}}">
                        @error('price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark text-white">Send Edit</button>

                </form> 
            </div>
        </div>
    </div>
@endsection
    