<?php

namespace App\Modules\Shared\Domain\Criteria;

class CriteriaFilter
{
    public function __construct(private string $key, private string $value, private string $operator = '=')
    {

    }
    public function getKey(){
        return $this->key;
    }
    public function getOperator(){
        return $this->operator;
    }
    public function getValue(){
        return $this->value;
    }
}
