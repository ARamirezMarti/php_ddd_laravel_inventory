<?php

namespace App\Modules\Shared\Infrastructure\Request;

use App\Modules\Shared\Domain\Criteria\Criteria;
use App\Modules\Shared\Domain\Criteria\CriteriaFilter;
use Illuminate\Foundation\Http\FormRequest;


abstract class CriteriaRequest extends FormRequest
{
    public array $parameters = [];
    public function authorize(){
        return true;
    }
    public function getFilters(){

        if(!empty($this->query('q'))){
            $filters = explode(',',$this->query('q'));
            foreach ($filters as $filter) {
                $filterParts = explode(':', $filter);
                if (count($filterParts) === 3) {
                    array_push($this->parameters, new CriteriaFilter($filterParts[0], $filterParts[2], $filterParts[1]));
                } 
            }
            return $this->parameters;
        } else {
            return [];
        }
        
    }
    public function getCriteria(){
        $criteriaValues = $this->getFilters();
        return Criteria::fromValues($criteriaValues);
    }
   

 
}
