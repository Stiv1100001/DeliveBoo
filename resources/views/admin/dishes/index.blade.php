@extends('layouts.app')

@section('content')
<div class="container align-items-center justify-content-center">
    <div class="row justify-content-center">
        <div class="col-12 py-2 edit-messsage">
            @if(session('message'))
            <div class="alert alert-success">
                <p>{{session('message')}}</p>
            </div>
            @endif
        </div>

        <div class="col-8 card text-center p-0 mb-5">
            <div class="card-header text-uppercase align-items-center d-flex justify-content-between">
                <h6 class="m-0">Menu</h6>
                <a href="{{route('admin.dishes.create')}}">
                    <button class="btn btn-warning">Aggiungi piatto</button>
                </a>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">
                        @forelse ($dishes as $dish)
                        <div class="col">
                            <div class="card">

                                <div class="card-body text-start">
                                    <a href="{{route('admin.dishes.show', $dish)}}"
                                        class="card-title">{{$dish->name}}</a>
                                    <p class="card-text">{{Str::limit($dish->description, 20, '...')}}</p>
                                    <p class="card-text">{{$dish->price}} €</p>
                                    <p class="card-text">Disponibile: {{$dish->availability ? 'Sì' : 'No'}}</p>
                                    <p class="card-text"><small class="text-muted">{{$dish->created_at}}</small>
                                    </p>
                                    <div class="buttons d-flex justify-content-center">
                                        <a class="me-3" href="{{route('admin.dishes.edit', $dish)}}">
                                            <button class="btn btn-primary">Modifica</button>
                                        </a>
                                        <form action="{{route('admin.dishes.destroy', $dish)}}" method="POST"
                                            class="delete" dish-model="{{$dish->id}}" dish-name="{{ $dish->name}}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col w-100">
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <p>Non ci sono piatti da mostrare.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let currentForm = null;

   document.querySelectorAll('.delete').forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault()

        currentForm = form;
        Swal.fire({
            title: 'Eliminazione',
            text: 'Sei sicuro di voler continuare? Il piatto verrà eliminato definitivamente',
            icon: 'warning',
            confirmButtonText: 'Prosegui',
            showCancelButton: true,
            cancelButtonText: 'Annulla'
        }).then((result) => {

            if (result.isConfirmed) {
                currentForm.submit()
            } else if (result.isCancelled) {
                currentForm = null;
                console.log(currentForm)
            }
        })
   })
})


</script>

@endsection
