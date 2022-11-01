<?php

namespace App\GraphQL\Validators\Admin\Category\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddcategoryValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "name_en"=>["required"],
            "name_ar"=>["required"],
            "logo"=>["required","mimes:png,jpg,jpeg"],
            "description_en"=>["required"],
            "description_ar"=>["required"],
            "meta_title_en"=>["required"],
            "meta_title_ar"=>["required"],
            "meta_description_en"=>["required"],
            "meta_description_ar"=>["required"],
            "meta_logo"=>["required","mimes:png,jpg,jpeg"],
            "keywords"=>["required"],
            "status"=>["required"]
        ];
    }
    public function messages(): array
    {
        return [

            "name_en.required"=>trans("admin.name in english is required"),
            "name_ar.required"=>trans("admin.name in arabic is required"),
            "logo.required"=>trans("admin.logo is required"),
            "logo.mimes"=>trans("admin.logo should be image"),
            "description_en.required"=>trans("admin.description in english is required"),
            "description_ar.required"=>trans("admin.description in arabic is required"),
            "meta_title_en.required"=>trans("admin.meta title in english is required"),
            "meta_title_ar.required"=>trans("admin.meta title in arabic is required"),
            "meta_description_en.required"=>trans("admin.meta description in english is required"),
            "meta_description_ar.required"=>trans("admin.meta description in arabic is required"),
            "meta_logo.required"=>trans("admin.meta logo is required"),
            "meta_logo.mimes"=>trans("admin.meta logo should be image"),
            "keywords.required"=>trans("admin.keywords is required"),
            "status.required"=>trans("admin.status is required")

        ];
    }
}
