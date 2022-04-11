<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurante
 *
 * @property $id
 * @property $nombre
 * @property $activo
 * @property $created_at
 * @property $updated_at
 *
 * @property Sucursal[] $sucursals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Restaurante extends Model
{
    
  protected $table = 'restaurante';

  static $rules = [
    'nombre' => 'required',
    'activo' => 'required',
    ];

    protected $perPage = 20;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sucursals()
    {
        return $this->hasMany('App\Models\Sucursal', 'restaurante_id', 'id');
    }
    

}
