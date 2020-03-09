<?php

use Illuminate\Http\Request;
Route::get('class', 'Api\ClassController@index');

Route::get('class/{id}', 'Api\ClassController@show');

Route::post('class', 'Api\ClassController@store');

Route::get('studentInClass/{classCode}','Api\ClassController@showStudent');

Route::put('class/{id}', 'Api\ClassController@update');

Route::delete('class/{id}', 'Api\ClassController@destroy');

//----------------------------------------------------------------------------------
Route::get('students', 'Api\StudentController@index');

// Lấy thông tin Sinh viên theo id
Route::get('students/{id}', 'Api\StudentController@show')->name('students.show');

// Thêm Sinh viên mới
Route::post('students', 'Api\StudentController@store')->name('students.store');

// Cập nhật thông tin Sinh viên theo id

Route::put('students/{id}', 'Api\StudentController@update')->name('students.update');

// Xóa Sinh viên theo id
Route::delete('students/{id}', 'Api\StudentController@destroy')->name('students.destroy');

Route::get('showSubject/{id}', 'Api\StudentController@showSubject');

Route::get('subjects', 'Api\SubjectController@index');

// Lấy thông tin mon hoctheo id
Route::get('subjects/{id}', 'Api\SubjectController@show');

// Thêm mon hoc mới
Route::post('subjects', 'Api\SubjectController@store');

// Cập nhật thông tin mon hoc theo id

Route::put('subjects/{id}', 'Api\SubjectController@update');

// Xóa mon hoc theo id
Route::delete('subjects/{id}', 'Api\SubjectController@destroy');

Route::post('infor-subjects', 'Api\InforSubjectController@store');

Route::delete('infor-subjects/{id}', 'Api\InforSubjectController@destroy');


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'Api\StudentController@store');

    Route::post('loginAdmin', 'Api\AdminController@login');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {

        Route::get('logoutAdmin', 'Api\AdminController@logout');
        Route::get('admin', 'Api\AdminController@user');
    });
    Route::group([
        'middleware' => 'auth:student-api'
    ], function() {
        Route::get('logout', 'Api\StudentController@logout');
        Route::get('user', 'Api\StudentController@user');
    });
});
