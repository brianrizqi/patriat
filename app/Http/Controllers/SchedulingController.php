<?php

namespace App\Http\Controllers;

use App\Division;
use App\DivisionDetail;
use App\Expatriate;
use App\ExpatriateDetail;
use App\Periode;
use Illuminate\Http\Request;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('periode')) {
            $periode = $request->periode;
        } else {
            $periode = 1;
        }
        $periodes = Periode::all();
        $divisions = Division::all();
        $detail = array();
        $matrix = array();
        $expatriates = Expatriate::all();
        $expatriate_details = array();

        foreach ($divisions as $i => $division) {
            $details = ExpatriateDetail::where('division_id', $division->id)->get();
            foreach ($details as $j => $item) {
                $expatriate_details[$i][$j] = $item->expatriate_id;
            }
        }
        $difference = array();
        foreach ($expatriate_details as $i => $a) {
            foreach ($expatriate_details as $j => $b) {
                $aa = 0;
                $bb = 0;
                foreach ($expatriate_details[0] as $k => $c) {
                    foreach ($expatriate_details[0] as $l => $d) {
                        if ($expatriate_details[$i][$k] == $expatriate_details[$j][$l]) {
                            $difference[$i][$j] = $aa;
                            $aa += 1;
                        } else {
                            $difference[$i][$j] = $bb;
                            $bb += 1;
                        }
                    }
                }
            }
        }
        $dif = array();
        foreach ($difference as $i => $item) {
            foreach ($difference[$i] as $j => $item) {
                if ($difference[$i][$j] == 24)
                    $dif[$i][$j] = "tidak ada hubungan";
                else
                    $dif[$i][$j] = "ada hubungan";
            }
        }
        foreach ($divisions as $i => $division) {
            foreach ($expatriates as $j => $expatriate) {
                if (ExpatriateDetail::where('expatriate_id', $expatriate->id)
                        ->where('division_id', $division->id)
                        ->where('periode_id', $periode)
                        ->first() != null) {
                    $detail[$i][$j] = 1;
                } else {
                    $detail[$i][$j] = 0;
                }
            }
        }
        $temp = array();
        foreach ($divisions as $i => $division_a) {
            $no = 0;
            foreach ($divisions as $j => $division_b) {
                if (DivisionDetail::where('division_a', $division_a->id)
                        ->where('division_b', $division_b->id)->first() != null) {
                    $matrix[$i][$j] = 1;
                    $temp[$i + 1][$no] = $division_b->id;
                    $no++;
                } else if (DivisionDetail::where('division_b', $division_a->id)
                        ->where('division_a', $division_b->id)->first() != null) {
                    $matrix[$i][$j] = 1;
                    $temp[$i + 1][$no] = $division_b->id;
                    $no++;
                } else {
                    $matrix[$i][$j] = 0;
                }
                $temp[$i + 1]['id'] = $division_a->id;
            }
        }
        $filter = array();
        for ($i = 0; $i < count($matrix); $i++) {
            $jumlah = 0;
            for ($j = 0; $j < count($matrix); $j++) {
                $jumlah += $matrix[$i][$j];
            }
            $temp[$i + 1]['jumlah'] = $jumlah;
            $filter[$i]['divisi'] = \App\Division::find($i + 1)->name;
            $filter[$i]['jumlah'] = $jumlah;
            $filter[$i]['id'] = $i + 1;
        }


        usort($filter, function ($a, $b) {
            if ($a['jumlah'] == $b['jumlah']) return 0;
            return $a['jumlah'] < $b['jumlah'] ? 1 : -1;
        });

        usort($temp, function ($a, $b) {
            if ($a['jumlah'] == $b['jumlah']) return 0;
            return $a['jumlah'] < $b['jumlah'] ? 1 : -1;
        });
        $colors = ['yellow', 'red', 'green', 'blue'];
        $temp_color = 0;
        $temp[0]['color'] = $colors[$temp_color];
        for ($i = 1; $i < count($temp); $i++) {
            for ($j = 0; $j < $temp[$i]['jumlah']; $j++) {
                for ($k = 0; $k < $i; $k++) {
                    if ($temp[$i][$j] != $temp[$k]['id']) {
                        $temp[$i]['color'] = $temp_color;
                    } else {
                        $temp[$i]['color'] = 'a';
                    }
                }
            }
        }
        return $temp;
        return view('scheduling', compact('matrix', 'detail', 'periodes', 'filter','temp'));
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
