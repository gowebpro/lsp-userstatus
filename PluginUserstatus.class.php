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
        /**
         * Добавляем в ленту новый тип события
         *  - при наличии модуля Stream
         */
        if (class_exists('ModuleStream')) {
            $this->Stream_AddEventType('update_status', [ 'related' => 'userStatus' ]);
            /**
             * Добавляем текстовки новых типов событий
             */
            $this->Lang_AddMessages([
                'settings' => $this->Lang_Get('plugin.userstatus.activity.settings')
            ], [
                'name' => 'activity'
            ]);
            $this->Viewer_Assign('aLang', $this->Lang_GetLangMsg());
        }
    }

}
