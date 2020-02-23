<?php

namespace Modules\Resume\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Company\Entities\Company;
use Modules\Company\Policies\CompanyPolicy;
use Modules\Resume\Entities\Education;
use Modules\Resume\Entities\Experience;
use Modules\Resume\Entities\Resume;
use Modules\Resume\Entities\Training;
use Modules\Resume\Policies\EducationPolicy;
use Modules\Resume\Policies\ExperiencePolicy;
use Modules\Resume\Policies\ResumePolicy;
use Modules\Resume\Policies\TrainingPolicy;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Resume::class => ResumePolicy::class,
        Education::class => EducationPolicy::class,
        Experience::class => ExperiencePolicy::class,
        Training::class => TrainingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }


}
