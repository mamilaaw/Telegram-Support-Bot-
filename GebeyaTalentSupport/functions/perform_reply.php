<?php

function perform_reply($update) {
    $update->method[0] = 'sendMessage';
    $update->method[1] = 'sendPhoto';
    $update->post_fields[1] = new stdClass();
    
    //$update->post_fields[0]->chat_id = $update->message->chat->id;
   switch ($update->message->reply_to_message->text) {
   case ('Please describe your problem and I\'ll forward your message.'):
       $id=1120328704; //for talent
       break;
   case ('Please describe your issue and I\'ll forward your message.'):
       $id= 1098187878;
       break;
   default: $id = 1120328704; break;
   }
   
    switch ($update->message->reply_to_message->text) {
        case ('Please describe your problem and I\'ll forward your message.'):
        case ('Please describe your issue and I\'ll forward your message.'):
            // Forward the message
//            if($person=="client"){
//            $id=1098187878; 
//            }
//            else{
//              $id=1120328704;
//            }
            
            $update->post_fields[0]->chat_id = $id;//"@Arkebesuk" ;//
            $update->post_fields[1]->chat_id = $id;
           $mytext = $update->message->from->id . "// Name:" . $update->message->from->first_name . "\n" .
                    "Username: @".$update->message->from->username."\n".
                    "You received the following question:\n\n" .
                     $update->message->text.$update->message->caption;
            $update->post_fields[0]->text = $mytext;
            
            $update->post_fields[1]->photo = $update->message->photo[0]->file_id;
            $update->post_fields[1]->caption = $update->message->from->id . "// Username: @".$update->message->from->username;
           
            slack($mytext);
            
           
            //"\n\nIt was sent by _+_^%\n\n" .
            //print_r($update->message->from, TRUE);
            // Confirm that the message has been forwarded
            
            $update->post_fields[2] = new \stdClass();
            $update->method[2] = 'sendMessage';
            $update->post_fields[2]->chat_id = $update->message->chat->id;
            $update->post_fields[2]->text = 'Your help request has been forwarded. You should get a response within 24 hours.';
            break;
        default: 
            $update->method[0] = 'sendMessage';
            $update->post_fields[0]->chat_id = $update->message->chat->id;
            $update->post_fields[0]->text = 'You can submit additional query using /help command. Thanks,';
            
            break;
        
    }
}
