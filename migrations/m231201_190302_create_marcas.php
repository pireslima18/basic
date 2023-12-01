<?php

use yii\db\Migration;

/**
 * Class m231201_190302_create_marcas
 */
class m231201_190302_create_marcas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('marcas',[
            'id' => $this->primaryKey(),
            'nome' => $this->string(30)->notNull(),
            'id_produto' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_id_produto', 'marcas', 'id_produto', 'produtos', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropForeignKey('fk_id_produto', 'marcas');
        $this->dropTable('marcas');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231201_190302_create_marcas cannot be reverted.\n";

        return false;
    }
    */
}
