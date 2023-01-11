<?php

namespace App\Http\Controllers;

use App\Models\CarLog;
use Illuminate\Http\Request;

class CarLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carLog = CarLog::latest()->paginate(10);
        $i=0;

        return view('CarLog.carlog', compact('carLog', 'i'));
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
     * @param  \App\Models\CarLog  $carLog
     * @return \Illuminate\Http\Response
     */
    public function show(CarLog $carLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarLog  $carLog
     * @return \Illuminate\Http\Response
     */
    public function edit(CarLog $carLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarLog  $carLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarLog $carLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarLog  $carLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarLog $carLog)
    {
        //
    }
}
