// system includes
#include <map>

// includes
#include "str_helper.h"
#include "persek_protocol/str_helper.h"
#include "generic_protocol/str_helper.h"
#include "basic_objects/str_helper.h"
#include "dtmf_tools/str_helper.h"
#include "lang_tools/str_helper.h"
#include "basic_parser/str_helper.h"

namespace persek_web_protocol
{

namespace str_helper
{

using ::basic_parser::str_helper::write;
using ::basic_parser::str_helper::write_t;

// enums

#define TUPLE_VAL_STR(_x_)  _x_,#_x_

std::ostream & write( std::ostream & os, const ReminderStatus_state_e r )
{
    typedef ReminderStatus_state_e Type;
    static const std::map< Type, std::string > m =
    {
        { Type:: TUPLE_VAL_STR( IDLE ) },
        { Type:: TUPLE_VAL_STR( ACTIVE ) },
        { Type:: TUPLE_VAL_STR( COMPLETED_OK ) },
        { Type:: TUPLE_VAL_STR( COMPLETED_FAILED ) },
        { Type:: TUPLE_VAL_STR( WAITING_REDIAL_TIMER ) },
    };

    auto it = m.find( r );

    static const std::string undef( "undef" );

    if( it != m.end() )
        return write( os, it->second );

    return write( os, undef );
}

// objects

std::ostream & write( std::ostream & os, const Reminder & r )
{
    os << "(";

    os << " msg_templ_id="; write( os, r.msg_templ_id );
    os << " feedback_templ_id="; write( os, r.feedback_templ_id );
    os << " effective_time="; ::basic_objects::str_helper::write( os, r.effective_time );
    os << " remind_period="; write( os, r.remind_period );
    os << " params="; write_t( os, r.params, static_cast<std::ostream & (*)( std::ostream &, const std::string &  )>( &write ), static_cast<std::ostream & (*)( std::ostream &, const std::string &  )>( &write ) ); // Map
    os << " actions="; write_t( os, r.actions, static_cast<std::ostream & (*)( std::ostream &, dtmf_tools::tone_e )>( &::dtmf_tools::str_helper::write ), static_cast<std::ostream & (*)( std::ostream &, const persek_protocol::ReminderAction &  )>( &::persek_protocol::str_helper::write ) ); // Map
    os << " options="; ::persek_protocol::str_helper::write( os, r.options );

    os << ")";

    return os;
}

std::ostream & write( std::ostream & os, const ReminderStatus & r )
{
    os << "(";

    os << " job_id="; write( os, r.job_id );
    os << " state="; write( os, r.state );
    os << " feedback="; write( os, r.feedback );
    os << " effective_time="; ::basic_objects::str_helper::write( os, r.effective_time );
    os << " current_try="; write( os, r.current_try );
    os << " last_update_time="; ::basic_objects::str_helper::write( os, r.last_update_time );
    os << " next_exec_time="; ::basic_objects::str_helper::write( os, r.next_exec_time );
    os << " contact_id="; write( os, r.contact_id );
    os << " salutation="; write( os, r.salutation );
    os << " name="; write( os, r.name );
    os << " first_name="; write( os, r.first_name );
    os << " contact_phone_id="; write( os, r.contact_phone_id );
    os << " phone_number="; write( os, r.phone_number );
    os << " template_localized_name="; write( os, r.template_localized_name );

    os << ")";

    return os;
}

std::ostream & write( std::ostream & os, const Contact & r )
{
    os << "(";

    os << " user_id="; write( os, r.user_id );
    os << " contact_id="; write( os, r.contact_id );
    os << " salutation="; write( os, r.salutation );
    os << " name="; write( os, r.name );
    os << " first_name="; write( os, r.first_name );
    os << " birthday="; ::basic_objects::str_helper::write( os, r.birthday );
    os << " notice="; write( os, r.notice );
    os << " landline_contact_phone_id="; write( os, r.landline_contact_phone_id );
    os << " landline_contact_phone="; write( os, r.landline_contact_phone );
    os << " mobile_contact_phone_id="; write( os, r.mobile_contact_phone_id );
    os << " mobile_contact_phone="; write( os, r.mobile_contact_phone );

    os << ")";

    return os;
}

// base messages

// messages

std::ostream & write( std::ostream & os, const GetReminderStatusRequest & r )
{
    // base class
    ::persek_protocol::str_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    os << " user_id="; write( os, r.user_id );
    os << " search_filter="; write( os, r.search_filter );
    os << " effective_date_time_range="; ::basic_objects::str_helper::write( os, r.effective_date_time_range );
    os << " page_size="; write( os, r.page_size );
    os << " page_number="; write( os, r.page_number );
    os << " lang="; ::lang_tools::str_helper::write( os, r.lang );

    return os;
}

std::ostream & write( std::ostream & os, const GetReminderStatusResponse & r )
{
    // base class
    ::generic_protocol::str_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    os << " total_size="; write( os, r.total_size );
    os << " statuses="; write_t( os, r.statuses, static_cast<std::ostream & (*)( std::ostream &, const ReminderStatus &  )>( &write ) ); // Array

    return os;
}

std::ostream & write( std::ostream & os, const FindContactsRequest & r )
{
    // base class
    ::persek_protocol::str_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    os << " user_id="; write( os, r.user_id );
    os << " search_filter="; write( os, r.search_filter );
    os << " page_size="; write( os, r.page_size );
    os << " page_number="; write( os, r.page_number );
    os << " lang="; ::lang_tools::str_helper::write( os, r.lang );

    return os;
}

std::ostream & write( std::ostream & os, const FindContactsResponse & r )
{
    // base class
    ::generic_protocol::str_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    os << " total_size="; write( os, r.total_size );
    os << " contacts="; write_t( os, r.contacts, static_cast<std::ostream & (*)( std::ostream &, const Contact &  )>( &write ) ); // Array

    return os;
}

std::ostream & write( std::ostream & os, const GetContactRequest & r )
{
    // base class
    ::persek_protocol::str_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    os << " contact_id="; write( os, r.contact_id );
    os << " lang="; ::lang_tools::str_helper::write( os, r.lang );

    return os;
}

std::ostream & write( std::ostream & os, const GetContactResponse & r )
{
    // base class
    ::generic_protocol::str_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    os << " contact="; write( os, r.contact );

    return os;
}

std::ostream & write( std::ostream & os, const AddReminderRequest & r )
{
    // base class
    ::persek_protocol::str_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    os << " contact_phone_id="; write( os, r.contact_phone_id );
    os << " reminder="; write( os, r.reminder );

    return os;
}

std::ostream & write( std::ostream & os, const AddReminderResponse & r )
{
    // base class
    ::generic_protocol::str_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    os << " job_id="; write( os, r.job_id );

    return os;
}

std::ostream & write( std::ostream & os, const ModifyReminderRequest & r )
{
    // base class
    ::persek_protocol::str_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    os << " job_id="; write( os, r.job_id );
    os << " contact_phone_id="; write( os, r.contact_phone_id );
    os << " reminder="; write( os, r.reminder );

    return os;
}

std::ostream & write( std::ostream & os, const ModifyReminderResponse & r )
{
    // base class
    ::generic_protocol::str_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );


    return os;
}

std::ostream & write( std::ostream & os, const GetReminderRequest & r )
{
    // base class
    ::persek_protocol::str_helper::write( os, static_cast<const persek_protocol::Request&>( r ) );

    os << " job_id="; write( os, r.job_id );

    return os;
}

std::ostream & write( std::ostream & os, const GetReminderResponse & r )
{
    // base class
    ::generic_protocol::str_helper::write( os, static_cast<const generic_protocol::BackwardMessage&>( r ) );

    os << " contact_id="; write( os, r.contact_id );
    os << " contact_phone_id="; write( os, r.contact_phone_id );
    os << " contact_phone="; write( os, r.contact_phone );
    os << " reminder="; write( os, r.reminder );

    return os;
}

} // namespace str_helper

} // namespace persek_web_protocol

