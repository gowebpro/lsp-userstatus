<?php

class PluginUserstatus_Update_Update2 extends ModulePluginManager_EntityUpdate
{
    /**
     * Выполняется при обновлении версии
     */
    public function up()
    {
        $this->exportSQL(Plugin::GetPath(__CLASS__) . '/update/2.0.0/up.sql');
    }

    /**
     * Выполняется при откате версии
     */
    public function down()
    {
        $this->exportSQL(Plugin::GetPath(__CLASS__) . '/update/2.0.0/down.sql');
    }
}