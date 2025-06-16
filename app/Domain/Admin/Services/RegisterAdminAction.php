<?php
namespace App\Domain\Admin\Services;

use App\Domain\Admin\Models\Admin;
use App\Domain\Admin\DTOs\AdminData;
use Illuminate\Support\Facades\Hash;

class RegisterAdminAction
{
    public function execute(AdminData $data): Admin
    {
        return Admin::create([
            'name'     => $data->name,
            'email'    => $data->email,
            'password' => Hash::make($data->password),
            'role_id'=>$data->role_id
        ]);
    }
}
