<?php
namespace App\Services;

use App\Models\User;
use Exception;

class UserService
{
    public function handel(array $data, ?int $id = null)
    {
        try {
            return User::updateOrCreate(['id' => $id], $data);
        } catch(Exception $e) {
            return $e;
        }
    }
}
