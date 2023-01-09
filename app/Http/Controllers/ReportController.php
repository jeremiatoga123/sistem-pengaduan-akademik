<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktifitas;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Aktifitas Report';
        $data['breadcumb'] = 'Aktifitas Report';
        $data['aktifitas'] = Aktifitas::orderby('id', 'asc')->where('divisi_id',Auth::user()->divisi_id)->get();

        return view('aktifitas-report.index', $data);
    }
}
