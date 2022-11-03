<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FarmTeam extends Model
{
    use HasFactory;
    protected $table = 'farm_teams';

  
  public function team()
    {
     return $this->hasMany(User::class,'id','team_member');

    }

    
}
