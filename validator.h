#ifndef APG_PERSEK_WEB_PROTOCOL__VALIDATOR_H
#define APG_PERSEK_WEB_PROTOCOL__VALIDATOR_H

// includes
#include "protocol.h"

namespace persek_web_protocol
{

namespace validator
{

// enums
bool validate( const std::string & prefix, const ReminderStatus_state_e r );

// objects
bool validate( const std::string & prefix, const Reminder & r );
bool validate( const std::string & prefix, const ReminderStatus & r );
bool validate( const std::string & prefix, const Contact & r );

// base messages

// messages
bool validate( const GetReminderStatusRequest & r );
bool validate( const GetReminderStatusResponse & r );
bool validate( const FindContactsRequest & r );
bool validate( const FindContactsResponse & r );
bool validate( const GetContactRequest & r );
bool validate( const GetContactResponse & r );
bool validate( const AddReminderRequest & r );
bool validate( const AddReminderResponse & r );
bool validate( const ModifyReminderRequest & r );
bool validate( const ModifyReminderResponse & r );
bool validate( const GetReminderRequest & r );
bool validate( const GetReminderResponse & r );

} // namespace validator

} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB_PROTOCOL__VALIDATOR_H
