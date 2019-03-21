<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayersController extends Controller
{
    public function index(): Response
    {
        $players = Player::all();

        return response()->json($players, 200);
    }

    public function show(int $id): Response
    {
        $player = Player::find($id);

        if ($player === null) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json($player, 200);
    }

    public function store(Request $request): Response
    {
        $input = $request->all();
        $player = Player::create($input);

        return response()->json($player, 201);
    }

    public function update(Request $request, int $id): Response
    {
        $input = $request->all();
        $player = Player::find($id);
        if ($player === null) {
            return response()->json(['error' => 'Not found'], 404);
        }
        $player->first_name = $input['first_name'];
        $player->last_name = $input['last_name'];
        $player->team_id = $input['team_id'];
        $player->save();

        return response()->json($player, 200);
    }

    public function destroy(int $id): Response
    {
        $player = Player::find($id);
        if ($player === null) {
            return response()->json(['error' => 'Not found'], 404);
        }
        $player->destroy($id);

        return response()->json(null, 204);
    }
}
