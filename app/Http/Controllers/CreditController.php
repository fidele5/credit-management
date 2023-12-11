<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Credit;
use App\Models\CreditDocument;
use App\Models\CreditType;
use Carbon\Carbon;
use File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function folder($id)
    {
        $credit = Credit::find($id);
        return view("pages.credit.folder")->with(compact('credit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'), [
            'client_id' => 'required|numeric',
            'credit_type_id' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        if (!$validator->fails()) {
            $credit = new Credit();
            $credit->client_id = $request->client_id;
            $credit->credit_type_id = $request->credit_type_id;
            $credit->amount = $request->amount;

            $duration = 0;

            switch ($request->duration_unit) {
                case 'month':
                    $duration = $request->duration * 28;
                    break;
                case 'year':
                    $duration = $request->duration * 12 * 28;
                    break;

                default:
                    $duration = $request->duration;
                    break;
            }

            $credit->duration = $duration;
            $credit->duration_unit = $request->duration_unit;
            $credit->status = 0;
            $credit->save();

            return response()->json([
                'status' => 'success',
                'back' => 'credit',
            ]);
        }

        return response()->json([
            'errors' => $validator->errors(),
        ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Display the specified resource.
     */
    public function show(Credit $credit)
    {
        $documents = CreditDocument::where('credit_id', $credit->id)->get();

        $status = collect($documents)->filter(function ($document) {
            return $document->status == 0;
        });

        $ready = count($status) === 0;

        return view('pages.credit.show')->with(compact('ready', 'credit'));
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
        $validator = Validator::make($request->except('_token'), [
            'client_id' => 'required|numeric',
            'credit_type_id' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        if (!$validator->fails()) {
            $credit->client_id = $request->client_id;
            $credit->credit_type_id = $request->credit_type_id;
            $credit->amount = $request->amount;

            $duration = 0;

            switch ($request->duration_unit) {
                case 'month':
                    $duration = $request->duration * 28;
                    break;
                case 'year':
                    $duration = $request->duration * 12 * 28;
                    break;

                default:
                    $duration = $request->duration;
                    break;
            }

            $credit->duration = $duration;
            $credit->duration_unit = $request->duration_unit;
            $credit->status = 0;
            $credit->save();

            return response()->json([
                'status' => 'success',
                'back' => 'credit',
            ]);
        }

        return response()->json([
            'errors' => $validator->errors(),
        ], Response::HTTP_FORBIDDEN);
    }

    public function addFIles($id, Request $request): JsonResponse
    {
        $credit = Credit::find($id);

        $folderName = date('Y') . "-" . $credit->client->person->first_name[0] . "" . $credit->client->person->last_name[0] . "-CR-" . str_pad($credit->id, 4, '0', STR_PAD_LEFT);

        foreach ($request->repeater_list as $key => $value) {
            $creditDocument = new CreditDocument();
            $creditDocument->credit_id = $credit->id;
            $creditDocument->document_name = $value['document_name'];

            $filename = implode('_', explode(' ', strtolower($creditDocument->document_name))) . "." . $value['file']->getClientOriginalExtension();
            $path = $value['file']->storeAs($folderName, $filename);

            $creditDocument->file_path = $path;
            $creditDocument->created_by = Auth::user()->id;
            $creditDocument->save();

            $credit = Credit::find($creditDocument->credit_id);
            $credit->status = 1;
            $credit->save();
        }

        return response()->json([
            'status' => 'success',
            'back' => '../credit/' . $credit->id,
        ]);
    }

    public function downloadDocument($id)
    {
        $document = CreditDocument::find($id);
        return response()->download(Storage::path($document->file_path));
    }

    public function acceptDocument($id)
    {
        $document = CreditDocument::find($id);
        if ($document->status === 1) {
            $document->status = 0;
        } else {
            $document->status = 1;
        }
        $document->save();

        return response()->json([
            'status' => 'success',
            'back' => '',
        ]);
    }

    public function destroyDocument($id)
    {
        $document = CreditDocument::find($id);
        $document->deleted_by = Auth::user()->id;
        $document->save();

        $document->delete();

        return back();
    }

    public function acceptCredit($id, Request $request)
    {
        $validator = Validator::make($request->except('_token', '_method'),
            [
                'start_date' => 'required|date',
            ]);

        if (!$validator->fails()) {
            $credit = Credit::find($id);
            $credit->start_date = Carbon::parse($request->start_date)->toDateString();
            $endDate = Carbon::parse($credit->start_date)->addDays($credit->duration);
            $credit->end_date = $endDate->toDateString();
            $credit->accepted_at = now();
            $credit->status = 2;
            $credit->accepted_by = Auth::user()->id;
            $credit->save();

            return response()->json([
                'status' => 'success',
                'back' => '',
            ]);
        }

        return response()->json([
            'errors' => $validator->errors(),
        ], Response::HTTP_FORBIDDEN);
    }

    public function zipFolder($id)
    {
        $credit = Credit::find($id);

        $folderName = date('Y') . "-" . $credit->client->person->first_name[0] . "" . $credit->client->person->last_name[0] . "-CR-" . str_pad($credit->id, 4, '0', STR_PAD_LEFT);

        $zip = new \ZipArchive();

        $storagePath = storage_path("app/" . $folderName);

        $zipName = storage_path("app/zip/" . $folderName . '.zip');

        if (!Storage::directoryExists('zip')) {
            Storage::makeDirectory('zip');
        }

        if ($zip->open($zipName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) == true) {
            //Get all the files in the directory
            $files = File::files($storagePath);

            //Compress the file to and add to the zip file.
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            //Close the zip file
            $zip->close();

            //Return a URL to to download
            return Storage::download("zip/{$folderName}.zip");
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        $credit->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
