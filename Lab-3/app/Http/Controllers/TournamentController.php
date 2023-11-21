<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

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

    function debug_to_console($data) {
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
        $this->debug_to_console("Create");
        return view('tournaments.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|max:255',
        ]);

        $tournament = Tournament::create($request->all());

        return redirect('/tournaments/')->with('success', 'Tournament created successfully!');
    }
    public function show($id)
    {
        $this->debug_to_console("Show");
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.show', ['tournament' => $tournament]);
        //
    }
    public function edit($id)
    {
        $this->debug_to_console("Edit");
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.edit', ['tournament' => $tournament]);
        //
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullName' => 'required|max:255',
        ]);
        $tournament = Tournament::findOrFail($id);
        $tournament->update($request->all());
        return redirect('/tournaments/' . $tournament->id)->with('success', 'Tournament updated successfully!');
        //
    }
    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();
        return redirect('/tournaments')->with('success', 'Tournament deleted successfully!');
    }
}
