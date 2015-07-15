<?php

namespace App\Modules\Profiles\Handlers\Events;

use App\Modules\Profiles\Events\ProfileWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Modules\Profiles\Http\Models\Profile;
use App\Modules\Profiles\Http\Repositories\ProfileRepository;


class CreateProfile {


	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(
			ProfileRepository $profileRepo
		)
	{
		$this->profileRepo = $profileRepo;
	}


	/**
	 * Handle the event.
	 *
	 * @param  ProfileWasCreated  $email
	 * @return void
	 */
	public function handle(ProfileWasCreated $data)
	{
		if ($data != null) {
			$this->profileRepo->CreateProfile($data);
		}
	}


}
