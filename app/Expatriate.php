<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $gender
 * @property string $email
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property ExpatriateDetail[] $expatriateDetails
 */
class Expatriate extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'gender', 'email', 'phone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expatriateDetails()
    {
        return $this->hasMany('App\ExpatriateDetail');
    }
}
