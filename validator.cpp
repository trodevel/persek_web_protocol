// includes
#include "validator.h"
#include "persek_protocol/validator.h"
#include "generic_protocol/validator.h"
#include "basic_objects/validator.h"
#include "dtmf_tools/validator.h"
#include "lang_tools/validator.h"
#include "basic_parser/validator.h"

namespace persek_web_protocol
{

namespace validator
{

using ::basic_parser::validator::validate;
using ::basic_parser::validator::validate_t;

// enums

bool validate( const std::string & prefix, const ReminderStatus_state_e r )
{
    validate( prefix, static_cast<unsigned>( r ), true, true, static_cast<unsigned>( ReminderStatus_state_e::IDLE ), true, true, static_cast<unsigned>( ReminderStatus_state_e::WAITING_REDIAL_TIMER ) );

    return true;
}

// objects

bool validate( const std::string & prefix, const Reminder & r )
{
    validate( prefix + ".MSG_TEMPL_ID", r.msg_templ_id );
    validate( prefix + ".FEEDBACK_TEMPL_ID", r.feedback_templ_id );
    ::basic_objects::validator::validate( prefix + ".EFFECTIVE_TIME", r.effective_time );
    validate( prefix + ".REMIND_PERIOD", r.remind_period );
    validate_t( prefix + ".PARAMS", r.params, static_cast<bool (*)( const std::string &, const std::string &  )>( &validate ), static_cast<bool (*)( const std::string &, const std::string &  )>( &validate ) ); // Map
    validate_t( prefix + ".ACTIONS", r.actions, static_cast<bool (*)( const std::string &, dtmf_tools::tone_e )>( &::dtmf_tools::validator::validate ), static_cast<bool (*)( const std::string &, const persek_protocol::ReminderAction &  )>( &::persek_protocol::validator::validate ) ); // Map
    ::persek_protocol::validator::validate( prefix + ".OPTIONS", r.options );

    return true;
}

bool validate( const std::string & prefix, const ReminderStatus & r )
{
    validate( prefix + ".JOB_ID", r.job_id );
    validate( prefix + ".STATE", r.state );
    validate( prefix + ".FEEDBACK", r.feedback );
    ::basic_objects::validator::validate( prefix + ".EFFECTIVE_TIME", r.effective_time );
    validate( prefix + ".CURRENT_TRY", r.current_try );
    ::basic_objects::validator::validate( prefix + ".LAST_UPDATE_TIME", r.last_update_time );
    ::basic_objects::validator::validate( prefix + ".NEXT_EXEC_TIME", r.next_exec_time );
    validate( prefix + ".CONTACT_ID", r.contact_id );
    validate( prefix + ".SALUTATION", r.salutation ); // String
    validate( prefix + ".NAME", r.name ); // String
    validate( prefix + ".FIRST_NAME", r.first_name ); // String
    validate( prefix + ".CONTACT_PHONE_ID", r.contact_phone_id );
    validate( prefix + ".PHONE_NUMBER", r.phone_number ); // String
    validate( prefix + ".TEMPLATE_LOCALIZED_NAME", r.template_localized_name ); // String

    return true;
}

bool validate( const std::string & prefix, const Contact & r )
{
    validate( prefix + ".USER_ID", r.user_id );
    validate( prefix + ".CONTACT_ID", r.contact_id );
    validate( prefix + ".SALUTATION", r.salutation ); // String
    validate( prefix + ".NAME", r.name ); // String
    validate( prefix + ".FIRST_NAME", r.first_name ); // String
    ::basic_objects::validator::validate( prefix + ".BIRTHDAY", r.birthday );
    validate( prefix + ".NOTICE", r.notice ); // String
    validate( prefix + ".LANDLINE_CONTACT_PHONE_ID", r.landline_contact_phone_id );
    validate( prefix + ".LANDLINE_CONTACT_PHONE", r.landline_contact_phone ); // String
    validate( prefix + ".MOBILE_CONTACT_PHONE_ID", r.mobile_contact_phone_id );
    validate( prefix + ".MOBILE_CONTACT_PHONE", r.mobile_contact_phone ); // String

    return true;
}

// base messages

// messages

bool validate( const GetReminderStatusRequest & r )
{
    // base class
    ::persek_protocol::validator::validate( static_cast<const persek_protocol::Request&>( r ) );

    validate( "USER_ID", r.user_id );
    validate( "SEARCH_FILTER", r.search_filter ); // String
    ::basic_objects::validator::validate( "EFFECTIVE_DATE_TIME_RANGE", r.effective_date_time_range );
    validate( "PAGE_SIZE", r.page_size );
    validate( "PAGE_NUMBER", r.page_number );
    ::lang_tools::validator::validate( "LANG", r.lang );

    return true;
}

bool validate( const GetReminderStatusResponse & r )
{
    // base class
    ::generic_protocol::validator::validate( static_cast<const generic_protocol::BackwardMessage&>( r ) );

    validate( "TOTAL_SIZE", r.total_size );
    validate_t( "STATUSES", r.statuses, static_cast<bool (*)( const std::string &, const ReminderStatus &  )>( &validate ) ); // Array

    return true;
}

bool validate( const FindContactsRequest & r )
{
    // base class
    ::persek_protocol::validator::validate( static_cast<const persek_protocol::Request&>( r ) );

    validate( "USER_ID", r.user_id );
    validate( "SEARCH_FILTER", r.search_filter ); // String
    validate( "PAGE_SIZE", r.page_size );
    validate( "PAGE_NUMBER", r.page_number );
    ::lang_tools::validator::validate( "LANG", r.lang );

    return true;
}

bool validate( const FindContactsResponse & r )
{
    // base class
    ::generic_protocol::validator::validate( static_cast<const generic_protocol::BackwardMessage&>( r ) );

    validate( "TOTAL_SIZE", r.total_size );
    validate_t( "CONTACTS", r.contacts, static_cast<bool (*)( const std::string &, const Contact &  )>( &validate ) ); // Array

    return true;
}

bool validate( const GetContactRequest & r )
{
    // base class
    ::persek_protocol::validator::validate( static_cast<const persek_protocol::Request&>( r ) );

    validate( "CONTACT_ID", r.contact_id );
    ::lang_tools::validator::validate( "LANG", r.lang );

    return true;
}

bool validate( const GetContactResponse & r )
{
    // base class
    ::generic_protocol::validator::validate( static_cast<const generic_protocol::BackwardMessage&>( r ) );

    validate( "CONTACT", r.contact );

    return true;
}

bool validate( const AddReminderRequest & r )
{
    // base class
    ::persek_protocol::validator::validate( static_cast<const persek_protocol::Request&>( r ) );

    validate( "CONTACT_PHONE_ID", r.contact_phone_id );
    validate( "REMINDER", r.reminder );

    return true;
}

bool validate( const AddReminderResponse & r )
{
    // base class
    ::generic_protocol::validator::validate( static_cast<const generic_protocol::BackwardMessage&>( r ) );

    validate( "JOB_ID", r.job_id );

    return true;
}

bool validate( const ModifyReminderRequest & r )
{
    // base class
    ::persek_protocol::validator::validate( static_cast<const persek_protocol::Request&>( r ) );

    validate( "JOB_ID", r.job_id );
    validate( "CONTACT_PHONE_ID", r.contact_phone_id );
    validate( "REMINDER", r.reminder );

    return true;
}

bool validate( const ModifyReminderResponse & r )
{
    // base class
    ::generic_protocol::validator::validate( static_cast<const generic_protocol::BackwardMessage&>( r ) );


    return true;
}

bool validate( const GetReminderRequest & r )
{
    // base class
    ::persek_protocol::validator::validate( static_cast<const persek_protocol::Request&>( r ) );

    validate( "JOB_ID", r.job_id );

    return true;
}

bool validate( const GetReminderResponse & r )
{
    // base class
    ::generic_protocol::validator::validate( static_cast<const generic_protocol::BackwardMessage&>( r ) );

    validate( "CONTACT_ID", r.contact_id );
    validate( "CONTACT_PHONE_ID", r.contact_phone_id );
    validate( "CONTACT_PHONE", r.contact_phone ); // String
    validate( "REMINDER", r.reminder );

    return true;
}

} // namespace validator

} // namespace persek_web_protocol

