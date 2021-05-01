<?php

function send_contact($update){
    $update->method[0] = 'sendMessage';
    $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
    $update->post_fields[0]->text="Email: info@gebeya.com \n"
            . "Office phone: +251 11 6156939";
    
    $update->post_fields[1] = new \stdClass();
    $update->method[1] = 'answerCallbackQuery';
    $update->post_fields[1]->callback_query_id = $update->callback_query->id;
}

