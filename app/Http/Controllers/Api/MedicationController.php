<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationRequest;
use App\Http\Requests\UpdateMedicationRequest;
use App\Models\Medication;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $skip = $request->query('skip', 0);
            $limit = $request->query('limit', 10);

            $medications = Medication::withTrashed()
                ->skip($skip)
                ->take($limit)
                ->get();
                
            return response()->json([
                'status' => true,
                'medications' => $medications
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while fetching medications.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicationRequest $request)
    {
        try{
            $medication = Medication::create($request->all());
            return response()->json([
                'status' => true,
                'message' => "Medication Created successfully!",
                'medication' => $medication
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create medication.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function show(Medication $medication)
    {
        try{
            return response()->json([
                'status' => true,
                '$medication' => $medication
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to get $medication.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function edit(Medication $medication)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicationRequest $request, Medication $medication)
    {
        try{
            $medication->update($request->all());
            return response()->json([
                'status' => true,
                'message' => "Medication Updated successfully!",
                'medication' => $medication
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update medication.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medication $medication)
    {
        try{
            $medication->delete();
            return response()->json([
                'status' => true,
                'message' => "Medication Deleted successfully!",
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete medication.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function remove(Medication $medication)
    {
        try{
            $medication = Medication::withTrashed()->findOrFail($medication->id);
            $medication->forceDelete();
            return response()->json([
                'status' => true,
                'message' => "Medication permanently deleted successfully!",
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete medication permanently.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
