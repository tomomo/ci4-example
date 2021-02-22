<?php
/**
 * InformationSeeder.php
 *
 * 実行コマンド
 * php spark db:seed Information\\Database\\Seeds\\InformationSeeder
 *
 * @package Information\Database\Seeds
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Information\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Information\Entities\Information as InformationEntity;

/**
 * Class CreateInformationsTable
 *
 * @package Information\Database\Seeds
 */
class InformationSeeder extends Seeder
{
	/**
	 * データ作成
	 *
	 * @return void
	 */
	public function run()
	{
		$informationModel = model('InformationModel');

		$information = new InformationEntity();
		$information->fill([
			'subject'          => 'ようこそ',
			'body'             => 'これはSeederによって作成されたサンプルデータです。',
			'release_start_at' => date('Y-m-d'),
		]);
		$informationModel->insert($information);
	}
}
