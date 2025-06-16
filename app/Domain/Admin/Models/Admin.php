<?php 
namespace App\Domain\Admin\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Domain\Role\Models\Role;



class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role_id'];
    

    protected $hidden = ['password', 'remember_token'];
    

public function role()
{
    return $this->belongsTo(Role::class);
}
}