{if $oUserCurrent && $oUserCurrent->getId()==$oUserProfile->getId()}
	<span id="status_view" onclick="ls.userstatus.statusEdit()">
		{if $oUserStatus && $oUserStatus->getText()}
		<span class="my-status">{$oUserStatus->getText()|wordwrap:50:" ":true|escape:'html'}</span>
		{else}
		<span class="no-status">{$aLang.plugin.userstatus.user_status_setup}</span>
		{/if}
	</span>
	{if $oUserStatus && $oUserStatus->getText() && $oUserStatus->getDate()}
	<span id="status_update" class="clear">
		{$aLang.plugin.userstatus.user_status_update}
		{date_format date=$oUserStatus->getDate() days_back="365" hours_back="23" minutes_back="60" seconds_back="60"}
	</span>
	{/if}

	<div id="status_editor" style="display:none">
		<div class="editor">
			<input type="text" class="input-text input-width-400" id="editor_text" value="" placeholder="{$aLang.plugin.userstatus.user_status_setup}" /><br/>
			<div class="clearfix">
				<div class="fl-r">
					<button type="button" class="button button-primary" id="editor_submit">{$aLang.plugin.userstatus.user_status_save}</button>
					<button type="button" class="button" id="editor_cancel" >{$aLang.plugin.userstatus.user_status_cancel}</button>
				</div>
			</div>
		</div>
	</div>
{else}
	{if $oUserStatus && $oUserStatus->getText()}
		{$oUserStatus->getText()|wordwrap:50:" ":true|escape:'html'|escape:'html'}
		{if $oUserStatus->getDate()}
		<span class="clear" id="status_update">
			{$aLang.profile_status_update}
			{date_format date=$oUserStatus->getDate() days_back="365" hours_back="23" minutes_back="60" seconds_back="60"}
		</span>
		{/if}
	{/if}
{/if}