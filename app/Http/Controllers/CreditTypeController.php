<?php

namespace App\Http\Controllers;

use App\Models\CreditType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreditTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditType = CreditType::get();
        return view('pages.credit-type.index')->with('types', $creditType);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.credit-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'title' => 'required',
            'description' => 'required',
            'amount_range_start' => ''
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditType $creditType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreditType $creditType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CreditType $creditType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditType $creditType)
    {
        //
    }
}
