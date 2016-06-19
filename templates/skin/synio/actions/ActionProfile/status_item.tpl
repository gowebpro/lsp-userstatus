{if $oUserCurrent && $oUserCurrent->getId() == $oUserProfile->getId()}
    <span id="status_view" class="status-view{if $oUserStatus && $oUserStatus->getText()} has{/if}" onclick="ls.userstatus.statusEdit()">
        {if $oUserStatus && $oUserStatus->getText()}
            {$oUserStatus->getText()|wordwrap:50:" ":true|escape:'html'}
        {else}
            {$aLang.plugin.userstatus.user_status_setup}
        {/if}
    </span>

    {if $oUserStatus && $oUserStatus->getText() && $oUserStatus->getDate()}
        <span class="status-update">
            {$aLang.plugin.userstatus.user_status_update}
            {date_format date=$oUserStatus->getDate() days_back="365" hours_back="23" minutes_back="60" seconds_back="60"}
        </span>
    {/if}

    <div id="status_editor" class="status-editor">
        <form method="POST">
            <input type="text" class="input-text" name="text" value="{$oUserStatus->getText()|escape:'html'}" data-value="{$oUserStatus->getText()|escape:'html'}" placeholder="{$aLang.plugin.userstatus.user_status_setup}" />
            <div class="status-editor-buttons">
                <button type="submit" class="button button-primary">{$aLang.plugin.userstatus.user_status_save}</button>
            </div>
        </form>
    </div>
{else}
    {if $oUserStatus && $oUserStatus->getText()}
        {$oUserStatus->getText()|wordwrap:50:" ":true|escape:'html'}
        {if $oUserStatus->getDate()}
            <span class="status-update">
                {$aLang.plugin.userstatus.user_status_update}
                {date_format date=$oUserStatus->getDate() days_back="365" hours_back="23" minutes_back="60" seconds_back="60"}
            </span>
        {/if}
    {/if}
{/if}