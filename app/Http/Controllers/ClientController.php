<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('person', 'credits')->get();

        return view('pages.client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required'
        ]);

        if(!$validator->fails()){
            $person = new Person();
            $person->first_name = $request->first_name;
            $person->last_name = $request->last_name;
            $person->address = $request->address;
            $person->phone_number = $request->phone_number;
            $person->email = $request->email;
            $person->place_of_birth = $request->place_of_birth;
            $person->date_of_birth = Carbon::parse($request->date_of_birth)->toDateString();
            $person->save();

            if($person){
                $client = new Client();
                $client->person_id = $person->id;
                $client->other_id = $request->other_id;
                $client->save();

                return response()->json([
                    'status' => 'success',
                    'back' => 'client'
                ]);
            }
        }

        return response()->json([
            'errors' => $validator->errors()
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('pages.client.edit')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->except('_token'),[
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required'
        ]);

        if(!$validator->fails()){
            $person = Person::find($client->person_id);
            $person->first_name = $request->first_name;
            $person->last_name = $request->last_name;
            $person->address = $request->address;
            $person->phone_number = $request->phone_number;
            $person->email = $request->email;
            $person->place_of_birth = $request->place_of_birth;
            $person->date_of_birth = Carbon::parse($request->date_of_birth)->toDateString();
            $person->save();

            if($person){
                $client->other_id = $request->other_id;
                $client->save();

                return response()->json([
                    'status' => 'success',
                    'back' => '../client'
                ]);
            }
        }

        return response()->json([
            'errors' => $validator->errors()
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->person->delete();
        $client->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
