<?php

namespace App\Http\Controllers;

use App\Division;
use App\DivisionDetail;
use App\Expatriate;
use App\ExpatriateDetail;
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
        $divisions = Division::all();
        $detail = array();
        $matrix = array();
        $expatriates = Expatriate::all();

        foreach ($divisions as $i => $division) {
            foreach ($expatriates as $j => $expatriate) {
                if (ExpatriateDetail::where('expatriate_id', $expatriate->id)
                        ->where('division_id', $division->id)->first() != null) {
                    $detail[$i][$j] = 1;
                } else {
                    $detail[$i][$j] = 0;
                }
            }
        }

        foreach ($divisions as $i => $division_a) {
            foreach ($divisions as $j => $division_b) {
                if (DivisionDetail::where('division_a', $division_a->id)
                        ->where('division_b', $division_b->id)->first() != null) {
                    $matrix[$i][$j] = 1;
                } else if (DivisionDetail::where('division_b', $division_a->id)
                        ->where('division_a', $division_b->id)->first() != null) {
                    $matrix[$i][$j] = 1;
                } else {
                    $matrix[$i][$j] = 0;
                }
            }
        }
        return view('scheduling', compact('matrix','detail'));
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
