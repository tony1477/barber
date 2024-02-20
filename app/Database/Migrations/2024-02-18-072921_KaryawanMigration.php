<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KaryawanMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'employeeid' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ktpno' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'birthdate' => [
                'type' => 'DATE',
                'null' => true,
                'default' => '2024-02-18'
            ],
            'status' => [
                'type' => 'TINYINT',
                'unsigned' => true,
                'default' => 1
            ],
        ]);
        $this->forge->addKey('employeeid', true);
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('employee');
    }
}
