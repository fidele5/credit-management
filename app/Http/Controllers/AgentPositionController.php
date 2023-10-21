<?php

namespace App\Http\Controllers;

use App\Models\AgentPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent_positions = AgentPosition::get();
        return view('pages.agent-position.index')->with(compact('agent_positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.agent-position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->except('_token'), [
            'description' => 'required'
        ]);
        if (!$validation->fails()){
           $agent_position = new AgentPosition();
           $agent_position->description = $request->description;
           $agent_position->save();
           return response()->json('success');
        }

        return response()->json('error', $validation->errors());
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentPosition $agentPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentPosition $agentPosition)
    {
        return view('pages.agent-position.edit')->with(compact('agentPosition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgentPosition $agentPosition)
    {
        $validation = Validator::make($request->except('_token'), [
            'description' => 'required'
        ]);
        if (!$validation->fails()){
            $agentPosition->description = $request->description;
            $agentPosition->save();
            return response()->json('success');
        }

        return response()->json('error', $validation->errors());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentPosition $agentPosition)
    {
        //
    }
}
