<?php
class COD_API{
	private $SSO_TOKEN = NULL;
	public function __construct($SSO_TOKEN){
		$this->SSO_TOKEN = $SSO_TOKEN;
	}
	public function MAKE_REQUEST($GAME, $PLATFORM, $GAMERTAG, $WARZONE){
		$url = "https://my.callofduty.com/api/papi-client/stats/cod/v1/title/{$GAME}/platform/{$PLATFORM}/gamer/{$GAMERTAG}/profile/type/".($WARZONE ? "wz" : "mp");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ["Cookie: new_SiteId=cod; ACT_SSO_LOCALE=en_US;country=US;ACT_SSO_COOKIE=".$this->SSO_TOKEN.";API_CSRF_TOKEN=68e8b62e-1d9d-4ce1-b93f-cbe5ff31a041;"]);
		$response = json_decode(curl_exec($ch));
		curl_close($ch);
		if($response->status != "success"){
			$JSON->STATUS = "ERROR";
			$JSON->MESSAGE = ucwords($response->data->message);
			return json_encode($JSON);
		}
		return $response->data;
	}
	public function GET_B04_STATS($GAMERTAG, $PLATFORM){        
		return $this->MAKE_REQUEST("bo4", $PLATFORM, $GAMERTAG, false);
	}
	public function GET_MODERN_WARFARE_STATS($GAMERTAG, $PLATFORM){        
		return $this->MAKE_REQUEST("mw", $PLATFORM, $GAMERTAG, false);
	}
	public function GET_WARZONE_STATS($GAMERTAG, $PLATFORM){
		return $this->MAKE_REQUEST("mw", $PLATFORM, $GAMERTAG, true);
	}
	public function GET_VANGUARD_STATS($GAMERTAG, $PLATFORM){
		return $this->MAKE_REQUEST("vg", $PLATFORM, $GAMERTAG, false);
	}
	public function GET_COLD_WAR_STATS($GAMERTAG, $PLATFORM){              
		return $this->MAKE_REQUEST("cw", $PLATFORM, $GAMERTAG, false);
	}
}
?>
