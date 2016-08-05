{$oUser = $oStreamEvent->getUser()}
{$oTarget = $oStreamEvent->getTarget()}


{if $oUser->getProfileSex() != 'woman'}
	{$aLang.plugin.userstatus.event_update_status}
{else}
	{$aLang.plugin.userstatus.event_update_status_female}
{/if}

{*
{if $oTarget}
	{$sTextEvent = $oTarget->getText()|escape:'html'|truncate:200}

	{if trim($sTextEvent)}

		{if $oUser->getProfileSex() != 'woman'}
			{$aLang.plugin.userstatus.event_update_status}
		{else}
			{$aLang.plugin.userstatus.event_update_status_female}
		{/if}

		<div class="stream-comment-preview">{$sTextEvent}</div>
	{else}

		{if $oUser->getProfileSex() != 'woman'}
			{$aLang.plugin.userstatus.event_update_status_clear}
		{else}
			{$aLang.plugin.userstatus.event_update_status_clear_female}
		{/if}
	{/if}

{/if}
*}