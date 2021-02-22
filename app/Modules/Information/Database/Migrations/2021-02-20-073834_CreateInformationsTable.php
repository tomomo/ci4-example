<?php
/**
 * CreateInformationsTable.php
 *
 * @package Information\Database\Migrations
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Information\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Class CreateInformationsTable
 *
 * @package Information\Database\Migrations
 */
// phpcs:ignore
class CreateInformationsTable extends Migration
{
	/**
	 * テーブル名
	 *
	 * @var $table
	 */
	protected $table = 'informations';

	/**
	 * テーブル作成
	 *
	 * @return void
	 */
	public function up()
	{
		$this->forge->addField([
			'id'                => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'subject'           => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
			],
			'body'              => [
				'type'       => 'VARCHAR',
				'constraint' => 1500,
			],
			'release_start_at'  => [
				'type' => 'DATETIME',
			],
			'release_finish_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'created_at'        => [
				'type' => 'DATETIME',
			],
			'updated_at'        => [
				'type' => 'DATETIME',
			],
			'deleted_at'        => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
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
