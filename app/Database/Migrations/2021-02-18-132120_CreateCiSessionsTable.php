<?php
/**
 * CreateCiSessionsTable.php
 *
 * @package App\Database\Migrations
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Class CreateCiSessionsTable
 *
 * @package App\Database\Migrations
 */
// phpcs:ignore
class CreateCiSessionsTable extends Migration
{
	/**
	 * テーブル作成
	 *
	 * @var $table
	 */
	protected $table = 'ci_sessions';

	/**
	 * テーブル作成
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'id'         => [
				'type'       => 'VARCHAR',
				'constraint' => 128,
				'null'       => false,
			],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => 45,
				'null'       => false,
			],
			'timestamp'  => [
				'type'     => 'INT',
				'unsigned' => true,
				'null'     => false,
				'default'  => 0,
			],
			'data'       => [
				'type'    => 'TEXT',
				'null'    => false,
				'default' => '',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey('timestamp');
		$this->forge->createTable($this->table, true);
	}

	/**
	 * テーブル削除
	 *
	 * @return void
	 */
	public function down()
	{
		$this->forge->dropTable($this->table, true);
	}
}
