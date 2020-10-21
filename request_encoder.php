<?php

namespace persek_web_protocol;


// base include
require_once __DIR__.'/../persek_protocol/request_encoder.php';
// includes
require_once __DIR__.'/../generic_protocol/request_encoder.php';
require_once __DIR__.'/../basic_objects/request_encoder.php';
require_once __DIR__.'/../dtmf_tools_protocol/request_encoder.php';
require_once __DIR__.'/../lang_tools_protocol/request_encoder.php';
require_once __DIR__.'/../basic_parser/request_encoder.php';

// enums

function to_generic_request__ReminderStatus_state_e( $prefix, $r )
{
    $res = \basic_parser\to_generic_request__int( $prefix, $r );

    return $res;
}

// objects

function to_generic_request__Reminder( $prefix, & $r )
{
    $res = "";
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".MSG_TEMPL_ID", $r->msg_templ_id );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".FEEDBACK_TEMPL_ID", $r->feedback_templ_id );
    $res .= "&" . \basic_objects\to_generic_request__LocalTime( $prefix . ".EFFECTIVE_TIME", $r->effective_time );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".REMIND_PERIOD", $r->remind_period );
    $res .= "&" . \basic_parser\to_generic_request__map( $prefix . ".PARAMS", $r->params, '\basic_parser\to_generic_request__string', '\basic_parser\to_generic_request__string' ); // Map
    $res .= "&" . \basic_parser\to_generic_request__map( $prefix . ".ACTIONS", $r->actions, '\dtmf_tools_protocol\to_generic_request__tone_e', '\persek_protocol\to_generic_request__ReminderAction' ); // Map
    $res .= "&" . \persek_protocol\to_generic_request__ReminderOptions( $prefix . ".OPTIONS", $r->options );

    return $res;
}

function to_generic_request__ReminderStatus( $prefix, & $r )
{
    $res = "";
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".JOB_ID", $r->job_id );
    $res .= "&" . to_generic_request__ReminderStatus_state_e( $prefix . ".STATE", $r->state );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".FEEDBACK", $r->feedback );
    $res .= "&" . \basic_objects\to_generic_request__LocalTime( $prefix . ".EFFECTIVE_TIME", $r->effective_time );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".CURRENT_TRY", $r->current_try );
    $res .= "&" . \basic_objects\to_generic_request__LocalTime( $prefix . ".LAST_UPDATE_TIME", $r->last_update_time );
    $res .= "&" . \basic_objects\to_generic_request__LocalTime( $prefix . ".NEXT_EXEC_TIME", $r->next_exec_time );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".CONTACT_ID", $r->contact_id );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".SALUTATION", $r->salutation );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".NAME", $r->name );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".FIRST_NAME", $r->first_name );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".CONTACT_PHONE_ID", $r->contact_phone_id );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".PHONE_NUMBER", $r->phone_number );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".TEMPLATE_LOCALIZED_NAME", $r->template_localized_name );

    return $res;
}

function to_generic_request__Contact( $prefix, & $r )
{
    $res = "";
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".USER_ID", $r->user_id );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".CONTACT_ID", $r->contact_id );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".SALUTATION", $r->salutation );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".NAME", $r->name );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".FIRST_NAME", $r->first_name );
    $res .= "&" . \basic_objects\to_generic_request__Date( $prefix . ".BIRTHDAY", $r->birthday );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".NOTICE", $r->notice );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".LANDLINE_CONTACT_PHONE_ID", $r->landline_contact_phone_id );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".LANDLINE_CONTACT_PHONE", $r->landline_contact_phone );
    $res .= "&" . \basic_parser\to_generic_request__int( $prefix . ".MOBILE_CONTACT_PHONE_ID", $r->mobile_contact_phone_id );
    $res .= "&" . \basic_parser\to_generic_request__string( $prefix . ".MOBILE_CONTACT_PHONE", $r->mobile_contact_phone );

    return $res;
}

// base messages

// messages

function to_generic_request__GetReminderStatusRequest( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/GetReminderStatusRequest" );

    // base class
    $res .= \persek_protocol\to_generic_request__Request( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "USER_ID", $r->user_id );
    $res .= "&" . \basic_parser\to_generic_request__string( "SEARCH_FILTER", $r->search_filter );
    $res .= "&" . \basic_objects\to_generic_request__LocalTimeRange( "EFFECTIVE_DATE_TIME_RANGE", $r->effective_date_time_range );
    $res .= "&" . \basic_parser\to_generic_request__int( "PAGE_SIZE", $r->page_size );
    $res .= "&" . \basic_parser\to_generic_request__int( "PAGE_NUMBER", $r->page_number );
    $res .= "&" . \lang_tools_protocol\to_generic_request__lang_e( "LANG", $r->lang );

    return $res;
}

function to_generic_request__GetReminderStatusResponse( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/GetReminderStatusResponse" );

    // base class
    $res .= \generic_protocol\to_generic_request__BackwardMessage( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "TOTAL_SIZE", $r->total_size );
    $res .= "&" . \basic_parser\to_generic_request__vector( "STATUSES", $r->statuses, '\persek_web_protocol\to_generic_request__ReminderStatus' ); // Array

    return $res;
}

function to_generic_request__FindContactsRequest( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/FindContactsRequest" );

    // base class
    $res .= \persek_protocol\to_generic_request__Request( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "USER_ID", $r->user_id );
    $res .= "&" . \basic_parser\to_generic_request__string( "SEARCH_FILTER", $r->search_filter );
    $res .= "&" . \basic_parser\to_generic_request__int( "PAGE_SIZE", $r->page_size );
    $res .= "&" . \basic_parser\to_generic_request__int( "PAGE_NUMBER", $r->page_number );
    $res .= "&" . \lang_tools_protocol\to_generic_request__lang_e( "LANG", $r->lang );

    return $res;
}

function to_generic_request__FindContactsResponse( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/FindContactsResponse" );

    // base class
    $res .= \generic_protocol\to_generic_request__BackwardMessage( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "TOTAL_SIZE", $r->total_size );
    $res .= "&" . \basic_parser\to_generic_request__vector( "CONTACTS", $r->contacts, '\persek_web_protocol\to_generic_request__Contact' ); // Array

    return $res;
}

function to_generic_request__GetContactRequest( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/GetContactRequest" );

    // base class
    $res .= \persek_protocol\to_generic_request__Request( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "CONTACT_ID", $r->contact_id );
    $res .= "&" . \lang_tools_protocol\to_generic_request__lang_e( "LANG", $r->lang );

    return $res;
}

function to_generic_request__GetContactResponse( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/GetContactResponse" );

    // base class
    $res .= \generic_protocol\to_generic_request__BackwardMessage( $r );

    $res .= "&" . to_generic_request__Contact( "CONTACT", $r->contact );

    return $res;
}

function to_generic_request__AddReminderRequest( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/AddReminderRequest" );

    // base class
    $res .= \persek_protocol\to_generic_request__Request( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "CONTACT_PHONE_ID", $r->contact_phone_id );
    $res .= "&" . to_generic_request__Reminder( "REMINDER", $r->reminder );

    return $res;
}

function to_generic_request__AddReminderResponse( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/AddReminderResponse" );

    // base class
    $res .= \generic_protocol\to_generic_request__BackwardMessage( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "JOB_ID", $r->job_id );

    return $res;
}

function to_generic_request__ModifyReminderRequest( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/ModifyReminderRequest" );

    // base class
    $res .= \persek_protocol\to_generic_request__Request( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "JOB_ID", $r->job_id );
    $res .= "&" . \basic_parser\to_generic_request__int( "CONTACT_PHONE_ID", $r->contact_phone_id );
    $res .= "&" . to_generic_request__Reminder( "REMINDER", $r->reminder );

    return $res;
}

function to_generic_request__ModifyReminderResponse( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/ModifyReminderResponse" );

    // base class
    $res .= \generic_protocol\to_generic_request__BackwardMessage( $r );


    return $res;
}

function to_generic_request__GetReminderRequest( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/GetReminderRequest" );

    // base class
    $res .= \persek_protocol\to_generic_request__Request( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "JOB_ID", $r->job_id );

    return $res;
}

function to_generic_request__GetReminderResponse( & $r )
{
    // name
    $res = \basic_parser\to_generic_request__string( "CMD", "persek_web_protocol/GetReminderResponse" );

    // base class
    $res .= \generic_protocol\to_generic_request__BackwardMessage( $r );

    $res .= "&" . \basic_parser\to_generic_request__int( "CONTACT_ID", $r->contact_id );
    $res .= "&" . \basic_parser\to_generic_request__int( "CONTACT_PHONE_ID", $r->contact_phone_id );
    $res .= "&" . \basic_parser\to_generic_request__string( "CONTACT_PHONE", $r->contact_phone );
    $res .= "&" . to_generic_request__Reminder( "REMINDER", $r->reminder );

    return $res;
}

// generic

function to_generic_request( $obj )
{
    $handler_map = array(
        // messages
        'persek_web_protocol\GetReminderStatusRequest'         => 'to_generic_request__GetReminderStatusRequest',
        'persek_web_protocol\GetReminderStatusResponse'         => 'to_generic_request__GetReminderStatusResponse',
        'persek_web_protocol\FindContactsRequest'         => 'to_generic_request__FindContactsRequest',
        'persek_web_protocol\FindContactsResponse'         => 'to_generic_request__FindContactsResponse',
        'persek_web_protocol\GetContactRequest'         => 'to_generic_request__GetContactRequest',
        'persek_web_protocol\GetContactResponse'         => 'to_generic_request__GetContactResponse',
        'persek_web_protocol\AddReminderRequest'         => 'to_generic_request__AddReminderRequest',
        'persek_web_protocol\AddReminderResponse'         => 'to_generic_request__AddReminderResponse',
        'persek_web_protocol\ModifyReminderRequest'         => 'to_generic_request__ModifyReminderRequest',
        'persek_web_protocol\ModifyReminderResponse'         => 'to_generic_request__ModifyReminderResponse',
        'persek_web_protocol\GetReminderRequest'         => 'to_generic_request__GetReminderRequest',
        'persek_web_protocol\GetReminderResponse'         => 'to_generic_request__GetReminderResponse',
    );

    $type = get_class( $obj );

    if( array_key_exists( $type, $handler_map ) )
    {
        $func = '\\persek_web_protocol\\' . $handler_map[ $type ];
        return $func( $obj );
    }

    return \persek_protocol\to_generic_request( $obj );
}

// namespace_end persek_web_protocol


?>
