<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Jobs extends Model
{
    use HasFactory;


    protected $table = 'jobs';

    public function assigned_member()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function get_user($userid)
    {

		$user = User::where('id', $userid)->first();
		return $user;
	}
}
