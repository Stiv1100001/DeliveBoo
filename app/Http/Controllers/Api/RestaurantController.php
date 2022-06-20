<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('types')->get();

        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::with('types')->findOrFail($id);

        return response()->json($user);
    }


    public function search(Request $request)
    {
        $data = $request->all();

        $typeIds = $data['types'];

        $users = User::whereHas('types', function ($q) use ($typeIds) {
            $q->whereIn('id', $typeIds);
        })->with('types')->get();

        return response()->json($users);
    }
}
