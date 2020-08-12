#ifndef APG_PERSEK_WEB__OBJECT_INITIALIZER_H
#define APG_PERSEK_WEB__OBJECT_INITIALIZER_H

// includes
#include "protocol.h"

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
 );
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
 );
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
 );

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
 );
void initialize( GetReminderStatusResponse * res
    , uint32_t total_size
    , const std::vector<ReminderStatus> &  statuses
 );
void initialize( FindContactsRequest * res
    , const std::string &  base_class_param_1
    , uint32_t user_id
    , const std::string &  search_filter
    , uint32_t page_size
    , uint32_t page_number
    , lang_tools::lang_e lang
 );
void initialize( FindContactsResponse * res
    , uint32_t total_size
    , const std::vector<Contact> &  contacts
 );
void initialize( GetContactRequest * res
    , const std::string &  base_class_param_1
    , uint32_t contact_id
    , lang_tools::lang_e lang
 );
void initialize( GetContactResponse * res
    , const Contact &  contact
 );
void initialize( AddReminderRequest * res
    , const std::string &  base_class_param_1
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 );
void initialize( AddReminderResponse * res
    , uint32_t job_id
 );
void initialize( ModifyReminderRequest * res
    , const std::string &  base_class_param_1
    , uint32_t job_id
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 );
void initialize( ModifyReminderResponse * res
 );
void initialize( GetReminderRequest * res
    , const std::string &  base_class_param_1
    , uint32_t job_id
 );
void initialize( GetReminderResponse * res
    , uint32_t contact_id
    , uint32_t contact_phone_id
    , const std::string &  contact_phone
    , const Reminder &  reminder
 );

// messages (constructors)

GetReminderStatusRequest * create_GetReminderStatusRequest(
    const std::string &  base_class_param_1
    , uint32_t user_id
    , const std::string &  search_filter
    , const basic_objects::LocalTimeRange &  effective_date_time_range
    , uint32_t page_size
    , uint32_t page_number
    , lang_tools::lang_e lang
 );
GetReminderStatusResponse * create_GetReminderStatusResponse(
    uint32_t total_size
    , const std::vector<ReminderStatus> &  statuses
 );
FindContactsRequest * create_FindContactsRequest(
    const std::string &  base_class_param_1
    , uint32_t user_id
    , const std::string &  search_filter
    , uint32_t page_size
    , uint32_t page_number
    , lang_tools::lang_e lang
 );
FindContactsResponse * create_FindContactsResponse(
    uint32_t total_size
    , const std::vector<Contact> &  contacts
 );
GetContactRequest * create_GetContactRequest(
    const std::string &  base_class_param_1
    , uint32_t contact_id
    , lang_tools::lang_e lang
 );
GetContactResponse * create_GetContactResponse(
    const Contact &  contact
 );
AddReminderRequest * create_AddReminderRequest(
    const std::string &  base_class_param_1
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 );
AddReminderResponse * create_AddReminderResponse(
    uint32_t job_id
 );
ModifyReminderRequest * create_ModifyReminderRequest(
    const std::string &  base_class_param_1
    , uint32_t job_id
    , uint32_t contact_phone_id
    , const Reminder &  reminder
 );
ModifyReminderResponse * create_ModifyReminderResponse(
 );
GetReminderRequest * create_GetReminderRequest(
    const std::string &  base_class_param_1
    , uint32_t job_id
 );
GetReminderResponse * create_GetReminderResponse(
    uint32_t contact_id
    , uint32_t contact_phone_id
    , const std::string &  contact_phone
    , const Reminder &  reminder
 );

} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB__OBJECT_INITIALIZER_H
