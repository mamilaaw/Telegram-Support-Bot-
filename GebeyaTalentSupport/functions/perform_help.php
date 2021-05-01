<?php

function perform_help($update) {
    $update->method[0] = 'sendMessage';
    $update->post_fields[0]->chat_id = $update->message->chat->id;
    $update->post_fields[0]->text = 'Welcome to Gebeya Help center, what should we help you with?';

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
    ];
    $update->post_fields[0]->reply_markup = json_encode(array(
        'inline_keyboard' => $keyboard,
    ));
}

