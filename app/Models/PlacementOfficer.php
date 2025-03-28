<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PlacementOfficer extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['officer_name', 'email', 'phone', 'role', 'password'];

    protected $table = 'placement_officers';  
      
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'placement_officer_id');
    }

}
