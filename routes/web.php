

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');
Route::post('/exerciseaddaction','ManageExerciseController@addaction')->name('exerciseaddaction');
Route::post('/patientinfo', 'PatientController@saveinfo')->name('patientinfo');
Route::post('/submitfeedback', 'FeedbackController@submit')->name('submitfeedback');
Route::post('/physioinfo', 'PhysiotherapistController@saveinfo')->name('physioinfo');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// --- Library 
Route::get('/manageexercise', 'ManageExerciseController@index')->name('manageexercise');
Route::get('/exerciseadd', 'ManageExerciseController@add')->name('exerciseadd');
Route::get('/exerciseaddaction', 'ManageExerciseController@addaction')->name('exerciseaddaction');
Route::get('/exerciseedit/{exercise_id}', 'ManageExerciseController@edit')->name('exerciseedit');
Route::get('/exercisedelete/{exercise_id}', 'ManageExerciseController@delete')->name('exercisedelete');
Route::get('/exerciseeditaction', 'ManageExerciseController@update')->name('exerciseeditaction');
Route::post('/exerciseeditaction', 'ManageExerciseController@update')->name('exerciseeditaction');
Route::get('/exercisepreview', 'ManageExerciseController@preview')->name('exercisepreview');
Route::get('/exerciseoneview/{exercise_id}','ManageExerciseController@oneview')->name('exerciseoneview');

Route::get('/updateminusexercisepreview/{exercise_id}', 'ManageExerciseController@updateminusexercisepreview')->name('updateminusexercisepreview');
Route::get('/updateplusexercisepreview/{exercise_id}', 'ManageExerciseController@updateplusexercisepreview')->name('updateplusexercisepreview');
Route::get('/myfavourite', 'ManageExerciseController@showfavourite')->name('myfavourite');
Route::get('/viewexercise', 'ManageExerciseController@viewexercise')->name('viewexercise');
Route::get('/updatefavouriteexercise/{exercise_id}', 'ManageExerciseController@updatefavouriteexercise')->name('updatefavouriteexercise');
Route::get('/showfilterexercise', 'ManageExerciseController@showfilterexercise')->name('showfilterexercise');
Route::get('/shareoption', 'ManageExerciseController@shareoption')->name('shareoption');
Route::get('/showfiltercategoryexercise/{exercise_id}', 'ManageExerciseController@showfiltercategoryexercise')->name('showfiltercategoryexercise');

Route::get('/managecategory', 'ManageCategoryController@index')->name('managecategory');
Route::get('/categoryadd', 'ManageCategoryController@add')->name('categoryadd');
Route::get('/categoryaddaction', 'ManageCategoryController@addaction')->name('categoryaddaction');
Route::get('/categoryaddaction1', 'ManageCategoryController@addaction1')->name('categoryaddaction1');
Route::get('/categoryedit/{category_id}', 'ManageCategoryController@edit')->name('categoryedit');
Route::get('/categorydelete/{category_id}', 'ManageCategoryController@delete')->name('categorydelete');
Route::get('/categoryeditaction', 'ManageCategoryController@update')->name('categoryeditaction');

Route::get('/managearea', 'ManageAreaController@index')->name('managearea');
Route::get('/areaadd', 'ManageAreaController@add')->name('areaadd');
Route::get('/areaaddaction', 'ManageAreaController@addaction')->name('areaaddaction');
Route::get('/areaaddaction1', 'ManageAreaController@addaction1')->name('areaaddaction');
Route::get('/areaedit/{area_id}', 'ManageAreaController@edit')->name('areaedit');
Route::get('/areadelete/{area_id}', 'ManageAreaController@delete')->name('areadelete');
Route::get('/areaeditaction', 'ManageAreaController@update')->name('areaeditaction');

Route::get('/managetype', 'ManageTypeController@index')->name('managetype');
Route::get('/typeadd', 'ManageTypeController@add')->name('typeadd');
Route::get('/typeaddaction', 'ManageTypeController@addaction')->name('typeaddaction');
Route::get('/typeaddaction1', 'ManageTypeController@addaction1')->name('typeaddaction1');
Route::get('/typeedit/{type_id}', 'ManageTypeController@edit')->name('typeedit');
Route::get('/typedelete/{type_id}', 'ManageTypeController@delete')->name('typedelete');
Route::get('/typeeditaction', 'ManageTypeController@update')->name('typeeditaction');


Route::get('/managesubtype', 'ManageSubTypeController@index')->name('managesubtype');
Route::get('/subtypeadd', 'ManageSubTypeController@add')->name('subtypeadd');
Route::get('/subtypeaddaction', 'ManageSubTypeController@addaction')->name('subtypeaddaction');
Route::get('/subtypeaddaction1', 'ManageSubTypeController@addaction1')->name('subtypeaddaction1');
Route::get('/subtypeedit/{subtype_id}', 'ManageSubTypeController@edit')->name('subtypeedit');
Route::get('/subtypedelete/{subtype_id}', 'ManageSubTypeController@delete')->name('subtypedelete');
Route::get('/subtypeeditaction', 'ManageSubTypeController@update')->name('subtypeeditaction');

// --- Library end ---

Route::get('/patient','PatientController@index')->name('patient');
Route::get('/patientadd', 'PatientController@add')->name('patientadd');
Route::get('/patientaddaction', 'PatientController@addaction')->name('patientaddaction');
Route::get('/patienteditprofile/{patient_id}', 'PatientController@editprofile')->name('patienteditprofile');
Route::get('/patientinfo', 'PatientController@saveinfo')->name('patientinfo');

Route::get('/patientedit/{patient_id}', 'PatientController@edit')->name('patientedit');
Route::get('/patientdelete/{patient_id}', 'PatientController@delete')->name('patientdelete');
Route::get('/patienteditaction', 'PatientController@update')->name('patienteditaction');
Route::get('/patientprofile/{patient_id}', 'PatientController@profile')->name('patientprofile');
Route::get('/updateportalaccess/{patiend_id}','PatientController@updateportalaccess')->name('updateportalaccess');
Route::get('/patientforgotpassword', 'PatientController@patientforgotpassword')->name('patientforgotpassword');
Route::post('/patientforgotpassword', 'PatientController@patientforgotpassword')->name('patientforgotpassword');
Route::get('/editprofile', 'HomeController@editprofile')->name('editprofile');
Route::get('/saveprofileinfo', 'HomeController@saveprofileinfo')->name('saveprofileinfo');
Route::get('/physiotherapist', 'PhysiotherapistController@index')->name('physiotherapist');
Route::get('/physioadd', 'PhysiotherapistController@add')->name('physioadd');
Route::get('/physioaddaction', 'PhysiotherapistController@addaction')->name('physioaddaction');
Route::get('/physioinfo', 'PhysiotherapistController@saveinfo')->name('physioinfo');
Route::get('/physioedit/{physio_id}', 'PhysiotherapistController@edit')->name('physioedit');
Route::get('/physiodelete/{physio_id}', 'PhysiotherapistController@delete')->name('physiodelete');
Route::get('/physioeditaction', 'PhysiotherapistController@update')->name('physioeditaction');
Route::get('/physioprofile/{physio_id}', 'PhysiotherapistController@profile')->name('physioprofile');
Route::get('/physioeditprofile/{physio_id}', 'PhysiotherapistController@editprofile')->name('physioeditprofile');
Route::get('/physioforgotpassword', 'PhysiotherapistController@physioforgotpassword')->name('physioforgotpassword');
Route::post('/physioforgotpassword', 'PhysiotherapistController@physioforgotpassword')->name('physioforgotpassword');
Route::get('/updatephysioaccess/{physio_id}', 'PhysiotherapistController@updateportalaccess')->name('updatephysioaccess');
// --- Training ---
Route::get('/availabletraining', 'AvailableTrainingController@index')->name('availabletraining');
Route::post('/trainingadd', 'AvailableTrainingController@add')->name('trainingadd');
Route::get('/trainingadd', 'AvailableTrainingController@add')->name('trainingadd');
Route::post('/trainingaddaction', 'AvailableTrainingController@addaction')->name('trainingaddaction');


Route::get('/trainingaddaction', 'AvailableTrainingController@addaction')->name('trainingaddaction');
Route::get('/trainingedit/{training_id}', 'AvailableTrainingController@edit')->name('trainingedit');
Route::get('/viewtraining/{training_id}', 'AvailableTrainingController@view')->name('viewtraining');
Route::get('/trainingdelete/{training_id}', 'AvailableTrainingController@delete')->name('trainingdelete');
Route::get('/trainingeditaction', 'AvailableTrainingController@update')->name('trainingeditaction');
Route::post('/trainingeditaction', 'AvailableTrainingController@update')->name('trainingeditaction');

Route::get('/managedepartment', 'ManageDepartmentController@index')->name('managedepartment');
Route::get('/departmentadd', 'ManageDepartmentController@add')->name('departmentadd');
Route::get('/departmentaddaction', 'ManageDepartmentController@addaction')->name('departmentaddaction');
Route::get('/departmentedit/{department_id}', 'ManageDepartmentController@edit')->name('departmentedit');
Route::get('/departmentdelete/{department_id}', 'ManageDepartmentController@delete')->name('departmentdelete');
Route::get('/departmenteditaction', 'ManageDepartmentController@update')->name('departmenteditaction');
// --- Training End ---

// --- Help & Support ---

Route::get('/helptopic', 'HelpTopicController@index')->name('helptopic');
Route::get('/helpadd', 'HelpTopicController@add')->name('helpadd');
Route::get('/helpaddaction', 'HelpTopicController@addaction')->name('helpaddaction');
Route::get('/helpedit/{help_id}', 'HelpTopicController@edit')->name('helpedit');
Route::get('/helpdelete/{help_id}', 'HelpTopicController@delete')->name('helpdelete');
Route::get('/helpeditaction', 'HelpTopicController@update')->name('helpeditaction');
Route::get('/helpview/{help_id}', 'HelpTopicController@view')->name('helpview');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('resetportal', 'HomeController@resetresetportalpassword')->name('resetportal');

Route::get('/contactsupport', 'ContactSupportController@index')->name('contactsupport');
Route::post('/contactsupportsave', 'ContactSupportController@saveindex')->name('contactsupportsave');
Route::get('/contactsupportedit', 'ContactSupportController@editindex')->name('contactsupportedit');

Route::get('/test', 'TemplateController@index')->name('test');
// --- Help & Support end

// --- Feedback ---

Route::get('/feedback', 'FeedbackController@index')->name('feedback');
Route::get('/test', function(){
    return abort(404);
 });
// --- Feedback end ---

// --- Role ---

Route::get('/role', 'RoleController@index')->name('role');
Route::get('/roleadd', 'RoleController@add')->name('roleadd');
Route::get('/roleaddaction', 'RoleController@addaction')->name('roleaddaction');
Route::get('/roleedit/{role_id}', 'RoleController@edit')->name('roleedit');
Route::get('/roledelete/{role_id}', 'RoleController@delete')->name('roledelete');
Route::get('/roleeditaction', 'RoleController@update')->name('roleeditaction');
Route::get('/rolemanage/{role_id}', 'RoleController@manage')->name('rolemanage');
Route::get('/roleupdateview/{role_priv}/{role_id}','RoleController@updateView')->name('roleupdateview');
Route::get('/roleupdateadd/{role_priv}/{role_id}','RoleController@updateadd')->name('roleupdateadd');
Route::get('/roleupdateedit/{role_priv}/{role_id}','RoleController@updateedit')->name('roleupdateedit');
Route::get('/roleupdatedelete/{role_priv}/{role_id}','RoleController@updatedelete')->name('roleupdatedelete');
Route::get('/roleupdateshare/{role_priv}/{role_id}','RoleController@updateshare')->name('roleupdateshare');
// 

Route::get('/generatepdf', 'ManageExerciseController@generate_pdf')->name('generatepdf');
