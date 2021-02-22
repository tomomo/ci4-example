<?php
/**
 * InformationModel.php
 *
 * @package Information\Models
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Information\Models;

use CodeIgniter\Model;

/**
 * Class Informations
 *
 * @package Information\Models
 */
class InformationModel extends Model
{
	// protected $DBGroup          = 'default';

	/**
	 * テーブル名
	 *
	 * @var $table
	 */
	protected $table = 'informations';

	// protected $primaryKey       = 'id';
	// protected $useAutoIncrement = true;
	// protected $insertID         = 0;

	/**
	 * データ型
	 *
	 * @var $returnType
	 */
	protected $returnType = 'Information\Entities\Information';

	/**
	 * 論理削除
	 *
	 * @var $returnType
	 */
	protected $useSoftDeletes = true;

	// protected $protectFields = true;
	/**
	 * 更新可能フィールド
	 *
	 * @var $allowedFields
	 */
	protected $allowedFields = [
		'subject',
		'body',
		'release_start_at',
		'release_finish_at',
	];

	// Dates
	/**
	 * タイムスタンプ
	 *
	 * @var $useTimestamps
	 */
	protected $useTimestamps = true;

	// protected $dateFormat    = 'datetime';
	// protected $createdField  = 'created_at';
	// protected $updatedField  = 'updated_at';
	// protected $deletedField  = 'deleted_at';

	// Validation
	/**
	 * 整合性チェック
	 *
	 * @var $validationRules
	 */
	protected $validationRules = [
		'subject'           => [
			'label' => 'Information.subject',
			'rules' => 'required|max_length[100]',
		],
		'body'              => [
			'label' => 'Information.body',
			'rules' => 'required|max_length[1500]',
		],
		'release_start_at'  => [
			'label' => 'Information.releaseStartAt',
			'rules' => 'valid_date',
		],
		'release_finish_at' => [
			'label' => 'Information.releaseFinishAt',
			'rules' => 'permit_empty|valid_date',
		],
	];

	// protected $validationMessages   = [];
	// protected $skipValidation       = false;
	// protected $cleanValidationRules = true;

	// Callbacks
	// protected $allowCallbacks = true;
	// protected $beforeInsert   = [];
	// protected $afterInsert    = [];
	// protected $beforeUpdate   = [];
	// protected $afterUpdate    = [];
	// protected $beforeFind     = [];
	// protected $afterFind      = [];
	// protected $beforeDelete   = [];
	// protected $afterDelete    = [];

	/**
	 * 汎用的テキスト検索クエリ
	 *
	 * @param array $params Search 検索文字列
	 *
	 * @return object
	 */
	public function search(array $params)
	{
		if (! empty($params['p']))
		{
			$p     = trim($params['p']);
			$table = $this->table;
			$this->groupStart();
			$this
				->orLike($table . '.subject', $p)
				->orLike($table . '.body', $p);
			$this->groupEnd();
		}
		return $this;
	}
}
