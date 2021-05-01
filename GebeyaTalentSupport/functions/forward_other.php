<?php
function forward_other($update,$person) {
  if($person=='client'){
  $text='Please describe your issue and I\'ll forward your message.';
  }else{
  $text='Please describe your problem and I\'ll forward your message.';
  }
      
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
  $update->post_fields[0]->text = $text;
  $update->post_fields[0]->reply_markup = json_encode(array(
    'force_reply' => TRUE,
  ));

  $update->post_fields[1] = new \stdClass();
  $update->method[1] = 'answerCallbackQuery';
  $update->post_fields[1]->callback_query_id = $update->callback_query->id;
}
