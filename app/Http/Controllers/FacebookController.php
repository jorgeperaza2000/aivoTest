<?php

namespace App\Http\Controllers;

use Facebook\Facebook;

class FacebookController extends Controller
{
	public function getProfileById( $facebookId ) {
		
		$fb = new Facebook([
			'app_id' => '1165746730222800',
			'app_secret' => 'd8e9d40fc4f71d0c2a0ad68dfefb4d5b',
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
