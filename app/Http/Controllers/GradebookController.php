<?php

namespace App\Http\Controllers;

use App\Models\Gradebook;
use App\Models\User;
use Illuminate\Http\Request;

class GradebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gradebooks = Gradebook::all();
        $gradebooks = Gradebook::paginate(10);
        return response()->json($gradebooks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gradebook = new Gradebook();

        $gradebook->title = $request->title;
        $user = User::find($request->user_id);

        $gradebook->user()->associate($user)->save();
        return response()->json($gradebook);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        return response()->json($gradebook);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        $gradebook->update($request->all());
        return response()->json($gradebook);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        $gradebook->delete();
    }
}
