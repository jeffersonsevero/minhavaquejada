<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cowboy extends Model
{
    /** @use HasFactory<\Database\Factories\CowboyFactory> */
    use HasFactory;

    /**
     * Returns all passes that are owned by this cowboy.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<CowboyPass>
     */
    public function ownedPasses()
    {
        return $this->hasMany(CowboyPass::class, 'cowboy_id');
    }

    /**
     * Returns all passes that were helped by this cowboy.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<CowboyPass>
     */
    public function helpedPasses()
    {
        return $this->hasMany(CowboyPass::class, 'helper_id');
    }
}
