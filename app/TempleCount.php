<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempleCount extends Model
{
    //
    protected $table = 'temple_count';
    protected $fillable = ['count', 'sex', 'member_id', 'auxiliary_id'];
}
