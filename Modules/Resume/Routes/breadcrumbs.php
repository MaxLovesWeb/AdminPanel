<?php

use Modules\Resume\Entities\Resume;

// Dashboard > Resume
Breadcrumbs::for('resumes.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Companies', route('resumes.index'));
});

// Dashboard > Resume > ID
Breadcrumbs::for('resumes.show', function ($trail, Resume $resume) {
    $trail->parent('resumes.index');
    $trail->push($resume->getKey(), route('resumes.show', $resume));
});

// Dashboard > Resume > ID > Edit
Breadcrumbs::for('resumes.edit', function ($trail, Resume $resume) {
    $trail->parent('resumes.show', $resume);
    $trail->push('Edit', route('resumes.edit', $resume));
});

// Dashboard > Resume > Create
Breadcrumbs::for('resumes.create', function ($trail) {
    $trail->parent('resumes.index');
    $trail->push('Create', route('resumes.create'));
});
