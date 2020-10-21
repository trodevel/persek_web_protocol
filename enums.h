#ifndef APG_PERSEK_WEB_PROTOCOL__ENUMS_H
#define APG_PERSEK_WEB_PROTOCOL__ENUMS_H

namespace persek_web_protocol
{

enum class request_type_e
{
    UNDEF,
    GetReminderStatusRequest,
    GetReminderStatusResponse,
    FindContactsRequest,
    FindContactsResponse,
    GetContactRequest,
    GetContactResponse,
    AddReminderRequest,
    AddReminderResponse,
    ModifyReminderRequest,
    ModifyReminderResponse,
    GetReminderRequest,
    GetReminderResponse,
};

} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB_PROTOCOL__ENUMS_H
