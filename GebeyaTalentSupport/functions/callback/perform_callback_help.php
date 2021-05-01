<?php
function perform_callback_help($update) {

    $update->method[0] = 'editMessageText';

    $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
    $update->post_fields[0]->message_id = $update->callback_query->message->message_id;


    $update->post_fields[0]->text = 'Welcome to Gebeya Help center, what should we help you with?';
    //$update->debug= TRUE;
    $keyboard = [
        [
            ['text' => 'General Info', 'url' => 'https://gebeya.com'],
            ['text' => 'Training', 'url' => 'https://gebeya.training/']
        ],
        [
            ['text' => 'Gebeya Talent Android Application', 'url' => 'https://play.google.com/store/apps/details?id=com.gebeya.app.mobile.g_platform_talent&hl=am&gl=US']
        ],
        [
            ['text' => 'Gebeya Talent IOS/Apple App', 'url' => 'https://apps.apple.com/us/app/gebeya-talent/id1555435627?utm_source=gebeya.com']
        ],
        [
            ['text' => 'Talent Help Center', 'callback_data' => 'talent'],
            ['text' => 'Client Help Center', 'callback_data' => 'client']
        ],
    ];//
    $update->post_fields[0]->reply_markup = json_encode(array(
        'inline_keyboard' => $keyboard,
    ));



    $update->post_fields[1] = new \stdClass();
    $update->method[1] = 'answerCallbackQuery';
    $update->post_fields[1]->callback_query_id = $update->callback_query->id;
}

