<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentPosition;
use App\Models\Person;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $position = AgentPosition::all();
        return view('pages.agent.create')->with('positions', $position);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->except('_token'), [
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'agent_position_id' => 'required'
        ]);

        if (!$validation->fails())
        {
            $person = new Person();
            $person->first_name = $request->first_name;
            $person->last_name = $request->last_name;
            $person->date_of_birth = Carbon::parse($request->date_of_birth)->toDateString();
            $person->place_of_birth = $request->place_of_birth;
            $person->email = $request->email;
            $person->phone_number = $request->phone_number;
            $person->address = $request->address;
            $person->save();

            if($person)
            {
                $user = User::create([
                    'person_id' => $person->id,
                    'name' => $person->first_name,
                    'email' => $person->email,
                    'password' => Hash::make('1234'),
                ]);

                $agent = new Agent();
                $agent->person_id = $person->id;
                $agent->agent_position_id = $request->agent_position_id;
                $agent->user_id = $user->id;
                $agent->created_by = Auth::user()->id;
                $agent->title = $request->title;
                $agent->save();
            }

            return response()->json([
                'status' => 'success',
                'back' => 'agent'
            ]);
        }

        return response()->json([
            'error' => $validation->errors()
        ], 403);
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
        $positions = AgentPosition::all();
        return view('pages.agent.edit')->with([
            'agent' => $agent,
            'positions' => $positions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        $validation = Validator::make($request->except('_token'), [
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'agent_position_id' => 'required'
        ]);

        if (!$validation->fails())
        {
            $person = Person::find($agent->person_id);
            $person->first_name = $request->first_name;
            $person->last_name = $request->last_name;
            $person->date_of_birth = Carbon::parse($request->date_of_birth)->toDateString();
            $person->place_of_birth = $request->place_of_birth;
            $person->email = $request->email;
            $person->phone_number = $request->phone_number;
            $person->address = $request->address;
            $person->save();

            if($person)
            {
                $agent->person_id = $person->id;
                $agent->agent_position_id = $request->agent_position_id;
                $agent->title = $request->title;
                $agent->save();
            }

            return response()->json([
                'status' => 'success',
                'back' => 'agent'
            ]);
        }

        return response()->json([
            'error' => $validation->errors()
        ], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
