<?php
/**
 * Information.php
 *
 * @package Information\Entities
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Information\Entities;

use CodeIgniter\Entity;

/**
 * Class Information
 *
 * @package Information\Entities
 */
class Information extends Entity
{
	/**
	 * 初期値
	 *
	 * @var $attributes
	 */
	protected $attributes = [
		'id'                => null,
		'subject'           => null,
		'body'              => null,
		'release_start_at'  => null,
		'release_finish_at' => null,
	];

	/**
	 * DataMap
	 *
	 * @var $datamap
	 */
	protected $datamap = [
		'releaseStartAt'  => 'release_start_at',
		'releaseFinishAt' => 'release_finish_at',
		'createdAt'       => 'created_at',
		'updatedAt'       => 'updated_at',
		'deletedAt'       => 'deleted_at',
	];

	/**
	 * SetReleaseFinishAt
	 *
	 * @param string $dateString 日付
	 *
	 * @return object
	 */
	public function setReleaseFinishAt(string $dateString)
	{
		$this->attributes['release_finish_at'] = (! empty($dateString)) ? $dateString : null;
		return $this;
	}
}
