<?php
/*---------------------------------------------------------------------------
* @Module Name: UserStatus
* @Description: UserStatus for LiveStreet
* @Version: 1.0
* @Author: Chiffa
* @LiveStreet version: 1.X
* @File Name: Status.entity.class.php
* @License: CC BY-NC, http://creativecommons.org/licenses/by-nc/3.0/
*----------------------------------------------------------------------------
*/

class PluginUserstatus_ModuleUser_EntityStatus extends EntityORM {
	protected $aRelations = array(
		'user'=>array(self::RELATION_TYPE_BELONGS_TO,'ModuleUser_EntityUser','user_id')
	);

}
?>