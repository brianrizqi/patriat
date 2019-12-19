<?php

namespace App\Http\Controllers;

use App\Division;
use App\DivisionDetail;
use Illuminate\Http\Request;

class DivisionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = DivisionDetail::paginate(10);
        return view('division_details', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('create_division_details', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail = new DivisionDetail();
        $detail->division_a = $request->division_a;
        $detail->division_b = $request->division_b;
        $detail->save();
        return redirect()->route('division-details');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = DivisionDetail::find($id);
        $divisions = Division::all();
        return view('edit_division_details', compact('detail', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detail = DivisionDetail::find($id);
        $detail->division_a = $request->division_a;
        $detail->division_b = $request->division_b;
        $detail->save();
        return redirect()->route('division-details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detail = DivisionDetail::find($request->id);
        $detail->delete();
        return redirect()->route('division-details');
    }
}
