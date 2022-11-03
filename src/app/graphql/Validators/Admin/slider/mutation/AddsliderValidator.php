<?php

namespace App\GraphQL\Validators\Admin\slider\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddsliderValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "logo"=>["required","mimes:png,jpg,jpeg"],
            "status"=>["required"],
            "rank"=>["required","unique:sliders,rank"]

        ];
    }


    public function messages(): array
    {
        return [

            "logo.required"=>trans("admin.logo is required"),
            "logo.mimes"=>trans("admin.logo should be image"),
            "status.required"=>trans("admin.status is required"),
            "rank.required"=>trans("admin.rank is required"),
            "rank.unique"=>trans("admin.rank is exists in our data")

        ];
    }

}
