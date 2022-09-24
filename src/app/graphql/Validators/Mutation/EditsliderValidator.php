<?php

namespace App\GraphQL\Validators\Mutation;

use App\Models\slider;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class EditsliderValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {

        return [

            "id"=>["required","exists:sliders,id"],
            "status"=>["required"],
            "rank"=>["required"],
            "logo"=>["mimes:jpg,png,jpeg"]

        ];
    }

    public function messages(): array
    {
        return [

            "id"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data"),
            "status.required"=>trans("admin.status is required"),
            "logo.mimes"=>trans("admin.logo should be image"),
            "rank.required"=>trans("admin.rank is required"),
            "rank.unique"=>trans("admin.rank is exists in our data")

        ];
    }
}
