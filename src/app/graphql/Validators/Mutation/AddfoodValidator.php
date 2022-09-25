<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddfoodValidator extends Validator
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
            "thumbnail"=>["required","mimes:jpg,png,jpeg"],
            "description_en"=>["required"],
            "description_ar"=>["required"],
            "tag"=>["required"],
            "meta_title_en"=>["required"],
            "meta_title_ar"=>["required"],
            "meta_description_en"=>["required"],
            "meta_description_ar"=>["required"],
            "meta_logo"=>["required","mimes:png,jpg,jpeg"],
            "meta_keyword"=>["required"],
            "category_id"=>["required","exists:categories,id"],


        ];
    }


    public function messages(): array
    {
        return [


            "name_en.required"=>trans("admin.name in english is required"),
            "name_ar.required"=>trans("admin.name in arabic is required"),
            "thumbnail.required"=>trans("admin.thumbnail is required"),
            "thumbnail.mimes"=>trans("admin.thumbnail should be image"),
            "description_en.required"=>trans("admin.description in english is required"),
            "description_ar.required"=>trans("admin.description in arabic is required"),
            "tag.required"=>trans("admin.tag is required"),
            "meta_title_en.required"=>trans("admin.meta title in english is required"),
            "meta_title_ar.required"=>trans("admin.meta title in english is required"),
            "meta_description_en.required"=>trans("admin.meta description in english is required"),
            "meta_description_ar.required"=>trans("admin.meta description in arabic is required"),
            "meta_logo.required"=>trans("admin.meta logo is required"),
            "meta_logo.mimes"=>trans("admin.meta logo should be image"),
            "meta_keyword.required"=>trans("admin.meta keyword is required"),
            "category_id.required"=>trans("admin.category id is required"),
            "category_id.exists"=>trans("admin.category is not exists in our data")
        ];
    }

}
