<?php

namespace App\Http\Controllers;

use Facebook\Facebook;

class FacebookController extends Controller
{
	public function getProfileById( $facebookId ) {
		
		if ( empty( env('FB_API_ID') ) ) {
			$response = ["error" => "No se encontro la constante FB_API_ID en .env"];
			return response()->json($response, 500);
		} else if ( empty( env('FB_APP_SECRET') ) ) {
			$response = ["error" => "No se encontro la constante FB_APP_SECRET en .env"];
			return response()->json($response, 500);
		} else {
			$fb = new Facebook([
				'app_id' => env('FB_API_ID'),
				'app_secret' => env('FB_APP_SECRET'),
				'default_graph_version' => 'v2.11',
				]);
			
			try {
			
				$profile = $fb->get('/'.$facebookId.'?fields=name,first_name,last_name,id,gender,cover,locale,age_range,link,picture,timezone,updated_time,verified', '1165746730222800|QmQUc3gdOk8I80yvSuR-IUU5XnI')
							  ->getGraphNode()
							  ->asArray();

				if ( $profile ) {
					return response()->json($profile, 200);
				}
			
			} catch(\Facebook\Exceptions\FacebookResponseException $e) {
				
				return response()->json($e->getMessage(), 404);
				exit;

			} catch(\Facebook\Exceptions\FacebookSDKException $e) {
				
				return response()->json($e->getMessage(), 404);
				exit;

			}
		}
    
    }

}
