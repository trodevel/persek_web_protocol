// system includes
#include <map>
#include <memory>

// includes
#include "parser.h"
#include "persek_protocol/parser.h"
#include "generic_protocol/parser.h"
#include "basic_objects/parser.h"
#include "dtmf_tools/parser.h"
#include "lang_tools/parser.h"
#include "basic_parser/parser.h"
#include "basic_parser/malformed_request.h"
#include "validator.h"
#include "request_type_parser.h"

namespace persek_web_protocol
{

namespace parser
{

using ::basic_parser::parser::get_value_or_throw;
using ::basic_parser::parser::get_value_or_throw_t;

// enums

void get_value_or_throw( ReminderStatus_state_e * res, const std::string & key, const generic_request::Request & r )
{
    uint32_t res_i;

    get_value_or_throw( & res_i, key, r );

    * res = static_cast<ReminderStatus_state_e>( res_i );
}

// objects

void get_value_or_throw( Reminder * res, const std::string & prefix, const generic_request::Request & r )
{
    get_value_or_throw( & res->msg_templ_id, prefix + ".MSG_TEMPL_ID", r );
    get_value_or_throw( & res->feedback_templ_id, prefix + ".FEEDBACK_TEMPL_ID", r );
    ::basic_objects::parser::get_value_or_throw( & res->effective_time, prefix + ".EFFECTIVE_TIME", r );
    get_value_or_throw( & res->remind_period, prefix + ".REMIND_PERIOD", r );
    get_value_or_throw_t( & res->params, prefix + ".PARAMS", r, static_cast<void (*)( std::string * , const std::string & , const generic_request::Request & )>( &get_value_or_throw ), static_cast<void (*)( std::string * , const std::string & , const generic_request::Request & )>( &get_value_or_throw ) ); // Map
    get_value_or_throw_t( & res->actions, prefix + ".ACTIONS", r, static_cast<void (*)( dtmf_tools::tone_e * , const std::string & , const generic_request::Request & )>( &::dtmf_tools::parser::get_value_or_throw ), static_cast<void (*)( persek_protocol::ReminderAction * , const std::string & , const generic_request::Request & )>( &::persek_protocol::parser::get_value_or_throw ) ); // Map
    ::persek_protocol::parser::get_value_or_throw( & res->options, prefix + ".OPTIONS", r );
}

void get_value_or_throw( ReminderStatus * res, const std::string & prefix, const generic_request::Request & r )
{
    get_value_or_throw( & res->job_id, prefix + ".JOB_ID", r );
    get_value_or_throw( & res->state, prefix + ".STATE", r );
    get_value_or_throw( & res->feedback, prefix + ".FEEDBACK", r );
    ::basic_objects::parser::get_value_or_throw( & res->effective_time, prefix + ".EFFECTIVE_TIME", r );
    get_value_or_throw( & res->current_try, prefix + ".CURRENT_TRY", r );
    ::basic_objects::parser::get_value_or_throw( & res->last_update_time, prefix + ".LAST_UPDATE_TIME", r );
    ::basic_objects::parser::get_value_or_throw( & res->next_exec_time, prefix + ".NEXT_EXEC_TIME", r );
    get_value_or_throw( & res->contact_id, prefix + ".CONTACT_ID", r );
    get_value_or_throw( & res->salutation, prefix + ".SALUTATION", r );
    get_value_or_throw( & res->name, prefix + ".NAME", r );
    get_value_or_throw( & res->first_name, prefix + ".FIRST_NAME", r );
    get_value_or_throw( & res->contact_phone_id, prefix + ".CONTACT_PHONE_ID", r );
    get_value_or_throw( & res->phone_number, prefix + ".PHONE_NUMBER", r );
    get_value_or_throw( & res->template_localized_name, prefix + ".TEMPLATE_LOCALIZED_NAME", r );
}

void get_value_or_throw( Contact * res, const std::string & prefix, const generic_request::Request & r )
{
    get_value_or_throw( & res->user_id, prefix + ".USER_ID", r );
    get_value_or_throw( & res->contact_id, prefix + ".CONTACT_ID", r );
    get_value_or_throw( & res->salutation, prefix + ".SALUTATION", r );
    get_value_or_throw( & res->name, prefix + ".NAME", r );
    get_value_or_throw( & res->first_name, prefix + ".FIRST_NAME", r );
    ::basic_objects::parser::get_value_or_throw( & res->birthday, prefix + ".BIRTHDAY", r );
    get_value_or_throw( & res->notice, prefix + ".NOTICE", r );
    get_value_or_throw( & res->landline_contact_phone_id, prefix + ".LANDLINE_CONTACT_PHONE_ID", r );
    get_value_or_throw( & res->landline_contact_phone, prefix + ".LANDLINE_CONTACT_PHONE", r );
    get_value_or_throw( & res->mobile_contact_phone_id, prefix + ".MOBILE_CONTACT_PHONE_ID", r );
    get_value_or_throw( & res->mobile_contact_phone, prefix + ".MOBILE_CONTACT_PHONE", r );
}

// base messages

// messages

void get_value_or_throw( GetReminderStatusRequest * res, const generic_request::Request & r )
{
    // base class
    ::persek_protocol::parser::get_value_or_throw( static_cast<persek_protocol::Request*>( res ), r );

    get_value_or_throw( & res->user_id, "USER_ID", r );
    get_value_or_throw( & res->search_filter, "SEARCH_FILTER", r );
    ::basic_objects::parser::get_value_or_throw( & res->effective_date_time_range, "EFFECTIVE_DATE_TIME_RANGE", r );
    get_value_or_throw( & res->page_size, "PAGE_SIZE", r );
    get_value_or_throw( & res->page_number, "PAGE_NUMBER", r );
    ::lang_tools::parser::get_value_or_throw( & res->lang, "LANG", r );
}

void get_value_or_throw( GetReminderStatusResponse * res, const generic_request::Request & r )
{
    // base class
    ::generic_protocol::parser::get_value_or_throw( static_cast<generic_protocol::BackwardMessage*>( res ), r );

    get_value_or_throw( & res->total_size, "TOTAL_SIZE", r );
    get_value_or_throw_t( & res->statuses, "STATUSES", r, static_cast<void (*)( ReminderStatus * , const std::string & , const generic_request::Request & )>( &get_value_or_throw ) ); // Array
}

void get_value_or_throw( FindContactsRequest * res, const generic_request::Request & r )
{
    // base class
    ::persek_protocol::parser::get_value_or_throw( static_cast<persek_protocol::Request*>( res ), r );

    get_value_or_throw( & res->user_id, "USER_ID", r );
    get_value_or_throw( & res->search_filter, "SEARCH_FILTER", r );
    get_value_or_throw( & res->page_size, "PAGE_SIZE", r );
    get_value_or_throw( & res->page_number, "PAGE_NUMBER", r );
    ::lang_tools::parser::get_value_or_throw( & res->lang, "LANG", r );
}

void get_value_or_throw( FindContactsResponse * res, const generic_request::Request & r )
{
    // base class
    ::generic_protocol::parser::get_value_or_throw( static_cast<generic_protocol::BackwardMessage*>( res ), r );

    get_value_or_throw( & res->total_size, "TOTAL_SIZE", r );
    get_value_or_throw_t( & res->contacts, "CONTACTS", r, static_cast<void (*)( Contact * , const std::string & , const generic_request::Request & )>( &get_value_or_throw ) ); // Array
}

void get_value_or_throw( GetContactRequest * res, const generic_request::Request & r )
{
    // base class
    ::persek_protocol::parser::get_value_or_throw( static_cast<persek_protocol::Request*>( res ), r );

    get_value_or_throw( & res->contact_id, "CONTACT_ID", r );
    ::lang_tools::parser::get_value_or_throw( & res->lang, "LANG", r );
}

void get_value_or_throw( GetContactResponse * res, const generic_request::Request & r )
{
    // base class
    ::generic_protocol::parser::get_value_or_throw( static_cast<generic_protocol::BackwardMessage*>( res ), r );

    get_value_or_throw( & res->contact, "CONTACT", r );
}

void get_value_or_throw( AddReminderRequest * res, const generic_request::Request & r )
{
    // base class
    ::persek_protocol::parser::get_value_or_throw( static_cast<persek_protocol::Request*>( res ), r );

    get_value_or_throw( & res->contact_phone_id, "CONTACT_PHONE_ID", r );
    get_value_or_throw( & res->reminder, "REMINDER", r );
}

void get_value_or_throw( AddReminderResponse * res, const generic_request::Request & r )
{
    // base class
    ::generic_protocol::parser::get_value_or_throw( static_cast<generic_protocol::BackwardMessage*>( res ), r );

    get_value_or_throw( & res->job_id, "JOB_ID", r );
}

void get_value_or_throw( ModifyReminderRequest * res, const generic_request::Request & r )
{
    // base class
    ::persek_protocol::parser::get_value_or_throw( static_cast<persek_protocol::Request*>( res ), r );

    get_value_or_throw( & res->job_id, "JOB_ID", r );
    get_value_or_throw( & res->contact_phone_id, "CONTACT_PHONE_ID", r );
    get_value_or_throw( & res->reminder, "REMINDER", r );
}

void get_value_or_throw( ModifyReminderResponse * res, const generic_request::Request & r )
{
    // base class
    ::generic_protocol::parser::get_value_or_throw( static_cast<generic_protocol::BackwardMessage*>( res ), r );

}

void get_value_or_throw( GetReminderRequest * res, const generic_request::Request & r )
{
    // base class
    ::persek_protocol::parser::get_value_or_throw( static_cast<persek_protocol::Request*>( res ), r );

    get_value_or_throw( & res->job_id, "JOB_ID", r );
}

void get_value_or_throw( GetReminderResponse * res, const generic_request::Request & r )
{
    // base class
    ::generic_protocol::parser::get_value_or_throw( static_cast<generic_protocol::BackwardMessage*>( res ), r );

    get_value_or_throw( & res->contact_id, "CONTACT_ID", r );
    get_value_or_throw( & res->contact_phone_id, "CONTACT_PHONE_ID", r );
    get_value_or_throw( & res->contact_phone, "CONTACT_PHONE", r );
    get_value_or_throw( & res->reminder, "REMINDER", r );
}

// to object

Object * to_GetReminderStatusRequest( const generic_request::Request & r )
{
    std::unique_ptr<GetReminderStatusRequest> res( new GetReminderStatusRequest );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_GetReminderStatusResponse( const generic_request::Request & r )
{
    std::unique_ptr<GetReminderStatusResponse> res( new GetReminderStatusResponse );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_FindContactsRequest( const generic_request::Request & r )
{
    std::unique_ptr<FindContactsRequest> res( new FindContactsRequest );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_FindContactsResponse( const generic_request::Request & r )
{
    std::unique_ptr<FindContactsResponse> res( new FindContactsResponse );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_GetContactRequest( const generic_request::Request & r )
{
    std::unique_ptr<GetContactRequest> res( new GetContactRequest );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_GetContactResponse( const generic_request::Request & r )
{
    std::unique_ptr<GetContactResponse> res( new GetContactResponse );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_AddReminderRequest( const generic_request::Request & r )
{
    std::unique_ptr<AddReminderRequest> res( new AddReminderRequest );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_AddReminderResponse( const generic_request::Request & r )
{
    std::unique_ptr<AddReminderResponse> res( new AddReminderResponse );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_ModifyReminderRequest( const generic_request::Request & r )
{
    std::unique_ptr<ModifyReminderRequest> res( new ModifyReminderRequest );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_ModifyReminderResponse( const generic_request::Request & r )
{
    std::unique_ptr<ModifyReminderResponse> res( new ModifyReminderResponse );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_GetReminderRequest( const generic_request::Request & r )
{
    std::unique_ptr<GetReminderRequest> res( new GetReminderRequest );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

Object * to_GetReminderResponse( const generic_request::Request & r )
{
    std::unique_ptr<GetReminderResponse> res( new GetReminderResponse );

    get_value_or_throw( res.get(), r );

    validator::validate( * res );

    return res.release();
}

// to forward message

basic_parser::Object* to_forward_message( const generic_request::Request & r )
{
    auto type = detect_request_type( r );

    typedef request_type_e KeyType;

    typedef Object* (*PPMF)( const generic_request::Request & r );

#define HANDLER_MAP_ENTRY(_v)       { KeyType::_v,    & to_##_v }

    static const std::map<KeyType, PPMF> funcs =
    {
        HANDLER_MAP_ENTRY( GetReminderStatusRequest ),
        HANDLER_MAP_ENTRY( GetReminderStatusResponse ),
        HANDLER_MAP_ENTRY( FindContactsRequest ),
        HANDLER_MAP_ENTRY( FindContactsResponse ),
        HANDLER_MAP_ENTRY( GetContactRequest ),
        HANDLER_MAP_ENTRY( GetContactResponse ),
        HANDLER_MAP_ENTRY( AddReminderRequest ),
        HANDLER_MAP_ENTRY( AddReminderResponse ),
        HANDLER_MAP_ENTRY( ModifyReminderRequest ),
        HANDLER_MAP_ENTRY( ModifyReminderResponse ),
        HANDLER_MAP_ENTRY( GetReminderRequest ),
        HANDLER_MAP_ENTRY( GetReminderResponse ),
    };

#undef HANDLER_MAP_ENTRY

    auto it = funcs.find( type );

    if( it != funcs.end() )
        return it->second( r );

    return nullptr;
}

using basic_parser::MalformedRequest;

request_type_e  detect_request_type( const generic_request::Request & r )
{
    std::string cmd;

    if( r.get_value( "CMD", cmd ) == false )
        throw MalformedRequest( "CMD is not defined" );

    return RequestTypeParser::to_request_type( cmd );
}

} // namespace parser

} // namespace persek_web_protocol

