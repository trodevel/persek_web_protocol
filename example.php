<?php

namespace persek_web_protocol;


// includes
require_once 'protocol.php';
require_once 'dummy_creator.php';
require_once 'str_helper.php';
require_once 'request_encoder.php';

# objects

function example_Reminder()
{
    $obj = \persek_web_protocol\create_dummy__Reminder();

    echo "Reminder : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";
}

function example_ReminderStatus()
{
    $obj = \persek_web_protocol\create_dummy__ReminderStatus();

    echo "ReminderStatus : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";
}

function example_Contact()
{
    $obj = \persek_web_protocol\create_dummy__Contact();

    echo "Contact : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";
}


# messages

function example_GetReminderStatusRequest()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderStatusRequest();

    echo "GetReminderStatusRequest : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "GetReminderStatusRequest : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_GetReminderStatusResponse()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderStatusResponse();

    echo "GetReminderStatusResponse : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "GetReminderStatusResponse : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_FindContactsRequest()
{
    $obj = \persek_web_protocol\create_dummy__FindContactsRequest();

    echo "FindContactsRequest : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "FindContactsRequest : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_FindContactsResponse()
{
    $obj = \persek_web_protocol\create_dummy__FindContactsResponse();

    echo "FindContactsResponse : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "FindContactsResponse : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_GetContactRequest()
{
    $obj = \persek_web_protocol\create_dummy__GetContactRequest();

    echo "GetContactRequest : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "GetContactRequest : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_GetContactResponse()
{
    $obj = \persek_web_protocol\create_dummy__GetContactResponse();

    echo "GetContactResponse : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "GetContactResponse : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_AddReminderRequest()
{
    $obj = \persek_web_protocol\create_dummy__AddReminderRequest();

    echo "AddReminderRequest : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "AddReminderRequest : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_AddReminderResponse()
{
    $obj = \persek_web_protocol\create_dummy__AddReminderResponse();

    echo "AddReminderResponse : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "AddReminderResponse : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_ModifyReminderRequest()
{
    $obj = \persek_web_protocol\create_dummy__ModifyReminderRequest();

    echo "ModifyReminderRequest : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "ModifyReminderRequest : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_ModifyReminderResponse()
{
    $obj = \persek_web_protocol\create_dummy__ModifyReminderResponse();

    echo "ModifyReminderResponse : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "ModifyReminderResponse : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_GetReminderRequest()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderRequest();

    echo "GetReminderRequest : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "GetReminderRequest : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}

function example_GetReminderResponse()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderResponse();

    echo "GetReminderResponse : STR : " . \persek_web_protocol\to_string( $obj ) . "\n";

    echo "GetReminderResponse : REQ : " . \persek_web_protocol\to_generic_request( $obj ) . "\n";

}


{
    // objects

    example_Reminder();
    example_ReminderStatus();
    example_Contact();

    // messages

    example_GetReminderStatusRequest();
    example_GetReminderStatusResponse();
    example_FindContactsRequest();
    example_FindContactsResponse();
    example_GetContactRequest();
    example_GetContactResponse();
    example_AddReminderRequest();
    example_AddReminderResponse();
    example_ModifyReminderRequest();
    example_ModifyReminderResponse();
    example_GetReminderRequest();
    example_GetReminderResponse();

}

# namespace_end persek_web_protocol


?>
