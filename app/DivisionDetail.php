<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $division_a
 * @property int $division_b
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Division $division_detail_a
 * @property Division $division_detail_b
 */
class DivisionDetail extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['division_a', 'division_b', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisionDetails_a()
    {
        return $this->belongsTo('App\Division', 'division_a');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisionDetails_b()
    {
        return $this->belongsTo('App\Division', 'division_b');
    }
}
