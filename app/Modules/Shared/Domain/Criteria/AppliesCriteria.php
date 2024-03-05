<?php

namespace App\Modules\Shared\Domain\Criteria;

use InvalidArgumentException;

use function in_array;

trait AppliesCriteria
{
    public static function searchWithCriteria(array $criteria)
    {
        $builder = self::query();

        foreach ($criteria as $filter) {
            if (in_array($filter->getKey(), self::$filterableFields, true)) {
                $builder->where($filter->getKey(), $filter->getOperator(), $filter->getValue());
            } else {
                throw new InvalidArgumentException("Object can not be filtered by {$filter->getKey()}");
            }
        }

        return $builder;
    }
}
