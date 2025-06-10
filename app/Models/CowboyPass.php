<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CowboyPass extends Model
{
    protected $table = 'cowboy_pass';

    /**
     * Returns the cowboy that owns this pass.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Cowboy>
     */
    public function titular()
    {
        return $this->belongsTo(Cowboy::class, 'cowboy_id');
    }

    /**
     * Returns the cowboy that helped with this pass.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Cowboy>
     */
    public function helper()
    {
        return $this->belongsTo(Cowboy::class, 'helper_id');
    }

    /**
     * Returns the pass that this CowboyPass represents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Pass>
     */
    public function pass()
    {
        return $this->belongsTo(Pass::class);
    }

    /**
     * Returns the representation associated with this CowboyPass.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Representation>
     */
    public function representation()
    {
        return $this->belongsTo(Representation::class);
    }
}
