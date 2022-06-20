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

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        <p>ciao</p>
                    </div>
                    <div class="modal-footer">
                        <button id="closeConfirm" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Chiudi</button>
                        <button id="deleteConfirm" type="button" class="btn btn-danger">Elimina</button>
                    </div>
                </div>
            </div>
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
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script defer>
    const modal = document.getElementById('deleteModal');   // HTML Modal

    let deleteModal = new bootstrap.Modal(modal)            // Bootstrap Modal via JS
    let currentForm = null;                                 // Current selected delete form

    /* Empty currentForm on close button and outside click */
    modal.addEventListener('hide.bs.modal', () => {
        currentForm = null;
    })

    document.getElementById('closeConfirm').addEventListener('click', () =>{
        currentForm = null;
    })

    /*  Submit */
    document.getElementById('deleteConfirm').addEventListener('click', () => {
        currentForm.submit();
    })

    /* Show modal on submit */
    const forms = document.getElementsByClassName('delete');

    if (forms.length) {
        for (form of forms) {
            form.addEventListener('submit', event => {
                event.preventDefault();

                document.getElementById('modalTitle').innerText = `Eliminare ${form.getAttribute("dish-name")}?`;
                document.getElementById('modalBody').innerText = `Sei sicuro di voler eliminare ${form.getAttribute("dish-name")}?`;

                currentForm = form;

                deleteModal.show();
            })
        }
    }

</script>
@endsection
