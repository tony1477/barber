<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transid' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'transdate' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'transtime' => [
                'type' => 'TIME',
                'null' => false
            ],
            'customerid' => [
                'type' => 'INT',
                'unsigned'  => true,
                'null' => true,
            ],
            'cashierid' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'barberid' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'total_price' => [
                'type' => 'DECIMAL',
                'constraint' => '9,2',
                'default' => 0
            ],
        ]);
        $this->forge->addKey('transid', true);
        $this->forge->createTable('trans_barber');
    }

    public function down()
    {
        $this->forge->dropTable('trans_barber');
    }
}
