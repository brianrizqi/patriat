<?php

namespace App\Http\Controllers;

use App\ExpatriateDetail;
use App\Scheduling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function index()
    {
        if (Session::has('expatriate_id')) {
            $id = Session::get('expatriate_id');
            $details = ExpatriateDetail::where('expatriate_id', $id)->get();
            $schedulle = array();
            foreach ($details as $i => $detail) {
                $item = Scheduling::where('division_id', $detail->division_id)->first();
                if (is_null($item)){
                    break;
                }
                $schedulle[$i]['divisi'] = $detail->division->name;
                $schedulle[$i]['periode'] = $item->periode->month . ' ' . $item->periode->year;
                $schedulle[$i]['tempat'] = $item->place->name;
            }
            return view('member.index', compact('schedulle'));
        } else {
            return redirect('login');
        }
    }
}
