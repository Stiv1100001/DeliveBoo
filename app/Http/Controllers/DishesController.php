<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dish;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::paginate(10);

        return view('', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:250',
            'price' => 'numeric',
            'description' => 'string',
            'ingredients' => 'string',
            // TODO check 'availability' control
        ], [
            'required' => 'Il campo è obbligatorio',
            'price' => 'Il campo deve essere un numero',
            'string' => 'Il campo deve contenere del testo'
        ]);

        $data = $request->all();

        $newDish = new Dish();

        $newDish->fill($data);
        $newDish->user_id = Auth::user()->id;

        $newDish->save();

        return view('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('');
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
        $request->validate([
            'name'=> 'max:250',
            'price' => 'numeric',
            'description' => 'string',
            'ingredients' => 'string',
            // TODO 'availability' => 'boolean'
        ], [
            'required' => 'Il campo è obbligatorio',
            'price' => 'Il campo deve essere un numero',
            'string' => 'Il campo deve contenere del testo'
        ]);

        $data = $request->all();

        $dish = Dish::findOrFail($id);

        $dish->fill($data);

        $dish->save();

        return view('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return view('');
    }
}
