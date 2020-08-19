// system includes
#include <map>
#include <typeindex>

// includes
#include "csv_helper.h"
#include "persek_protocol/csv_helper.h"
#include "generic_protocol/csv_helper.h"
#include "basic_objects/csv_helper.h"
#include "dtmf_tools_protocol/csv_helper.h"
#include "lang_tools_protocol/csv_helper.h"
#include "basic_parser/csv_helper.h"

namespace persek_web_protocol
{

namespace csv_helper
{

using ::basic_parser::csv_helper::write;
using ::basic_parser::csv_helper::write_t;

// enums

std::ostream & write( std::ostream & os, const ReminderStatus_state_e r )
{
    write( os, static_cast<unsigned>( r ) );

    return os;
}

// objects

std::ostream & write( std::ostream & os, const Reminder & r )
{
    write( os, r.msg_templ_id );
    write( os, r.feedback_templ_id );
    ::basic_objects::csv_helper::write( os, r.effective_time );
    write( os, r.remind_period );
    write_t( os, r.params, static_cast<std::ostream & (*)( std::ostream &, const std::string &  )>( &write ), static_cast<std::ostream & (*)( std::ostream &, const std::string &  )>( &write ) ); // Map
    write_t( os, r.actions, static_cast<std::ostream & (*)( std::ostream &, dtmf_tools::tone_e )>( &::dtmf_tools::csv_helper::write ), static_cast<std::ostream & (*)( std::ostream &, const persek_protocol::ReminderAction &  )>( &::persek_protocol::csv_helper::write ) ); // Map
    ::persek_protocol::csv_helper::write( os, r.options );

    return os;
}

std::ostream & write( std::ostream & os, const ReminderStatus & r )
{
    write( os, r.job_id );
    write( os, r.state );
    write( os, r.feedback );
    ::basic_objects::csv_helper::write( os, r.effective_time );
    write( os, r.current_try );
    ::basic_objects::csv_helper::write( os, r.last_update_time );
    ::basic_objects::csv_helper::write( os, r.next_exec_time );
    write( os, r.contact_id );
    write( os, r.salutation );
    write( os, r.name );
    write( os, r.first_name );
    write( os, r.contact_phone_id );
    write( os, r.phone_number );
    write( os, r.template_localized_name );

    return os;
}

std::ostream & write( std::ostream & os, const Contact & r )
{
    write( os, r.user_id );
    write( os, r.contact_id );
    write( os, r.salutation );
    write( os, r.name );
    write( os, r.first_name );
    ::basic_objects::csv_helper::write( os, r.birthday );
    write( os, r.notice );
    write( os, r.landline_contact_phone_id );
    write( os, r.landline_contact_phone );
    write( os, r.mobile_contact_phone_id );
    write( os, r.mobile_contact_phone );

    return os;
}

// base messages

// messages

std::ostream & write( std::ostream & os, const GetReminderStatusRequest & r )
{
    write( os, std::string( "persek_web/GetReminderStatusRequest" ) );

    // base class
    ::persek_protocol::csv_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    write( os, r.user_id );
    write( os, r.search_filter );
    ::basic_objects::csv_helper::write( os, r.effective_date_time_range );
    write( os, r.page_size );
    write( os, r.page_number );
    ::lang_tools::csv_helper::write( os, r.lang );

    return os;
}

std::ostream & write( std::ostream & os, const GetReminderStatusResponse & r )
{
    write( os, std::string( "persek_web/GetReminderStatusResponse" ) );

    // base class
    ::generic_protocol::csv_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    write( os, r.total_size );
    write_t( os, r.statuses, static_cast<std::ostream & (*)( std::ostream &, const ReminderStatus &  )>( &write ) ); // Array

    return os;
}

std::ostream & write( std::ostream & os, const FindContactsRequest & r )
{
    write( os, std::string( "persek_web/FindContactsRequest" ) );

    // base class
    ::persek_protocol::csv_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    write( os, r.user_id );
    write( os, r.search_filter );
    write( os, r.page_size );
    write( os, r.page_number );
    ::lang_tools::csv_helper::write( os, r.lang );

    return os;
}

std::ostream & write( std::ostream & os, const FindContactsResponse & r )
{
    write( os, std::string( "persek_web/FindContactsResponse" ) );

    // base class
    ::generic_protocol::csv_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    write( os, r.total_size );
    write_t( os, r.contacts, static_cast<std::ostream & (*)( std::ostream &, const Contact &  )>( &write ) ); // Array

    return os;
}

std::ostream & write( std::ostream & os, const GetContactRequest & r )
{
    write( os, std::string( "persek_web/GetContactRequest" ) );

    // base class
    ::persek_protocol::csv_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    write( os, r.contact_id );
    ::lang_tools::csv_helper::write( os, r.lang );

    return os;
}

std::ostream & write( std::ostream & os, const GetContactResponse & r )
{
    write( os, std::string( "persek_web/GetContactResponse" ) );

    // base class
    ::generic_protocol::csv_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    write( os, r.contact );

    return os;
}

std::ostream & write( std::ostream & os, const AddReminderRequest & r )
{
    write( os, std::string( "persek_web/AddReminderRequest" ) );

    // base class
    ::persek_protocol::csv_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    write( os, r.contact_phone_id );
    write( os, r.reminder );

    return os;
}

std::ostream & write( std::ostream & os, const AddReminderResponse & r )
{
    write( os, std::string( "persek_web/AddReminderResponse" ) );

    // base class
    ::generic_protocol::csv_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    write( os, r.job_id );

    return os;
}

std::ostream & write( std::ostream & os, const ModifyReminderRequest & r )
{
    write( os, std::string( "persek_web/ModifyReminderRequest" ) );

    // base class
    ::persek_protocol::csv_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    write( os, r.job_id );
    write( os, r.contact_phone_id );
    write( os, r.reminder );

    return os;
}

std::ostream & write( std::ostream & os, const ModifyReminderResponse & r )
{
    write( os, std::string( "persek_web/ModifyReminderResponse" ) );

    // base class
    ::generic_protocol::csv_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );


    return os;
}

std::ostream & write( std::ostream & os, const GetReminderRequest & r )
{
    write( os, std::string( "persek_web/GetReminderRequest" ) );

    // base class
    ::persek_protocol::csv_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    write( os, r.job_id );

    return os;
}

std::ostream & write( std::ostream & os, const GetReminderResponse & r )
{
    write( os, std::string( "persek_web/GetReminderResponse" ) );

    // base class
    ::generic_protocol::csv_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    write( os, r.contact_id );
    write( os, r.contact_phone_id );
    write( os, r.contact_phone );
    write( os, r.reminder );

    return os;
}

std::ostream & write_GetReminderStatusRequest( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const GetReminderStatusRequest &>( rr );

    return write( os, r );
}

std::ostream & write_GetReminderStatusResponse( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const GetReminderStatusResponse &>( rr );

    return write( os, r );
}

std::ostream & write_FindContactsRequest( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const FindContactsRequest &>( rr );

    return write( os, r );
}

std::ostream & write_FindContactsResponse( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const FindContactsResponse &>( rr );

    return write( os, r );
}

std::ostream & write_GetContactRequest( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const GetContactRequest &>( rr );

    return write( os, r );
}

std::ostream & write_GetContactResponse( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const GetContactResponse &>( rr );

    return write( os, r );
}

std::ostream & write_AddReminderRequest( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const AddReminderRequest &>( rr );

    return write( os, r );
}

std::ostream & write_AddReminderResponse( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const AddReminderResponse &>( rr );

    return write( os, r );
}

std::ostream & write_ModifyReminderRequest( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const ModifyReminderRequest &>( rr );

    return write( os, r );
}

std::ostream & write_ModifyReminderResponse( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const ModifyReminderResponse &>( rr );

    return write( os, r );
}

std::ostream & write_GetReminderRequest( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const GetReminderRequest &>( rr );

    return write( os, r );
}

std::ostream & write_GetReminderResponse( std::ostream & os, const basic_parser::Object & rr )
{
    auto & r = dynamic_cast< const GetReminderResponse &>( rr );

    return write( os, r );
}


std::ostream & write( std::ostream & os, const basic_parser::Object & r )
{
    typedef std::ostream & (*PPMF)( std::ostream & os, const basic_parser::Object & );

#define HANDLER_MAP_ENTRY(_v)       { typeid( _v ),        & write_##_v }

    static const std::map<std::type_index, PPMF> funcs =
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

    auto it = funcs.find( typeid( r ) );

    if( it != funcs.end() )
        return it->second( os, r );

    return ::persek_protocol::csv_helper::write( os, r );
}

} // namespace csv_helper

} // namespace persek_web_protocol

