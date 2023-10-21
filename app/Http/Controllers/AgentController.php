<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::with(['person', 'agent_position'])->get();
        return view('pages.agent.index')->with(compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->except('_token'), [
            'title' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        if (!$validation->fails()){

            $agent = new Agent() ;
            $agent->title = $request->title;

            $agent->person()->create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'place_of_birth' => $request->place_of_birth,
                'email' =>  $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address
            ]);

            $agent->save();

            return response()->json('success');
        }

        return response()->json('error', $validation->errors());
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
