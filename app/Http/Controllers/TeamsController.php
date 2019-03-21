<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamsController extends Controller
{
    public function index(): Response
    {
        $teams = Team::with('players')->get();

        return response()->json($teams, 200);
    }

    public function show(int $id): Response
    {
        $team = Team::with('players')->get($id);

        if ($team === null) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json($team, 200);
    }

    public function store(Request $request): Response
    {
        $input = $request->all();
        $team = Team::create($input);

        return response()->json($team, 201);
    }

    public function update(Request $request, int $id): Response
    {
        $input = $request->all();
        $team = Team::find($id);
        if ($team === null) {
            return response()->json(['error' => 'Not found'], 404);
        }
        $team->name = $input['name'];
        $team->save();

        return response()->json($team, 200);
    }

    public function destroy(int $id): Response
    {
        $team = Team::find($id);
        if ($team === null) {
            return response()->json(['error' => 'Not found'], 404);
        }
        $team->destroy($id);

        return response()->json(null, 204);
    }
}
