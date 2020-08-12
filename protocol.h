#ifndef APG_PERSEK_WEB__PROTOCOL_H
#define APG_PERSEK_WEB__PROTOCOL_H

// system includes
#include <vector>
#include <map>

// includes
#include "basic_parser/object.h"
#include "persek_protocol/protocol.h"

// includes for used modules
#include "generic_protocol/protocol.h"
#include "basic_objects/protocol.h"
#include "dtmf_tools/protocol.h"
#include "lang_tools/protocol.h"

namespace persek_web_protocol
{

// Enum
enum class ReminderStatus_state_e
{
    IDLE                 = 0,
    ACTIVE               = 1,
    COMPLETED_OK         = 2,
    COMPLETED_FAILED     = 3,
    WAITING_REDIAL_TIMER = 4,
};

// Object
struct Reminder
{
    uint32_t             msg_templ_id;
    uint32_t             feedback_templ_id;
    basic_objects::LocalTime effective_time;
    uint32_t             remind_period;
    std::map<std::string, std::string> params    ;
    std::map<dtmf_tools::tone_e, persek_protocol::ReminderAction> actions   ;
    persek_protocol::ReminderOptions options   ;
};

// Object
struct ReminderStatus
{
    uint32_t             job_id    ;
    ReminderStatus_state_e state     ;
    uint32_t             feedback  ;
    basic_objects::LocalTime effective_time;
    uint32_t             current_try;
    basic_objects::LocalTime last_update_time;
    basic_objects::LocalTime next_exec_time;
    uint32_t             contact_id;
    std::string          salutation;
    std::string          name      ;
    std::string          first_name;
    uint32_t             contact_phone_id;
    std::string          phone_number;
    std::string          template_localized_name;
};

// Object
struct Contact
{
    uint32_t             user_id   ;
    uint32_t             contact_id;
    std::string          salutation;
    std::string          name      ;
    std::string          first_name;
    basic_objects::Date  birthday  ;
    std::string          notice    ;
    uint32_t             landline_contact_phone_id;
    std::string          landline_contact_phone;
    uint32_t             mobile_contact_phone_id;
    std::string          mobile_contact_phone;
};

// Message
struct GetReminderStatusRequest: public persek_protocol::Request
{
    enum
    {
        message_id = 34933372
    };

    uint32_t             user_id   ;
    std::string          search_filter;
    basic_objects::LocalTimeRange effective_date_time_range;
    uint32_t             page_size ;
    uint32_t             page_number;
    lang_tools::lang_e   lang      ;
};

// Message
struct GetReminderStatusResponse: public generic_protocol::BackwardMessage
{
    enum
    {
        message_id = 121715388
    };

    uint32_t             total_size;
    std::vector<ReminderStatus> statuses  ;
};

// Message
struct FindContactsRequest: public persek_protocol::Request
{
    enum
    {
        message_id = 1599063005
    };

    uint32_t             user_id   ;
    std::string          search_filter;
    uint32_t             page_size ;
    uint32_t             page_number;
    lang_tools::lang_e   lang      ;
};

// Message
struct FindContactsResponse: public generic_protocol::BackwardMessage
{
    enum
    {
        message_id = 2798514955
    };

    uint32_t             total_size;
    std::vector<Contact> contacts  ;
};

// Message
struct GetContactRequest: public persek_protocol::Request
{
    enum
    {
        message_id = 3048955191
    };

    uint32_t             contact_id;
    lang_tools::lang_e   lang      ;
};

// Message
struct GetContactResponse: public generic_protocol::BackwardMessage
{
    enum
    {
        message_id = 3875015923
    };

    Contact              contact   ;
};

// Message
struct AddReminderRequest: public persek_protocol::Request
{
    enum
    {
        message_id = 1716890514
    };

    uint32_t             contact_phone_id;
    Reminder             reminder  ;
};

// Message
struct AddReminderResponse: public generic_protocol::BackwardMessage
{
    enum
    {
        message_id = 1083684194
    };

    uint32_t             job_id    ;
};

// Message
struct ModifyReminderRequest: public persek_protocol::Request
{
    enum
    {
        message_id = 4170784810
    };

    uint32_t             job_id    ;
    uint32_t             contact_phone_id;
    Reminder             reminder  ;
};

// Message
struct ModifyReminderResponse: public generic_protocol::BackwardMessage
{
    enum
    {
        message_id = 2243117655
    };
};

// Message
struct GetReminderRequest: public persek_protocol::Request
{
    enum
    {
        message_id = 162063050
    };

    uint32_t             job_id    ;
};

// Message
struct GetReminderResponse: public generic_protocol::BackwardMessage
{
    enum
    {
        message_id = 625512941
    };

    uint32_t             contact_id;
    uint32_t             contact_phone_id;
    std::string          contact_phone;
    Reminder             reminder  ;
};

} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB__PROTOCOL_H

