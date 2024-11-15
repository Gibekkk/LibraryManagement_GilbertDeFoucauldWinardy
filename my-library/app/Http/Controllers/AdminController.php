<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function librarians()
    {
        $fields = array(
            "Name",
            "Username",
        );
        $datas = DB::select('select name, username, id from users where level="librarian" and isDeleted = 0');
        return view('admin.librarians', compact('datas', 'fields'));
    }

    public function removeLibrarian(Request $request)
    {
        $librarianID = $request->librarianID;
        $confirmLibrarian = count(DB::select('select username from users where level="librarian" and id="'.$librarianID.'" and isDeleted = 0')) > 0 ? true : false;
        if ($confirmLibrarian) {
            DB::table('users')->where([['id', '=', $librarianID], ['isDeleted', '!=', true], ['level', '=', 'librarian']])->update(['isDeleted'=>true]);
        }
        return Redirect::to('/librarians');
    }
}
