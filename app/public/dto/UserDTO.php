<?php

class UserDTO 
{
    public readonly int $userId;
    public readonly ?string $googleId;
    public readonly string $username;
    public readonly string $email;
    public readonly string $role;
    public readonly bool $twoFA;
    
    public function __construct(int $userId, string $username, string $email, string $role, bool $twoFA, ?string $googleId = null)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
        $this->twoFA = $twoFA;
        $this->googleId = $googleId;
    }
}