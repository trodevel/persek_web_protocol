<?php

namespace persek_web_protocol;


// includes
require_once __DIR__.'/../persek_protocol/parser.php';
require_once __DIR__.'/../generic_protocol/parser.php';
require_once __DIR__.'/../basic_objects/parser.php';
require_once __DIR__.'/../dtmf_tools/parser.php';
require_once __DIR__.'/../lang_tools/parser.php';
require_once __DIR__.'/../basic_parser/parser.php';

// enums

function parse__ReminderStatus_state_e( & $csv_arr, & $offset )
{
    $res = \basic_parser\parse__int( $csv_arr, $offset );

    return $res;
}

// objects

function parse__Reminder( & $csv_arr, & $offset )
{
    $res = new Reminder;

    $res->msg_templ_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->feedback_templ_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->effective_time = \basic_objects\parse__LocalTime( $csv_arr, $offset );
    $res->remind_period = \basic_parser\parse__int( $csv_arr, $offset );
    $res->params = \basic_parser\parse__map( $csv_arr, $offset, '\basic_parser\parse__string', '\basic_parser\parse__string' ); // Map
    $res->actions = \basic_parser\parse__map( $csv_arr, $offset, '\dtmf_tools\parse__tone_e', '\persek_protocol\parse__ReminderAction' ); // Map
    $res->options = \persek_protocol\parse__ReminderOptions( $csv_arr, $offset );

    return $res;
}

function parse__ReminderStatus( & $csv_arr, & $offset )
{
    $res = new ReminderStatus;

    $res->job_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->state = parse__ReminderStatus_state_e( $csv_arr, $offset );
    $res->feedback = \basic_parser\parse__int( $csv_arr, $offset );
    $res->effective_time = \basic_objects\parse__LocalTime( $csv_arr, $offset );
    $res->current_try = \basic_parser\parse__int( $csv_arr, $offset );
    $res->last_update_time = \basic_objects\parse__LocalTime( $csv_arr, $offset );
    $res->next_exec_time = \basic_objects\parse__LocalTime( $csv_arr, $offset );
    $res->contact_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->salutation = \basic_parser\parse__string( $csv_arr, $offset );
    $res->name = \basic_parser\parse__string( $csv_arr, $offset );
    $res->first_name = \basic_parser\parse__string( $csv_arr, $offset );
    $res->contact_phone_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->phone_number = \basic_parser\parse__string( $csv_arr, $offset );
    $res->template_localized_name = \basic_parser\parse__string( $csv_arr, $offset );

    return $res;
}

function parse__Contact( & $csv_arr, & $offset )
{
    $res = new Contact;

    $res->user_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->contact_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->salutation = \basic_parser\parse__string( $csv_arr, $offset );
    $res->name = \basic_parser\parse__string( $csv_arr, $offset );
    $res->first_name = \basic_parser\parse__string( $csv_arr, $offset );
    $res->birthday = \basic_objects\parse__Date( $csv_arr, $offset );
    $res->notice = \basic_parser\parse__string( $csv_arr, $offset );
    $res->landline_contact_phone_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->landline_contact_phone = \basic_parser\parse__string( $csv_arr, $offset );
    $res->mobile_contact_phone_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->mobile_contact_phone = \basic_parser\parse__string( $csv_arr, $offset );

    return $res;
}

// base messages

// messages

function parse__GetReminderStatusRequest( & $csv_arr )
{
    $res = new GetReminderStatusRequest;

    $offset = 1;

    // base class
    \persek_protocol\parse__Request( $res, $csv_arr, $offset );

    $res->user_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->search_filter = \basic_parser\parse__string( $csv_arr, $offset );
    $res->effective_date_time_range = \basic_objects\parse__LocalTimeRange( $csv_arr, $offset );
    $res->page_size = \basic_parser\parse__int( $csv_arr, $offset );
    $res->page_number = \basic_parser\parse__int( $csv_arr, $offset );
    $res->lang = \lang_tools\parse__lang_e( $csv_arr, $offset );

    return $res;
}

function parse__GetReminderStatusResponse( & $csv_arr )
{
    $res = new GetReminderStatusResponse;

    $offset = 1;

    // base class
    \generic_protocol\parse__BackwardMessage( $res, $csv_arr, $offset );

    $res->total_size = \basic_parser\parse__int( $csv_arr, $offset );
    $res->statuses = \basic_parser\parse__vector( $csv_arr, $offset, '\persek_web_protocol\parse__ReminderStatus' ); // Array

    return $res;
}

function parse__FindContactsRequest( & $csv_arr )
{
    $res = new FindContactsRequest;

    $offset = 1;

    // base class
    \persek_protocol\parse__Request( $res, $csv_arr, $offset );

    $res->user_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->search_filter = \basic_parser\parse__string( $csv_arr, $offset );
    $res->page_size = \basic_parser\parse__int( $csv_arr, $offset );
    $res->page_number = \basic_parser\parse__int( $csv_arr, $offset );
    $res->lang = \lang_tools\parse__lang_e( $csv_arr, $offset );

    return $res;
}

function parse__FindContactsResponse( & $csv_arr )
{
    $res = new FindContactsResponse;

    $offset = 1;

    // base class
    \generic_protocol\parse__BackwardMessage( $res, $csv_arr, $offset );

    $res->total_size = \basic_parser\parse__int( $csv_arr, $offset );
    $res->contacts = \basic_parser\parse__vector( $csv_arr, $offset, '\persek_web_protocol\parse__Contact' ); // Array

    return $res;
}

function parse__GetContactRequest( & $csv_arr )
{
    $res = new GetContactRequest;

    $offset = 1;

    // base class
    \persek_protocol\parse__Request( $res, $csv_arr, $offset );

    $res->contact_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->lang = \lang_tools\parse__lang_e( $csv_arr, $offset );

    return $res;
}

function parse__GetContactResponse( & $csv_arr )
{
    $res = new GetContactResponse;

    $offset = 1;

    // base class
    \generic_protocol\parse__BackwardMessage( $res, $csv_arr, $offset );

    $res->contact = parse__Contact( $csv_arr, $offset );

    return $res;
}

function parse__AddReminderRequest( & $csv_arr )
{
    $res = new AddReminderRequest;

    $offset = 1;

    // base class
    \persek_protocol\parse__Request( $res, $csv_arr, $offset );

    $res->contact_phone_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->reminder = \persek_protocol\parse__Reminder( $csv_arr, $offset );

    return $res;
}

function parse__AddReminderResponse( & $csv_arr )
{
    $res = new AddReminderResponse;

    $offset = 1;

    // base class
    \generic_protocol\parse__BackwardMessage( $res, $csv_arr, $offset );

    $res->job_id = \basic_parser\parse__int( $csv_arr, $offset );

    return $res;
}

function parse__ModifyReminderRequest( & $csv_arr )
{
    $res = new ModifyReminderRequest;

    $offset = 1;

    // base class
    \persek_protocol\parse__Request( $res, $csv_arr, $offset );

    $res->job_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->contact_phone_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->reminder = \persek_protocol\parse__Reminder( $csv_arr, $offset );

    return $res;
}

function parse__ModifyReminderResponse( & $csv_arr )
{
    $res = new ModifyReminderResponse;

    $offset = 1;

    // base class
    \generic_protocol\parse__BackwardMessage( $res, $csv_arr, $offset );


    return $res;
}

function parse__GetReminderRequest( & $csv_arr )
{
    $res = new GetReminderRequest;

    $offset = 1;

    // base class
    \persek_protocol\parse__Request( $res, $csv_arr, $offset );

    $res->job_id = \basic_parser\parse__int( $csv_arr, $offset );

    return $res;
}

function parse__GetReminderResponse( & $csv_arr )
{
    $res = new GetReminderResponse;

    $offset = 1;

    // base class
    \generic_protocol\parse__BackwardMessage( $res, $csv_arr, $offset );

    $res->contact_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->contact_phone_id = \basic_parser\parse__int( $csv_arr, $offset );
    $res->contact_phone = \basic_parser\parse__string( $csv_arr, $offset );
    $res->reminder = \persek_protocol\parse__Reminder( $csv_arr, $offset );

    return $res;
}

// generic

class Parser extends \persek_protocol\Parser
{

protected static function parse_csv_array( $csv_arr )
{
    if( sizeof( $csv_arr ) < 1 )
        return self::create_parse_error();

    $handler_map = array(
        // messages
        'persek_web/GetReminderStatusRequest'         => 'parse__GetReminderStatusRequest',
        'persek_web/GetReminderStatusResponse'         => 'parse__GetReminderStatusResponse',
        'persek_web/FindContactsRequest'         => 'parse__FindContactsRequest',
        'persek_web/FindContactsResponse'         => 'parse__FindContactsResponse',
        'persek_web/GetContactRequest'         => 'parse__GetContactRequest',
        'persek_web/GetContactResponse'         => 'parse__GetContactResponse',
        'persek_web/AddReminderRequest'         => 'parse__AddReminderRequest',
        'persek_web/AddReminderResponse'         => 'parse__AddReminderResponse',
        'persek_web/ModifyReminderRequest'         => 'parse__ModifyReminderRequest',
        'persek_web/ModifyReminderResponse'         => 'parse__ModifyReminderResponse',
        'persek_web/GetReminderRequest'         => 'parse__GetReminderRequest',
        'persek_web/GetReminderResponse'         => 'parse__GetReminderResponse',
    );

    $type = $csv_arr[0][0];

    if( array_key_exists( $type, $handler_map ) )
    {
        $func = '\\persek_web_protocol\\' . $handler_map[ $type ];
        return $func( $csv_arr[0] );
    }

    return \persek_protocol\Parser::parse_csv_array( $csv_arr );
}

}

# namespace_end persek_web_protocol


?>
