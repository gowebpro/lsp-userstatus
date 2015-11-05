<?php
/*---------------------------------------------------------------------------
* @Module Name: UserStatus
* @Description: UserStatus for LiveStreet
* @Version: 1.0
* @Author: Chiffa
* @LiveStreet version: 1.X
* @File Name: HookUser.class.php
* @License: CC BY-NC, http://creativecommons.org/licenses/by-nc/3.0/
*----------------------------------------------------------------------------
*/


/**
 * Регистрация хуков
 *
 */
class PluginUserstatus_HookUser extends Hook {
	public function RegisterHook() {
		$this->AddHook('template_profile_top_end','tplProfileTopBegin');
	}

	public function tplProfileTopBegin($aParams=array()) {
		$oUserProfile = isset($aParams['oUserProfile']) ? $aParams['oUserProfile'] : null;
		$oUserCurrent = $this->User_GetUserCurrent();
		if ($oUserProfile) {
			$oUserStatus = $this->PluginUserstatus_User_GetStatusByUserId($oUserProfile->getId());
			$this->Viewer_Assign('oUserProfile',$oUserCurrent);
			$this->Viewer_Assign('oUserCurrent',$oUserCurrent);
			$this->Viewer_Assign('oUserStatus',$oUserStatus);
			return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'inject.header_top.tpl');
		}
	}

}
?>