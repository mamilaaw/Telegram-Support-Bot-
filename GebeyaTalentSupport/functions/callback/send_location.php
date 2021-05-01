<?php

function send_location($update){
      $update->method[0] = 'sendLocation';
    $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
    $update->post_fields[0]->latitude= 9.001156979487618;
    $update->post_fields[0]->longitude= 38.767099034572084;
    
      $update->post_fields[1] = new \stdClass();
    $update->method[1] = 'answerCallbackQuery';
    $update->post_fields[1]->callback_query_id = $update->callback_query->id;
}

