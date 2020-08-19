// includes
#include "object_initializer.h"
#include "persek_protocol/object_initializer.h"
#include "generic_protocol/object_initializer.h"
#include "basic_objects/object_initializer.h"
#include "dtmf_tools_protocol/object_initializer.h"
#include "lang_tools_protocol/object_initializer.h"

namespace persek_web_protocol
{

// objects

void initialize( Reminder * res
    , uint32_t msg_templ_id
    , uint32_t feedback_templ_id
    , const basic_objects::LocalTime &  effective_time
    , uint32_t remind_period
    , const std::map<std::string, std::string> &  params
    , const std::map<dtmf_tools::tone_e, persek_protocol::ReminderAction> &  actions
    , const persek_protocol::ReminderOptions &  options
 )
{
    res->msg_templ_id = msg_templ_id;
    res->feedback_templ_id = feedback_templ_id;
    res->effective_time = effective_time;
    res->remind_period = remind_period;
    res->params = params;
    res->actions = actions;
    res->options = options;
}

void initialize( ReminderStatus * res
    , uint32_t job_id
    , ReminderStatus_state_e state
    , uint32_t feedback
    , const basic_objects::LocalTime &  effective_time
    , uint32_t current_try
    , const basic_objects::LocalTime &  last_update_time
    , const basic_objects::LocalTime &  next_exec_time
    , uint32_t contact_id
    , const std::string &  salutation
    , const std::string &  name
    , const std::string &  first_name
    , uint32_t contact_phone_id
    , const std::string &  phone_number
    , const std::string &  template_localized_name
 )
{
    res->job_id = job_id;
    res->state = state;
    res->feedback = feedback;
    res->effective_time = effective_time;
    res->current_try = current_try;
    res->last_update_time = last_update_time;
    res->next_exec_time = next_exec_time;
    res->contact_id = contact_id;
    res->salutation = salutation;
    res->name = name;
    res->first_name = first_name;
    res->contact_phone_id = contact_phone_id;
    res->phone_number = phone_number;
    res->template_localized_name = template_localized_name;
}

void initialize( Contact * res
    , uint32_t user_id
    , uint32_t contact_id
    , const std::string &  salutation
    , const std::string &  name
    , const std::string &  first_name
    , const basic_objects::Date &  birthday
    , const std::string &  notice
    , uint32_t landline_contact_phone_id
    , const std::string &  landline_contact_phone
    , uint32_t mobile_contact_phone_id
    , const std::string &  mobile_contact_phone
 )
{
    res->user_id = user_id;
    res->contact_id = contact_id;
    res->salutation = salutation;
    res->name = name;
    res->first_name = first_name;
    res->birthday = birthday;
    res->notice = notice;
    res->landline_contact_phone_id = landline_contact_phone_id;
    res->landline_contact_phone = landline_contact_phone;
    res->mobile_contact_phone_id = mobile_contact_phone_id;
    res->mobile_contact_phone = mobile_contact_phone;
}

// base messages

// messages

void initialize( GetReminderStatusRequest * res
    , const std::string &  base_class_param_1
    , uint32_t user_id
    , const std::string &  search_filter
    , const basic_objects::LocalTimeRange &  effective_date_time_range
    , uint32_t page_size
    , uint32_t page_number
    , lang_tools::lang_e lang
 )
{
    // base class
    ::persek_protocol::initialize( static_cast<persek_protocol::Request*>( res ), base_class_param_1 );

    res->user_id = user_id;
    res->search_filter = search_filter;
    res->effective_date_time_range = effective_date_time_range;
    res->page_size = page_size;
    res->page_number = page_number;
    res->lang = lang;
}

void initialize( GetReminderStatusResponse * res
    , uint32_t total_size
    , const std::vector<ReminderStatus> &  statuses
 )
{
    // base class
    ::generic_protocol::initialize( static_cast<generic_protocol::BackwardMessage*>( res ) );

    res->total_size = total_size;
    res->statuses = statuses;
}

void initialize( FindContactsRequest * res
    , const std::string &  base_class_param_1
    , uint32_t user_id
    , const std::string &  search_filter
    , uint32_t page_size
    , uint32_t page_number
    , lang_tools::lang_e lang
 )
{
    // base class
    ::persek_protocol::initialize( static_cast<persek_protocol::Request*>( res ), base_class_param_1 );

    res->user_id = user_id;
    res->search_filter = search_filter;
    res->page_size = page_size;
    res->page_number = page_number;
    res->lang = lang;
}

void initialize( FindContactsResponse * res
    , uint32_t total_size
    , const std::vector<Contact> &  contacts
 )
{
    // base class
    ::generic_protocol::initialize( static_cast<generic_protocol::BackwardMessage*>( res ) );

    res->total_size = total_size;
    res->contacts = contacts;
}

void initialize( GetContactRequest * res
    , const std::string &  base_class_param_1
    , uint32_t contact_id
    , lang_tools::lang_e lang
 )
{
    // base class
    ::persek_protocol::initialize( static_cast<persek_protocol::Request*>( res ), base_class_param_1 );

    res->contact_id = contact_id;
    res->lang = lang;
}

void initialize( GetContactResponse * res
    , const Contact &  contact
 )
{
    // base class
    ::generic_protocol::initialize( static_cast<generic_protocol::BackwardMessage*>( res ) );

    res->contact = contact;
}

void initialize( AddReminderRequest * res
    , const std::string &  base_class_param_1
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 )
{
    // base class
    ::persek_protocol::initialize( static_cast<persek_protocol::Request*>( res ), base_class_param_1 );

    res->contact_phone_id = contact_phone_id;
    res->reminder = reminder;
}

void initialize( AddReminderResponse * res
    , uint32_t job_id
 )
{
    // base class
    ::generic_protocol::initialize( static_cast<generic_protocol::BackwardMessage*>( res ) );

    res->job_id = job_id;
}

void initialize( ModifyReminderRequest * res
    , const std::string &  base_class_param_1
    , uint32_t job_id
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 )
{
    // base class
    ::persek_protocol::initialize( static_cast<persek_protocol::Request*>( res ), base_class_param_1 );

    res->job_id = job_id;
    res->contact_phone_id = contact_phone_id;
    res->reminder = reminder;
}

void initialize( ModifyReminderResponse * res
 )
{
    // base class
    ::generic_protocol::initialize( static_cast<generic_protocol::BackwardMessage*>( res ) );

}

void initialize( GetReminderRequest * res
    , const std::string &  base_class_param_1
    , uint32_t job_id
 )
{
    // base class
    ::persek_protocol::initialize( static_cast<persek_protocol::Request*>( res ), base_class_param_1 );

    res->job_id = job_id;
}

void initialize( GetReminderResponse * res
    , uint32_t contact_id
    , uint32_t contact_phone_id
    , const std::string &  contact_phone
    , const Reminder &  reminder
 )
{
    // base class
    ::generic_protocol::initialize( static_cast<generic_protocol::BackwardMessage*>( res ) );

    res->contact_id = contact_id;
    res->contact_phone_id = contact_phone_id;
    res->contact_phone = contact_phone;
    res->reminder = reminder;
}

// messages (constructors)

GetReminderStatusRequest * create_GetReminderStatusRequest(
    const std::string &  base_class_param_1
    , uint32_t user_id
    , const std::string &  search_filter
    , const basic_objects::LocalTimeRange &  effective_date_time_range
    , uint32_t page_size
    , uint32_t page_number
    , lang_tools::lang_e lang
 )
{
    auto * res = new GetReminderStatusRequest;

    initialize( res, base_class_param_1, user_id, search_filter, effective_date_time_range, page_size, page_number, lang );

    return res;
}

GetReminderStatusResponse * create_GetReminderStatusResponse(
    uint32_t total_size
    , const std::vector<ReminderStatus> &  statuses
 )
{
    auto * res = new GetReminderStatusResponse;

    initialize( res, total_size, statuses );

    return res;
}

FindContactsRequest * create_FindContactsRequest(
    const std::string &  base_class_param_1
    , uint32_t user_id
    , const std::string &  search_filter
    , uint32_t page_size
    , uint32_t page_number
    , lang_tools::lang_e lang
 )
{
    auto * res = new FindContactsRequest;

    initialize( res, base_class_param_1, user_id, search_filter, page_size, page_number, lang );

    return res;
}

FindContactsResponse * create_FindContactsResponse(
    uint32_t total_size
    , const std::vector<Contact> &  contacts
 )
{
    auto * res = new FindContactsResponse;

    initialize( res, total_size, contacts );

    return res;
}

GetContactRequest * create_GetContactRequest(
    const std::string &  base_class_param_1
    , uint32_t contact_id
    , lang_tools::lang_e lang
 )
{
    auto * res = new GetContactRequest;

    initialize( res, base_class_param_1, contact_id, lang );

    return res;
}

GetContactResponse * create_GetContactResponse(
    const Contact &  contact
 )
{
    auto * res = new GetContactResponse;

    initialize( res, contact );

    return res;
}

AddReminderRequest * create_AddReminderRequest(
    const std::string &  base_class_param_1
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 )
{
    auto * res = new AddReminderRequest;

    initialize( res, base_class_param_1, contact_phone_id, reminder );

    return res;
}

AddReminderResponse * create_AddReminderResponse(
    uint32_t job_id
 )
{
    auto * res = new AddReminderResponse;

    initialize( res, job_id );

    return res;
}

ModifyReminderRequest * create_ModifyReminderRequest(
    const std::string &  base_class_param_1
    , uint32_t job_id
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 )
{
    auto * res = new ModifyReminderRequest;

    initialize( res, base_class_param_1, job_id, contact_phone_id, reminder );

    return res;
}

ModifyReminderResponse * create_ModifyReminderResponse(
 )
{
    auto * res = new ModifyReminderResponse;

    initialize( res );

    return res;
}

GetReminderRequest * create_GetReminderRequest(
    const std::string &  base_class_param_1
    , uint32_t job_id
 )
{
    auto * res = new GetReminderRequest;

    initialize( res, base_class_param_1, job_id );

    return res;
}

GetReminderResponse * create_GetReminderResponse(
    uint32_t contact_id
    , uint32_t contact_phone_id
    , const std::string &  contact_phone
    , const Reminder &  reminder
 )
{
    auto * res = new GetReminderResponse;

    initialize( res, contact_id, contact_phone_id, contact_phone, reminder );

    return res;
}

} // namespace persek_web_protocol

