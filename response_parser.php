<?php

/*

Response Parser.

Copyright (C) 2017 Sergey Kolevatov

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

*/

// $Revision: 13447 $ $Date:: 2020-08-11 #$ $Author: serge $

namespace persek_protocol\web;

require_once __DIR__.'/../php_snippets/convert_csv_to_array.php';   // convert_csv_to_array()
require_once __DIR__.'/../php_snippets/nonascii_hex_codec.php';     // \utils\nonascii_hex_codec\decode()
require_once __DIR__.'/../generic_protocol/response_parser.php';    // generic_protocol\create_parse_error()
require_once __DIR__.'/../persek_protocol/response_parser.php';     // persek_protocol\get_response_type()
require_once 'persek_web_protocol.php';

function parse_Reminder( & $csv_arr, & $offset )
{
    // 777;888;20171013161130;15;2;EN;3;1;1030;1800;3;4;FIRSTNAME;R=C3=BCdiger;NAME;Schultz;TEXT;Hello,=20world;TYPE;Car=20Inspection;3;1;1;111;2;2;222;3;3;333;

    $msg_templ_id       = \basic_parser\parse_int( $csv_arr, $offset );
    $feedback_templ_id  = \basic_parser\parse_int( $csv_arr, $offset );
    $effective_time     = \basic_objects\parse_LocalTime( $csv_arr, $offset );
    $remind_period      = \basic_parser\parse_int( $csv_arr, $offset );

    $options            = \persek_protocol\parse_ReminderOptions( $csv_arr, $offset );
    $params             = \basic_parser\parse_MapStrToStr( $csv_arr, $offset );
    $actions            = \persek_protocol\parse_ToneToReminderAction( $csv_arr, $offset );

    $res = new Reminder( $msg_templ_id, $feedback_templ_id, $effective_time, $remind_period, $params, $actions, $options );

    return $res;
}

function parse_ReminderStatus( & $csv_arr )
{
    // 123;1;0;20160722163050;1;20160722155730;20160722161410;777;Mister;Doe;John;789789;+491234567890;Doctor=20appointment;

    $res = new ReminderStatus();

    //print_r( $csv_arr );
    
    $offset = 0;

    $res->job_id            = \basic_parser\parse_int( $csv_arr, $offset );
    $res->state             = \basic_parser\parse_int( $csv_arr, $offset );
    $res->feedback          = \basic_parser\parse_int( $csv_arr, $offset );
    $res->effective_time    = \basic_objects\parse_LocalTime( $csv_arr, $offset );
    $res->current_try       = \basic_parser\parse_int( $csv_arr, $offset );
    $res->last_update_time  = \basic_objects\parse_LocalTime( $csv_arr, $offset );
    $res->next_exec_time    = \basic_objects\parse_LocalTime( $csv_arr, $offset );
    $res->contact_id        = \basic_parser\parse_int( $csv_arr, $offset );
    $res->salutation        = \basic_parser\parse_enc_string( $csv_arr, $offset );
    $res->name              = \basic_parser\parse_enc_string( $csv_arr, $offset );
    $res->first_name        = \basic_parser\parse_enc_string( $csv_arr, $offset );
    $res->contact_phone_id  = \basic_parser\parse_int( $csv_arr, $offset );
    $res->phone_number              = \basic_parser\parse_enc_string( $csv_arr, $offset );
    $res->template_localized_name   = \basic_parser\parse_enc_string( $csv_arr, $offset );

    return $res;
}

function parse_GetReminderStatusResponse( & $resp )
{
    // web/GetReminderStatusResponse;17;2;
    // 123;1;0;20160722163050;1;20160722155730;20160722161410;777;Mister;Doe;John;789789;+491234567890;Doctor=20appointment;
    // 123;1;0;20160722163050;1;20160722155730;20160722161410;777;Mister;Doe;John;789789;+491234567890;Change=20tires;

    $res = new GetReminderStatusResponse();
    $res->total_size     = intval( $resp[0][1] );
    $res->statuses       = array();

    $size    = intval( $resp[0][2] );

    //echo "size = $size\n";

    for( $i = 0; $i < $size; $i++ )
    {
        array_push( $res->statuses, parse_ReminderStatus( $resp[1 + $i] ) );
    }

    //var_dump( $res );

    return $res;
}

function parse_Contact( & $csv_arr, $offset )
{
    // 123;777888;Herr;M=C3=BCller;R=C3=BCdiger;19590615;bla=20bla;25;+491234567890;75;+490987654321;

    $res = new Contact();

    //print_r( $csv_arr );

    $res->user_id                   = intval( $csv_arr[ 0 + $offset ] );
    $res->contact_id                = intval( $csv_arr[ 1 + $offset ] );
    $res->salutation                = \utils\nonascii_hex_codec\decode( $csv_arr[ 2 + $offset ] );
    $res->name                      = \utils\nonascii_hex_codec\decode( $csv_arr[ 3 + $offset ] );
    $res->first_name                = \utils\nonascii_hex_codec\decode( $csv_arr[ 4 + $offset ] );
    $res->birthday                  = \basic_objects\parse_Date( $csv_arr, 5 + $offset );
    $res->notice                    = \utils\nonascii_hex_codec\decode( $csv_arr[ 6 + $offset ] );
    $res->landline_contact_phone_id = intval( $csv_arr[ 7 + $offset ] );
    $res->landline_contact_phone    = \utils\nonascii_hex_codec\decode( $csv_arr[ 8 + $offset ] );
    $res->mobile_contact_phone_id   = intval( $csv_arr[ 9 + $offset ] );
    $res->mobile_contact_phone      = \utils\nonascii_hex_codec\decode( $csv_arr[ 10 + $offset ] );

    return $res;
}

function parse_FindContactsResponse( & $resp )
{
    // web/FindContactsResponse;17;2;
    // 123;777888;Herr;M=C3=BCller;R=C3=BCdiger;19590615;bla=20bla;25;+491234567890;75;+490987654321;
    // 123;555444;Frau;Kreuz;Marlene;19890727;bla=20bla=202;26;+491234567890;77;+490987654321;

    $res = new FindContactsResponse();
    $res->total_size     = intval( $resp[0][1] );
    $res->contacts       = array();

    $size    = intval( $resp[0][2] );

    //echo "size = $size\n";

    for( $i = 0; $i < $size; $i++ )
    {
        array_push( $res->contacts, parse_Contact( $resp[1 + $i], 0 ) );
    }

    //var_dump( $res );

    return $res;
}

function parse_GetContactResponse( & $resp )
{
    // web/GetContactResponse;123;777888;Frau;Meyer;Julia;19871015;bla=20bla;25;+491234567890;75;+490987654321;

    $res = new GetContactResponse();

    $res->contact   = parse_Contact( $resp[ 0 ], 1 );

    //var_dump( $res );

    return $res;
}

function parse_AddReminderResponse( & $resp )
{
    // web/AddReminderResponse;123;

    $res = new AddReminderResponse;
    
    //var_dump( $resp );

    $offset = 1;

    $res->job_id    = \basic_parser\parse_int( $resp, $offset );

    return $res;
}

function parse_ModifyReminderResponse( & $resp )
{
    // web/ModifyReminderResponse;

    $res = new ModifyReminderResponse;

    return $res;
}

function parse_GetReminderResponse( & $resp )
{
    // web/GetReminderResponse;123;456;+491234567890;777;888;20171013161130;15;2;EN;3;1;1030;1800;3;4;FIRSTNAME;R=C3=BCdiger;NAME;Schultz;TEXT;Hello,=20world;TYPE;Car=20Inspection;3;1;1;111;2;2;222;3;3;333;

    $res = new GetReminderResponse;

    $offset = 1;

    $res->contact_id        = \basic_parser\parse_int( $resp, $offset );
    $res->contact_phone_id  = \basic_parser\parse_int( $resp, $offset );
    $res->contact_phone     = \basic_parser\parse_string( $resp, $offset );
    $res->reminder          = parse_Reminder( $resp, $offset );

    //var_dump( $res );

    return $res;
}

class ResponseParser extends \persek_protocol\ResponseParser
{

protected static function parse_csv_array( $csv_arr )
{
    if( sizeof( $csv_arr ) < 1 )
        return self::create_parse_error();

    $type = $csv_arr[0][0];

    $func_map = array(
        'web/GetReminderStatusResponse' => 'parse_GetReminderStatusResponse',
        'web/FindContactsResponse'      => 'parse_FindContactsResponse',
        'web/GetContactResponse'        => 'parse_GetContactResponse',
    );

    $func_map_2 = array(
        'web/AddReminderResponse'       => 'parse_AddReminderResponse',
        'web/ModifyReminderResponse'    => 'parse_ModifyReminderResponse',
        'web/GetReminderResponse'       => 'parse_GetReminderResponse',
    );

    //echo "DEBUG: type $type\n";

    if( array_key_exists( $type, $func_map ) )
    {
        //echo "DEBUG: '$type' in array\n";
        $func = '\\persek_protocol\\web\\' . $func_map[$type ];
        return $func( $csv_arr );
    }
    else if( array_key_exists( $type, $func_map_2 ) )
    {
        $func = '\\persek_protocol\\web\\' . $func_map_2[ $type ];
        return $func( $csv_arr[0] );
    }

    //print_r( $func_map ); // DEBUG

    return \persek_protocol\ResponseParser::parse_csv_array( $csv_arr );
}
}

?>
