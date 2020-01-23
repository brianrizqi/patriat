<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $month
 * @property string $year
 * @property string $created_at
 * @property string $updated_at
 * @property ExpatriateDetail[] $expatriateDetails
 * @property Scheduling[] $schedulings
 */
class Periode extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['month', 'year', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expatriateDetails()
    {
        return $this->hasMany('App\ExpatriateDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedulings()
    {
        return $this->hasMany('App\Scheduling');
    }
}
