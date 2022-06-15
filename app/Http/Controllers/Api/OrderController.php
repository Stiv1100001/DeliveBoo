<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "name_customer" => 'required|string',
                "address_customer" => 'required|string',
                "phone_number_customer" => 'required',
                "total_price" => 'required|numeric',
                "data" => 'required|date'
            ],
            [
                "required" => 'Il campo è obbligatorio',
                "string" => "il campo deve contenere testo",
                "numeric" => 'Il campo deve essere numerico',
                "date" => 'IL campo deve essere una data'
            ]
        );

        // ! Payment

        $newOrder = new Order();

        $newOrder->fill($data);

        $newOrder->save();

        $newOrder->dish()->attach($data['dishes']);

        // ! Mail

        return redirect()->route('api.order.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO Pagina di conferma
    }
}
