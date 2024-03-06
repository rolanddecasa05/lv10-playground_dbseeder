<?php

namespace App\Http\Controllers\Playground;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pgmodules\Services\Playground;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Playground $playground)
    {
       // return (new Playground(currency: 'USD'))->charge(ammount:300);
       return $playground->charge(ammount:600);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
