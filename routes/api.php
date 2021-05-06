<?php


use Illuminate\Support\Str;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::fallback(function () {
    return response()->json([
        'message' => 'route not found'
    ], 404);
});

Route::post('login', function (Request $request) {

    if (auth()->attempt([
        'email' => $request->email,
        'password' => $request->password,
    ])) {
        $user = auth()->user();
        $user->api_token = Str::random(60);
        $user->save();
        return $user;
    } else {
        return response()->json([
            'message' => 'unauthorized user'
        ], 401);
    }
});

Route::middleware('auth:api')->post('logout', function () {
    
    if (auth()->user()) {

        $user = auth()->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'message' => 'logout was successful'
        ], 200);
    } else {
        return response()->json([
            'message' => 'unauthorized user'
        ], 401);
    }

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::namespace('Api')->group(function () {

    Route::apiResource('posts', 'PostsController');

});