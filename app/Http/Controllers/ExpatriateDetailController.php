<?php

namespace App\Http\Controllers;

use App\Division;
use App\Expatriate;
use App\ExpatriateDetail;
use App\Periode;
use Illuminate\Http\Request;

class ExpatriateDetailController extends Controller
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
        $details = ExpatriateDetail::where('periode_id',$periode)->paginate(10);
        return view('expatriate_details', compact('details', 'periodes', 'periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expatriates = Expatriate::all();
        $divisions = Division::all();
        $periode = Periode::all();
        return view('create_expatriate_details', compact('divisions', 'expatriates', 'periode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detail = new  ExpatriateDetail();
        $detail->division_id = $request->division;
        $detail->expatriate_id = $request->expatriate;
        $detail->periode_id = $request->periode;
        $detail->save();
        return redirect()->route('expatriate-details.create');
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
        $detail = ExpatriateDetail::find($id);
        $expatriates = Expatriate::all();
        $divisions = Division::all();
        return view('edit_expatriate_details', compact('detail', 'expatriates', 'divisions'));
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
        $detail = ExpatriateDetail::find($id);
        $detail->division_id = $request->division;
        $detail->expatriate_id = $request->expatriate;
        $detail->save();
        return redirect()->route('expatriate-details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detail = ExpatriateDetail::find($request->id);
        $detail->delete();
        return redirect()->route('expatriate-details');
    }
}
