<?php
/*-------------------------------------------------------
*
*	Plugin name:	Userstatus
*	Author:			Chiffa
*	Web:			http://goweb.pro
*
---------------------------------------------------------
*/

/**
 * Экшен обработки ajax запросов
 * Ответ отдает в JSON фомате
 *
 */
class PluginUserstatus_ActionAjax extends PluginUserstatus_Inherit_ActionAjax
{

    /**
     * Регистрация евентов
     */
    protected function RegisterEvent()
    {
        parent::RegisterEvent();
        $this->AddEventPreg('/^user$/i','/^status$/','EventUserStatus');
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
        $oUserStatus->setText(getRequest('text', null, 'post'));
        $oUserStatus->setDate(date('Y-m-d H:i:s'));
        /**
         * Сохраняем
         */
        if (!$oUserStatus->Save()) {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'), $this->Lang_Get('error'));
            return false;
        }
        /**
         * Показываем сообщение и передаем переменные в ajax ответ
         */
        $oViewer = $this->Viewer_GetLocalViewer();
        $oViewer->Assign('oUserProfile', $this->oUserCurrent);
        $oViewer->Assign('oUserCurrent', $this->oUserCurrent);
        $oViewer->Assign('oUserStatus', $oUserStatus);
        $sText = $oViewer->Fetch(Plugin::GetTemplatePath(__CLASS__) . 'actions/ActionProfile/status_item.tpl');
        $this->Viewer_AssignAjax('sText', $sText);
        $this->Message_AddNoticeSingle($this->Lang_Get('plugin.userstatus.user_status_change_ok'));
        return true;
    }

}
