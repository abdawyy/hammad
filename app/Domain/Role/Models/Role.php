<?php 
namespace App\Domain\Role\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    protected $fillable = ['name', 'is_active'];
    

}