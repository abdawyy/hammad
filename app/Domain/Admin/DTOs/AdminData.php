<?php

namespace App\Domain\Admin\DTOs;

use App\Domain\Admin\Models\Admin;

class AdminData
{
    public string $name;
    public string $email;
    public string $password;
    public int $role_id;
    public ?string $role_name = null;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->role_id = $data['role_id'];

        // Optional: Allow role_name if passed (used in fromModel)
        if (isset($data['role_name'])) {
            $this->role_name = $data['role_name'];
        }
    }

    /**
     * Create from validated form request data
     */
    public static function fromRequest(array $validated): self
    {
        return new self($validated);
    }

    /**
     * Create from Eloquent model instance (for DataTable transformer)
     */
    public static function fromModel(Admin $model): array
    {
        return [
            'name' => $model->name,
            'email' => $model->email,
            'role' => [
                'name' => $model->role->name ?? ''
            ],
            'actions' => view('components.actions', [
                'editRoute' => 'admin.index',
                'deleteRoute' => 'admin.index',
                'modelId' => $model->id
            ])->render()
        ];
    }


    /**
     * Define searchable relationship fields
     */
    public static function relations(): array
    {
        return [
            'role' => ['name'], // relation => fields
        ];
    }

    /**
     * Columns to expose in DataTable
     */
    public static function columns(): array
    {
        return [
            'name',
            'email',
            'role.name',
            'actions',
       
        ];
    }
}
