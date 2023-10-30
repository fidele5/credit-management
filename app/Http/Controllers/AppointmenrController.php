<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AppointmenrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::where('agent_id', 1)->get();
        return view('pages.appointments.index')->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        $client = null;
        $states = AppointmentStatus::get();
        if (request()->query('client')) {
            $client = Client::find(request()->query('client'));
        }

        return view('pages.appointments.create')->with(compact('clients', 'client', 'states'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'client_id' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required|numeric'
        ]);

        if(!$validator->fails()){
            $startTime = Carbon::parse($request->start_date)->toDateTimeString();
            $endTime = Carbon::parse($request->end_date)->toDateTimeString();

            $appointment = new Appointment();
            $appointment->client_id = $request->client_id;
            $appointment->start_time = $startTime;
            $appointment->end_time = $endTime;
            $appointment->object = $request->subject;
            $appointment->status = $request->status;
            $appointment->agent_id = 1;
            $appointment->save();

            return response()->json([
                'status' => 'success',
                'back' => '../appointment'
            ]);
        }

        return response()->json($validator->errors(), Response::HTTP_FORBIDDEN);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $clients = Client::get();
        $states = AppointmentStatus::get();
        return view('pages.appointments.edit')->with(compact('appointment', 'clients', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validator = Validator::make($request->except('_token'),[
            'client_id' => 'required|numeric',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|numeric'
        ]);

        if(!$validator->fails()){
            $startTime = Carbon::parse($request->start_time)->toDateTimeString();
            $endTime = Carbon::parse($request->end_time)->toDateTimeString();

            $appointment->client_id = $request->client_id;
            $appointment->start_time = $startTime;
            $appointment->end_time = $endTime;
            $appointment->object = $request->subject;
            $appointment->status = $request->status;
            $appointment->agent_id = 1;
            $appointment->save();

            return response()->json([
                'status' => 'success',
                'back' => '../../appointment'
            ]);
        }

        return response()->json($validator->errors(), Response::HTTP_FORBIDDEN);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
