<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmployeeChangeTableNameMigration extends Migration
{
    public function up()
    {
        $this->forge->renameTable('employee','employees');
    }

    public function down()
    {
        $this->forge->renameTable('employees','employee');
    }
}
