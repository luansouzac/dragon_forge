<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'master_id',
        'invite_code',
    ];

    /**
     * O usuário que é o Mestre desta campanha.
     * Uma Campanha pertence a um Usuário.
     */
    public function master(): BelongsTo
    {
        return $this->belongsTo(User::class, 'master_id');
    }

    /**
     * Todos os personagens que fazem parte desta campanha.
     * Uma Campanha tem muitos Personagens.
     */
    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    /**
     * Todos os usuários (jogadores e mestre) que participam desta campanha.
     * Uma Campanha pertence a muitos Usuários (relação muitos-para-muitos).
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'campaign_participants');
    }
}