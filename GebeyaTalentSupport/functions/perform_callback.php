<?php

function perform_callback($update) {
    switch ($update->callback_query->data) {
        case 'talent':
            perform_talent_help($update, 'Begin'); //
            break;
        case 'client':
            perform_client_help($update);
            break;
        case 'callback_help':
            perform_callback_help($update);
            break;
        /////////////////////////Begin////////////////////////////////// 
        case 'WHY_JOIN':
            perform_talent_help($update, 'WHY_JOIN');
            break;
        case 'APPLICATION_SCREENING':
            perform_talent_help($update, 'APPLICATION_SCREENING');
            break;
        case 'AFTER_ONBOARDING':
            perform_talent_help($update, 'AFTER_ONBOARDING');
            break;
        //////////////////////WHY JOIN///////////////////////////////////// 
        case 'What':
            perform_talent($update, 'What');
            break;
        case 'Benefits':
            perform_talent($update, 'Benefits');
            break;
        case 'Differences':
            perform_talent($update, 'Differences');
            break;
        //////////////////////Application_Screening//////////////////////////////////// 
        case 'Process':
            perform_talent($update, 'Process');
            break;
        case 'fail_test':
            perform_talent($update, 'fail_test');
            break;
        case 'Not_listed':
            perform_talent($update, 'Not_listed');
            break;
        //////////////////////After_Onboarding//////////////////////////////////// 
        case 'Be_employee':
            perform_talent($update, 'Be_employee');
            break;
        case 'G_differences':
            perform_talent($update, 'G_differences');
            break;
        case 'Project_avail':
            perform_talent($update, 'Project_avail');
            break;
        ///////////////////////////////////////////////////////////////////////////////
        case 'other_talent':
            forward_other($update, 'talent');
            break;
        ///////////////////////////////////////////////////////////
        case 'location':
            send_location($update);
            break;
        case 'contact':
            send_contact($update);
            break;
        case 'client_help':
            forward_other($update, 'client');
            break;
        default:
            break;

    }
}
