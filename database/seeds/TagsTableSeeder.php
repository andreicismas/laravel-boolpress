<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tags =["pane","carne","pasta","mare","mantagna","moto","car"];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name   =$tag;
            $newTag->surname  =$tag;
            $newTag -> save();
            
        }
        
    }
}
