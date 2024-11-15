<?php

namespace App\Http\Controllers;

use App\Models\Journals;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JournalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if(strtolower($sort) != "desc"){
            $sort = "asc";
        }
        $type = "Jurnal";
        $fields = array(
            "Judul",
            "Penerbit",
            "Penulis",
            "Tahun Terbit",
            "ISBN"
        );
        $location = "journals";
        $datas = DB::select('select * from journals order by judul '.strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }
}
