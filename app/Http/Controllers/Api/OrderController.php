<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Model\Dish;

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
    //  * @return \Illuminate\Http\Response
     */


    public function generateToken(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            "success" => true,
            "token" => $token,
        ];

        return response()->json($data, 200);
    }


    public function makeOrderPayment(Request $request, Gateway $gateway)
    {
        $data = $request->all();

        $request->validate(
            [
                "name_customer" => 'required|string',
                "address_customer" => 'required|string',
                "phone_number_customer" => 'required',
                "email" => 'required|email',
                "nonce" => 'required',
                "order" => 'array',
            ],
            [
                "required" => 'Il campo è obbligatorio',
                "string" => "il campo deve contenere testo",
                "numeric" => 'Il campo deve essere numerico',
            ]
        );

        // Calcolo amount
        $amount = 0;

        foreach ($data['order'] as $item) {
            $dish = Dish::find($item['id']);

            $amount += $dish->price * $item['quantity'];
        }

        // Pago
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $request->nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $response = [
            "success" => null,
            "messsage" => null
        ];

        if ($result->success) {
            $newOrder = new Order();

            $newOrder->fill($data);
            $newOrder->total_price = $amount;

            $newOrder->save();

            foreach ($data['order'] as $item) {
                $newOrder->dish()->attach($item['id'], ['quantity' => $item['quantity']]);
            }

            $response['success'] = true;
            $response['messsage'] = "Transazione eseguita correttamente";
            return response()->json($response, 200);
        } else {
            $response['success'] = false;
            $response['messsage'] = $result;

            return response()->json($response, 401);
        }
    }
}
