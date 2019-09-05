<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Services.
 *
 * @package namespace App\Entities;
 */
class Services extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'birth', 'marcar', 'facul', 'salarial', 'habilidades', 
    ];


    public function getPhoneAttribute(){
        $phone = $this->attributes['phone'];
        return '(' . substr($phone, 0,2) . ') ' . substr($phone, 2,4) . '-' . substr($phone, -4);
    }

    public function getBirthAttribute(){

        $birth = explode('-', $this->attributes['birth']);

        if(count($birth) != 3)
            return '';

        $birth = $birth[0] . '/' . $birth[1] . '/' . $birth[2];
        return $birth;
    }

}
