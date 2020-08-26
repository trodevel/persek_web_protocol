// includes
#include "dummy_creator.h"
#include "persek_protocol/dummy_creator.h"
#include "basic_parser/dummy_creator.h"
#include "generic_protocol/dummy_creator.h"
#include "basic_objects/dummy_creator.h"
#include "dtmf_tools_protocol/dummy_creator.h"
#include "lang_tools_protocol/dummy_creator.h"
#include "object_initializer.h"

namespace persek_web_protocol
{

namespace dummy
{

// enums

ReminderStatus_state_e create__ReminderStatus_state_e()
{
    static const unsigned SIZE = 5;

    static const ReminderStatus_state_e values[SIZE] = { ReminderStatus_state_e::IDLE, ReminderStatus_state_e::ACTIVE, ReminderStatus_state_e::COMPLETED_OK, ReminderStatus_state_e::COMPLETED_FAILED, ReminderStatus_state_e::WAITING_REDIAL_TIMER,  };

    auto res = values[ ::basic_parser::dummy::create__uint32() % SIZE ];

    return res;
}

// objects

Reminder create__Reminder()
{
    Reminder res;

    ::persek_web_protocol::initialize( & res
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_objects::dummy::create__LocalTime()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__map_t<std::string, std::string, std::string(*)(), std::string(*)()>( & ::basic_parser::dummy::create__string, & ::basic_parser::dummy::create__string ) // Map
        , ::basic_parser::dummy::create__map_t<dtmf_tools::tone_e, persek_protocol::ReminderAction, dtmf_tools::tone_e(*)(), persek_protocol::ReminderAction(*)()>( & ::dtmf_tools::dummy::create__tone_e, & ::persek_protocol::dummy::create__ReminderAction ) // Map
        , ::persek_protocol::dummy::create__ReminderOptions()
        );

    return res;
}

ReminderStatus create__ReminderStatus()
{
    ReminderStatus res;

    ::persek_web_protocol::initialize( & res
        , ::basic_parser::dummy::create__uint32()
        , dummy::create__ReminderStatus_state_e()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_objects::dummy::create__LocalTime()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_objects::dummy::create__LocalTime()
        , ::basic_objects::dummy::create__LocalTime()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__string()
        );

    return res;
}

Contact create__Contact()
{
    Contact res;

    ::persek_web_protocol::initialize( & res
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__string()
        , ::basic_objects::dummy::create__Date()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        );

    return res;
}

// messages

GetReminderStatusRequest * create__GetReminderStatusRequest()
{
    auto res = new GetReminderStatusRequest;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        , ::basic_objects::dummy::create__LocalTimeRange()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__uint32()
        , ::lang_tools::dummy::create__lang_e()
        );

    return res;
}

GetReminderStatusResponse * create__GetReminderStatusResponse()
{
    auto res = new GetReminderStatusResponse;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__vector_t<ReminderStatus, ReminderStatus(*)()>( & dummy::create__ReminderStatus ) // Array
        );

    return res;
}

FindContactsRequest * create__FindContactsRequest()
{
    auto res = new FindContactsRequest;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__uint32()
        , ::lang_tools::dummy::create__lang_e()
        );

    return res;
}

FindContactsResponse * create__FindContactsResponse()
{
    auto res = new FindContactsResponse;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__vector_t<Contact, Contact(*)()>( & dummy::create__Contact ) // Array
        );

    return res;
}

GetContactRequest * create__GetContactRequest()
{
    auto res = new GetContactRequest;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::lang_tools::dummy::create__lang_e()
        );

    return res;
}

GetContactResponse * create__GetContactResponse()
{
    auto res = new GetContactResponse;

    ::persek_web_protocol::initialize( res
        , dummy::create__Contact()
        );

    return res;
}

AddReminderRequest * create__AddReminderRequest()
{
    auto res = new AddReminderRequest;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , dummy::create__Reminder()
        );

    return res;
}

AddReminderResponse * create__AddReminderResponse()
{
    auto res = new AddReminderResponse;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__uint32()
        );

    return res;
}

ModifyReminderRequest * create__ModifyReminderRequest()
{
    auto res = new ModifyReminderRequest;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__uint32()
        , dummy::create__Reminder()
        );

    return res;
}

ModifyReminderResponse * create__ModifyReminderResponse()
{
    auto res = new ModifyReminderResponse;

    ::persek_web_protocol::initialize( res
        );

    return res;
}

GetReminderRequest * create__GetReminderRequest()
{
    auto res = new GetReminderRequest;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__string()
        , ::basic_parser::dummy::create__uint32()
        );

    return res;
}

GetReminderResponse * create__GetReminderResponse()
{
    auto res = new GetReminderResponse;

    ::persek_web_protocol::initialize( res
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__uint32()
        , ::basic_parser::dummy::create__string()
        , dummy::create__Reminder()
        );

    return res;
}

} // namespace dummy

} // namespace persek_web_protocol

