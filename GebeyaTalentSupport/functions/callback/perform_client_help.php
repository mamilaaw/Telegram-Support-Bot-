<?php
function perform_client_help($update) {
 
  $update->method[0] = 'editMessageText';
  
  $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
  $update->post_fields[0]->message_id = $update->callback_query->message->message_id;

  
 $update->post_fields[0]->text = 'Welcome to Gebeya client help center, how may I help you?';
  //$update->debug= TRUE;
$keyboard = [
    
    [
      ['text' => 'Looking for a Talent?', 'url' => 'https://www.gebeya.com/talent']
    ],
    [
      ['text' => 'You have a project that needs to be done?', 'url' => 'https://www.gebeya.com/made']
    ],
    [
      ['text' => 'HQ Location', 'callback_data' => 'location'],['text' => 'Contact', 'callback_data' => 'contact']
    ],
    [
      ['text' => 'Other requests?', 'callback_data' => 'client_help']
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

