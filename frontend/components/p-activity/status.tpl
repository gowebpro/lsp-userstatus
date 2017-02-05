{**
 * Событие "Обновление статуса"
 *
 * @param object $event
 *}

{component_define_params params=[ 'event' ]}

{$type   = $event->getEventType()}
{$target = $event->getTarget()}
{$user   = $event->getUser()}
{$gender = ( $user->getProfileSex() == 'woman' ) ? 'female' : 'male'}


{lang "plugin.userstatus.event_update_status_{$gender}"}

{*if $target}
    {if trim($sTextEvent)}
        {lang "plugin.userstatus.event_update_status_{$gender}"}

        {activity_event_text text=$target->getText()}
    {else}
        {lang "plugin.userstatus.event_update_status_{$gender}_clear"}
    {/if}
{/if*}