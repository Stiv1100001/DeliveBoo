<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendOrderMail;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $this->sendOrderMail($newOrder);
        

        return redirect()->route('api.order.show');
    }

    public function sendOrderMail(){ 
        // $newOrder = new Order();

        // $newOrder->name_customer = "Carmie"; 
        // $newOrder->address_customer= "Via Gallo"; 
        // $newOrder->phone_number_customer= "1234457"; 
        // $newOrder->total_price= "123"; 
        // $newOrder->data= "2022-03-12";



        // $newOrder->save();



        // Mail::to("delibeboo@spssc.it")->send(new SendOrderMail($newOrder));
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
