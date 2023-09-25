<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DifferentFollower implements Rule
{
    protected $followerId;

    public function __construct($followerId)
    {
        $this->followerId = $followerId;
    }

    public function passes($attribute, $value)
    {
        return $value != $this->followerId;
    }

    public function message()
    {
        return 'The :attribute must be different from the follower id.';
    }
}