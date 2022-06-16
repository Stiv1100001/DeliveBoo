<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dish;
use Illuminate\Support\Facades\Auth;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::orderby('name', 'ASC')->paginate(10);

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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
            'price' => 'numeric|min:0',
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


        return redirect()->route('admin.dishes.index', $newDish)->with('message', 'The new post ' . $newDish->name . ' was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', ['dish' => $dish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name'=> 'max:250',
            'price' => 'numeric|min:0',
            'description' => 'string',
            'ingredients' => 'string',
            // TODO 'availability' => 'boolean'
        ], [
            'required' => 'Il campo è obbligatorio',
            'numeric' => 'Il campo deve essere un numero',
            'string' => 'Il campo deve contenere del testo'
        ]);

        $data = $request->all();



        $dish->fill($data);

        $dish->save();

        return redirect()->route('admin.dishes.index', $dish)->with('message', 'Il piatto ' . $dish->name . ' è stato modificato correttamente');
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
        return redirect()->route("admin.dishes.index", $dish)->with('message', $dish->name . ' was deleted successfully');
    }
}
