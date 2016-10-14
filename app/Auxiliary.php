<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliary extends Model
{
    protected $table = 'auxiliary';

    public function getDropdown() {
        $dropdown = [];
        foreach ($this->all() as $auxiliary){
            $dropdown[$auxiliary->id] = $auxiliary->auxiliary;
        }
        return $dropdown;
    }

    public function members() {
        return $this->hasMany('App\Member');
    }
}
