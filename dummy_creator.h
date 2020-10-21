#ifndef APG_PERSEK_WEB_PROTOCOL__DUMMY_CREATOR_H
#define APG_PERSEK_WEB_PROTOCOL__DUMMY_CREATOR_H

// includes
#include "protocol.h"

namespace persek_web_protocol
{

namespace dummy
{

// enums

ReminderStatus_state_e create__ReminderStatus_state_e();

// objects

Reminder create__Reminder();
ReminderStatus create__ReminderStatus();
Contact create__Contact();

// messages

GetReminderStatusRequest * create__GetReminderStatusRequest();
GetReminderStatusResponse * create__GetReminderStatusResponse();
FindContactsRequest * create__FindContactsRequest();
FindContactsResponse * create__FindContactsResponse();
GetContactRequest * create__GetContactRequest();
GetContactResponse * create__GetContactResponse();
AddReminderRequest * create__AddReminderRequest();
AddReminderResponse * create__AddReminderResponse();
ModifyReminderRequest * create__ModifyReminderRequest();
ModifyReminderResponse * create__ModifyReminderResponse();
GetReminderRequest * create__GetReminderRequest();
GetReminderResponse * create__GetReminderResponse();

} // namespace dummy

} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB_PROTOCOL__DUMMY_CREATOR_H
