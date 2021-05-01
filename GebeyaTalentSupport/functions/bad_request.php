<?php

function bad_request($update) {
  $update->method[0] = 'sendMessage';

  $update->post_fields[0]->disable_web_page_preview=TRUE;
  //$update->post_fields[0]->parse_mode="HTML";
  //$update->post_fileds[0]->reply_markup->ForceReply=TRUE;
  
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  $update->post_fields[0]->text = print_r("I did  not understand your message", TRUE);
 
}
