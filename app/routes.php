<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{
    return View::make('frontend'); 
});

Route::get('/analytics', 'AnalyticsController@analytics');

/*Route::get('/about','myController@aboutPage');
//Route::get('usama/', function()
//{
//	$name = "sajad";

//	return View::make('usama')->with('name',$name);
	
//});

*/

Route::get('/userTable', function(){
    if(Auth::user()->isAdmin)
    {   
        $user = new UserController();
        return $user->userTable();
        
        
    }
  
    return "YOU Are NOT ALLOWED";
    
}
)->before('auth');;
Route::get('/userTable', function(){
    if(Auth::user()->isAdmin)
    {   
        $user = new UserController();
        return $user->userTable();
        
        
    }
  
    return "YOU Are NOT ALLOWED";
    
}
)->before('auth');;

Route::post('/deleteUser', function(){
    if(Auth::user()->isAdmin)
    {
        $ID = Input::get('ID');
        User::where('id',$ID)->delete();
        return "Deleted Sucessfully";
        }
  
    return "YOU Are NOT ALLOWED";
    
}
)->before('auth');
Route::post('/register', function(){
    if(Auth::user()->isAdmin){
        
        $user = new UserController();
        return $user->register();
    }
    return "YOU Are NOT ALLOWED";
    
}
)->before('auth');

Route::get('/register', function(){
    if(Auth::user()->isAdmin){
        
        return View::make('newUsers');
    }
    return "YOU Are NOT ALLOWED";
    
}
)->before('auth');


Route::get('/index', 'UserController@index'
)->before('auth');
Route::get('/user', 'UserController@index'
)->before('auth');


//TAG ROUTE
Route::get('/Tag','TagController@tagGet')->before('auth');;
Route::post('/updateTag','TagController@updateTag')->before('auth');;
Route::post('/deleteTag','TagController@deleteTag')->before('auth');;
Route::get('/tagTable','TagController@tagTable')->before('auth');;

Route::get('/tagOptions','TagController@tagOptions')->before('auth');;

Route::post('/Tag','TagController@tagPost')->before('auth');;


//Generate Report Route
Route::get('/generateReportTable','GenerateReportController@generateReportTable')->before('auth');;

Route::get('/getCityName',function(){
    $city_ID = Input::get('ID');
    return City::where('city_ID',$city_ID)->first()->name;
    
    
})->before('auth');;

Route::get('/popupReport',function(){
    
    $cityID = Input::get('city');
    $date = Input::get('date');
                 $date2 = DateTime::createFromFormat('m/d/Y', $date);
                $date = $date2->format('Y-m-d');
    $report = ReportView::where('date',$date)->where('newspaperCityID',$cityID)->first();
   $nazim = Leader::where('leader_ID',6)->first()->name;
   if($report==NULL)
       $usernamename = "";
   else
       $usernamename = $report->usernamename;
   
       
   
       return View::make('popupReport',['usernamename' => $usernamename,'nazim'=>$nazim]);

    
})->before('auth');;


Route::get('/gImportantNew','GenerateReportController@gImportantNew')->before('auth');;
Route::get('/gIdaria','GenerateReportController@gIdaria')->before('auth');;
Route::get('/gColumn','GenerateReportController@gColumn')->before('auth');;


Route::get('/GenerateReport','GenerateReportController@gReportPage')->before('auth');;
Route::post('/GenerateReport','GenerateReportController@gReportPost')->before('auth');;
//
//CReport Route
Route::get('/cReport','CReportController@creportPage')->before('auth');
Route::get('/tableElement','CReportController@tableElement')->before('auth');
Route::get('/cReportTable','CReportController@cReportTable')->before('auth');


//Report Route
Route::get('/reportTable','ReportController@reportTable')->before('auth');

Route::get('/Report','ReportController@reportPage')->before('auth');
Route::post('/Report','ReportController@reportPagePost')->before('auth');
Route::post('/updateReport','ReportController@updateReport')->before('auth');
Route::post('/deleteReport','ReportController@deleteReport')->before('auth');

Route::get('/getCol','ReportController@getCol')->before('auth');
Route::get('/getPg','ReportController@getPg')->before('auth');


//PressRelease Route
Route::get('/pressReleaseTable','PressReleaseController@pressReleaseTable')->before('auth');;
Route::get('/uploadFileButton',function(){
    return View::make('uploadFileButton');
    
});
Route::get('/empty',function(){
    return View::make('empty');
    
});
Route::get('/jason',function(){
    return View::make('jason');
    
});
Route::get('/PressRelease','PressReleaseController@pReleasePage')->before('auth');;
Route::post('/PressRelease','PressReleaseController@pReleasePagePost')->before('auth');;
Route::post('/updatePressRelease','PressReleaseController@updatePressRelease')->before('auth');;
Route::post('/deletePressRelease','PressReleaseController@deletePressRelease')->before('auth');;

//Columns Route
Route::get('upload', function() {
  return View::make('columns1')->before('auth');
});

Route::post('upload', 'ColumnsController@upload');


Route::get('/columnsTable','ColumnsController@columnsTable')->before('auth');;

Route::get('/Columns','ColumnsController@columnsPage')->before('auth');;
Route::post('/Columns','ColumnsController@ColumnsPagePost')->before('auth');;
Route::post('/updateColumns','ColumnsController@updateColumns')->before('auth');;
Route::post('/deleteColumns','ColumnsController@deleteColumns')->before('auth');;



//city Route
Route::get('/cityTable','CityController@cityTable')->before('auth');;

Route::get('/City','CityController@cityPage')->before('auth');;
Route::post('/City','CityController@cityPagePost')->before('auth');;

Route::post('/updateCity','CityController@updateCity')->before('auth');;
//Newspaper Route
Route::get('/newspaperTable','NewsPaperController@newspaperTable')->before('auth');;

Route::get('/Newspaper','NewsPaperController@newspaperPage')->before('auth');;
Route::post('/Newspaper','NewsPaperController@newspaperPagePost')->before('auth');;
Route::post('/deleteNewspaper','NewsPaperController@deleteNewspaper')->before('auth');;
Route::post('/updateNewspaper','NewsPaperController@updateNewspaper')->before('auth');;



//Leader Route
Route::get('/leaderTable','LeaderController@leaderTable')->before('auth');;

Route::get('/Leader','LeaderController@leaderPage')->before('auth');;
Route::post('/Leader','LeaderController@leaderPagePost')->before('auth');;
Route::post('/updateLeader','LeaderController@updateLeader')->before('auth');;
Route::post('/deleteLeader','LeaderController@deleteLeader')->before('auth');;

//recover password routes

Route::get('/recoverPasswordToken/{code}','RecoverPassword@recoverPasswordToken');

Route::get('/recoverPassword','RecoverPassword@recoverPasswordForm');
Route::post('/recoverPassword','RecoverPassword@recoverPassword');
//register login 

//Route::get('/register', 'HomeController@registerPage');
//Route::post('/register', 'UserController@register');


/*Route::get('/register', function(){
    return "Sorry the registeration has been closed.";
    
});

Route::post('/register',  function(){
    return "Sorry the registeration has been closed.";
    
});
*/
Route::get('/login', 'HomeController@loginPage');

Route::post('/login', 'UserController@login');



Route::get('/profile', 'UserController@profile')->before('auth');;


Route::get('/logout', 'UserController@logout');
Route::post('/updatePersonal', 'UserController@updatePersonel')->before('auth');;

Route::post('/updatePassword', 'UserController@updatePassword')->before('auth');;


