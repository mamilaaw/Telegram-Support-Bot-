<?php
function route_request($update) {
  //if its a reply from the support admin, send the message directly to the requester
  if(isset($update->message->chat->id)&&  (($update->message->chat->id==1098187878) ||($update->message->chat->id==1120328704) )){
    if (isset($update->message->reply_to_message)) {
      perform_support_reply($update);
    } else {
    // Is it ordinary text?
    perform_text($update);
    }
      return;
  }
  // Is it a callback query?
  if (isset($update->callback_query)) {
    perform_callback($update);
    return;
  }

  // Is it a command?
  if (isset($update->message->entities[0]) && $update->message->entities[0]->type == 'bot_command') {
    $update->parameters = array();
    $update->command[0] = substr($update->message->text, 0, $update->message->entities[0]->length);
    $update->parameters[0] = substr($update->message->text, $update->message->entities[0]->length+1);

    switch ($update->command[0]) {
//      case ('/whoami'):
//        whoami($update);
//        break;
//
//      case ('/echo'):
//        echo_input($update);
//        break;

      case ('/help'):
        perform_help($update);
        break;
       case ('/start'):
        perform_help($update);
        break;

      default:
        bad_request($update);
        break;
    }
  } else {
    // Is it a reply-to message?
    if (isset($update->message->reply_to_message)) {
      perform_reply($update);
    } else {
    // Is it ordinary text?
    perform_text($update);
    }
  }
}
