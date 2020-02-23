<?php

namespace Modules\Taggable\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Resume\Entities\Resume;
use Modules\Taggable\Entities\Tag;
use Illuminate\Support\Str;

class TaggableDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /*
        $group = 'skills';

        $tagsGroup = Tag::updateOrCreate(['slug' => Str::slug($group)], [
            'name' => $group,
            'group_id' => null,
        ]);

        $tags = [
            'PHP7', 'Laravel', 'Bootstrap', 'Apache', 'IIS',
            'Homestead', 'Laragon', 'Amazon MWS', 'Ebay API',
            'Afteruy API'
        ];


        foreach ($tags as $tag){
            Tag::updateOrCreate(['slug' => Str::slug($tag)], [
                'name' => $tag,
                'group_id' => $tagsGroup->id
            ]);
        }

        Resume::all()->each(function (Resume $resume) {
            $resume->tags()->sync(Tag::all()->pluck('id')->toArray());
        });
        */
    }
}
