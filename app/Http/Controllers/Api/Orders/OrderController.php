<?php

namespace App\Http\Controllers\Api\Orders;

use App\Model\Dish;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request, Gateway $gateway )
    {
        $token = $gateway->clientToken()->generate();  //genera un token di autenticazione per il client
        $data =[
            'success' => true,
            'token' => $token,
        ];
        return response()->json($data, 200);
    }

    public function payments( OrderRequest $request, Gateway $gateway )
    {
        $dish = Dish::findOrFail($request->dish);       //recupero il singolo id del prodotto
        $result = $gateway->transaction()->sale([
            'amount' =>  $dish->price,        //prezzo del piatto
            'paymentMethodNonce' => $request->token /* $request->payment_method_nonce */,
            'options' => [
                'submitForSettlement' => true           // preso dalla documentazione di Braintree
            ],
            'customer' => [
                'firstName' => $dish->name,
            ],
        ]);
        if($result->success){
            $data =[
                'success' => true,
                'message' => 'Transazione eseguita',
                /* 'transaction' => $result->transaction, */
            ];
            return response()->json($data, 200);
        }else{
            $data =[
                'success' => false,
                'message' => 'Transazione fallita',
            ];
            return response()->json($data, 401);
        }
    }
}
