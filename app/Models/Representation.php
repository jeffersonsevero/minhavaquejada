<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    /**
     * Returns all CowboyPasses that are part of this representation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<CowboyPass>
     */
    public function cowboyPasses()
    {
        return $this->hasMany(CowboyPass::class);
    }
}
