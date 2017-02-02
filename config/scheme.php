<?php
/*-------------------------------------------------------
*
*   Plugin name:    Userstatus
*   Author:         Chiffa
*   Web:            http://goweb.pro
*
---------------------------------------------------------
*/


return [
    /*
     * Описание настроек плагина для интерфейса редактирования
     */
    '$config_scheme$' => [
        'choose_activity' => [
            'type'        => 'boolean',
            'name'        => 'config.main.choose_activity.name',
            'description' => 'config.main.choose_activity.description',
        ],
    ],
    /**
     * Описание разделов для настроек
     * Каждый раздел группирует определенные параметры конфига
     */
    '$config_sections$' => [
        [
            'name'         => 'config_sections.main.name',
            'description'  => 'config_sections.main.description',
            'allowed_keys' => [
                'choose_activity',
            ]
        ]
    ]
];
