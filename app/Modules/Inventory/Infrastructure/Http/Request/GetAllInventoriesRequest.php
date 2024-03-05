<?php

namespace App\Modules\Inventory\Infrastructure\Http\Request;

use App\Modules\Shared\Infrastructure\Request\CriteriaRequest;

class GetAllInventoriesRequest extends CriteriaRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }
}
