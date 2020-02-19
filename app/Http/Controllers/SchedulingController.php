<?php

namespace App\Http\Controllers;

use App\Division;
use App\DivisionDetail;
use App\Expatriate;
use App\ExpatriateDetail;
use App\Periode;
use App\Place;
use App\Scheduling;
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
        $expatriates = Expatriate::all();
        $expatriate_details = array();

        foreach ($divisions as $i => $division) {
            $details = ExpatriateDetail::where('division_id', $division->id)->get();
            foreach ($details as $j => $item) {
                $expatriate_details[$i][$j] = $item->expatriate_id;
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

        $relations = Division::orderBy('id', 'asc')->get();
        foreach ($relations as $i => $divisi) {
            $k = 1;
            foreach ($relations as $keyDivisi => $divisicount) {
                $countdivisi = \App\ExpatriateDetail::join('divisions as d', 'expatriate_details.division_id', '=', 'd.id')->where('periode_id', '=', $periode)->whereIn('division_id', array($divisi->id, $divisicount->id))->groupBy('expatriate_id')->havingRaw('COUNT(*) > 1')->count();
                $countdivisi > 0 ? $count[$i]['jumlah'] = $k++ : '';
                $a[$i][$keyDivisi] = $countdivisi;
            }
            $count[$i]['divisi'] = $divisi->name;
        }
        $colors = $this->findColor($a);
        return view('scheduling', compact('detail', 'periodes', 'periode', 'relations', 'count', 'colors'));
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
        $periode = $request->periode;
        $check = Scheduling::where('periode_id', $periode)->get();
        if (count($check) != 0 || $periode == 0) {
            return redirect()->back()->withErrors(['Periode ini sudah di jadwalkan', 'The Message']);
        } else {
            $periodes = Periode::all();
            $divisions = Division::all();
            $detail = array();
            $expatriates = Expatriate::all();
            $expatriate_details = array();

            foreach ($divisions as $i => $division) {
                $details = ExpatriateDetail::where('division_id', $division->id)->get();
                foreach ($details as $j => $item) {
                    $expatriate_details[$i][$j] = $item->expatriate_id;
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

            $relations = Division::orderBy('id', 'asc')->get();
            foreach ($relations as $i => $divisi) {
                $k = 1;
                foreach ($relations as $keyDivisi => $divisicount) {
                    $countdivisi = \App\ExpatriateDetail::join('divisions as d', 'expatriate_details.division_id', '=', 'd.id')->where('periode_id', '=', $periode)->whereIn('division_id', array($divisi->id, $divisicount->id))->groupBy('expatriate_id')->havingRaw('COUNT(*) > 1')->count();
                    $countdivisi > 0 ? $count[$i]['jumlah'] = $k++ : '';
                    $a[$i][$keyDivisi] = $countdivisi;
                }
                $count[$i]['id'] = $divisi->id;
                $count[$i]['divisi'] = $divisi->name;
            }
            $colors = $this->findColor($a);

            usort($count, function ($a, $b) {
                if ($a['jumlah'] == $b['jumlah']) return 0;
                return $a['jumlah'] < $b['jumlah'] ? 1 : -1;
            });

            for ($i = 0; $i < count($colors); $i++) {
                $scheduling = new Scheduling();
                $scheduling->division_id = $count[$i]['id'];
                $scheduling->place_id = Place::all()->random()->id;
                $scheduling->periode_id = $periode;
                if ($colors[$i] == 2) {
                    $scheduling->day = 'Minggu ke 1';
                } else if ($colors[$i] == 1) {
                    $scheduling->day = 'Minggu ke 2';
                } else if ($colors[$i] == 3) {
                    $scheduling->day = 'Minggu ke 3';
                } else {
                    $scheduling->day = 'Minggu ke 4';
                }
                $scheduling->save();
            }
            return redirect('/admin/scheduling')->with('message', 'Jadwal Berhasil di buat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->has('periode')) {
            $periode = $request->periode;
        } else {
            $periode = 1;
        }
        $schedules = Scheduling::where('periode_id', $periode)->get();
        $periodes = Periode::all();
        return view('show_schedule', compact('schedules', 'periodes'));
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
    public function destroy(Request $request)
    {
        Scheduling::where('periode_id', $request->periode)->delete();
        return redirect()->route('scheduling.show');
    }

    public function showExpatriate($id)
    {
        $detail = ExpatriateDetail::where('division_id', $id)->get();
        return view('show_expatriate', compact('detail'));
    }

    private function findColor($array)
    {
        //mengurutkan sesuai jumlah relasi
        $counted = array();
        for ($i = 0; $i < count($array); $i++) {
            $c = 0;
            for ($j = 0; $j < count($array[0]); $j++) {
                $c += $array[$i][$j];
            }
            $counted[$i]['idx'] = $i;
            $counted[$i]['jumlah'] = $c;
        }
        usort($counted, function ($a, $b) {
            if ($a['jumlah'] == $b['jumlah']) return 0;
            return $a['jumlah'] < $b['jumlah'] ? 1 : -1;
        });
        $newar = array();
        for ($i = 0; $i < count($array); $i++) {
            $newar[$i] = $array[$counted[$i]['idx']];
        }
        $array = $newar;

        for ($i = 0; $i < count($array); $i++) {
            $newar = array();
            for ($j = 0; $j < count($array[0]); $j++) {
                $newar[$j] = $array[$i][$counted[$j]['idx']];
            }
            $array[$i] = $newar;
        }
        
        //memberi warna
        $c = array();
        for ($i = 0; $i < count($array); $i++) {
            if ($i == 0) {
                $c[$i] = 1;
            } else {
                $c[$i] = 1;
                for ($j = 0; $j < count($array[$i]); $j++) {
                    if ($array[$i][$j] > 0) {
                        if ($c[$i] == $c[$j]) {
                            $c[$i]++;
                        }
                    }
                    if ($j == ($i)) break;
                }
            }
        }
        return $c;
    }
}
