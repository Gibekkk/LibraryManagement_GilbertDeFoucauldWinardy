<?php

namespace App\Http\Controllers;

use App\Models\FinalYearProject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalYearProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "FYP";
        $fields = array(
            "Title",
            "Student Name",
            "Supervisor Name",
            "Submission Year",
            "Abstract"
        );
        $location = "final_year_projects";
        $datas = DB::select('select *, users.name as supervisor_name from final_year_projects inner join users on users.id = final_year_projects.supervisor WHERE users.level = "lecturer" order by title ' . strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }

    public function addFyp()
    {
        $lecturerDatas = DB::select('select users.username as username, users.name as name from users where users.level = "lecturer" and (select count(id) from final_year_projects where supervisor = users.id) < 2');
        $lecturers = [];
        foreach($lecturerDatas as $lecturer){
            $lecturers[$lecturer->username] = $lecturer->name;
        }
        // var_dump($lecturers);
        return view('librarian.create.fyps', compact("lecturers"));
    }

    public function addFypProcess(Request $request)
    {
        DB::table('fyp_request')->insert([
            'librarianID' => Auth::user()->id,
            'title' => $request->title,
            'student_name' => $request->student_name,
            'supervisor' => $request->supervisor,
            'submission_year' => $request->submission_year,
            'abstract' => $request->abstract,
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('final_year_projects')->with('success', 'FYP added successfully!');
    }
}
