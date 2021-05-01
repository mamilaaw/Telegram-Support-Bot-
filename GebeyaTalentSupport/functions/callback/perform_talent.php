<?php

function perform_talent($update, $query) {
    $update->method[0] = 'editMessageText';

    $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
    $update->post_fields[0]->message_id = $update->callback_query->message->message_id;
    $update->post_fields[0]->parse_mode = "HTML";
    switch ($query) {
        //////////////////////////////////////////Why Join/////////////////////////////////////////////////
        case 'What':
            $send_text = "Gebeya is an online freelance talent marketplace for the Best of African Talent."
                    . " Freelancers who successfully pass through our vetting process unlock access to lucrative projects"
                    . "on the continent and from around the globe.";
            break;
        case 'Benefits':
            $send_text = "<b><u>What are the benefits of becoming a Gebeya Talent?</u></b>
<b><u>Convenience:</u></b> submit your application and update your profile on-the-go, from your phone; it's free to join, and free to be matched with projects.
<b><u>Automation:</u></b> only match with projects that suit your skill sets and rate; no searching, no scrolling, no bidding wars; rate integrity eliminates unfair pricing that undervalues your work and worth. 
<b><u>Customization:</u></b> Gebeya is for freelance talent in and from Africa; no anonymity or getting lost among millions of users, thanks to networking, community, events, and free upskilling training opportunities.";
            break;
        case 'Differences':
            $send_text = "<b><u>What differentiates this from other freelance sites?</u></b>
This is a platform for African freelancers, with a more selective, curated membership, and community feel than other freelance sites. Each project is tailored and contextualized to your preferences, delivered straight to you within the platform. Whether you are looking for full-time, part-time opportunities, remote work, or an on-site gig.";
            break;
        ////////////////////////////////////////////////Application_Screening//////////////////////////////////////////////////////////
        case 'Process':
            $send_text = "<b><u>How does the application process work?</u></b>
<b><u>Download</u></b> the Gebeya Talent app from the Google Play or Apple App Store.
<b><u>Register</u></b> and fill in details like phone number, email address, and upload your CV.
<b><u>Choose</u></b> your title and skills.
<b><u>Submit</u></b> your application.
Successfully pass tests relevant to your skills, English proficiency, and interview to be onboarded.
Visit our How it Works page for more.
";            break;
        case 'Not_listed':
            $send_text = "<b><u>What if I don’t see my skill set listed?</u></b>
Please reach out to talent@gebeya.com. Email with your specific query. In the future, we will add additional features to allow you to enter information like skills and programs.
";break;
        case 'fail_test':
            $send_text = "<b><u>What happens if I fail the tests?</u></b>
A Talent Specialist will reach out to you with the decision. Based on your result, you might be eligible for retake. In case you do not pass for the second time, or the retake option isn’t available to you, you will receive a message with information when you can apply again.";
       break;     
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
////////////////////////////////////////////////After Onboarding//////////////////////////////////////////////////////////
        case 'Be_employee':
            $send_text = "<b><u>As a Talent, will I be a Gebeya employee?</u></b> 
No. Although employees also undergo thorough screening, testing, and interviewing to join Gebeya, being a Gebeya Talent differs from being an employee. You are a freelancer in our talent marketplace, whom we will match with projects from a variety of corporations and exciting startups.";            
            break;
       
case 'G_differences':
            $send_text = "<b><u>What’s the difference between G-Talent and G-Made?</u></b> 
G-Talent projects can be short- or long-term, at hourly, daily, or monthly rates. G-Made projects include payment milestones, based on deliverables.
"; break;
        case 'Project_avail':
            $send_text = "<b><u>What types of projects are available in the Gebeya Talent Marketplace? </u></b> 
Projects range from development and promotion of mobile and web apps, to new product and market launches, to market research and writing. Gebeya is Pan-African, but has clients from around the African continent, Europe, and in the U.S. Gain access to great-paying freelance opportunities in Software Development, Project Management, Digital Marketing, Product Management, Graphics & Design, Cybersecurity, and Artificial Intelligence.
";break;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        default :
            $send_text = "Not able to find the help you requested, please try again!";
    }

    $update->post_fields[0]->text = $send_text;
    //$update->debug= TRUE;
    $keyboard = [
        [
            ['text' => '<< Talent Help', 'callback_data' => 'talent'], ['text' => '<< << Helpcenter', 'callback_data' => 'callback_help']
        ],
    ];
    $update->post_fields[0]->reply_markup = json_encode(array(
        'inline_keyboard' => $keyboard,
    ));



    $update->post_fields[1] = new \stdClass();
    $update->method[1] = 'answerCallbackQuery';
    $update->post_fields[1]->callback_query_id = $update->callback_query->id;
}
