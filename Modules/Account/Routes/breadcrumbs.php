<?php


// Dashboard > Accounts
Breadcrumbs::for('accounts.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Accounts', route('accounts.index'));
});

