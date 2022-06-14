<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);

        // ! return view()...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

        $newOrder = new Order();

        $newOrder->fill($data);

        $newOrder->save();

        $newOrder->dish()->attach($data['dishes']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        // ! return view('', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        // ! return ...
    }
}
