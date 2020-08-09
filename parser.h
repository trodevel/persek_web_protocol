#ifndef APG_PERSEK_WEB__PARSER_H
#define APG_PERSEK_WEB__PARSER_H

// includes
#include "generic_request/request.h"
#include "enums.h"
#include "protocol.h"

namespace persek_web_protocol
{

namespace parser
{

typedef basic_parser::Object    Object;

basic_parser::Object * to_forward_message( const generic_request::Request & r );

request_type_e detect_request_type( const generic_request::Request & r );

// enums

void get_value_or_throw( ReminderStatus_state_e * res, const std::string & key, const generic_request::Request & r );

// objects

void get_value_or_throw( Reminder * res, const std::string & key, const generic_request::Request & r );
void get_value_or_throw( ReminderStatus * res, const std::string & key, const generic_request::Request & r );
void get_value_or_throw( Contact * res, const std::string & key, const generic_request::Request & r );

// base messages


// messages

void get_value_or_throw( GetReminderStatusRequest * res, const generic_request::Request & r );
void get_value_or_throw( GetReminderStatusResponse * res, const generic_request::Request & r );
void get_value_or_throw( FindContactsRequest * res, const generic_request::Request & r );
void get_value_or_throw( FindContactsResponse * res, const generic_request::Request & r );
void get_value_or_throw( GetContactRequest * res, const generic_request::Request & r );
void get_value_or_throw( GetContactResponse * res, const generic_request::Request & r );
void get_value_or_throw( AddReminderRequest * res, const generic_request::Request & r );
void get_value_or_throw( AddReminderResponse * res, const generic_request::Request & r );
void get_value_or_throw( ModifyReminderRequest * res, const generic_request::Request & r );
void get_value_or_throw( ModifyReminderResponse * res, const generic_request::Request & r );
void get_value_or_throw( GetReminderRequest * res, const generic_request::Request & r );
void get_value_or_throw( GetReminderResponse * res, const generic_request::Request & r );

// to_... functions

Object * to_GetReminderStatusRequest( const generic_request::Request & r );
Object * to_GetReminderStatusResponse( const generic_request::Request & r );
Object * to_FindContactsRequest( const generic_request::Request & r );
Object * to_FindContactsResponse( const generic_request::Request & r );
Object * to_GetContactRequest( const generic_request::Request & r );
Object * to_GetContactResponse( const generic_request::Request & r );
Object * to_AddReminderRequest( const generic_request::Request & r );
Object * to_AddReminderResponse( const generic_request::Request & r );
Object * to_ModifyReminderRequest( const generic_request::Request & r );
Object * to_ModifyReminderResponse( const generic_request::Request & r );
Object * to_GetReminderRequest( const generic_request::Request & r );
Object * to_GetReminderResponse( const generic_request::Request & r );

} // namespace parser

} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB__PARSER_H
