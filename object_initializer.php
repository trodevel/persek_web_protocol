<?php

namespace persek_web_protocol;


// base include
require_once __DIR__.'/../persek_protocol/object_initializer.php';
// own includes
require_once __DIR__.'/../persek_web_protocol/protocol.php';

// objects

function initialize__Reminder( & $res
    , $msg_templ_id // uint32_t
    , $feedback_templ_id // uint32_t
    , $effective_time // basic_objects\LocalTime
    , $remind_period // uint32_t
    , $params // map<string, string>
    , $actions // map<dtmf_tools_protocol\tone_e, persek_protocol\ReminderAction>
    , $options // persek_protocol\ReminderOptions
 )
{
    $res->msg_templ_id = $msg_templ_id;
    $res->feedback_templ_id = $feedback_templ_id;
    $res->effective_time = $effective_time;
    $res->remind_period = $remind_period;
    $res->params = $params;
    $res->actions = $actions;
    $res->options = $options;
}

function initialize__ReminderStatus( & $res
    , $job_id // uint32_t
    , $state // ReminderStatus_state_e
    , $feedback // uint32_t
    , $effective_time // basic_objects\LocalTime
    , $current_try // uint32_t
    , $last_update_time // basic_objects\LocalTime
    , $next_exec_time // basic_objects\LocalTime
    , $contact_id // uint32_t
    , $salutation // string
    , $name // string
    , $first_name // string
    , $contact_phone_id // uint32_t
    , $phone_number // string
    , $template_localized_name // string
 )
{
    $res->job_id = $job_id;
    $res->state = $state;
    $res->feedback = $feedback;
    $res->effective_time = $effective_time;
    $res->current_try = $current_try;
    $res->last_update_time = $last_update_time;
    $res->next_exec_time = $next_exec_time;
    $res->contact_id = $contact_id;
    $res->salutation = $salutation;
    $res->name = $name;
    $res->first_name = $first_name;
    $res->contact_phone_id = $contact_phone_id;
    $res->phone_number = $phone_number;
    $res->template_localized_name = $template_localized_name;
}

function initialize__Contact( & $res
    , $user_id // uint32_t
    , $contact_id // uint32_t
    , $salutation // string
    , $name // string
    , $first_name // string
    , $birthday // basic_objects\Date
    , $notice // string
    , $landline_contact_phone_id // uint32_t
    , $landline_contact_phone // string
    , $mobile_contact_phone_id // uint32_t
    , $mobile_contact_phone // string
 )
{
    $res->user_id = $user_id;
    $res->contact_id = $contact_id;
    $res->salutation = $salutation;
    $res->name = $name;
    $res->first_name = $first_name;
    $res->birthday = $birthday;
    $res->notice = $notice;
    $res->landline_contact_phone_id = $landline_contact_phone_id;
    $res->landline_contact_phone = $landline_contact_phone;
    $res->mobile_contact_phone_id = $mobile_contact_phone_id;
    $res->mobile_contact_phone = $mobile_contact_phone;
}

// base messages

// messages

function initialize__GetReminderStatusRequest( & $res
    , $base_class_param_1 // string
    , $user_id // uint32_t
    , $search_filter // string
    , $effective_date_time_range // basic_objects\LocalTimeRange
    , $page_size // uint32_t
    , $page_number // uint32_t
    , $lang // lang_tools_protocol\lang_e
 )
{
    // base class
    \persek_protocol\initialize__Request( $res, $base_class_param_1 );

    $res->user_id = $user_id;
    $res->search_filter = $search_filter;
    $res->effective_date_time_range = $effective_date_time_range;
    $res->page_size = $page_size;
    $res->page_number = $page_number;
    $res->lang = $lang;
}

function initialize__GetReminderStatusResponse( & $res
    , $total_size // uint32_t
    , $statuses // array<ReminderStatus>
 )
{
    // base class
    \generic_protocol\initialize__BackwardMessage( $res );

    $res->total_size = $total_size;
    $res->statuses = $statuses;
}

function initialize__FindContactsRequest( & $res
    , $base_class_param_1 // string
    , $user_id // uint32_t
    , $search_filter // string
    , $page_size // uint32_t
    , $page_number // uint32_t
    , $lang // lang_tools_protocol\lang_e
 )
{
    // base class
    \persek_protocol\initialize__Request( $res, $base_class_param_1 );

    $res->user_id = $user_id;
    $res->search_filter = $search_filter;
    $res->page_size = $page_size;
    $res->page_number = $page_number;
    $res->lang = $lang;
}

function initialize__FindContactsResponse( & $res
    , $total_size // uint32_t
    , $contacts // array<Contact>
 )
{
    // base class
    \generic_protocol\initialize__BackwardMessage( $res );

    $res->total_size = $total_size;
    $res->contacts = $contacts;
}

function initialize__GetContactRequest( & $res
    , $base_class_param_1 // string
    , $contact_id // uint32_t
    , $lang // lang_tools_protocol\lang_e
 )
{
    // base class
    \persek_protocol\initialize__Request( $res, $base_class_param_1 );

    $res->contact_id = $contact_id;
    $res->lang = $lang;
}

function initialize__GetContactResponse( & $res
    , $contact // Contact
 )
{
    // base class
    \generic_protocol\initialize__BackwardMessage( $res );

    $res->contact = $contact;
}

function initialize__AddReminderRequest( & $res
    , $base_class_param_1 // string
    , $contact_phone_id // uint32_t
    , $reminder // Reminder
 )
{
    // base class
    \persek_protocol\initialize__Request( $res, $base_class_param_1 );

    $res->contact_phone_id = $contact_phone_id;
    $res->reminder = $reminder;
}

function initialize__AddReminderResponse( & $res
    , $job_id // uint32_t
 )
{
    // base class
    \generic_protocol\initialize__BackwardMessage( $res );

    $res->job_id = $job_id;
}

function initialize__ModifyReminderRequest( & $res
    , $base_class_param_1 // string
    , $job_id // uint32_t
    , $contact_phone_id // uint32_t
    , $reminder // Reminder
 )
{
    // base class
    \persek_protocol\initialize__Request( $res, $base_class_param_1 );

    $res->job_id = $job_id;
    $res->contact_phone_id = $contact_phone_id;
    $res->reminder = $reminder;
}

function initialize__ModifyReminderResponse( & $res
 )
{
    // base class
    \generic_protocol\initialize__BackwardMessage( $res );

}

function initialize__GetReminderRequest( & $res
    , $base_class_param_1 // string
    , $job_id // uint32_t
 )
{
    // base class
    \persek_protocol\initialize__Request( $res, $base_class_param_1 );

    $res->job_id = $job_id;
}

function initialize__GetReminderResponse( & $res
    , $contact_id // uint32_t
    , $contact_phone_id // uint32_t
    , $contact_phone // string
    , $reminder // Reminder
 )
{
    // base class
    \generic_protocol\initialize__BackwardMessage( $res );

    $res->contact_id = $contact_id;
    $res->contact_phone_id = $contact_phone_id;
    $res->contact_phone = $contact_phone;
    $res->reminder = $reminder;
}

// objects (constructors)

function create__Reminder(
    $msg_templ_id // uint32_t
    , $feedback_templ_id // uint32_t
    , $effective_time // basic_objects\LocalTime
    , $remind_period // uint32_t
    , $params // map<string, string>
    , $actions // map<dtmf_tools_protocol\tone_e, persek_protocol\ReminderAction>
    , $options // persek_protocol\ReminderOptions
 )
{
    $res = new Reminder;

    initialize__Reminder( $res, $msg_templ_id, $feedback_templ_id, $effective_time, $remind_period, $params, $actions, $options );

    return $res;
}

function create__ReminderStatus(
    $job_id // uint32_t
    , $state // ReminderStatus_state_e
    , $feedback // uint32_t
    , $effective_time // basic_objects\LocalTime
    , $current_try // uint32_t
    , $last_update_time // basic_objects\LocalTime
    , $next_exec_time // basic_objects\LocalTime
    , $contact_id // uint32_t
    , $salutation // string
    , $name // string
    , $first_name // string
    , $contact_phone_id // uint32_t
    , $phone_number // string
    , $template_localized_name // string
 )
{
    $res = new ReminderStatus;

    initialize__ReminderStatus( $res, $job_id, $state, $feedback, $effective_time, $current_try, $last_update_time, $next_exec_time, $contact_id, $salutation, $name, $first_name, $contact_phone_id, $phone_number, $template_localized_name );

    return $res;
}

function create__Contact(
    $user_id // uint32_t
    , $contact_id // uint32_t
    , $salutation // string
    , $name // string
    , $first_name // string
    , $birthday // basic_objects\Date
    , $notice // string
    , $landline_contact_phone_id // uint32_t
    , $landline_contact_phone // string
    , $mobile_contact_phone_id // uint32_t
    , $mobile_contact_phone // string
 )
{
    $res = new Contact;

    initialize__Contact( $res, $user_id, $contact_id, $salutation, $name, $first_name, $birthday, $notice, $landline_contact_phone_id, $landline_contact_phone, $mobile_contact_phone_id, $mobile_contact_phone );

    return $res;
}

// messages (constructors)

function create__GetReminderStatusRequest(
    $base_class_param_1 // string
    , $user_id // uint32_t
    , $search_filter // string
    , $effective_date_time_range // basic_objects\LocalTimeRange
    , $page_size // uint32_t
    , $page_number // uint32_t
    , $lang // lang_tools_protocol\lang_e
 )
{
    $res = new GetReminderStatusRequest;

    initialize__GetReminderStatusRequest( $res, $base_class_param_1, $user_id, $search_filter, $effective_date_time_range, $page_size, $page_number, $lang );

    return $res;
}

function create__GetReminderStatusResponse(
    $total_size // uint32_t
    , $statuses // array<ReminderStatus>
 )
{
    $res = new GetReminderStatusResponse;

    initialize__GetReminderStatusResponse( $res, $total_size, $statuses );

    return $res;
}

function create__FindContactsRequest(
    $base_class_param_1 // string
    , $user_id // uint32_t
    , $search_filter // string
    , $page_size // uint32_t
    , $page_number // uint32_t
    , $lang // lang_tools_protocol\lang_e
 )
{
    $res = new FindContactsRequest;

    initialize__FindContactsRequest( $res, $base_class_param_1, $user_id, $search_filter, $page_size, $page_number, $lang );

    return $res;
}

function create__FindContactsResponse(
    $total_size // uint32_t
    , $contacts // array<Contact>
 )
{
    $res = new FindContactsResponse;

    initialize__FindContactsResponse( $res, $total_size, $contacts );

    return $res;
}

function create__GetContactRequest(
    $base_class_param_1 // string
    , $contact_id // uint32_t
    , $lang // lang_tools_protocol\lang_e
 )
{
    $res = new GetContactRequest;

    initialize__GetContactRequest( $res, $base_class_param_1, $contact_id, $lang );

    return $res;
}

function create__GetContactResponse(
    $contact // Contact
 )
{
    $res = new GetContactResponse;

    initialize__GetContactResponse( $res, $contact );

    return $res;
}

function create__AddReminderRequest(
    $base_class_param_1 // string
    , $contact_phone_id // uint32_t
    , $reminder // Reminder
 )
{
    $res = new AddReminderRequest;

    initialize__AddReminderRequest( $res, $base_class_param_1, $contact_phone_id, $reminder );

    return $res;
}

function create__AddReminderResponse(
    $job_id // uint32_t
 )
{
    $res = new AddReminderResponse;

    initialize__AddReminderResponse( $res, $job_id );

    return $res;
}

function create__ModifyReminderRequest(
    $base_class_param_1 // string
    , $job_id // uint32_t
    , $contact_phone_id // uint32_t
    , $reminder // Reminder
 )
{
    $res = new ModifyReminderRequest;

    initialize__ModifyReminderRequest( $res, $base_class_param_1, $job_id, $contact_phone_id, $reminder );

    return $res;
}

function create__ModifyReminderResponse(
 )
{
    $res = new ModifyReminderResponse;

    initialize__ModifyReminderResponse( $res );

    return $res;
}

function create__GetReminderRequest(
    $base_class_param_1 // string
    , $job_id // uint32_t
 )
{
    $res = new GetReminderRequest;

    initialize__GetReminderRequest( $res, $base_class_param_1, $job_id );

    return $res;
}

function create__GetReminderResponse(
    $contact_id // uint32_t
    , $contact_phone_id // uint32_t
    , $contact_phone // string
    , $reminder // Reminder
 )
{
    $res = new GetReminderResponse;

    initialize__GetReminderResponse( $res, $contact_id, $contact_phone_id, $contact_phone, $reminder );

    return $res;
}

// namespace_end persek_web_protocol


?>
