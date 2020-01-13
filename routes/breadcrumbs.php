<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('home'));
});

// Dashboard > Users > 1 > Edit
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('dashboard');
    $trail->push('Edit User', route('users.edit', $user));
});
