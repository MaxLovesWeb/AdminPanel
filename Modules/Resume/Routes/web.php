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


Route::middleware(['auth', 'verified'])->group(function () {

    // Resume
    Route::get('resume', 'ResumeController@index')->name('resume.index');
    Route::get('resume/{resume}', 'ResumeController@show')->name('resume.show');
    Route::delete('resume/{resume}', 'ResumeController@destroy')->name('resume.destroy');

    Route::get('resume/{resume}/edit', 'ResumeController@edit')->name('resume.edit');
    Route::get('resume/{resume}', 'ResumeController@show')->name('resume.show');
    Route::put('resume/{resume}', 'ResumeController@update')->name('resume.update');

    Route::post('users/{user}/resume', 'ResumeController@store')->name('resume.store');
    Route::get('users/{user}/resume/create', 'ResumeController@create')->name('resume.create');


    // Education
    Route::get('educations', 'EducationController@index')->name('educations.index');
    Route::get('educations/{education}', 'EducationController@show')->name('educations.show');
    Route::delete('educations/{education}', 'EducationController@destroy')->name('educations.destroy');

    Route::get('educations/{education}/edit', 'EducationController@edit')->name('educations.edit');
    Route::get('educations/{education}', 'EducationController@show')->name('educations.show');
    Route::put('educations/{education}', 'EducationController@update')->name('educations.update');


    Route::post('resume/{resume}/educations', 'ResumeController@addEducation')->name('educations.store');


    Route::get('resume/{resume}/educations/create', 'EducationController@create')->name('educations.create');


    //Experience
    Route::get('experiences', 'ExperienceController@index')->name('experiences.index');
    Route::get('experiences/{education}', 'ExperienceController@show')->name('experiences.show');
    Route::delete('experiences/{education}', 'ExperienceController@destroy')->name('experiences.destroy');

    Route::get('experiences/{education}/edit', 'ExperienceController@edit')->name('experiences.edit');
    Route::get('experiences/{education}', 'ExperienceController@show')->name('experiences.show');
    Route::put('experiences/{education}', 'ExperienceController@update')->name('experiences.update');

    Route::post('resume/{resume}/experiences', 'ResumeController@addExperience')->name('experiences.store');

    //Trainings
    Route::get('trainings', 'TrainingController@index')->name('trainings.index');
    Route::get('trainings/{training}', 'TrainingController@show')->name('trainings.show');
    Route::delete('trainings/{training}', 'TrainingController@destroy')->name('trainings.destroy');

    Route::get('trainings/{training}/edit', 'TrainingController@edit')->name('trainings.edit');
    Route::get('trainings/{training}', 'TrainingController@show')->name('trainings.show');
    Route::put('trainings/{training}', 'TrainingController@update')->name('trainings.update');





    Route::post('resume/{resume}/training', 'ResumeController@addTraining')->name('trainings.store');





    Route::get('resume/{resume}/training/create', 'TrainingController@create')->name('trainings.create');


    Route::namespace('Datatables')->group(function () {

        //addresses resource
        Route::get('datatables/resume', 'ResumeDatatableController@getAll')->name('datatables.resume.index');
        Route::get('datatables/educations', 'EduDatatableController@getAll')->name('datatables.educations.index');
        Route::get('datatables/experiences', 'ExperienceDatatableController@getAll')->name('datatables.experiences.index');

        Route::get('datatables/resume/{resume}/educations', 'EduDatatableController@getResumeEducations')->name('datatables.resume.educations');
        Route::get('datatables/resume/{resume}/experiences', 'ExperienceDatatableController@getResumeExperiences')->name('datatables.resume.experiences');
        Route::get('datatables/resume/{resume}/trainings', 'TrainingDatatableController@getResumeTrainings')->name('datatables.resume.trainings');

        Route::get('datatables/users/{user}/resume', 'ResumeDatatableController@getUserResume')->name('datatables.users.resume');

    });


});

