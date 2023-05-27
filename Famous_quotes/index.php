<?php
require('model/database.php');
require('model/quote_db.php');
// Get the action to perform
$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
	
    if ($action === NULL) 
	{
        $action = 'home';
    }
}

// A single case to reload a quote whenever 
// the user switches back to the home page
// from the about page
switch($action) 
{
    // both cases, 'hitting the button' and 
    // 'coming back from the about page' do 
    // the same thing
    case 'home':
    case 'refresh_quote':
        
        $Quote = get_quote();
        include('view/client/home.php');

        break;
}
?>