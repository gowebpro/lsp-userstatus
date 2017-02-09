<?php
/*-------------------------------------------------------
*
*   Plugin name:    User Status
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

    protected $aInherits = [
        'action' => [
            'ActionAjax'
        ],
        'module' => [
            'ModuleStream'
        ]
    ];


    /**
     * Инициализация плагина
     */
    public function Init()
    {
        /**
         * Подключаем JS
         */
        $this->Viewer_AppendScript(Plugin::GetPath(__CLASS__) . 'frontend/assets/js/init.js');
    }

}
