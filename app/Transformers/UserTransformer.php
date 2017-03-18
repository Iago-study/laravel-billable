<?php

namespace App\Transformers;

use App\User;
use Illuminate\Support\Facades\App;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'role'
    ];

    public function transform(User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email
        ];
    }

    public function includeRole(User $user)
    {
        dd($user->role);
        return $this->item($user->role, App::make(RoleTransformer::class));
    }
}