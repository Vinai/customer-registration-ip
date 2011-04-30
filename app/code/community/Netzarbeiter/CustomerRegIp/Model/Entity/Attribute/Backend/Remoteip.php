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

class Netzarbeiter_CustomerRegIp_Model_Entity_Attribute_Backend_Remoteip
	extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract
{
	/**
	 * Set the remote IP address on new entities if available
	 *
	 * @param Mage_Core_Model_Abstract $object
	 * @return null
	 */
	public function beforeSave($object)
	{
		if (!$object->getId() && is_null($object->getData($this->getAttribute()->getAttributeCode()))) {
			$object->setData($this->getAttribute()->getAttributeCode(), $this->_getRemoteAddr());
		}
		return parent::beforeSave($object);
	}

	/**
	 * Return the remote address if available
	 *
	 * @return string
	 */
	protected function _getRemoteAddr()
	{
		$remoteAddr = '';
		try
		{
			$remoteAddr = Mage::helper('core/http')->getRemoteAddr();
		}
		catch (Exception $e)
		{
			$remoteAddr = (string) $e->getMessage();
		}
		return $remoteAddr;
	}
}
