<?php

namespace App\Http\Controllers;

use App\Models\CD;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "CD";
        $fields = array(
            "Title",
            "Artist",
            "Publisher",
            "Release Year",
            "Genre"
        );
        $location = "cds";
        $datas = DB::select('select * from cds order by title '.strtoupper($sort));
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
    public function show(CD $cd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CD $cd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CD $cd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CD $cd)
    {
        //
    }
}
