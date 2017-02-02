<?php

class PluginUserstatus_Update_Install extends ModulePluginManager_EntityUpdate
{
    /**
     * Выполняется при обновлении версии
     */
    public function up()
    {
        if (!$this->isTableExists('prefix_user_status')) {
            /**
             * При активации выполняем SQL дамп
             */
            $this->exportSQL(Plugin::GetPath(__CLASS__) . '/update/1.0/install.sql');
        }
    }

    /**
     * Выполняется при откате версии
     */
    public function down()
    {
        $this->exportSQLQuery('DROP TABLE prefix_user_status;');
    }
}