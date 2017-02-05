<?php
/*-------------------------------------------------------
*
*   Plugin name:    User Status
*   Author:         Chiffa
*   Web:            http://goweb.pro
*
---------------------------------------------------------
*/


class PluginUserstatus_ActionAjax extends PluginUserstatus_Inherit_ActionAjax
{

    /**
     * Регистрация евентов
     */
    protected function RegisterEvent()
    {
        parent::RegisterEvent();
        $this->AddEventPreg('#^user$#i', '#^status$#', 'EventUserStatus');
    }


    /**********************************************************************************
     ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
     **********************************************************************************
     */

    /**
     * Устанавливает статус пользователя
     */
    protected function EventUserStatus()
    {
        if (!$this->oUserCurrent) {
            $this->Message_AddErrorSingle($this->Lang_Get('need_authorization'), $this->Lang_Get('error'));
            return false;
        }
        if (!$oUserStatus = $this->PluginUserstatus_User_GetStatusByUserId($this->oUserCurrent->getId())) {
            $oUserStatus = Engine::GetEntity('PluginUserstatus_User_Status');
            $oUserStatus->setUserId($this->oUserCurrent->getId());
        }
        $oUserStatus->setText(getRequestStr('text'));
        $oUserStatus->setDate(date('Y-m-d H:i:s'));
        /**
         * Сохраняем
         */
        if (!$oUserStatus->Save()) {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
            return false;
        }
        /**
         * Добавляем событие в ленту
         */
        if (isPost('activity') || (!Config::Get('plugin.userstatus.choose_activity'))) {
            $this->Stream_write($oUserStatus->getUserId(), 'update_status', $oUserStatus->getUserId());
        }
        /**
         * Показываем сообщение и передаем переменные в ajax ответ
         */
        $this->Viewer_AssignAjax('sStatusText', $oUserStatus->getText());
        $this->Viewer_AssignAjax('sStatusDate', $this->Lang_Get('plugin.userstatus.updated_now'));
        $this->Message_AddNoticeSingle($this->Lang_Get('plugin.userstatus.change_ok'));
        return true;
    }

}
