<?php

use Modules\Person\Entities\Person;

// Dashboard > Companies
Breadcrumbs::for('persons.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Persons', route('persons.index'));
});

// Dashboard > Addresses > ID
Breadcrumbs::for('persons.show', function ($trail, Person $person) {
    $trail->parent('persons.index');
    $trail->push($person->getKey(), route('persons.show', $person));
});

// Dashboard > Addresses > ID > Edit
Breadcrumbs::for('persons.edit', function ($trail, Person $person) {
    $trail->parent('persons.show', $person);
    $trail->push('Edit', route('persons.edit', $person));
});
