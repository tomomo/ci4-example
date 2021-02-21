<?php
/**
 * File.php
 *
 * @package Common\Controllers
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Common\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Exceptions\PageNotFoundException;

/**
 * Class File
 *
 * @package Common\Controllers
 */
class File extends BaseController
{
	use ResponseTrait;

	/**
	 * アップロードディレクトリルートパス
	 *
	 * @var string $uploadPath
	 */
	private $uploadPath = WRITEPATH . 'uploads' . DIRECTORY_SEPARATOR;

	/**
	 * ファイル表示
	 *
	 * @param string ...$fileNames ファイル名
	 *
	 * @return response
	 */
	public function show(string ...$fileNames)
	{
		$fileName = implode('/', $fileNames);
		$filePath = $this->uploadPath . $fileName;

		try
		{
			$data     = file_get_contents($filePath);
			$mimeType = mime_content_type($filePath);
			return $this->response
				->setStatusCode(200)
				->setContentType($mimeType)
				->setBody($data);
		}
		catch (\Exception $e)
		{
			throw PageNotFoundException::forPageNotFound();
		}
	}

	/**
	 * ファイルダウンロード
	 *
	 * @param string ...$fileNames ファイル名
	 *
	 * @return response
	 */
	public function download(string ...$fileNames)
	{
		$fileName = implode('/', $fileNames);
		$filePath = $this->uploadPath . $fileName;

		try
		{
			$data = file_get_contents($filePath);
			return $this->response->download($fileName, $data);
		}
		catch (\Exception $e)
		{
			throw PageNotFoundException::forPageNotFound();
		}
	}

	/**
	 * アップロード処理
	 *
	 * @return object
	 */
	public function upload()
	{
		// MEMO: getFileを使う場合はpostでないとデータは取れない。
		$file = $this->request->getFile('attachment');
		if ($file->isValid() && ! $file->hasMoved())
		{
			$newName = $file->getRandomName();
			$file->move($this->uploadPath, $newName);

			$data = (object) [
								 'url'  => '/file/show/' . $file->getName(),
								 'name' => $file->getName(),
								 'ext'  => $file->getClientExtension(),
								 'type' => $file->getClientMimeType(),
							 ];
			return $this->respondCreated($data);
		}
		else
		{
			return $this->response
				->setStatusCode(400)
				->setBody($file->getErrorString());
		}
	}
}
