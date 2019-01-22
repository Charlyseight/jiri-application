<?php

namespace Jiri\Http\Controllers;

use Jiri\Implement;
use Illuminate\Http\Request;
use Jiri\Jiri;

class ImplementController extends Controller
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
     * @param  \Jiri\Implement  $implement
     * @return \Illuminate\Http\Response
     */
    public function show(Implement $implement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jiri\Implement  $implement
     * @return \Illuminate\Http\Response
     */
    public function edit(Implement $implement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jiri\Implement  $implement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Implement $implement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jiri\Implement  $implement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Implement $implement, Request $request)
    {
        $jiri = Jiri::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
        foreach($request['projectsInImplement'] as $oneProjectInChart){
            $implementsForDelete = Implement::where('jiri_id', $jiri->id)
                ->where('student_id', $oneProjectInChart['student'])
                ->where('project_id', $oneProjectInChart['project'])->first();
            $implementsForDelete->delete();
        }
    }

    public function deleteImplementations(Implement $implement, Request $request){
        foreach($request['projectsInImplement'] as $oneProjectInChart){
            $implementsForDelete = Implement::where('jiri_id', $request['jiri_id'])
                ->where('student_id', $oneProjectInChart['student'])
                ->where('project_id', $oneProjectInChart['project'])->first();
            $implementsForDelete->delete();
        }
    }
}
