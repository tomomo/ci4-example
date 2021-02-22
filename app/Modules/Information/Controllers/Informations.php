<?php
/**
 * Informations.php
 *
 * @package Information\Controllers
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Information\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Information\Entities\Information as InformationEntity;

/**
 * Class Informations
 *
 * @package Information\Controllers
 */
class Informations extends BaseController
{
	/**
	 * 一覧画面
	 *
	 * @return object
	 */
	public function index()
	{
		helper(['form', 'cookie']);

		$params = $this->request->getGet();
		setCookie('informations_search', $this->request->getServer('REQUEST_URI'));

		$informationModel = model('InformationModel');
		$informationItems = $informationModel->search($params);

		$information = (object) [
									'items' => $informationItems->paginate(),
									'pager' => $informationItems->pager,
								];

		$data = compact('information', 'params');
		return view('Information\Views\index.html', $data);
	}

	/**
	 * 作成画面
	 *
	 * @param null|string $id ID
	 *
	 * @return object
	 */
	public function new($id = null)
	{
		helper(['form', 'cookie']);

		if ($id)
		{
			$information = model('InformationModel')->find($id);
			if (! $information)
			{
				throw PageNotFoundException::forPageNotFound();
			}
		}
		else
		{
			$information = new \Information\Entities\Information();
		}

		$data = compact('information');
		return view('Information\Views\new.html', $data);
	}

	/**
	 * 編集画面
	 *
	 * @param string $id ID
	 *
	 * @return object
	 */
	public function edit(string $id)
	{
		helper(['form', 'cookie']);

		$information = model('InformationModel')->find($id);
		if (! $information)
		{
			throw PageNotFoundException::forPageNotFound();
		}

		$data = compact('information');
		return view('Information\Views\edit.html', $data);
	}

	/**
	 * 削除確認画面
	 *
	 * @param string $id ID
	 *
	 * @return object
	 */
	public function remove(string $id)
	{
		helper('form');

		$information = model('InformationModel')->find($id);
		if (! $information)
		{
			throw PageNotFoundException::forPageNotFound();
		}

		$data = compact('information');
		return view('Information\Views\remove.html', $data);
	}

	/**
	 * 作成処理
	 *
	 * @return object
	 */
	public function create()
	{
		$informationModel = model('InformationModel');

		$information = new InformationEntity();
		$information->fill($this->request->getPost());
		$result = $informationModel->insert($information);
		if (! $result)
		{
			$invalid = $informationModel->errors();
			return redirect()
				->back()
				->withInput()
				->with('error', lang('App.validationError'))
				->with('invalid', $invalid);
		}
		$id = $informationModel->insertID();
		return redirect()
			->with('success', lang('App.successfullyCreated') . ' ' .
				anchor('/informations/new', lang('App.createModeNewData')))
			->to('/informations/edit/' . $id);
	}

	/**
	 * 更新処理
	 *
	 * @param string $id ID
	 *
	 * @return object
	 */
	public function update(string $id)
	{
		$informationModel = model('InformationModel');

		$information = new InformationEntity();
		$information->fill($this->request->getPost());

		$result = $informationModel->update($id, $information);
		if (! $result)
		{
			$invalid = $informationModel->errors();
			return redirect()
				->back()
				->withInput()
				->with('error', lang('App.validationError'))
				->with('invalid', $invalid);
		}

		return redirect()
			->with('success', lang('App.successfullyUpdated'))
			->to('/informations/edit/' . $id);
	}

	/**
	 * 削除処理
	 *
	 * @param string $id ID
	 *
	 * @return object
	 */
	public function delete(string $id)
	{
		$informationModel = model('InformationModel');

		$result = $informationModel->delete($id);
		return redirect()
			->with('success', lang('App.successfullyDeleted'))
			->to('/informations');
	}
}
