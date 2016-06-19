<?php
/*-------------------------------------------------------
*
*	Plugin name:	Userstatus
*	Author:			Chiffa
*	Web:			http://goweb.pro
*
---------------------------------------------------------
*/

class PluginUserstatus_ModuleUser_EntityStatus extends EntityORM
{

    protected $aRelations = array(
        'user' => array(self::RELATION_TYPE_BELONGS_TO, 'ModuleUser_EntityUser', 'user_id')
    );

}
