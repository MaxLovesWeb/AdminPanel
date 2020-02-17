<?php

namespace Modules\Account\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait UpdateRelations
{

    abstract public function belongsToMany($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null,
                                  $parentKey = null, $relatedKey = null, $relation = null);

    /**
     * @param string $relation
     * @return BelongsToMany
     * @throws \Exception
     */
    public function getRelationBuilder($relation)
    {
        if (! method_exists($this, $relation))
            throw new \Exception('Relation <'.$relation.'> not found in model <'.get_class($this).'>');

        return $this->{$relation}();
    }


}
