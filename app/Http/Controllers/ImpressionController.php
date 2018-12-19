<?php

namespace Jiri\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Jiri\Http\Requests\StoreImpression;
use Jiri\Impression;
use Illuminate\Http\Request;

class ImpressionController extends Controller
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
    public function store(StoreImpression $request)
    {
        session()->flash('message', 'La note d‘appréciation à bien été ajoutée');
        $validatedData = $request->all();
        Impression::create($validatedData);
        return \Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jiri\Impression  $impression
     * @return \Illuminate\Http\Response
     */
    public function show(Impression $impression)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jiri\Impression  $impression
     * @return \Illuminate\Http\Response
     */
    public function edit(Impression $impression)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jiri\Impression  $impression
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impression $impression)
    {
        session()->flash('message', 'La note d‘appréciation à bien été modifié');
        $impression->update($request->all());
        return \Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jiri\Impression  $impression
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impression $impression)
    {
        //
    }
}
