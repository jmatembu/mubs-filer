<?php

use App\Exam;
use Maatwebsite\Excel\Excel;
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

Route::name('dashboard')->get('/', 'PageController@index');
Route::get('pass', function () {
	return bcrypt('secret');
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
	Route::resource('faculties', 'FacultyController');
	Route::resource('departments', 'DepartmentController');
	Route::resource('programs', 'ProgramController');

	Route::name('courses.exams.store')->post('courses/{course}/exam', 'CourseController@storeExam');
	Route::resource('courses', 'CourseController');

	Route::name('exams.media.upload')->post('exams/{exam}/upload', 'ExamController@upload');
	Route::name('exams.media.remove')->post('exams/{exam}/media/{media}/remove', 'ExamController@removeMedia');
	Route::name('exams.media.download')->post('media/download', 'ExamController@download');
	Route::resource('exams', 'ExamController');
	Route::resource('users', 'UserController');
	Route::name('facilitators.store')->post('courses/facilitators/{facilitator}', 'FacilitatorController@store');
	Route::name('markers.store')->post('exams/facilitators/{facilitator}', 'MarkerController@store');
});