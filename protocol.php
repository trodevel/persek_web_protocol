<?php

namespace persek_web_protocol;


// includes
require_once __DIR__.'/../basic_parser/object.php';
require_once __DIR__.'/../persek_protocol/protocol.php';

// includes for used modules
require_once __DIR__.'/../generic_protocol/protocol.php';
require_once __DIR__.'/../basic_objects/protocol.php';
require_once __DIR__.'/../dtmf_tools/protocol.php';
require_once __DIR__.'/../lang_tools/protocol.php';

// Enum ReminderStatus_state_e
const ReminderStatus_state_e__IDLE                 = 0;
const ReminderStatus_state_e__ACTIVE               = 1;
const ReminderStatus_state_e__COMPLETED_OK         = 2;
const ReminderStatus_state_e__COMPLETED_FAILED     = 3;
const ReminderStatus_state_e__WAITING_REDIAL_TIMER = 4;

// Object
class Reminder
{
    public $msg_templ_id        ; // type: uint32_t
    public $feedback_templ_id   ; // type: uint32_t
    public $effective_time      ; // type: basic_objects\LocalTime
    public $remind_period       ; // type: uint32_t
    public $params              ; // type: map<string, string>
    public $actions             ; // type: map<dtmf_tools\tone_e, persek_protocol\ReminderAction>
    public $options             ; // type: persek_protocol\ReminderOptions
};

// Object
class ReminderStatus
{
    public $job_id              ; // type: uint32_t
    public $state               ; // type: ReminderStatus_state_e
    public $feedback            ; // type: uint32_t
    public $effective_time      ; // type: basic_objects\LocalTime
    public $current_try         ; // type: uint32_t
    public $last_update_time    ; // type: basic_objects\LocalTime
    public $next_exec_time      ; // type: basic_objects\LocalTime
    public $contact_id          ; // type: uint32_t
    public $salutation          ; // type: string
    public $name                ; // type: string
    public $first_name          ; // type: string
    public $contact_phone_id    ; // type: uint32_t
    public $phone_number        ; // type: string
    public $template_localized_name; // type: string
};

// Object
class Contact
{
    public $user_id             ; // type: uint32_t
    public $contact_id          ; // type: uint32_t
    public $salutation          ; // type: string
    public $name                ; // type: string
    public $first_name          ; // type: string
    public $birthday            ; // type: basic_objects\Date
    public $notice              ; // type: string
    public $landline_contact_phone_id; // type: uint32_t
    public $landline_contact_phone; // type: string
    public $mobile_contact_phone_id; // type: uint32_t
    public $mobile_contact_phone; // type: string
};

// Message
class GetReminderStatusRequest extends \persek_protocol\Request
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 34933372;

    public $user_id             ; // type: uint32_t
    public $search_filter       ; // type: string
    public $effective_date_time_range; // type: basic_objects\LocalTimeRange
    public $page_size           ; // type: uint32_t
    public $page_number         ; // type: uint32_t
    public $lang                ; // type: lang_tools\lang_e
};

// Message
class GetReminderStatusResponse extends \generic_protocol\BackwardMessage
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 121715388;

    public $total_size          ; // type: uint32_t
    public $statuses            ; // type: array<ReminderStatus>
};

// Message
class FindContactsRequest extends \persek_protocol\Request
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 1599063005;

    public $user_id             ; // type: uint32_t
    public $search_filter       ; // type: string
    public $page_size           ; // type: uint32_t
    public $page_number         ; // type: uint32_t
    public $lang                ; // type: lang_tools\lang_e
};

// Message
class FindContactsResponse extends \generic_protocol\BackwardMessage
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 2798514955;

    public $total_size          ; // type: uint32_t
    public $contacts            ; // type: array<Contact>
};

// Message
class GetContactRequest extends \persek_protocol\Request
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 3048955191;

    public $contact_id          ; // type: uint32_t
    public $lang                ; // type: lang_tools\lang_e
};

// Message
class GetContactResponse extends \generic_protocol\BackwardMessage
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 3875015923;

    public $contact             ; // type: Contact
};

// Message
class AddReminderRequest extends \persek_protocol\Request
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 1716890514;

    public $contact_phone_id    ; // type: uint32_t
    public $reminder            ; // type: persek_protocol\Reminder
};

// Message
class AddReminderResponse extends \generic_protocol\BackwardMessage
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 1083684194;

    public $job_id              ; // type: uint32_t
};

// Message
class ModifyReminderRequest extends \persek_protocol\Request
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 4170784810;

    public $job_id              ; // type: uint32_t
    public $contact_phone_id    ; // type: uint32_t
    public $reminder            ; // type: persek_protocol\Reminder
};

// Message
class ModifyReminderResponse extends \generic_protocol\BackwardMessage
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 2243117655;
};

// Message
class GetReminderRequest extends \persek_protocol\Request
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 162063050;

    public $job_id              ; // type: uint32_t
};

// Message
class GetReminderResponse extends \generic_protocol\BackwardMessage
{
    function __construct()
    {
        parent::__construct();
    }

    const MESSAGE_ID = 625512941;

    public $contact_id          ; // type: uint32_t
    public $contact_phone_id    ; // type: uint32_t
    public $contact_phone       ; // type: string
    public $reminder            ; // type: persek_protocol\Reminder
};

# namespace_end persek_web_protocol


?>

