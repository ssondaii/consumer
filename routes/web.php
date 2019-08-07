<?php
session_start();
use Illuminate\Http\Request;
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
Route::get('', function(){
    return view('logingame');
})->name('logingame');

Route::get('/game1', function(){
    return view('homegame');
})->name('home');

Route::resource('scores', 'ScoreController');

Route::get('auth/passport', function () {
     $query = http_build_query([
        'client_id' => '3',
        'redirect_uri' => 'http://localhost:8888/callback',
        'response_type' => 'code',
        'scope' => ''
      ]);

     return redirect('http://localhost:8000/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '3',
            'client_secret' => 'L0EkLuzse6IdqLMxq6AFfrJJxekQ37MkqeBzHjLK',
            'redirect_uri' => 'http://localhost:8888/callback',
            'code' => $request->code
        ],
    ]);

    $body = json_decode((string) $response->getBody(), true);

    $response = $http->get('http://localhost:8000/api/user', [
      'headers' => [
            'Authorization' => 'Bearer ' . $body['access_token'],
        ],
    ]);

    $body2 = json_decode((string) $response->getBody(), true);

    $name = $body2['name'];
    $img = $body2['id'];

    $_SESSION['playerName'] = $name;
    
    return redirect()->route('home', ['name'=>$name]);
    
    // return redirect()->route('home');
});