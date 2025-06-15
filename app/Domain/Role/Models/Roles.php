<?php 
namespace App\Domain\Role\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Roles extends Model
{

    protected $fillable = ['name', 'is_active'];
    

}