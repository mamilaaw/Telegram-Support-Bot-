<?php
function perform_support_reply($update) {
  $update->method[0] = 'sendMessage';
  //
  //get the chat id from the reply text
  if(isset($update->message->reply_to_message->caption))
  { $text = $update->message->reply_to_message->caption;}
  else
  {$text = $update->message->reply_to_message->text;}
    $endpos= strpos($text,"//");
  $update->post_fields[0]->chat_id = substr($text,0,$endpos);
  
  $update->post_fields[0]->text = $update->message->text;
//    switch ($text) {
//    case ('Please describe your problem and I\'ll forward your message.'):
//      finish_reply($update);
//      break;
//  }
}
