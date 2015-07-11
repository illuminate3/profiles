<?php
namespace App\Modules\Profiles\HttpModels;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Kagi\Http\Models\User;

class User extends App\Modules\Kagi\Http\Models\User {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

// DEFINE Fillable -------------------------------------------------------

// DEFINE Relationships --------------------------------------------------
	public function profile()
	{
		return $this->hasOne('App\Modules\Profiles\Http\Models\Profile');
	}


}
