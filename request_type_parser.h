#ifndef APG_PERSEK_WEB__REQUEST_TYPE_PARSER_H
#define APG_PERSEK_WEB__REQUEST_TYPE_PARSER_H

// includes
#include "enums.h"

namespace persek_web_protocol
{

class RequestTypeParser
{
public:
    static request_type_e   to_request_type( const std::string & s );
};
} // namespace persek_web_protocol

#endif // APG_PERSEK_WEB__REQUEST_TYPE_PARSER_H
