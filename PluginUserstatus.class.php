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
         * Подключаем компоненты
         */
        $this->Component_Add('userstatus:p-user');
        $this->Component_Add('userstatus:p-activity');
        /**
         * Подключаем JS
         */
        $this->Viewer_AppendScript(Plugin::GetPath(__CLASS__) . 'frontend/assets/js/init.js');
        /**
         * Добавляем в ленту новый тип события
         *  - при наличии модуля Stream
         */
        if (class_exists('ModuleStream')){
            $this->Stream_AddEventType('update_status', array('related' => 'userStatus'));
            /**
             * Добавляем текстовки новых типов событий
             */
            $this->Lang_AddMessages([
                'settings' => [
                    'options' => [
                        'update_status' => $this->Lang_Get('plugin.userstatus.event_type_update_status')
                    ]
                ]
            ], [ 'name' => 'activity' ]);
            $this->Viewer_Assign('aLang', $this->Lang_GetLangMsg());
        }
    }

}
