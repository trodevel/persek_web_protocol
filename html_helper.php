<?php

namespace persek_web_protocol;


// base include
require_once __DIR__.'/../persek_protocol/html_helper.php';
// includes
require_once __DIR__.'/../generic_protocol/html_helper.php';
require_once __DIR__.'/../basic_objects/html_helper.php';
require_once __DIR__.'/../dtmf_tools_protocol/html_helper.php';
require_once __DIR__.'/../lang_tools_protocol/html_helper.php';
require_once __DIR__.'/../basic_parser/html_helper.php';

// own includes
require_once __DIR__.'/../persek_web_protocol/str_helper.php';

// enums

function to_html_header__ReminderStatus_state_e( $r )
{
    return array( 'REMINDERSTATUS_STATE_E' );
}

function to_html__ReminderStatus_state_e( $r )
{
    return to_string__ReminderStatus_state_e( $r ) . " (" . $r . ")";
}

// objects

function to_html__Reminder( & $r )
{
    $header = array( 'MSG_TEMPL_ID', 'FEEDBACK_TEMPL_ID', 'EFFECTIVE_TIME', 'REMIND_PERIOD', 'PARAMS', 'ACTIONS', 'OPTIONS' );

    $data = array(
        \basic_parser\to_html__int( $r->msg_templ_id ),
        \basic_parser\to_html__int( $r->feedback_templ_id ),
        \basic_objects\to_html__LocalTime( $r->effective_time ),
        \basic_parser\to_html__int( $r->remind_period ),
        \basic_parser\to_html__map( $r->params, '\basic_parser\to_html__string', '\basic_parser\to_html__string' ),
        \basic_parser\to_html__map( $r->actions, '\dtmf_tools_protocol\to_html__tone_e', '\persek_protocol\to_html__ReminderAction' ),
        \persek_protocol\to_html__ReminderOptions( $r->options )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__ReminderStatus( & $r )
{
    $header = array( 'JOB_ID', 'STATE', 'FEEDBACK', 'EFFECTIVE_TIME', 'CURRENT_TRY', 'LAST_UPDATE_TIME', 'NEXT_EXEC_TIME', 'CONTACT_ID', 'SALUTATION', 'NAME', 'FIRST_NAME', 'CONTACT_PHONE_ID', 'PHONE_NUMBER', 'TEMPLATE_LOCALIZED_NAME' );

    $data = array(
        \basic_parser\to_html__int( $r->job_id ),
        to_html__ReminderStatus_state_e( $r->state ),
        \basic_parser\to_html__int( $r->feedback ),
        \basic_objects\to_html__LocalTime( $r->effective_time ),
        \basic_parser\to_html__int( $r->current_try ),
        \basic_objects\to_html__LocalTime( $r->last_update_time ),
        \basic_objects\to_html__LocalTime( $r->next_exec_time ),
        \basic_parser\to_html__int( $r->contact_id ),
        \basic_parser\to_html__string( $r->salutation ),
        \basic_parser\to_html__string( $r->name ),
        \basic_parser\to_html__string( $r->first_name ),
        \basic_parser\to_html__int( $r->contact_phone_id ),
        \basic_parser\to_html__string( $r->phone_number ),
        \basic_parser\to_html__string( $r->template_localized_name )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__Contact( & $r )
{
    $header = array( 'USER_ID', 'CONTACT_ID', 'SALUTATION', 'NAME', 'FIRST_NAME', 'BIRTHDAY', 'NOTICE', 'LANDLINE_CONTACT_PHONE_ID', 'LANDLINE_CONTACT_PHONE', 'MOBILE_CONTACT_PHONE_ID', 'MOBILE_CONTACT_PHONE' );

    $data = array(
        \basic_parser\to_html__int( $r->user_id ),
        \basic_parser\to_html__int( $r->contact_id ),
        \basic_parser\to_html__string( $r->salutation ),
        \basic_parser\to_html__string( $r->name ),
        \basic_parser\to_html__string( $r->first_name ),
        \basic_objects\to_html__Date( $r->birthday ),
        \basic_parser\to_html__string( $r->notice ),
        \basic_parser\to_html__int( $r->landline_contact_phone_id ),
        \basic_parser\to_html__string( $r->landline_contact_phone ),
        \basic_parser\to_html__int( $r->mobile_contact_phone_id ),
        \basic_parser\to_html__string( $r->mobile_contact_phone )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

// base messages

// messages

function to_html__GetReminderStatusRequest( & $r )
{
    $header = array( 'persek_protocol::Request', 'USER_ID', 'SEARCH_FILTER', 'EFFECTIVE_DATE_TIME_RANGE', 'PAGE_SIZE', 'PAGE_NUMBER', 'LANG' );

    $data = array(
        \persek_protocol\to_html__Request( $r ),
        \basic_parser\to_html__int( $r->user_id ),
        \basic_parser\to_html__string( $r->search_filter ),
        \basic_objects\to_html__LocalTimeRange( $r->effective_date_time_range ),
        \basic_parser\to_html__int( $r->page_size ),
        \basic_parser\to_html__int( $r->page_number ),
        \lang_tools_protocol\to_html__lang_e( $r->lang )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__GetReminderStatusResponse( & $r )
{
    $header = array( 'generic_protocol::BackwardMessage', 'TOTAL_SIZE', 'STATUSES' );

    $data = array(
        \generic_protocol\to_html__BackwardMessage( $r ),
        \basic_parser\to_html__int( $r->total_size ),
        \basic_parser\to_html__vector( $r->statuses, '\persek_web_protocol\to_html__ReminderStatus' )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__FindContactsRequest( & $r )
{
    $header = array( 'persek_protocol::Request', 'USER_ID', 'SEARCH_FILTER', 'PAGE_SIZE', 'PAGE_NUMBER', 'LANG' );

    $data = array(
        \persek_protocol\to_html__Request( $r ),
        \basic_parser\to_html__int( $r->user_id ),
        \basic_parser\to_html__string( $r->search_filter ),
        \basic_parser\to_html__int( $r->page_size ),
        \basic_parser\to_html__int( $r->page_number ),
        \lang_tools_protocol\to_html__lang_e( $r->lang )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__FindContactsResponse( & $r )
{
    $header = array( 'generic_protocol::BackwardMessage', 'TOTAL_SIZE', 'CONTACTS' );

    $data = array(
        \generic_protocol\to_html__BackwardMessage( $r ),
        \basic_parser\to_html__int( $r->total_size ),
        \basic_parser\to_html__vector( $r->contacts, '\persek_web_protocol\to_html__Contact' )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__GetContactRequest( & $r )
{
    $header = array( 'persek_protocol::Request', 'CONTACT_ID', 'LANG' );

    $data = array(
        \persek_protocol\to_html__Request( $r ),
        \basic_parser\to_html__int( $r->contact_id ),
        \lang_tools_protocol\to_html__lang_e( $r->lang )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__GetContactResponse( & $r )
{
    $header = array( 'generic_protocol::BackwardMessage', 'CONTACT' );

    $data = array(
        \generic_protocol\to_html__BackwardMessage( $r ),
        to_html__Contact( $r->contact )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__AddReminderRequest( & $r )
{
    $header = array( 'persek_protocol::Request', 'CONTACT_PHONE_ID', 'REMINDER' );

    $data = array(
        \persek_protocol\to_html__Request( $r ),
        \basic_parser\to_html__int( $r->contact_phone_id ),
        to_html__Reminder( $r->reminder )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__AddReminderResponse( & $r )
{
    $header = array( 'generic_protocol::BackwardMessage', 'JOB_ID' );

    $data = array(
        \generic_protocol\to_html__BackwardMessage( $r ),
        \basic_parser\to_html__int( $r->job_id )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__ModifyReminderRequest( & $r )
{
    $header = array( 'persek_protocol::Request', 'JOB_ID', 'CONTACT_PHONE_ID', 'REMINDER' );

    $data = array(
        \persek_protocol\to_html__Request( $r ),
        \basic_parser\to_html__int( $r->job_id ),
        \basic_parser\to_html__int( $r->contact_phone_id ),
        to_html__Reminder( $r->reminder )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__ModifyReminderResponse( & $r )
{
    $header = array( 'generic_protocol::BackwardMessage' );

    $data = array(
        \generic_protocol\to_html__BackwardMessage( $r )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__GetReminderRequest( & $r )
{
    $header = array( 'persek_protocol::Request', 'JOB_ID' );

    $data = array(
        \persek_protocol\to_html__Request( $r ),
        \basic_parser\to_html__int( $r->job_id )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

function to_html__GetReminderResponse( & $r )
{
    $header = array( 'generic_protocol::BackwardMessage', 'CONTACT_ID', 'CONTACT_PHONE_ID', 'CONTACT_PHONE', 'REMINDER' );

    $data = array(
        \generic_protocol\to_html__BackwardMessage( $r ),
        \basic_parser\to_html__int( $r->contact_id ),
        \basic_parser\to_html__int( $r->contact_phone_id ),
        \basic_parser\to_html__string( $r->contact_phone ),
        to_html__Reminder( $r->reminder )
        );

    $res = \basic_parser\to_html_table( $header, $data );

    return $res;
}

// generic

function to_html( $obj )
{
    $handler_map = array(
        // objects
        'persek_web_protocol\Reminder'         => 'to_html__Reminder',
        'persek_web_protocol\ReminderStatus'         => 'to_html__ReminderStatus',
        'persek_web_protocol\Contact'         => 'to_html__Contact',
        // messages
        'persek_web_protocol\GetReminderStatusRequest'         => 'to_html__GetReminderStatusRequest',
        'persek_web_protocol\GetReminderStatusResponse'         => 'to_html__GetReminderStatusResponse',
        'persek_web_protocol\FindContactsRequest'         => 'to_html__FindContactsRequest',
        'persek_web_protocol\FindContactsResponse'         => 'to_html__FindContactsResponse',
        'persek_web_protocol\GetContactRequest'         => 'to_html__GetContactRequest',
        'persek_web_protocol\GetContactResponse'         => 'to_html__GetContactResponse',
        'persek_web_protocol\AddReminderRequest'         => 'to_html__AddReminderRequest',
        'persek_web_protocol\AddReminderResponse'         => 'to_html__AddReminderResponse',
        'persek_web_protocol\ModifyReminderRequest'         => 'to_html__ModifyReminderRequest',
        'persek_web_protocol\ModifyReminderResponse'         => 'to_html__ModifyReminderResponse',
        'persek_web_protocol\GetReminderRequest'         => 'to_html__GetReminderRequest',
        'persek_web_protocol\GetReminderResponse'         => 'to_html__GetReminderResponse',
    );

    $type = get_class( $obj );

    if( array_key_exists( $type, $handler_map ) )
    {
        $func = '\\persek_web_protocol\\' . $handler_map[ $type ];
        return $func( $obj );
    }

    return \persek_protocol\to_html( $obj );
}

// namespace_end persek_web_protocol


?>
