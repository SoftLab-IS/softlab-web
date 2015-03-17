<?php

use yii\db\Schema;
use yii\db\Migration;

class m150317_124847_init_sql extends Migration
{
    public function up()
    {
        $sql = file_get_contents(__DIR__ . '/../../database/sql/db-verzija-100.sql');

        $this->execute($sql);
    }

    public function down()
    {
        echo "m150317_124847_init_sql cannot be reverted.\n";
    }
}
