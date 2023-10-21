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
            'description' => 'required|numeric',
            'amount_range_start' => 'required|numeric',
            'amount_range_end' => 'required|numeric',
            'allowed_documents' => 'required'
        ]);

        if(!$validator->fails()){
            $creditType = new CreditType();
            $creditType->title = $request->title;
            $creditType->description = $request->description;
            $creditType->amount_range_start = $request->amount_range_start;
            $creditType->amount_range_end = $request->amount_range_end;
            $creditType->allowed_documents = $request->allowed_documents;
            $creditType->save();  

            return back();
        }

        return back()->with('errors', $validator->errors());
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
        return view('pages.credit-type.edit')->with(compact('creditType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CreditType $creditType)
    {
        $validator = Validator::make($request->except('_token'),[
            'title' => 'required',
            'description' => 'required',
            'amount_range_start' => 'required|numeric',
            'amount_range_end' => 'required|numeric',
            'allowed_documents' => 'required'
        ]);

        if(!$validator->fails()){
            $creditType->title = $request->title;
            $creditType->description = $request->description;
            $creditType->amount_range_start = $request->amount_range_start;
            $creditType->amount_range_end = $request->amount_range_end;
            $creditType->allowed_documents = $request->allowed_documents;
            $creditType->save(); 

            return back();
        }

        return back()->with('errors', $validator->errors());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditType $creditType)
    {
        //
    }
}
