<?php
/*-------------------------------------------------------
*
*   Plugin name:    User Status
*   Author:         Chiffa
*   Web:            http://goweb.pro
*
---------------------------------------------------------
*/

class PluginUserstatus_ModuleUser_EntityStatus extends EntityORM
{

    protected $aRelations = [
        'user' => [
            self::RELATION_TYPE_BELONGS_TO,
            'ModuleUser_EntityUser',
            'user_id'
        ]
    ];

}
