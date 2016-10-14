<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class AuxiliaryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('auxiliary')->insert(array(
            array('auxiliary'=>'Elders'),
            array('auxiliary'=>'High Priests'),
            array('auxiliary'=>'Relief Society'),
            array('auxiliary'=>'Primary'),
            array('auxiliary'=>'Young Mens'),
            array('auxiliary'=>'Young Womens'),

        ));
    }
}
