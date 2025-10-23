<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CampaignParticipant;
use Illuminate\Http\Request;

class CampaignParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaignParticipants = CampaignParticipant::all();
        return response()->json($campaignParticipants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'campaign_id' => 'required|exists:campaigns,id',
        ]);

        $participant = CampaignParticipant::create($validated);

        return response()->json($participant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CampaignParticipant $participant)
    {
        return response()->json($participant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignParticipant $participant)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'campaign_id' => 'required|exists:campaigns,id',
        ]);
        
        $participant->update($validated);

        return response()->json($participant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampaignParticipant $participant)
    {
        $participant->delete();

        return response()->noContent();
    }

}
