<?php 
	/**
	* 
	*/
	class ApiHandler 
	{
		
		function __construct()
		{
			$this->CompanyName='PT Finhacks eWallet 88801';
			$this->CompanyCode='88801';
			$this->ClientID='268b2069-b099-4fa2-8148-1f1c0327fe63';
			$this->ClientSecret='b383c35d-3c11-4ce6-b631-8767f4c2084b';
			$this->OAuth='MjY4YjIwNjktYjA5OS00ZmEyLTgxNDgtMWYxYzAzMjdmZTYzOmIzODNjMzVkLTNjMTEtNGNlNi1iNjMxLTg3NjdmNGMyMDg0Yg==';
			$this->APIKey='0dfb11cd-b140-40cd-b65a-220e9998a129';
			$this->APISecret='199505e4-9d5f-4ba9-bb96-a3ea8b2f69c1';
		}

		public function getAccessToken()
		{
			$path="/api/oauth/token";
			$post="grant_type=client_credentials";
			$header_data = array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: MjY4YjIwNjktYjA5OS00ZmEyLTgxNDgtMWYxYzAzMjdmZTYzOmIzODNjMzVkLTNjMTEtNGNlNi1iNjMxLTg3NjdmNGMyMDg0Yg=="
        	);
        	$ch=curl_init();
        	$opt= array(
            CURLOPT_URL => "https://api.finhacks.id".$path,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $header_data,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HEADER => 1,
        	);
        	curl_setopt_array($ch, $opt);
        	$response = curl_exec($ch);
        	if (curl_error($ch)) {
	            die(curl_error($ch));
	        }
	        return $response;

		}
	}
 ?>