<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Player;
use Faker\Guesser\Name;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = Player::all();

        return response()->json($player);
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
        request()->validate([
            "name" => "required",
            "number" => "required|unique:players|min:2",
        ]);

        $players = Player::create([
            "name" => $request->name,
            "number" => $request->number
        ]);

        $file = $request->file('photo');

        $imgName = rand().'.'.$file->getClientOriginalExtension();

        $players->photo = $imgName;
        
        $file->move('img', $imgName);

        $players->save();

        return response()->json($players);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $players = Player::find($id);

        return response()->json($players);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $players = Player::find($id);

        return response()->json($players);
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
        request()->validate([
            "name" => "required",
            "number" => "required|numeric|min:2"
        ]);

        $players = Player::find($id)->update([
            "name" => $request->name,
            "number" => $request->number
        ]);

        return response()->json($players);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $players = Player::find($id)->delete();

        return response()->json($players);
    }

    // show the specified resource from search

    public function search($name)
    {
        $players = Player::where('name', 'like', '%'.$name.'%')->get();

        return response()->json($players);
    }
}
