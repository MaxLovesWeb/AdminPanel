<?php

use Modules\Account\Entities\User;

// Dashboard > Users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});

// Dashboard > Users > ID
Breadcrumbs::for('users.show', function ($trail, User $user) {
    $trail->parent('users.index');
    $trail->push($user->getKey(), route('users.show', $user));
});

// Dashboard > Users > ID > Edit
Breadcrumbs::for('users.edit', function ($trail, User $user) {
    $trail->parent('users.show', $user);
    $trail->push('Edit', route('users.edit', $user));
});


