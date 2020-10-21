<?php

namespace persek_web_protocol;


// own includes
require_once __DIR__.'/../persek_web_protocol/protocol.php';
require_once __DIR__.'/../persek_web_protocol/dummy_creator.php';
require_once __DIR__.'/../persek_web_protocol/html_helper.php';

# objects

function example_Reminder()
{
    $obj = \persek_web_protocol\create_dummy__Reminder();

    echo "Reminder : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_ReminderStatus()
{
    $obj = \persek_web_protocol\create_dummy__ReminderStatus();

    echo "ReminderStatus : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_Contact()
{
    $obj = \persek_web_protocol\create_dummy__Contact();

    echo "Contact : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}


# messages

function example_GetReminderStatusRequest()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderStatusRequest();

    echo "GetReminderStatusRequest : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_GetReminderStatusResponse()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderStatusResponse();

    echo "GetReminderStatusResponse : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_FindContactsRequest()
{
    $obj = \persek_web_protocol\create_dummy__FindContactsRequest();

    echo "FindContactsRequest : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_FindContactsResponse()
{
    $obj = \persek_web_protocol\create_dummy__FindContactsResponse();

    echo "FindContactsResponse : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_GetContactRequest()
{
    $obj = \persek_web_protocol\create_dummy__GetContactRequest();

    echo "GetContactRequest : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_GetContactResponse()
{
    $obj = \persek_web_protocol\create_dummy__GetContactResponse();

    echo "GetContactResponse : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_AddReminderRequest()
{
    $obj = \persek_web_protocol\create_dummy__AddReminderRequest();

    echo "AddReminderRequest : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_AddReminderResponse()
{
    $obj = \persek_web_protocol\create_dummy__AddReminderResponse();

    echo "AddReminderResponse : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_ModifyReminderRequest()
{
    $obj = \persek_web_protocol\create_dummy__ModifyReminderRequest();

    echo "ModifyReminderRequest : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_ModifyReminderResponse()
{
    $obj = \persek_web_protocol\create_dummy__ModifyReminderResponse();

    echo "ModifyReminderResponse : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_GetReminderRequest()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderRequest();

    echo "GetReminderRequest : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
}

function example_GetReminderResponse()
{
    $obj = \persek_web_protocol\create_dummy__GetReminderResponse();

    echo "GetReminderResponse : HTML : " . \persek_web_protocol\to_html( $obj ) . "<br>\n";
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

// namespace_end persek_web_protocol


?>
