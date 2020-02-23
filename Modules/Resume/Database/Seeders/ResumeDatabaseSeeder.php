<?php

namespace Modules\Resume\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\User;
use Modules\Resume\Entities\Education;
use Modules\Resume\Entities\Skill;
use Modules\Resume\Entities\Training;
use Modules\Resume\Entities\Experience;
use Modules\Resume\Entities\Resume;

class ResumeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::all()->each(function (User $user) {
            $user->resume()->createMany(
                factory(Resume::class, 2)->make()->toArray()
            );
        });

        Resume::all()->each(function (Resume $resume) {
            $resume->experiences()->createMany(factory(Experience::class, 3)->make()->toArray());
            $resume->educations()->createMany(factory(Education::class, 2)->make()->toArray());
            $resume->trainings()->createMany(factory(Training::class, 10)->make()->toArray());
            $resume->skills()->sync(
                factory(Skill::class, 10)->create()->pluck('id')->toArray()
            );
        });
    }
}
