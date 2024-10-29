<?php

namespace App\Exceptions;
class GuestNotFoundException extends \Exception
{
    public function __construct(int $id) {
        parent::__construct(sprintf('guest with id "%" not found', $id));
    }
}
