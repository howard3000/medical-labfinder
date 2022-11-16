<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TestDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestDetailsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function delete(User $user, TestDetail $test_detail){

        return $user->id === $test_detail->user_id;
    }
    public function edit(User $user, TestDetail $test_detail){

        return $user->id === $test_detail->user_id;
    }
    public function show($id){

        return $test_detail = TestDetail::find($id);
    }
    public function update(User $user, TestDetail $test_detail){

        return $user->id === $test_detail->user_id;
    }
}
