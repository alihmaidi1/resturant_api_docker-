<?php

namespace App\GraphQL\Validators\Admin\storehouse\mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeletestorehouseValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "id"=>["required","exists:storehouses,id"]
        ];
    }


    public function messages(): array
    {
        return [

            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists un our data")

        ];
    }

}
