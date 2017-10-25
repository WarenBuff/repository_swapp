<?php

namespace App\Http\Controllers;

use App\Squad;
use App\Member;
use Illuminate\Http\Request;

class SquadController extends Controller
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
     * @param  \App\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $squad_req = Squad::with('characters')->findOrFail($request->id);
        $characters = $squad_req -> characters ->keyBy('id');
        $members = Member::with('characters')->orderBy('id')->get();

        return view('table',compact('members','characters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function edit(Squad $squad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Squad $squad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Squad $squad)
    {
        //
    }
}
