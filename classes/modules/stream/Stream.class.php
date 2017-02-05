<?php
/*-------------------------------------------------------
*
*   Plugin name:    User Status
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
     * @param  array $aIds
     * @return array
     */
    protected function loadRelatedUserStatus($aIds) {
        return $this->PluginUserstatus_User_GetStatusItemsByArrayUserId($aIds);
    }

}
