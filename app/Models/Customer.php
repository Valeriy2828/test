<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    // public $timestamps = false;
    protected $guarded = ['customer_id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    public function firm()
    {
        return $this->belongsTo('App\Models\Firm');
    }
}
