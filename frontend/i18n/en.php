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
 * English language file for plugin
 */
return [
    'config' => [
        'main' => [
            'choose_activity' => [
                'name' => 'Publication in the activity stream on the user\'s discretion',
                'description' => 'Allow users to choose - or not to publish a status update to the "Activity"',
            ]
        ]
    ],
    'config_sections' => [
        'main' => [
            'name' => 'Base',
            'description' => '',
        ]
    ],
    'activity' => [
        'settings' => [
            'options' => [
                'update_status' => 'User status update',
            ]
        ]
    ],

    'change' => 'Edit',
    'change_ok' => 'Saved',

    'updated' => 'Update',
    'updated_now' => 'Update now',

    'save' => 'Save',
    'cancel' => 'Candel',

    'event_update_status_male' => 'update profile status',
    'event_update_status_male_clear' => 'erase profile status',

    'event_update_status_female' => 'update profile status',
    'event_update_status_female_clear' => 'erase profile status',

];
