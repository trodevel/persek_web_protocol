#ifndef APG_PERSEK_WEB__CSV_HELPER_H
#define APG_PERSEK_WEB__CSV_HELPER_H

// system includes
#include <sstream>

// includes
#include "protocol.h"

namespace persek_web_protocol
{

namespace csv_helper
{

// enums
std::ostream & write( std::ostream & os, const ReminderStatus_state_e r );

// objects
std::ostream & write( std::ostream & os, const Reminder & r );
std::ostream & write( std::ostream & os, const ReminderStatus & r );
std::ostream & write( std::ostream & os, const Contact & r );

// base messages

// messages
std::ostream & write( std::ostream & os, const GetReminderStatusRequest & r );
std::ostream & write( std::ostream & os, const GetReminderStatusResponse & r );
std::ostream & write( std::ostream & os, const FindContactsRequest & r );
std::ostream & write( std::ostream & os, const FindContactsResponse & r );
std::ostream & write( std::ostream & os, const GetContactRequest & r );
std::ostream & write( std::ostream & os, const GetContactResponse & r );
std::ostream & write( std::ostream & os, const AddReminderRequest & r );
std::ostream & write( std::ostream & os, const AddReminderResponse & r );
std::ostream & write( std::ostream & os, const ModifyReminderRequest & r );
std::ostream & write( std::ostream & os, const ModifyReminderResponse & r );
std::ostream & write( std::ostream & os, const GetReminderRequest & r );
std::ostream & write( std::ostream & os, const GetReminderResponse & r );

template<class T>
std::string to_csv( const T & l )
{
    std::ostringstream os;

    write( os, l );

    return os.str();
}

// generic
std::ostream & write( std::ostream & os, const basic_parser::Object & r );

} // namespace csv_helper

} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB__CSV_HELPER_H
