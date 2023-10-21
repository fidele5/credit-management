<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Person;
use Carbon\Carbon;
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

        if (!$validation->fails())
        {
            $person = new Person();
            $person->first_name = $request->first_name;
            $person->middle_name = $request->middle_name;
            $person->last_name = $request->last_name;
            $person->date_of_birth = Carbon::parse($request->date_of_birth)->toDateString();
            $person->place_of_birth = $request->place_of_birth;
            $person->email = $request->email;
            $person->phone_number = $request->phone_number;
            $person->address = $request->address;
            $person->save();

            if($person)
            {
                $agent = new Agent();
                $agent->person_id = $person->id;
                $agent->title = $request->title;
                $agent->save();
            }

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
