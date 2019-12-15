<?php

namespace App\Http\Controllers;

use App\Division;
use App\DivisionDetail;
use Illuminate\Http\Request;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = DivisionDetail::all();
        $divisions = Division::all();
        $data = array();
        foreach ($divisions as $i => $division_a) {
            foreach ($divisions as $j => $division_b) {
                if (DivisionDetail::where('division_a', $division_a->id)
                        ->where('division_b', $division_b->id)->first() == null) {
                    $data[$i][$j] = 0;
                } else if (DivisionDetail::where('division_b', $division_a->id)
                        ->where('division_a', $division_b->id)->first() == null) {
                    $data[$i][$j] = 0;
                } else {
                    $data[$i][$j] = 1;
                }
            }
        }
        return $data;
        return view('scheduling');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
