#include "protocol.h"
#include "str_helper.h"
#include "csv_helper.h"
#include "dummy_creator.h"
#include "validator.h"

#include <iostream>       // std::cout

template <class T>
void validate( const T & o, const std::string & name )
{
    try
    {
        persek_web_protocol::validator::validate( o );
        std::cout << name << " : valid" << std::endl;
    }
    catch( std::exception & e )
    {
        std::cout << name << " : invalid : " << e.what() << std::endl;
    }
}

// enums

void example_ReminderStatus_state_e()
{
    auto obj = persek_web_protocol::dummy::create__ReminderStatus_state_e();

    std::cout << "ReminderStatus_state_e : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;
}


// objects

void example_Reminder()
{
    auto obj = persek_web_protocol::dummy::create__Reminder();

    std::cout << "Reminder : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;
}

void example_ReminderStatus()
{
    auto obj = persek_web_protocol::dummy::create__ReminderStatus();

    std::cout << "ReminderStatus : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;
}

void example_Contact()
{
    auto obj = persek_web_protocol::dummy::create__Contact();

    std::cout << "Contact : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;
}


// messages

void example_GetReminderStatusRequest()
{
    auto & obj = * persek_web_protocol::dummy::create__GetReminderStatusRequest();

    std::cout << "GetReminderStatusRequest : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "GetReminderStatusRequest : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "GetReminderStatusRequest" );

    delete & obj;
}

void example_GetReminderStatusResponse()
{
    auto & obj = * persek_web_protocol::dummy::create__GetReminderStatusResponse();

    std::cout << "GetReminderStatusResponse : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "GetReminderStatusResponse : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "GetReminderStatusResponse" );

    delete & obj;
}

void example_FindContactsRequest()
{
    auto & obj = * persek_web_protocol::dummy::create__FindContactsRequest();

    std::cout << "FindContactsRequest : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "FindContactsRequest : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "FindContactsRequest" );

    delete & obj;
}

void example_FindContactsResponse()
{
    auto & obj = * persek_web_protocol::dummy::create__FindContactsResponse();

    std::cout << "FindContactsResponse : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "FindContactsResponse : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "FindContactsResponse" );

    delete & obj;
}

void example_GetContactRequest()
{
    auto & obj = * persek_web_protocol::dummy::create__GetContactRequest();

    std::cout << "GetContactRequest : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "GetContactRequest : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "GetContactRequest" );

    delete & obj;
}

void example_GetContactResponse()
{
    auto & obj = * persek_web_protocol::dummy::create__GetContactResponse();

    std::cout << "GetContactResponse : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "GetContactResponse : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "GetContactResponse" );

    delete & obj;
}

void example_AddReminderRequest()
{
    auto & obj = * persek_web_protocol::dummy::create__AddReminderRequest();

    std::cout << "AddReminderRequest : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "AddReminderRequest : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "AddReminderRequest" );

    delete & obj;
}

void example_AddReminderResponse()
{
    auto & obj = * persek_web_protocol::dummy::create__AddReminderResponse();

    std::cout << "AddReminderResponse : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "AddReminderResponse : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "AddReminderResponse" );

    delete & obj;
}

void example_ModifyReminderRequest()
{
    auto & obj = * persek_web_protocol::dummy::create__ModifyReminderRequest();

    std::cout << "ModifyReminderRequest : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "ModifyReminderRequest : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "ModifyReminderRequest" );

    delete & obj;
}

void example_ModifyReminderResponse()
{
    auto & obj = * persek_web_protocol::dummy::create__ModifyReminderResponse();

    std::cout << "ModifyReminderResponse : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "ModifyReminderResponse : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "ModifyReminderResponse" );

    delete & obj;
}

void example_GetReminderRequest()
{
    auto & obj = * persek_web_protocol::dummy::create__GetReminderRequest();

    std::cout << "GetReminderRequest : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "GetReminderRequest : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "GetReminderRequest" );

    delete & obj;
}

void example_GetReminderResponse()
{
    auto & obj = * persek_web_protocol::dummy::create__GetReminderResponse();

    std::cout << "GetReminderResponse : STR : " << persek_web_protocol::str_helper::to_string( obj ) << std::endl;

    std::cout << "GetReminderResponse : CSV : " << persek_web_protocol::csv_helper::to_csv( obj ) << std::endl;

    validate( obj, "GetReminderResponse" );

    delete & obj;
}


int main( int argc, char ** argv )
{
    if( argc > 1 )
    {
        std::srand( std::stoi( std::string( argv[1] ) ) );
    }

    // enums

    example_ReminderStatus_state_e();

    // objects

    example_Reminder();
    example_ReminderStatus();
    example_Contact();

    // messages

    example_GetReminderStatusRequest();
    example_GetReminderStatusResponse();
    example_FindContactsRequest();
    example_FindContactsResponse();
    example_GetContactRequest();
    example_GetContactResponse();
    example_AddReminderRequest();
    example_AddReminderResponse();
    example_ModifyReminderRequest();
    example_ModifyReminderResponse();
    example_GetReminderRequest();
    example_GetReminderResponse();

    return 0;
}

