<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * package    Netzarbeiter_CustomerRegIp
 * copyright  Copyright (c) 2011 Vinai Kopp http://netzarbeiter.com/
 * license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Netzarbeiter_CustomerRegIp_Model_Ipinfodb
{
	/**
	 * See http://www.ipinfodb.com/ip_location_api.php for more api details
	 *
	 * @var string
	 */
	protected $_apiUrl = 'http://api.ipinfodb.com/v3/ip-city/';

	protected $_format = 'xml';

	/**
	 * See http://www.ipinfodb.com/ip_location_api.php for more api details
	 *
	 * @param string $ip
	 * @return Varien_Object
	 */
	public function lookupIp($ip)
	{
		$url = $this->_getApiQueryUrl($ip);
		$info = new Varien_Object();
		if ($result = @file_get_contents($url))
		{
			/*
			 * Example positive lookup result:

			 <Response>
				<statusCode>OK</statusCode>
				<statusMessage/>
				<ipAddress>74.125.77.147</ipAddress>
				<countryCode>US</countryCode>
				<countryName>UNITED STATES</countryName>
				<regionName>CALIFORNIA</regionName>
				<cityName>MOUNTAIN VIEW</cityName>
				<zipCode>94043</zipCode>
				<latitude>37.3956</latitude>
				<longitude>-122.076</longitude>
				<timeZone>-08:00</timeZone>
			 </Response>

			 *
			 * Example failed lookup result:
			 * 

			 <Response>
				<statusCode>OK</statusCode>
				<statusMessage/>
				<ipAddress>xs</ipAddress>
				<countryCode/>
				<countryName/>
				<regionName/>
				<cityName/>
				<zipCode/>
				<latitude/>
				<longitude/>
				<timeZone/>
			 </Response>

			 */
			
			$xml = simplexml_load_string($result);
			if ($xml->statusCode != 'OK')
			{
				Mage::throwException($xml->statusMessage);
			}
			$info->setData(array(
				'ip' => $xml->ipAddress,
				'country' => $xml->countryCode,
				'country_name' => $xml->countryName,
				'region' => $xml->regionName,
				'city' => $xml->cityName,
				'postcode' => $xml->zipCode,
				'latitude' => $xml->latitude,
				'longitude' => $xml->longitude,
				'timezone' => $xml->timeZone,
			));

			return $info;
		}
	}

	/**
	 * Build lookup query url
	 *
	 * http://api.ipinfodb.com/v3/ip-city/?key=<API-KEY>&ip=74.125.77.147&format=xml
	 *
	 * @param string $ip
	 * @return string
	 */
	protected function _getApiQueryUrl($ip)
	{
		$params = array(
			'key' => Mage::getStoreConfig('customerregip/general/ipinfodb_api_key'),
			'ip'  => (string) $ip,
			'format' => $this->_format,
		);
		$url = '';
		foreach ($params as $key => $value)
		{
			$url .= $url ? '&' : '';
			$url .= $key . '=' . $value;
		}
		$url = $this->_apiUrl . '?' . $url;
		return $url;
	}

}
