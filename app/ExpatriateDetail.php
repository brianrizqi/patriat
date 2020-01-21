<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $division_id
 * @property int $expatriate_id
 * @property int $periode_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Division $division
 * @property Expatriate $expatriate
 * @property Periode $periode
 */
class ExpatriateDetail extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['division_id', 'expatriate_id', 'periode_id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expatriate()
    {
        return $this->belongsTo('App\Expatriate');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periode()
    {
        return $this->belongsTo('App\Periode');
    }
}
