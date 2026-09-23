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

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/


Route::name('pagecandidate')->get('/pagecandidate/{ref}', 'Front\HomeController@pagecandidate');
// Home
Route::name('subcription')->get('inscriptions', 'Front\HomeController@formsubscription');
Route::name('subcription2')->get('inscriptions_step2', 'Front\HomeController@formsubscription1');
Route::name('home')->get('/', 'Front\HomeController@index');
Route::name('ouest')->get('/ouest', 'Front\HomeController@ouest');
Route::name('nord_ouest')->get('/nord_ouest', 'Front\HomeController@nordouest');
Route::name('vote_keys')->get('/vote_keys/{val}', 'Front\PostController@keys');
Route::name('sud')->get('/sud', 'Front\HomeController@sud');
Route::name('littoral')->get('/littoral', 'Front\HomeController@littoral');
Route::name('sudouest')->get('/sudouest', 'Front\HomeController@sudouest');
Route::name('endvote')->get('/endvote/{val}', 'Front\PostController@endvote');
Route::name('endvoteregion')->get('/endvoteregion/{val}/{t}', 'Front\PostController@endvoteregion');

// Contact
Route::resource('contacts', 'Front\ContactController', ['only' => ['create', 'store']]);

// Inscriptions
Route::name('sinscrire')->post('inscrire', 'Front\HomeController@subscription');
Route::name('sinscrire1')->post('inscrire1', 'Front\HomeController@subscription11');

// cs and comments
Route::prefix('posts')->namespace('Front')->group(function () {
    Route::name('posts.display')->get('{slug}', 'PostController@show');
    Route::name('posts.tag')->get('tag/{tag}', 'PostController@tag');
    Route::name('posts.search')->get('', 'PostController@search');
    Route::name('posts.comments.store')->post('{post}/comments', 'CommentController@store');
    Route::name('posts.comments.comments.store')->post('{post}/comments/{comment}/comments', 'CommentController@store');
    Route::name('posts.comments')->get('{post}/comments/{page}', 'CommentController@comments');
});

Route::resource('comments', 'Front\CommentController', [
    'only' => ['update', 'destroy'],
    'names' => ['destroy' => 'front.comments.destroy']
]);

Route::name('category')->get('category/{category}', 'Front\PostController@category');

// Authentification
Auth::routes();

//facebook
Route::name('signout')->get('/signout', 'Front\FacebookController@signout');
Route::name('facebookurl')->get('getfacebookurl', 'Front\FacebookController@prelogin');
Route::name('facebook')->get('facebook/callback', 'Front\FacebookController@login');
Route::name('facebooklog')->post('facebook', 'Front\FacebookController@logininfacebook');
Route::name('votefree')->get('vote/free/{id}/{id1?}', 'Front\HomeController@votefree');
Route::name('profile')->get('profile/{id}', 'Front\HomeController@profile');

Route::name('mylogin')->post('customlogin', 'Front\FacebookController@customlogin');
Route::name('myregister')->post('customregister', 'Front\FacebookController@customregister');


Route::name('votepaaid')->post('vote/paid', 'Front\HomeController@votepaid');
Route::name('checkpayment')->post('vote/checkpayment', 'Front\HomeController@votecheckpayment');
Route::name('paidsuccess')->get('paid/success', 'Front\HomeController@paidsuccess');
Route::name('paidfail')->get('paid/fail', 'Front\HomeController@paidfail');
Route::name('paidsuccesspaypal')->get('paidpaypal/success/{id}', 'Front\HomeController@paidsuccesspaypal');
Route::name('checkpaymentpaypal')->post('vote/checkpaymentpaypal', 'Front\HomeController@votecheckpaymentpaypal');
Route::name('checkpaymentpaypal1')->get('vote/checkpaymentpaypal', 'Front\HomeController@votecheckpaymentpaypal');

Route::name('checkpaymentbillet')->post('billet/checkpayment', 'Billet\BilletController@billetcheckpayment');
Route::name('checkbillet')->get('billet/success', 'Billet\BilletController@billetsuccess');
Route::name('checkpayment22')->post('inscriptions/checkpayment', 'Front\HomeController@inscriptioncheckpayment');



Route::prefix('comicash')->namespace('Comicash')->group(function () {
       return redirect()->back()->with('success', 'your message,here');
    
        
       Route::name('comicashhome')->get('/', 'ComicashController@index');
       Route::name('comicashtop')->get('/top/{id}/{region?}', 'ComicashController@showcandidates');
       Route::name('comicashtopsave')->post('/top/save', 'ComicashController@savetop');
       Route::name('comicashhistorique')->get('/historique', 'ComicashController@historique');

      
});

//Route::name('comicashhome11')->get('/comicash11', 'Comicash\ComicashController@index');
// ROUTE POUR LES BILLETS 

Route::prefix('billet')->namespace('Billet')->group(function () {
    
        
       Route::name('ticketsubscription')->get('/inscriptions', 'BilletController@billetsubscription');
      Route::name('ticketsubscription-fanclub')->get('/inscriptions/fanclub', 'BilletController@billetsubscriptionfanclub');
       Route::name('ticketsubsmission')->post('/inscrire-client', 'BilletController@submission');
       Route::name('ticketsubsmissionfanclub')->post('/inscrire-fanclub', 'BilletController@submissionfanclub');

      
});

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/

Route::prefix('admin')->namespace('Back')->group(function () {
    
     

    Route::middleware('redac')->group(function () {
        

       Route::name('admin')->get('/', 'AdminController@index');

        // Posts
        Route::name('posts.seen')->put('posts/seen/{post}', 'PostController@updateSeen')->middleware('can:manage,post');
        Route::name('posts.active')->put('posts/active/{post}/{status?}', 'PostController@updateActive')->middleware('can:manage,post');
        Route::resource('posts', 'PostController');

        // Notifications
        Route::name('notifications.index')->get('notifications/{user}', 'NotificationController@index');
        Route::name('notifications.update')->put('notifications/{notification}', 'NotificationController@update');

        // Medias
        Route::view('medias', 'back.medias')->name('medias.index');

    });

    Route::middleware('admin')->group(function () {
        
        

        // Users
        Route::name('users.seen')->put('users/seen/{user}', 'UserController@updateSeen');
        Route::name('users.valid')->put('users/valid/{user}', 'UserController@updateValid');
        Route::resource('users', 'UserController', ['only' => [
            'index', 'edit', 'update', 'destroy'
        ]]);

        // Categories
        Route::resource('categories', 'CategoryController', ['except' => 'show']);

        // Contacts
        Route::name('contacts.seen')->put('contacts/seen/{contact}', 'ContactController@updateSeen');
        Route::resource('contacts', 'ContactController', ['only' => [
            'index', 'destroy'
        ]]);

        // Comments
        Route::name('comments.seen')->put('comments/seen/{comment}', 'CommentController@updateSeen');
        Route::resource('comments', 'CommentController', ['only' => [
            'index', 'destroy'
        ]]);

        // Settings
        Route::name('settings.edit')->get('settings', 'AdminController@settingsEdit');
        Route::name('settings.update')->put('settings', 'AdminController@settingsUpdate');



        // candidates
        Route::resource('candidates', 'CandidateController');
        Route::post('candidates', 'CandidateController@store')->name('candidatestore');


        // votes
        Route::resource('votes', 'VoteController');

        // photo
        Route::resource('photos', 'PhotoController');

         Route::resource('inscriptions', 'InscriptionsController', ['only' => ['index']]);
         Route::name('inscriptions.ajouter')->post('inscriptions', 'InscriptionsController@ajouter');
         Route::name('inscriptions.supprimer')->get('inscriptions/supprimer/{id}', 'InscriptionsController@supprimer');
        
        Route::resource('billets', 'BilletController', ['only' => ['index']]);
        
          Route::name('billets.supprimer')->get('billets/supprimer/{id}', 'BilletController@supprimer');
          
        Route::resource('fanclubs', 'FanClubController', ['only' => ['index']]);
        
         Route::name('fanclubs.supprimer')->get('fanclubs/supprimer/{id}', 'FanClubController@supprimer');
      

    });

    // candidates


});
