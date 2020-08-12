<?php

namespace persek_web_protocol;


// includes
require_once __DIR__.'/../persek_protocol/str_helper.php';
require_once __DIR__.'/../generic_protocol/str_helper.php';
require_once __DIR__.'/../basic_objects/str_helper.php';
require_once __DIR__.'/../dtmf_tools/str_helper.php';
require_once __DIR__.'/../lang_tools/str_helper.php';
require_once __DIR__.'/../basic_parser/str_helper.php';

// enums

function to_string__ReminderStatus_state_e( $r )
{
    $map = array
    (
        ReminderStatus_state_e__IDLE => 'IDLE',
        ReminderStatus_state_e__ACTIVE => 'ACTIVE',
        ReminderStatus_state_e__COMPLETED_OK => 'COMPLETED_OK',
        ReminderStatus_state_e__COMPLETED_FAILED => 'COMPLETED_FAILED',
        ReminderStatus_state_e__WAITING_REDIAL_TIMER => 'WAITING_REDIAL_TIMER',
    );

    if( array_key_exists( $r, $map ) )
    {
        return $map[ $r ];
    }

    return '?';
}

// objects

function to_string__Reminder( & $r )
{
    $res = "";    $res .= "(";

    $res .= " msg_templ_id=" . \basic_parser\to_string__int( $r->msg_templ_id );
    $res .= " feedback_templ_id=" . \basic_parser\to_string__int( $r->feedback_templ_id );
    $res .= " effective_time=" . \basic_objects\to_string__LocalTime( $r->effective_time );
    $res .= " remind_period=" . \basic_parser\to_string__int( $r->remind_period );
    $res .= " params=" . \basic_parser\to_string__map( $r->params, '\basic_parser\to_string__string', '\basic_parser\to_string__string' ); // Map
    $res .= " actions=" . \basic_parser\to_string__map( $r->actions, '\dtmf_tools\to_string__tone_e', '\persek_protocol\to_string__ReminderAction' ); // Map
    $res .= " options=" . \persek_protocol\to_string__ReminderOptions( $r->options );

    $res .= ")";

    return $res;
}

function to_string__ReminderStatus( & $r )
{
    $res = "";    $res .= "(";

    $res .= " job_id=" . \basic_parser\to_string__int( $r->job_id );
    $res .= " state=" . to_string__ReminderStatus_state_e( $r->state );
    $res .= " feedback=" . \basic_parser\to_string__int( $r->feedback );
    $res .= " effective_time=" . \basic_objects\to_string__LocalTime( $r->effective_time );
    $res .= " current_try=" . \basic_parser\to_string__int( $r->current_try );
    $res .= " last_update_time=" . \basic_objects\to_string__LocalTime( $r->last_update_time );
    $res .= " next_exec_time=" . \basic_objects\to_string__LocalTime( $r->next_exec_time );
    $res .= " contact_id=" . \basic_parser\to_string__int( $r->contact_id );
    $res .= " salutation=" . \basic_parser\to_string__string( $r->salutation );
    $res .= " name=" . \basic_parser\to_string__string( $r->name );
    $res .= " first_name=" . \basic_parser\to_string__string( $r->first_name );
    $res .= " contact_phone_id=" . \basic_parser\to_string__int( $r->contact_phone_id );
    $res .= " phone_number=" . \basic_parser\to_string__string( $r->phone_number );
    $res .= " template_localized_name=" . \basic_parser\to_string__string( $r->template_localized_name );

    $res .= ")";

    return $res;
}

function to_string__Contact( & $r )
{
    $res = "";    $res .= "(";

    $res .= " user_id=" . \basic_parser\to_string__int( $r->user_id );
    $res .= " contact_id=" . \basic_parser\to_string__int( $r->contact_id );
    $res .= " salutation=" . \basic_parser\to_string__string( $r->salutation );
    $res .= " name=" . \basic_parser\to_string__string( $r->name );
    $res .= " first_name=" . \basic_parser\to_string__string( $r->first_name );
    $res .= " birthday=" . \basic_objects\to_string__Date( $r->birthday );
    $res .= " notice=" . \basic_parser\to_string__string( $r->notice );
    $res .= " landline_contact_phone_id=" . \basic_parser\to_string__int( $r->landline_contact_phone_id );
    $res .= " landline_contact_phone=" . \basic_parser\to_string__string( $r->landline_contact_phone );
    $res .= " mobile_contact_phone_id=" . \basic_parser\to_string__int( $r->mobile_contact_phone_id );
    $res .= " mobile_contact_phone=" . \basic_parser\to_string__string( $r->mobile_contact_phone );

    $res .= ")";

    return $res;
}

// base messages

// messages

function to_string__GetReminderStatusRequest( & $r )
{
    $res = "";    // base class
    $res .= \persek_protocol\to_string__Request( $r );

    $res .= " user_id=" . \basic_parser\to_string__int( $r->user_id );
    $res .= " search_filter=" . \basic_parser\to_string__string( $r->search_filter );
    $res .= " effective_date_time_range=" . \basic_objects\to_string__LocalTimeRange( $r->effective_date_time_range );
    $res .= " page_size=" . \basic_parser\to_string__int( $r->page_size );
    $res .= " page_number=" . \basic_parser\to_string__int( $r->page_number );
    $res .= " lang=" . \lang_tools\to_string__lang_e( $r->lang );

    return $res;
}

function to_string__GetReminderStatusResponse( & $r )
{
    $res = "";    // base class
    $res .= \generic_protocol\to_string__BackwardMessage( $r );

    $res .= " total_size=" . \basic_parser\to_string__int( $r->total_size );
    $res .= " statuses=" . \basic_parser\to_string__vector( $r->statuses, '\persek_web_protocol\to_string__ReminderStatus' ); // Array

    return $res;
}

function to_string__FindContactsRequest( & $r )
{
    $res = "";    // base class
    $res .= \persek_protocol\to_string__Request( $r );

    $res .= " user_id=" . \basic_parser\to_string__int( $r->user_id );
    $res .= " search_filter=" . \basic_parser\to_string__string( $r->search_filter );
    $res .= " page_size=" . \basic_parser\to_string__int( $r->page_size );
    $res .= " page_number=" . \basic_parser\to_string__int( $r->page_number );
    $res .= " lang=" . \lang_tools\to_string__lang_e( $r->lang );

    return $res;
}

function to_string__FindContactsResponse( & $r )
{
    $res = "";    // base class
    $res .= \generic_protocol\to_string__BackwardMessage( $r );

    $res .= " total_size=" . \basic_parser\to_string__int( $r->total_size );
    $res .= " contacts=" . \basic_parser\to_string__vector( $r->contacts, '\persek_web_protocol\to_string__Contact' ); // Array

    return $res;
}

function to_string__GetContactRequest( & $r )
{
    $res = "";    // base class
    $res .= \persek_protocol\to_string__Request( $r );

    $res .= " contact_id=" . \basic_parser\to_string__int( $r->contact_id );
    $res .= " lang=" . \lang_tools\to_string__lang_e( $r->lang );

    return $res;
}

function to_string__GetContactResponse( & $r )
{
    $res = "";    // base class
    $res .= \generic_protocol\to_string__BackwardMessage( $r );

    $res .= " contact=" . to_string__Contact( $r->contact );

    return $res;
}

function to_string__AddReminderRequest( & $r )
{
    $res = "";    // base class
    $res .= \persek_protocol\to_string__Request( $r );

    $res .= " contact_phone_id=" . \basic_parser\to_string__int( $r->contact_phone_id );
    $res .= " reminder=" . to_string__Reminder( $r->reminder );

    return $res;
}

function to_string__AddReminderResponse( & $r )
{
    $res = "";    // base class
    $res .= \generic_protocol\to_string__BackwardMessage( $r );

    $res .= " job_id=" . \basic_parser\to_string__int( $r->job_id );

    return $res;
}

function to_string__ModifyReminderRequest( & $r )
{
    $res = "";    // base class
    $res .= \persek_protocol\to_string__Request( $r );

    $res .= " job_id=" . \basic_parser\to_string__int( $r->job_id );
    $res .= " contact_phone_id=" . \basic_parser\to_string__int( $r->contact_phone_id );
    $res .= " reminder=" . to_string__Reminder( $r->reminder );

    return $res;
}

function to_string__ModifyReminderResponse( & $r )
{
    $res = "";    // base class
    $res .= \generic_protocol\to_string__BackwardMessage( $r );


    return $res;
}

function to_string__GetReminderRequest( & $r )
{
    $res = "";    // base class
    $res .= \persek_protocol\to_string__Request( $r );

    $res .= " job_id=" . \basic_parser\to_string__int( $r->job_id );

    return $res;
}

function to_string__GetReminderResponse( & $r )
{
    $res = "";    // base class
    $res .= \generic_protocol\to_string__BackwardMessage( $r );

    $res .= " contact_id=" . \basic_parser\to_string__int( $r->contact_id );
    $res .= " contact_phone_id=" . \basic_parser\to_string__int( $r->contact_phone_id );
    $res .= " contact_phone=" . \basic_parser\to_string__string( $r->contact_phone );
    $res .= " reminder=" . to_string__Reminder( $r->reminder );

    return $res;
}

// generic

function to_string( $obj )
{
    $handler_map = array(
        // objects
        'persek_web_protocol\Reminder'         => 'to_string__Reminder',
        'persek_web_protocol\ReminderStatus'         => 'to_string__ReminderStatus',
        'persek_web_protocol\Contact'         => 'to_string__Contact',
        // messages
        'persek_web_protocol\GetReminderStatusRequest'         => 'to_string__GetReminderStatusRequest',
        'persek_web_protocol\GetReminderStatusResponse'         => 'to_string__GetReminderStatusResponse',
        'persek_web_protocol\FindContactsRequest'         => 'to_string__FindContactsRequest',
        'persek_web_protocol\FindContactsResponse'         => 'to_string__FindContactsResponse',
        'persek_web_protocol\GetContactRequest'         => 'to_string__GetContactRequest',
        'persek_web_protocol\GetContactResponse'         => 'to_string__GetContactResponse',
        'persek_web_protocol\AddReminderRequest'         => 'to_string__AddReminderRequest',
        'persek_web_protocol\AddReminderResponse'         => 'to_string__AddReminderResponse',
        'persek_web_protocol\ModifyReminderRequest'         => 'to_string__ModifyReminderRequest',
        'persek_web_protocol\ModifyReminderResponse'         => 'to_string__ModifyReminderResponse',
        'persek_web_protocol\GetReminderRequest'         => 'to_string__GetReminderRequest',
        'persek_web_protocol\GetReminderResponse'         => 'to_string__GetReminderResponse',
    );

    $type = get_class( $obj );

    if( array_key_exists( $type, $handler_map ) )
    {
        $func = '\\persek_web_protocol\\' . $handler_map[ $type ];
        return $func( $obj );
    }

    return \persek_protocol\to_string( $obj );
}

# namespace_end persek_web_protocol


?>
