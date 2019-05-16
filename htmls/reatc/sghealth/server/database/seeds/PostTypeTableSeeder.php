<?php

use Illuminate\Database\Seeder;
use App\Models\PostType;


class PostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostType::updateOrCreate(['name' => 'page'], [
            'name'      => 'page',
            'title'     => 'page',
            'options'   => '{"page":[1]}'
        ]);
    }
}
