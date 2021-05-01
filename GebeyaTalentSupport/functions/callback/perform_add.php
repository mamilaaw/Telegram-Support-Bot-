<?php
function perform_add($update) {
 
  $update->method[0] = 'editMessageText';
  
  $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
  $update->post_fields[0]->message_id = $update->callback_query->message->message_id;
  $text=$update->callback_query->message->text;
//   $endpos= strpos($text,"//");
//  $update->post_fields[0]->chat_id = substr($text,0,$endpos);
  
  $value=substr($text,7);
  if($value==null)
  { $value=0;}
  else
  {$value=$value+1;}
  
  $update->post_fields[0]->text = 'Value: '.  $value;
  //$update->debug= TRUE;
$keyboard = [
    
    [
      ['text' => 'ADD', 'callback_data' => 'add']
    ],
    [
      ['text' => '<< Helpcenter', 'callback_data' => 'callback_help']
    ],
  ];
  $update->post_fields[0]->reply_markup = json_encode(array(
    'inline_keyboard' => $keyboard,
  ));



  $update->post_fields[1] = new \stdClass();
  $update->method[1] = 'answerCallbackQuery';
  $update->post_fields[1]->callback_query_id = $update->callback_query->id;
  

}

