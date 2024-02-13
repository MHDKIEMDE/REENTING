<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HouseModel;

class HousePolicy
{
    /**
     * Determine whether the user can view the house.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HouseModel  $house
     * @return bool
     */
    public function view(User $user, HouseModel $house)
    {
        return $user->id === $house->user_id;
    }
}
