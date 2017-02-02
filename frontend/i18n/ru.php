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
 * Русский языковой файл для плагина
 */
return [
    'config' => [
        'main' => [
            'choose_activity' => [
                'name' => 'Публикация в "активность" на выбор пользователя',
                'description' => 'Разрешить пользователям выбирать - публиковать или нет обновление статуса в раздел "активность"',
            ]
        ]
    ],
    'config_sections' => [
        'main' => [
            'name' => 'Основные настройки',
            'description' => '',
        ]
    ],

    'change' => 'Изменить статус',
    'change_ok' => 'Статус сохранен',

    'updated' => 'Обновлен',
    'updated_now' => 'Обновлен только что',

    'save' => 'Сохранить',
    'cancel' => 'Отменить',

    'event_type_update_status' => 'Обновление статуса профиля',

    'event_update_status_male' => 'обновил статус профиля',
    'event_update_status_male_clear' => 'очистил статус профиля',

    'event_update_status_female' => 'обновила статус профиля',
    'event_update_status_female_clear' => 'очистила статус профиля',

];
