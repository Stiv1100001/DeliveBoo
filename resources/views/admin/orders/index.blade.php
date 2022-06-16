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

        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-stepper" >
                            <div class="card-body p-4">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <span class="lead fw-normal">L'ordine è stato consegnato</span>
                                        <span class="text-muted small">da *** 14-06-2022</span>
                                        <p>Nome cliente:</p>
                                    </div>
                                <div>
                                <button class="btn btn-outline-primary" type="button">Traccia la consegna</button>
                            </div>
                        </div>
                        <hr class="my-4">

                        <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                            <span class="dot"></span>
                            <hr class="flex-fill track-line"><span class="dot"></span>
                            <hr class="flex-fill track-line"><span class="dot"></span>
                            <hr class="flex-fill track-line"><span class="dot"></span>
                            <hr class="flex-fill track-line">
                            <span class="d-flex justify-content-center align-items-center big-dot dot">
                                <i class="fa fa-check text-white"></i>
                            </span>
                        </div>

                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <span>14 Giu</span>
                                <span>Ordine ricevuto</span>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <span>14 Giu</span><span>Order
                            placed</span></div>
                        <div class="d-flex flex-column justify-content-center align-items-center"><span>14 Giu</span>
                            <span>In preparazione</span></div>
                        <div class="d-flex flex-column align-items-center"><span>14 Giu</span><span>In consegna</span></div>
                        <div class="d-flex flex-column align-items-end"><span>14 Giu</span><span>Consegnato</span></div>
                        </div>

                        </div>
                        </div>
                </div>
                </div>
            </div>
            </section>

            <table class="table table-dark table-hover col-12">
                <thead>
                    <tr>
                        <th class="fw-bold text-primary fs-2">Nome cliente</th>
                        <th class="fw-bold text-primary fs-2">Indirizzo</th>
                        <th class="fw-bold text-primary fs-2">Numero di telefono del cliente</th>
                        <th class="fw-bold text-primary fs-2">Costo totale</th>
                        <th class="fw-bold text-primary fs-2">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <th>
                                {{$order->name_customer}}
                            </th>
                            <th>
                                {{$order->address_customer}}
                            </th>
                            <th>
                                {{$order->phone_number_customer}}
                            </th>
                            <th>
                                {{$order->total_price}} €
                            </th>
                            <th>
                                {{$order->data}}
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="3">Nessun ordine presente</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
