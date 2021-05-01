<?php

function perform_talent_help($update,$direction) {

    $update->method[0] = 'editMessageText';

    $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
    $update->post_fields[0]->message_id = $update->callback_query->message->message_id;

    switch ($direction){
        case 'Begin':
    $update->post_fields[0]->text = 'Welcome to talent help center, how may I help you?';
    //$update->debug= TRUE;
    $keyboard = [
        [
            ['text' => 'Why join Gebeya?', 'callback_data' => 'WHY_JOIN']
        ],
        [
            ['text' => 'Application and Screening process?', 'callback_data' => 'APPLICATION_SCREENING'],
        ],
        [
            ['text' => 'After onboarding...', 'callback_data' => 'AFTER_ONBOARDING']
        ],
        [
            ['text' => 'Other requests?', 'callback_data' => 'other_talent'], ['text' => '<< Helpcenter', 'callback_data' => 'callback_help']
        ],
    ];
    $update->post_fields[0]->reply_markup = json_encode(array(
        'inline_keyboard' => $keyboard,
    ));
    break;
        case 'WHY_JOIN':
             $update->post_fields[0]->text = 'Why you should join Gebeya market place...';
    //$update->debug= TRUE;
    $keyboard = [
        [
            ['text' => 'What is Gebeya?', 'callback_data' => 'What']
        ],
        [
            ['text' => 'Benefits of becoming a Gebeya Talent?', 'callback_data' => 'Benefits'],
        ],
        [
            ['text' => 'Differences from other freelance sites', 'callback_data' => 'Differences']
        ],
        [
            ['text' => 'Other requests?', 'callback_data' => 'other_talent'], ['text' => '<< Helpcenter', 'callback_data' => 'talent']
        ],
    ];
    $update->post_fields[0]->reply_markup = json_encode(array(
        'inline_keyboard' => $keyboard,
    ));
            break;
        case 'APPLICATION_SCREENING':
            $update->post_fields[0]->text = 'How to apply to Gebeya talent marketplace.';
    //$update->debug= TRUE;
    $keyboard = [
        [
            ['text' => 'The application process?', 'callback_data' => 'Process']
        ],
        [
            ['text' => 'I don’t see my skill set listed?', 'callback_data' => 'Not_listed'],
        ],
        [
            ['text' => 'What happens if I fail the tests?', 'callback_data' => 'fail_test']
        ],
        [
            ['text' => 'Other requests?', 'callback_data' => 'other_talent'], ['text' => '<< Helpcenter', 'callback_data' => 'talent']
        ],
    ];
    $update->post_fields[0]->reply_markup = json_encode(array(
        'inline_keyboard' => $keyboard,
    ));
            break;
        case 'AFTER_ONBOARDING':
             $update->post_fields[0]->text = 'Why you should join Gebeya market place...';
    //$update->debug= TRUE;
    $keyboard = [
        [
            ['text' => 'Will I be a Gebeya employee? ', 'callback_data' => 'Be_employee']
        ],
        [
            ['text' => 'Difference between G-Talent and G-Made?', 'callback_data' => 'G_differences'],
        ],
        [
            ['text' => 'Projects available in the G talent marketplace.', 'callback_data' => 'Project_avail']
        ],
        [
            ['text' => 'Other requests?', 'callback_data' => 'other_talent'], ['text' => '<< Helpcenter', 'callback_data' => 'talent']
        ],
    ];
    $update->post_fields[0]->reply_markup = json_encode(array(
        'inline_keyboard' => $keyboard,
    ));
            break;
        default :
        break;
    }


    $update->post_fields[1] = new \stdClass();
    $update->method[1] = 'answerCallbackQuery';
    $update->post_fields[1]->callback_query_id = $update->callback_query->id;
}
