<?php

use yii\db\Migration;

/**
 * Class m231201_185555_create_produtos
 */
class m231201_185555_create_produtos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('produtos',[
            'id' => $this->primaryKey(),
            'nome' => $this->string(30)->notNull(),
            'unidade' => $this->string(40)->notNull(),
            'valor_unitario' => $this->decimal(6,2)->notNull(),
            'validade' => $this->date()->notNull(),
            'status' => $this->integer()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('produtos');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231201_185555_create_produtos cannot be reverted.\n";

        return false;
    }
    */
}
