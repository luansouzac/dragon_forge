<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Cria uma nova ficha de personagem.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'name' => 'required|string|max:255',
            'race' => 'nullable|string|max:50',
            'class' => 'nullable|string|max:50',
            'backstory' => 'nullable|string',
            'strength' => 'nullable|integer',
            'dexterity' => 'nullable|integer',
            'constitution' => 'nullable|integer',
            'intelligence' => 'nullable|integer',
            'wisdom' => 'nullable|integer',
            'charisma' => 'nullable|integer',
        ]);

        // Associa o personagem ao usuário autenticado
        $character = $request->user()->characters()->create($validated);

        return response()->json($character, 201);
    }

    /**
     * Mostra os detalhes de uma ficha de personagem específica.
     */
    public function show(Character $character)
    {
        // Lógica de autorização: Apenas o dono do personagem ou o mestre da campanha podem ver.
        $user = auth()->user();
        $campaign = $character->campaign;

        if ($user->id !== $character->user_id && $user->id !== $campaign->master_id) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }

        $character->load('user', 'campaign');
        return response()->json($character);
    }

    // Os métodos index, update e destroy podem ser implementados no futuro.
}