<?php

namespace App\Http\Controllers;

use App\Guild;
use App\Member;
use App\Character;
use Illuminate\Http\Request;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $members = Member::with('characters')->orderBy('id')->where('guild_id','=',$id)->get();
        $characters = Character::all()->keyBy('id');

        return view('table',compact('members','characters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function edit(Guild $guild)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guild $guild)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guild  $guild
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guild $guild)
    {
        //
    }
}
