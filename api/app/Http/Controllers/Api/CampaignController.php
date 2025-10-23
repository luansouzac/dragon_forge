<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Lista as campanhas em que o usuário autenticado participa.
     */
    public function index(Request $request)
    {
        $campaigns = $request->user()->campaigns()->with('master')->get();
        return response()->json($campaigns);
    }

    /**
     * Cria uma nova campanha.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user = $request->user();

        $campaign = $user->campaignsAsMaster()->create($validated);

        $campaign->participants()->attach($user->id);

        return response()->json($campaign, 201);
    }

    /**
     * Mostra os detalhes de uma campanha específica.
     */
    public function show(Campaign $campaign)
    {
        $campaign->load('master', 'participants', 'characters.user');

        return response()->json($campaign);
    }

    /**
     * Atualiza uma campanha. 
     */
    public function update(Request $request, Campaign $campaign)
    {

        return response()->json(['message' => 'Funcionalidade ainda não implementada']);
    }

    /**
     * Deleta uma campanha. (Lógica a ser implementada no futuro)
     */
    public function destroy(Campaign $campaign)
    {
        return response()->json(['message' => 'Funcionalidade ainda não implementada']);
    }

    public function addParticipant(Request $request, Campaign $campaign)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $campaign->participants()->syncWithoutDetaching($request->user_ids);

        $campaign->load('participants');

        return response()->json($campaign);
    }

    public function removeParticipant(Request $request, Campaign $campaign)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        $userId = $request->user_id;

        $campaign->participants()->detach($userId);

        return response()->json(['message' => 'Usuário removido com sucesso']);
    }
}
