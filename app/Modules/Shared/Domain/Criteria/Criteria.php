<?php

namespace App\Modules\Shared\Domain\Criteria;

class Criteria
{
    public const OPERATORS = [
        '=' => '=',
        '!=' => '!=',
        '>' => '>',
        '<' => '<',
        'lk'=> 'LIKE',
    ];

    public static function operator($operator)
    {
        return static::OPERATORS[$operator] ?? '=';
    }

    public static function fromValues(array $criteriaValues)
    {
        $criteria = [];

        foreach ($criteriaValues as $criteriaValue) {
            $key = $criteriaValue->getKey();
            $operator = self::operator($criteriaValue->getOperator());
            $value = $criteriaValue->getValue();
            self::mutatesValue($operator, $value);
            $criteria[] = new CriteriaFilter($key, $value, $operator);
        }

        return $criteria;
    }

    public static function mutatesValue($operator, &$value): void
    {
        if ($operator === 'LIKE') {
            $value = "%{$value}%";
        }
    }
}
