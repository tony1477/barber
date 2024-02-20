<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenusMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'menuid' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'menuname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'parentid' => [
                'type' => 'INT',
                'unsigned'  => true,
                'null' => true,
            ],
            'status' => [
                'type' => 'TINYINT',
                'unsigned' => true,
                'default' => 1
            ],
        ]);
        $this->forge->addKey('menuid', true);
        $this->forge->createTable('menus');
    }

    public function down()
    {
        $this->forge->dropTable('menus');
    }
}
