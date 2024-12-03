<?php

class UserDTO 
{
    
    public readonly int $userId;
    public readonly string $username;
    public readonly string $email;
    public readonly string $role;
    
    public function __construct(int $userId, string $username, string $email, string $role) 
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }
}