{if $oUserStatus}
    {$sTextStatus = $oUserStatus->getText()|escape:'html'}
    {$sTextDate = $oUserStatus->getDate()|escape:'html'}
{/if}
{if $oUserCurrent && $oUserCurrent->getId() == $oUserProfile->getId()}
    <span id="status_view" class="status-view{if $sTextStatus} has{/if}" onclick="ls.userstatus.statusEdit()">
        {if $sTextStatus}
            {$sTextStatus|wordwrap:50:" ":true}
        {else}
            {$aLang.plugin.userstatus.user_status_setup}
        {/if}
    </span>

    {if $sTextStatus && $sTextDate}
        <span class="status-update">
            {$aLang.plugin.userstatus.user_status_update}
            {date_format date=$sTextDate format="F Y" days_back="365" hours_back="23" minutes_back="60" now="5"}
        </span>
    {/if}

    <div id="status_editor" class="status-editor">
        <form method="POST">
            <input type="text" class="input-text" name="text" value="{$sTextStatus}" data-value="{$sTextStatus}" placeholder="{$aLang.plugin.userstatus.user_status_setup}" />
            <div class="status-editor-buttons">
                <button type="submit" class="button button-primary">{$aLang.plugin.userstatus.user_status_save}</button>
            </div>
        </form>
    </div>
{else}
    {if $sTextStatus}
        {$sTextStatus|wordwrap:50:" ":true}
        {if $sTextStatus && $sTextDate}
            <span class="status-update">
                {$aLang.plugin.userstatus.user_status_update}
                {date_format date=$sTextDate format="F Y" days_back="365" hours_back="23" minutes_back="60" now="5"}
            </span>
        {/if}
    {/if}
{/if}