<?php

namespace Modules\Account\Filters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    /**
     * Filter Eloquent User Collection by name field
     *
     * @param string $value
     * @return UserFilter
     */
    public function name(string $value)
    {
        return $this->whereLike('name', $value);
        //return $this->where('name', 'LIKE', '%'.$value.'%');
    }

    /**
     * Filter Eloquent User Collection by email field
     *
     * @param string $value
     * @return UserFilter
     */
    public function email(string $value)
    {
        return $this->whereLike('email', $value);
        //return $this->where('email', 'LIKE', '%'.$value.'%');
    }
}
