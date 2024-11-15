<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "Koran";
        $fields = array(
            "Name",
            "Publication Date",
            "Publisher",
            "Language"
        );
        $location = "newspapers";
        $datas = DB::select('select * from newspapers order by name '.strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Newspaper $newspaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newspaper $newspaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newspaper $newspaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newspaper $newspaper)
    {
        //
    }
}
