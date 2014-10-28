<?
include "../winbinder.php";                 // Location of WinBinder library

// STEP 1: Create main window

$mainwin = wb_create_window(NULL, AppWindow, "Five steps", 320, 240); 

// STEP 2: Create controls for the main window       Geometry data        Id 

wb_create_control($mainwin, PushButton, "Button 1",   50, 70, 80, 22,     101); 
wb_create_control($mainwin, PushButton, "Button 2",  180, 70, 80, 22,     102); 

// STEP 3: Create a handler function to process the controls (see below). 

// STEP 4: Assign the handler function to the main window. 

wb_set_handler($mainwin, "process_main"); 

// STEP 5: Enter application loop 

wb_main_loop(); 

// The handler function from step 3 

function process_main($window, $id)
{
    switch($id) { 

        case 101: 
        case 102: 
            wb_message_box($window, "Button #$id was pressed."); 
            break; 

        case IDCLOSE:                         // The constant IDCLOSE is predefined 
            wb_destroy_window($window);       // Destroy the window
            break; 
     }
}

?>