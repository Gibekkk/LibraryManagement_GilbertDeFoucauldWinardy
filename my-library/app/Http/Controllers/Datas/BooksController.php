<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "Buku";
        $fields = array(
            "Judul",
            "Penerbit",
            "Penulis",
            "Tahun Terbit",
            "ISBN"
        );
        $location = "books";
        $datas = DB::select('select * from books order by judul ' . strtoupper($sort));
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
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        //
    }
}
