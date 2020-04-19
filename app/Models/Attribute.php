<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Attribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'frontend_type', 'is_filterable', 'is_required'
    ];

    /**
     * @var array
     */
    protected $casts  = [
        'is_filterable' =>  'boolean',
        'is_required'   =>  'boolean',
    ];

    public static $rules = [
        'code'          =>  'required|unique:attributes',
        'name'          =>  'required',
        'frontend_type' =>  'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function values(){
        return $this->hasMany(AttributeValue::class);
    }
}