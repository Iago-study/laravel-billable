<?php

namespace App\Transformers;

use App\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{

    public function transform(Role $role)
    {
        return [
            'name' => 'a'
        ];
    }

}