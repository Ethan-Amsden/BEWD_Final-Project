<?php
require('../../model/database.php');
require('../../model/quote_db.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
	
    if ($action === NULL) 
	{
        $action = 'admin_home';
    }
}

switch($action) 
{
    // both cases, 'hitting the button' and 
    // 'coming back from the about page' do 
    // the same thing
    case 'admin_home':
        
        $quotes = get_quotes();
        include('quote_list.php');

        break;
    
    case 'list_quotes':
        $errors = [];
        $edit = '';
        $_SESSION['edit'] = $edit;
        $_SESSION['errors'] = $errors;//Empty errors
        //Get list of all available quotes
        $quotes = get_quotes();
        //Page to display 
        include('quote_list.php');
        break;

    case 'show_add_quote':

        //Validation Arrays
        $errors = [];
        $values = [];
        $fields = [];
        session_start();
        $_SESSION['errors'] = $errors;//Empty errors
        $info = array('','','');//empty array
        $_SESSION['quoteInfo'] = $info; // store information
        $edit = 'Adding';
        $_SESSION['edit'] = $edit;
        //echo $edit;
        include('add_quote.php');//Page to display 
        
        break;

    case 'select_quote'://Show Quote info on edit page

        $qID = filter_input(INPUT_POST, 'Quote_ID');//Get ID Selected
        $info = retrieve_quote($qID);//Query Quote info from selected ID
    
        session_start();//Start Session
        $_SESSION['quoteInfo'] = $info; //Store information queried

        $errors = [];
        $_SESSION['errors'] = $errors;//Empty errors

        $edit = 'Editing';//Set editing mode
        $_SESSION['edit'] = $edit;
        include('add_quote.php');

        break;

    case 'edit_quote':

        session_start();//Start Session
        $edit = $_SESSION['edit'];//Get editing mode
        //echo $edit;
        //Get input
        $quoteID = filter_input(INPUT_POST, 'quoteID', FILTER_VALIDATE_INT);  
        $quoteBody = filter_input(INPUT_POST, 'quoteBody');   
        $quoteAuthor = filter_input(INPUT_POST, 'authorName');   

        $errors = [];
        $values = [];
        $fields =  ['quoteBody','authorName'];

        foreach ($fields as $field) {          
            if (empty($_POST[$field])) {
                $errors[] = $field;
             }       
            else {
                $values[$field] = $_POST[$field];
            }
            $_SESSION['errors'] = $errors;
        }

        if(!empty($errors)){
            
            $_SESSION['errors'] = $errors;//Save Errors
            $info = $_SESSION['quoteInfo'] ; //Get information stored
            include('add_quote.php');    
        } 
        else{
            if ($edit == 'Editing') {//If editing
            $errors = [];
            $_SESSION['errors'] = $errors;//Empty errors
                            
                    update_quote($quoteID, $quoteBody, $quoteAuthor);           
                    $quotes = get_quotes();
                    $edit = '';
                    $_SESSION['edit'] = $edit;
                    include('quote_list.php');
             } 
             if ($edit == 'Adding'){//If adding
                    add_quote($quoteBody, $quoteAuthor);
                    $edit = '';
                    $_SESSION['edit'] = $edit;
                    $quotes = get_quotes();
                    include('quote_list.php');//Page to display 
                }
            }

        break;

    case 'delete_quote':
    
        $quoteID = filter_input(INPUT_POST, 'Quote_ID');//Get ID Selected
        //echo $quoteID;
        delete_quote($quoteID);
       // echo $quoteID;
        $quotes = get_quotes();
       include('quote_list.php');//Page to display

    break;
}
?>