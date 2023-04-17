<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
// });
Route::post('/create-url', function () {
    try {
        if(request()->url == '') {
            return response()->json([
                'success' => false,
                'error' => 'URL param is required '
            ], 200);    
        }
        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObject = $builder->destinationUrl(request()->url)->make();
        $shortURL = $shortURLObject->default_short_url;
        
        return response()->json([
            'success' => true,
            'shortUrl' => $shortURL
        ], 200);
    } catch(\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ], 200);
    }


});