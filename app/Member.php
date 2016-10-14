<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $fillable = ['name', 'auxiliary_id'];

    public function auxiliary() {

        return $this->belongsTo('App\Auxiliary');
    }

    public function getDropdown() {
        $dropdown = [];
        foreach ($this->all() as $member){
            $dropdown[$member->id] = $member->name;
        }
        return $dropdown;
    }
}
