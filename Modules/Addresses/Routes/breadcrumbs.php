<?php

use Modules\Addresses\Entities\Address;

// Dashboard > Addresses
Breadcrumbs::for('addresses.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Addresses', route('addresses.index'));
});

// Dashboard > Addresses > ID
Breadcrumbs::for('addresses.show', function ($trail, Address $address) {
    $trail->parent('addresses.index');
    $trail->push($address->getKey(), route('addresses.show', $address));
});

// Dashboard > Addresses > ID > Edit
Breadcrumbs::for('addresses.edit', function ($trail, Address $address) {
    $trail->parent('addresses.show', $address);
    $trail->push('Edit', route('addresses.edit', $address));
});
