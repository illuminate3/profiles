<?php

namespace App\Modules\Profiles\HttpRepositories;


abstract class BaseRepository {


	/**
	 * The Model instance.
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	/**
	 * Get all models.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function all()
	{
		return $this->model->all();
	}

	/**
	 * Destroy a model.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	/**
	 * Get Model by id.
	 *
	 * @param  int  $id
	 * @return App\Models\Model
	 */
	public function getById($id)
	{
//dd($this->model);
		return $this->model->find($id);
	}


}
