<?php

namespace Jiri\Http\Controllers;

use Jiri\Jiri;
use Illuminate\Http\Request;

class JiriController extends Controller
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
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function show(Jiri $jiri)
    {
        $currentJiri = $jiri->load('students');
        return view('students.allStudents', ['currentJiri' => $currentJiri]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function edit(Jiri $jiries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jiri $jiries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jiri\Jiri  $jiries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jiri $jiries)
    {
        //
    }
}
