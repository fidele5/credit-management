<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Credit;
use App\Models\CreditType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $credits = Credit::with('client')->get();
        return view('pages.credit.index')->with('credits', $credits);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::with('person')->get();
        $creditTypes = CreditType::get();

        return view('pages.credit.create')->with(compact('clients', 'creditTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'client_id' => 'required|numeric',
            'credit_type_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'duration' => 'required|numeric',
            'duration_unit' => 'required'
        ]);

        if(!$validator->fails()){
            $credit = new Credit();
            $credit->client_id = $request->client_id;
            $credit->credit_type_id = $request->credit_type_id;
            $credit->amount = $request->amount;

            $duration = 0;

            switch ($request->duration_unit) {
                case 'month':
                    $duration  = $request->duration * 28;
                    break;
                case 'year': 
                    $duration = $request->duration * 12 * 28;
                    break;
                
                default:
                    $duration = $request->duration;
                    break;
            }

            $credit->duration = $duration;
            $credit->status = 0;
            $credit->save();

            return response()->json([
                'status' => 'success',
                'back' => 'credit'
            ]);
        }

        return response()->json([
            'errors' => $validator->errors()
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Display the specified resource.
     */
    public function show(Credit $credit)
    {
        return view('pages.credit.show')->with('credit', $credit);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credit $credit)
    {
        $clients = Client::with('person')->get();
        $creditTypes = CreditType::get();

        return view('pages.credit.edit')->with(compact('credit', 'clients', 'creditTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credit $credit)
    {
        $validator = Validator::make($request->except('_token'),[
            'client_id' => 'required|numeric',
            'credit_type_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'duration' => 'required|numeric',
            'duration_unit' => 'required'
        ]);

        if(!$validator->fails()){
            $credit->client_id = $request->client_id;
            $credit->credit_type_id = $request->credit_type_id;
            $credit->amount = $request->amount;

            $duration = 0;

            switch ($request->duration_unit) {
                case 'month':
                    $duration  = $request->duration * 28;
                    break;
                case 'year': 
                    $duration = $request->duration * 12 * 28;
                    break;
                
                default:
                    $duration = $request->duration;
                    break;
            }

            $credit->duration = $duration;
            $credit->status = 0;
            $credit->save();

            return response()->json([
                'status' => 'success',
                'back' => 'credit'
            ]);
        }

        return response()->json([
            'errors' => $validator->errors()
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        $credit->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
