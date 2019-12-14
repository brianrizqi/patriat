<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property DivisionDetail[] $divisionDetails_a
 * @property DivisionDetail[] $divisionDetails_b
 * @property ExpatriateDetail[] $expatriateDetails
 * @property Scheduling[] $schedulings
 */
class Division extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisionDetails_b()
    {
        return $this->hasMany('App\DivisionDetail', 'division_a');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisionDetails_a()
    {
        return $this->hasMany('App\DivisionDetail', 'division_b');
    }

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
