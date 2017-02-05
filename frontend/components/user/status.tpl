{**
 * Статус пользователя
 *
 * @param object $user
 * @param object $status
 *}


{$component = 'ls-user-status'}
{$sPrefixJs = 'js-user-status'}

{component_define_params params=[ 'user', 'status', 'mods', 'classes', 'attributes' ]}
{cfg 'plugin.userstatus.choose_activity' assign="bChooseActivity"}

{$bCanEdit = ($oUserCurrent && $oUserCurrent->getId() == $user->getId()) ? true : false}

{if $status}
    {$sTextStatus = $status->getText()|escape}
    {$sTextDate = $status->getDate()|escape}
{/if}

{if $sTextStatus || $bCanEdit}
    <div class="{$component} {cmods name=$component mods=$mods} {$classes}
         {if $bCanEdit}{$sPrefixJs}{/if}"
         {cattr list=$attributes}>

        {if $bCanEdit}
            <div class="{$component}-editor {$sPrefixJs}-editor">
                <form method="POST" class="{$sPrefixJs}-form">
                    {component 'field.textarea'
                        name            = 'text'
                        value           = $sTextStatus
                        inputClasses    = "{$sPrefixJs}-form-text"
                        inputAttributes = [
                            'placeholder' => {lang 'plugin.userstatus.change'},
                            'data-value'  => $sTextStatus
                        ]}
                    {component 'button'
                        text = {lang 'plugin.userstatus.save'}
                        mods = 'primary'}

                    {if $bChooseActivity}
                        {component 'field.checkbox'
                            mods    = 'inline'
                            name    = 'activity'
                            label   = 'Опубликовать в активность'
                            checked = true}
                    {/if}
                </form>
            </div>
        {/if}

        <div class="{$component}-block {if $bCanEdit}{$sPrefixJs}-trigger{/if}">
            {if $bCanEdit}
                <span class="{$component}-text {if $sTextStatus} has{/if} {if $bCanEdit}{$sPrefixJs}-text{/if}">
                    {if $sTextStatus}
                        {$sTextStatus|wordwrap:50:" ":true}
                    {else}
                        {lang 'plugin.userstatus.change'}
                    {/if}
                </span>
            {else}
                {$sTextStatus|wordwrap:50:" ":true}
            {/if}

            {if $sTextStatus && $sTextDate}
                <span class="{$component}-date {if $bCanEdit}{$sPrefixJs}-date{/if}">
                    {lang 'plugin.userstatus.updated'}
                    {date_format date=$sTextDate format="F Y" days_back="365" hours_back="23" minutes_back="60" now="5"}
                </span>
            {/if}
        </div>

    </div>
{/if}