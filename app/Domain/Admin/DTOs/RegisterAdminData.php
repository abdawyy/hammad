<?php
namespace App\Domain\Admin\DTOs;

class RegisterAdminData
{
    public string $name;
    public string $email;
    public string $password;

    public int $role_id;

    public function __construct(array $data)
    {
        $this->name     = $data['name'];
        $this->email    = $data['email'];
        $this->password = $data['password'];
        $this->role_id = $data['role_id'];

    }

    public static function fromRequest(array $validated): self
    {
        return new self($validated);
    }
}
