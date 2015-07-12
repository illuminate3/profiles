<?php

namespace App\Modules\Profiles\Http\Controllers;

use App\Modules\Profiles\Http\Models\Profile;
use App\Modules\Profiles\HttpRepositories\ProfileRepository;
use App\Modules\Kagi\Http\Models\User;
use App\Modules\Kagi\Http\Repositories\UserRepository;

use Illuminate\Http\Request;
use App\Modules\Profiles\Http\Requests\ProfileCreateRequest;
use App\Modules\Profiles\Http\Requests\ProfileUpdateRequest;
use App\Modules\Profiles\Http\Requests\DeleteRequest;

use Auth;
use Datatables;
use Flash;


class ProfilesController extends ProfileController {


	/**
	 * The UserRepository instance.
	 *
	 * @var App\Modules\Kagi\HttpRepositories\UserRepository
	 */
	protected $user;


	/**
	 * The RoleRepository instance.
	 *
	 * @var App\Modules\Profiles\HttpRepositories\ProfileRepository
	 */
	protected $profile;


	/**
	 * Create a new UserController instance.
	 *
	 * @param  App\Modules\Kagi\HttpRepositories\UserRepository $user
	 * @param  App\Modules\Profiles\HttpRepositories\ProfileRepository $profile
	 * @return void
	 */
	public function __construct(
			UserRepository $user,
			ProfileRepository $profile
		)
	{
		$this->user = $user;
		$this->profile = $profile;
// middleware
// 		$this->middleware('auth');
// 		$this->middleware('admin', ['only' => 'destroy']);
//		$this->middleware('ajax', ['only' => 'updateSeen']);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Theme::View('profiles::profiles.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Theme::View('profiles::profiles.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\requests\UserCreateRequest $request
	 *
	 * @return Response
	 */
	public function store(
		UserCreateRequest $request
		)
	{
dd("store");
		$this->user->store($request->all());

		return redirect('user')->with('ok', trans('back/users.created'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
//dd("show");
		$modal_title = trans('kotoba::general.command.delete');
		$modal_body = trans('kotoba::general.ask.delete');
		$modal_route = 'profiles.destroy';
		$modal_id = $id;
		$model = '$profile';
//dd($this->profile->show($id));

		return Theme::View('profiles::profiles.show',
			$this->profile->show($id),
				compact(
					'modal_title',
					'modal_body',
					'modal_route',
					'modal_id',
					'model'
			));
//		return View('profiles::profiles.show',  $this->profile->show($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
//dd($id);
//dd(Auth::id());
		if ( ( Auth::id() != null ) && ((Auth::id() == $id) || (Auth::user()->can('manage_admin')) || (Auth::user()->can('manage_profiles'))) ) {
//dd("edit");
			$modal_title = trans('kotoba::general.command.delete');
			$modal_body = trans('kotoba::general.ask.delete');
			$modal_route = 'profiles.destroy';
			$modal_id = $id;
			$model = '$profile';

			return View('profiles::profiles.edit',
				$this->profile->edit($id),
					compact(
						'modal_title',
						'modal_body',
						'modal_route',
						'modal_id',
						'model'
				));
//			return View('profiles::profiles.edit',  $this->profile->edit($id));
		} else {
			return Theme::View('profiles::profiles.index');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\requests\UserUpdateRequest $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(
		ProfileUpdateRequest $request,
		$id
		)
	{
//dd($request->password);
		$this->profile->update($request->all(), $id);
		Flash::success( trans('kotoba::account.success.update') );
		return redirect('profiles/' . $id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(
		DeleteRequest $request,
		$id
		)
	{
//dd('destroy');
//		$this->profile->destroy($id);
		$profile= Profile::find($id);
//		$profile->roles()->detach();
		$profile->delete();

//		$this->user->destroy($id);
//		return redirect('user')->with('ok', trans('back/users.destroyed'));
		Flash::success( trans('kotoba::account.success.delete') );
		return redirect('profiles');
	}


	/**
	* Datatables data
	*
	* @return Datatables JSON
	*/
	public function data()
	{
//		$query = Profile::select(array('profiles.id','profiles.first_name','profiles.last_name','profiles.email_1','profiles.email_2'))
//			->orderBy('profiles.last_name', 'ASC');
//		$query = Profile::select('id', 'first_name', 'last_name', 'email_1', 'email_2')
//			->orderBy('last_name', 'ASC');
		$query = Profile::select('id', 'first_name', 'last_name', 'email_1', 'email_2')
			->orderBy('profiles.last_name', 'ASC');
//dd($query);

		return Datatables::of($query)
//			->remove_column('id')

			->addColumn(
				'actions',
				'
					<a href="{{ URL::to(\'profiles/\' . $id . \'/\' ) }}" class="btn btn-info btn-sm" >
						<span class="glyphicon glyphicon-search"></span>  {{ trans("kotoba::button.view") }}
					</a>
					<a href="{{ URL::to(\'profiles/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm" >
						<span class="glyphicon glyphicon-pencil"></span>  {{ trans("kotoba::button.edit") }}
					</a>
				'
				)

			->make(true);
	}


}
