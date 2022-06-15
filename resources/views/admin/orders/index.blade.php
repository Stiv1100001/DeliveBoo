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