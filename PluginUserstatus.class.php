<?php
/*-------------------------------------------------------
*
*   Plugin name:    Userstatus
*   Author:         Chiffa
*   Web:            http://goweb.pro
*
---------------------------------------------------------
*/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginUserstatus extends Plugin
{

    protected $aInherits = array(
        'action' => array(
            'ActionAjax'
        )
    );


    /**
     * Активация плагина
     */
    public function Activate()
    {
        if (!$this->isTableExists('prefix_user_status')) {
            $this->ExportSQL(dirname(__FILE__).'/sql/install.sql');
        }
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init()
    {
        $this->Viewer_Assign('sTemplatePathStatus', rtrim(Plugin::GetTemplatePath(__CLASS__),'/'));
        /**
         * Подключаем CSS
         */
        $this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__) . 'css/userstatus.css?v=1');
        /**
         * Подключаем JS
         */
        $this->Viewer_AppendScript(Plugin::GetPath(__CLASS__) . 'templates/framework/js/userstatus.js?v=1');
    }

}
