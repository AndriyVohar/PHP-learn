<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $tournaments;

    public function __construct()
    {
        $this->tournaments = Tournament::all();
    }

    function debug_to_console($data)
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    public function index()
    {
        $this->debug_to_console("Index");
        return view('welcome', ['tournaments' => $this->tournaments]);
    }
    public function create()
    {
        $user = Auth::user();
        $this->debug_to_console("Create");
        if (Gate::forUser($user)->allows('create-tournament')) {
            return view('tournaments.create');
        } else {
            abort(403);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|max:255',
            'sex'=>'required|max:6',
            'country'=>'required|max:255',
            'marks'=>'required|max:255'
        ]);
        
        $user = Auth::user();
        Tournament::create(array_merge($request->all(), ['creator_user_id' => $user->id]));

        return redirect('/tournaments/')->with('success', 'Tournament created successfully!');
    }
    public function show($id)
    {
        $this->debug_to_console("Show");
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.show', ['tournament' => $tournament]);
    }
    public function edit($id)
    {
        $user = Auth::user();
        $tournament = Tournament::findOrFail($id);
        if (Gate::forUser($user)->allows('edit-tournament', $tournament)) {
            return view('tournaments.edit', ['tournament' => $tournament]);
        } else {
            abort(403);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullName' => 'required|max:255',
            'sex'=>'required|max:6',
            'country'=>'required|max:255',
            'marks'=>'required|max:255'
        ]);
        $tournament = Tournament::findOrFail($id);
        $tournament->update($request->all());
        return redirect('/tournaments/' . $tournament->id)->with('success', 'Tournament updated successfully!');
        //
    }
    public function destroy($id)
    {
        $user = Auth::user();
        $tournament = Tournament::findOrFail($id);
        if (Gate::forUser($user)->allows('delete-tournament', $tournament)) {
            $tournament->delete();
            return redirect('/tournaments')->with('success', 'Tournament deleted successfully!');
        } else {
            abort(403);
        }
    }
}
