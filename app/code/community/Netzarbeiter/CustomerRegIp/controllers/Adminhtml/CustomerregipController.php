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

class Netzarbeiter_CustomerRegIp_Adminhtml_CustomerregipController
	extends Mage_Adminhtml_Controller_Action
{
	/**
	 * Lookup Ajax action
	 */
	public function lookupAction()
	{
		$this->loadLayout();
		$this->getLayout()->getBlock('customerregip_lookup')->setIpAddress(
			$this->getRequest()->getParam('ip', '')
		);
		$this->renderLayout();
	}

	/**
	 * Bind to customer management ACL node
	 *
	 * @return bool
	 */
	protected function _isAllowed()
	{
		return Mage::getSingleton('admin/session')->isAllowed('customer/manage');
	}
}
