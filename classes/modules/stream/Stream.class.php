<?php
/*-------------------------------------------------------
*
*   Plugin name:    Userstatus
*   Author:         Chiffa
*   Web:            http://goweb.pro
*
---------------------------------------------------------
*/

class PluginUserstatus_ModuleStream extends PluginUserstatus_Inherit_ModuleStream
{

    /**
     * Получает объекты статусов
     *
     * @param unknown_type $aIds
     * @return unknown
     */
    protected function loadRelatedUserStatus($aIds) {
        return $this->PluginUserstatus_User_GetStatusItemsByArrayUserId($aIds);
    }

}
