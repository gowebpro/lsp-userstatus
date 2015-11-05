<?php
/*---------------------------------------------------------------------------
* @Module Name: UserStatus
* @Description: UserStatus for LiveStreet
* @Version: 1.0
* @Author: Chiffa
* @LiveStreet version: 1.X
* @File Name: PluginUserstatus.class.php
* @License: CC BY-NC, http://creativecommons.org/licenses/by-nc/3.0/
*----------------------------------------------------------------------------
*/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
	die('Hacking attempt!');
}

class PluginUserstatus extends Plugin {

	protected $aInherits = array(
		'action' => array(
			'ActionAjax'
		)
	);
	protected $aDelegates = array(
	// вызывает баг "непонятная хуйня"
	//	'template' => array(
	//		'actions/ActionProfile/status_item.tpl'
	//	)
	);


	/**
	 * Активация плагина
	 */
	public function Activate() {
		if (!$this->isTableExists('prefix_user_status')) {
			$this->ExportSQL(dirname(__FILE__).'/sql/install.sql');
		}
		return true;
	}

	/**
	 * Инициализация плагина
	 */
	public function Init() {
		/**
		 * Подключаем CSS
		 */
		$this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__).'css/userstatus.css');
		/**
		 * Подключаем JS
		 */
		$this->Viewer_AppendScript(Plugin::GetPath(__CLASS__).'templates/framework/js/userstatus.js');
		$this->Viewer_Assign('sTemplatePathStatus', rtrim(Plugin::GetTemplatePath(__CLASS__),'/'));
	}
}
?>