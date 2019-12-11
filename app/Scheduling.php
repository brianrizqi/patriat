<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $division_id
 * @property int $place_id
 * @property string $week
 * @property string $day
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Place $place
 * @property Division $division
 */
class Scheduling extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['division_id', 'place_id', 'week', 'day', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo('App\Division');
    }
}
