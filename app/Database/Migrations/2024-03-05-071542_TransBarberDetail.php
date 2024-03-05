<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransBarberDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transdetid' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'transid' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'null' => false,
            ],
            'categoryid' => [
                'type' => 'INT',
                'null' => false
            ],
            'qty' => [
                'type' => 'INT',
                'default' => 1,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'sub_total' => [
                'type' => 'DECIMAL',
                'constraint' => '9,2',
                'default' => 0
            ],
        ]);
        $this->forge->addKey('transdetid', true);
        $this->forge->createTable('trans_barber_detail');
    }

    public function down()
    {
        $this->forge->dropTable('trans_barber_detail');
    }
}
