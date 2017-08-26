<?php 
	/**
	* 
	*/
	class ApiHandler 
	{
		
		function __construct()
		{
			require 'bca-finhacks-2017.phar';
			$this->CompanyName='PT Finhacks eWallet 88801';
			$this->CompanyCode='88801';
			$this->ClientID='268b2069-b099-4fa2-8148-1f1c0327fe63';
			$this->ClientSecret='b383c35d-3c11-4ce6-b631-8767f4c2084b';
			$this->OAuth='MjY4YjIwNjktYjA5OS00ZmEyLTgxNDgtMWYxYzAzMjdmZTYzOmIzODNjMzVkLTNjMTEtNGNlNi1iNjMxLTg3NjdmNGMyMDg0Yg==';
			$this->APIKey='0dfb11cd-b140-40cd-b65a-220e9998a129';
			$this->APISecret='199505e4-9d5f-4ba9-bb96-a3ea8b2f69c1';
		}

		public function getConfig()
		{
			$builder = new \Bca\Api\Sdk\SubAccount\SubAccountApiConfigBuilder();
			$builder->baseApiUri('https://api.finhacks.id/');
			$builder->baseOAuth2Uri('https://api.finhacks.id/');
			$builder->clientId($this->ClientID);
			$builder->clientSecret($this->ClientSecret);
			$builder->apiKey($this->APIKey);
			$builder->apiSecret($this->APISecret);
			$builder->origin('182.16.165.101');
			$builder->companyCode($this->CompanyCode);

			$config = $builder->build();
			return $config;
			//$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($config);
		}

		public function WalletReg($data)
		{
			try{
				$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($this->getConfig());

				$payload = new \Bca\Api\Sdk\SubAccount\Models\Requests\UserRegistrationPayload();
				$payload->setCustomerName($data['CustomerName']);
				$payload->setDateOfBirth($data['DateOfBirth']);
				$payload->setPrimaryID($data['PrimaryID']);
				$payload->setMobileNumber($data['MobileNumber']);
				$payload->setEmailAddress($data['EmailAddress']);
				$payload->setCustomerNumber($data['PrimaryID']);
				$payload->setIDNumber($data['IDNumber']);

				$response = $subAccountApi->registerUser($payload);
				return array('status'=>'success','response'=>$response);
			}catch(\Exception $e){
				return array('status'=>'failed','response'=>$e);
			}

		}

		public function UserInq($id)
		{
			$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($this->getConfig());
			try {
				$response = $subAccountApi->inquiryUser($id);
				return array('status'=>'success','response'=>$response);
			} catch (Exception $e) {
				return array('status'=>'failed','response'=>$e);
			}
			
		}

		public function UserUpdate($data)
		{
			$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($this->getConfig());

			$payload = new \Bca\Api\Sdk\SubAccount\Models\Requests\UserUpdatePayload();
			$payload->setCustomerName($data['CustomerName']);
			$payload->setDateOfBirth($data['DateOfBirth']);
			$payload->setMobileNumber($data['MobileNumber']);
			$payload->setEmailAddress($data['EmailAddress']);
			$payload->setWalletStatus($data['Status']);
			$payload->setIDNumber($data['IDNumber']);
			try {
				$response = $subAccountApi->updateUser($data['PrimaryID'], $payload);
				return array('status'=>'success','response'=>$response);
			} catch (Exception $e) {
				return array('status'=>'failed','response'=>$e);
			}
		}

		public function TopUp($data)
		{
			$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($this->getConfig());
			$payload = new \Bca\Api\Sdk\SubAccount\Models\Requests\TopUpPayload();
			$payload->setPrimaryID($data['PrimaryID']);
			$payload->setTransactionID($data['TransactionID']);
			$payload->setRequestDate($data['RequestDate']);
			$payload->setAmount($data['Amount']);
			$payload->setCurrencyCode('IDR');
			try {
				$response = $subAccountApi->topUp($payload);
				return array('status'=>'success','response'=>$response->getBCAReferenceID());
			} catch (Exception $e) {
				return array('status'=>'failed','response'=>$e);
			}
		}

		public function History($start,$end,$PrimaryID,$last)
		{
			$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($this->getConfig());
			$params = new \Bca\Api\Sdk\SubAccount\Models\Requests\TransactionInquiryParams();
			$params->setStartDate($start);
			$params->setEndDate($end);
			$params->setLastAccountStatementID($last);
			try {
				$response = $subAccountApi->transactionInquiry($PrimaryID, $params);
				return array('status'=>'success','response'=>$response);
			} catch (Exception $e) {
				return array('status'=>'failed','response'=>$e);
			}
		}

		public function Withdraw($data)
		{
			$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($this->getConfig());

			$payload = new \Bca\Api\Sdk\SubAccount\Models\Requests\TransferCompanyPayload();
			$payload->setPrimaryID($data['PrimaryID']);
			$payload->setTransactionID($data['TransactionID']);
			$payload->setRequestDate($data['RequestDate']);
			$payload->setAmount($data['Amount']);
			$payload->setCurrencyCode('IDR');
			try {
				$response = $subAccountApi->transferCompanyAccount($payload);
				return array('status'=>'success','response'=>$response);
			} catch (Exception $e) {
				return array('status'=>'failed','response'=>$e);
			}
		}

		public function getOTP($data)
		{
			$subAccountApi = new \Bca\Api\Sdk\SubAccount\SubAccountApi($this->getConfig());

			$payload = new \Bca\Api\Sdk\SubAccount\Models\Requests\OtpGenerationPayload();
			$payload->setCustomerNumber($data['PrimaryID']);
			$payload->setAmount($data['Amount']);
			try {
				$response = $subAccountApi->generateOtp($payload);
				return array('status'=>'success','response'=>$response);
			} catch (Exception $e) {
				return array('status'=>'failed','response'=>$e);
			}
		}
	}
 ?>