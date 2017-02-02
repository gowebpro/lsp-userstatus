{**
 * Статус пользователя
 *
 * @param object $user
 * @param object $status
 *}


{$component = 'ls-user-status'}
{$sJsClass = 'js-user-status'}

{component_define_params params=[ 'user', 'status', 'mods', 'classes', 'attributes' ]}

{cfg 'plugin.userstatus.choose_activity' assign="bChooseActivity"}

{if $status}
    {$sTextStatus = $status->getText()|escape}
    {$sTextDate = $status->getDate()|escape}
{/if}

<div class="{$component} {cmods name=$component mods=$mods} {$sJsClass} {$classes}" {cattr list=$attributes}>

    {if $oUserCurrent && $oUserCurrent->getId() == $user->getId()}
        <div class="{$component}-editor {$sJsClass}-editor">
            <form method="POST" class="{$sJsClass}-form">
                {component 'field.textarea'
                    name            = 'text'
                    value           = $sTextStatus
                    inputClasses    = "{$sJsClass}-form-text"
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

    <div class="{$component}-block {$sJsClass}-trigger">
        {if $oUserCurrent && $oUserCurrent->getId() == $user->getId()}
            <span class="{$component}-text {if $sTextStatus} has{/if} {$sJsClass}-text">
                {if $sTextStatus}
                    {$sTextStatus|wordwrap:50:" ":true}
                {else}
                    {lang 'plugin.userstatus.change'}
                {/if}
            </span>
        {else}
            {if $sTextStatus}
                {$sTextStatus|wordwrap:50:" ":true}
            {/if}
        {/if}

        {if $sTextStatus && $sTextDate}
            <span class="{$component}-date {$sJsClass}-date">
                {lang 'plugin.userstatus.updated'}
                {date_format date=$sTextDate format="F Y" days_back="365" hours_back="23" minutes_back="60" now="5"}
            </span>
        {/if}
    </div>

</div>
