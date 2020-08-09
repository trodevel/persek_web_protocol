// system includes
#include <map>

// includes
#include "request_type_parser.h"

namespace persek_web_protocol
{

#define TUPLE_VAL_STR(_x_)  _x_,"persek_web/"+std::string(#_x_)

template< typename _U, typename _V >
std::pair<_V,_U> make_inverse_pair( _U first, _V second )
{
    return std::make_pair( second, first );
}

request_type_e RequestTypeParser::to_request_type( const std::string & s )
{
    typedef std::string KeyType;
    typedef request_type_e Type;

    typedef std::map< KeyType, Type > Map;
    static const Map m =
    {
        make_inverse_pair( Type:: TUPLE_VAL_STR( GetReminderStatusRequest ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( GetReminderStatusResponse ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( FindContactsRequest ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( FindContactsResponse ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( GetContactRequest ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( GetContactResponse ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( AddReminderRequest ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( AddReminderResponse ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( ModifyReminderRequest ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( ModifyReminderResponse ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( GetReminderRequest ) ),
        make_inverse_pair( Type:: TUPLE_VAL_STR( GetReminderResponse ) ),
    };

    auto it = m.find( s );

    if( it == m.end() )
        return request_type_e::UNDEF;

    return it->second;
}
} // namespace persek_web_protocol

