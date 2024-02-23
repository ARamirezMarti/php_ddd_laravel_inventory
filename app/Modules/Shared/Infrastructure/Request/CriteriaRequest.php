<?php

namespace App\Modules\Shared\Infrastructure\Request;

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
                $filter = explode(':',$filter);
                array_push($this->parameters, new CriteriaFilter($filter[0],$filter[1]));
            }
            
            return $this->parameters;
        }else{
            return [];
        }
        
    }
    public function getCriteria(){
        return $this->getFilters();
    }
   

 
}
