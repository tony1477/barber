<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CustomersMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customerid' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'address' => [
                'type' => 'DECIMAL',
                'constraint' => '6,0',
                'null' => true,
            ],
            'status_customer' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'mobile_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true,
            ],
            'status' => [
                'type' => 'TINYINT',
                'unsigned' => true,
                'default' => 1
            ],
        ]);

        $this->forge->addKey('customerid',true);
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
