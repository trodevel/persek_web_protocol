<?php

namespace persek_web_protocol;


// includes
require_once __DIR__.'/../persek_protocol/dummy_creator.php';
require_once __DIR__.'/../basic_parser/dummy_creator.php';
require_once __DIR__.'/../generic_protocol/dummy_creator.php';
require_once __DIR__.'/../basic_objects/dummy_creator.php';
require_once __DIR__.'/../dtmf_tools/dummy_creator.php';
require_once __DIR__.'/../lang_tools/dummy_creator.php';
require_once 'object_initializer.php';

// enums

function create_dummy__ReminderStatus_state_e()
{
    $res = ReminderStatus_state_e__IDLE;

    return $res;
}

// objects

function create_dummy__Reminder()
{
    $res = new Reminder;

    initialize__Reminder( $res
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__int32()
        , \basic_objects\create_dummy__LocalTime()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__map( '\basic_parser\create_dummy__string',  '\basic_parser\create_dummy__string' ) // Map
        , \basic_parser\create_dummy__map( '\dtmf_tools\create_dummy__tone_e',  '\persek_protocol\create_dummy__ReminderAction' ) // Map
        , \persek_protocol\create_dummy__ReminderOptions()
        );
    return $res;
}

function create_dummy__ReminderStatus()
{
    $res = new ReminderStatus;

    initialize__ReminderStatus( $res
        , \basic_parser\create_dummy__int32()
        , create_dummy__ReminderStatus_state_e()
        , \basic_parser\create_dummy__int32()
        , \basic_objects\create_dummy__LocalTime()
        , \basic_parser\create_dummy__int32()
        , \basic_objects\create_dummy__LocalTime()
        , \basic_objects\create_dummy__LocalTime()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__string()
        );
    return $res;
}

function create_dummy__Contact()
{
    $res = new Contact;

    initialize__Contact( $res
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__string()
        , \basic_objects\create_dummy__Date()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        );
    return $res;
}

// messages

function create_dummy__GetReminderStatusRequest()
{
    $res = new GetReminderStatusRequest;

    initialize__GetReminderStatusRequest( $res
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        , \basic_objects\create_dummy__LocalTimeRange()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__int32()
        , \lang_tools\create_dummy__lang_e()
        );
    return $res;
}

function create_dummy__GetReminderStatusResponse()
{
    $res = new GetReminderStatusResponse;

    initialize__GetReminderStatusResponse( $res
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__vector( '\persek_web_protocol\create_dummy__ReminderStatus' ) // Array
        );
    return $res;
}

function create_dummy__FindContactsRequest()
{
    $res = new FindContactsRequest;

    initialize__FindContactsRequest( $res
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__int32()
        , \lang_tools\create_dummy__lang_e()
        );
    return $res;
}

function create_dummy__FindContactsResponse()
{
    $res = new FindContactsResponse;

    initialize__FindContactsResponse( $res
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__vector( '\persek_web_protocol\create_dummy__Contact' ) // Array
        );
    return $res;
}

function create_dummy__GetContactRequest()
{
    $res = new GetContactRequest;

    initialize__GetContactRequest( $res
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \lang_tools\create_dummy__lang_e()
        );
    return $res;
}

function create_dummy__GetContactResponse()
{
    $res = new GetContactResponse;

    initialize__GetContactResponse( $res
        , create_dummy__Contact()
        );
    return $res;
}

function create_dummy__AddReminderRequest()
{
    $res = new AddReminderRequest;

    initialize__AddReminderRequest( $res
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , create_dummy__Reminder()
        );
    return $res;
}

function create_dummy__AddReminderResponse()
{
    $res = new AddReminderResponse;

    initialize__AddReminderResponse( $res
        , \basic_parser\create_dummy__int32()
        );
    return $res;
}

function create_dummy__ModifyReminderRequest()
{
    $res = new ModifyReminderRequest;

    initialize__ModifyReminderRequest( $res
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__int32()
        , create_dummy__Reminder()
        );
    return $res;
}

function create_dummy__ModifyReminderResponse()
{
    $res = new ModifyReminderResponse;

    initialize__ModifyReminderResponse( $res
        );
    return $res;
}

function create_dummy__GetReminderRequest()
{
    $res = new GetReminderRequest;

    initialize__GetReminderRequest( $res
        , \basic_parser\create_dummy__string()
        , \basic_parser\create_dummy__int32()
        );
    return $res;
}

function create_dummy__GetReminderResponse()
{
    $res = new GetReminderResponse;

    initialize__GetReminderResponse( $res
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__int32()
        , \basic_parser\create_dummy__string()
        , create_dummy__Reminder()
        );
    return $res;
}

# namespace_end persek_web_protocol


?>
