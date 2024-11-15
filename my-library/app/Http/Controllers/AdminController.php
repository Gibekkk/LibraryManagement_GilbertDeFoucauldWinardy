<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

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
        $datas = DB::select('select name, username, id, isDeleted from users where level="librarian"');
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

    public function addLibrarian()
    {
        return view('admin.addLibrarian');
    }

    public function addLibrarianProcess(Request $request)
    {
        $name = $request->name;
        $username = $request->username;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        if($password_confirmation == $password){
            $usernameAvailable = count(DB::select('select username from users where username = "'.$username.'"')) > 0 ? false : true;
            if($usernameAvailable){
                User::factory()->create([
                    'name' => $name,
                    'username' => $username,
                    "level" => "librarian",
                    "password" => Hash::make($password),
                ]);
            }
        }
        return Redirect::to('/librarians');
    }
}
