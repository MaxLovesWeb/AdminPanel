<?php

use Modules\Company\Entities\Company;

// Dashboard > Companies
Breadcrumbs::for('companies.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Companies', route('companies.index'));
});

// Dashboard > Addresses > ID
Breadcrumbs::for('companies.show', function ($trail, Company $company) {
    $trail->parent('companies.index');
    $trail->push($company->getKey(), route('companies.show', $company));
});

// Dashboard > Addresses > ID > Edit
Breadcrumbs::for('companies.edit', function ($trail, Company $company) {
    $trail->parent('companies.show', $company);
    $trail->push('Edit', route('companies.edit', $company));
});
