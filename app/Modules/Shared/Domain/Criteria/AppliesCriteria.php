<?php

namespace App\Modules\Shared\Domain\Criteria;

trait AppliesCriteria
{
    public static function searchWithCriteria(array $criteria){
        $builder = self::query();
        foreach ($criteria as $filter) {
            $builder->where($filter->getKey(),$filter->getOperator(),$filter->getValue());
        }
        return $builder;
    }
}
