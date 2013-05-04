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

class Netzarbeiter_CustomerRegIp_Block_Adminhtml_Customer_Edit_Tab_View_Regip_Lookup
    extends Mage_Adminhtml_Block_Template
{

    /**
     * Lookup the IP
     *
     * @return Netzarbeiter_CustomerRegIp_Block_Adminhtml_Customer_Edit_Tab_View_Regip_Lookup
     */
    protected function _beforeToHtml()
    {
        try {
            $info = Mage::getModel('customerregip/ipinfodb')->lookupIp($this->getIpAddress());
            $this->setInfo($info);
        } catch (Exception $e) {
            Mage::logException($e);
            $this->setInfo(new Varien_Object(array(
                'country_name' => $this->__('Lookup Error: %s', $e->getMessage())
            )));
        }
        return parent::_beforeToHtml();
    }

    /**
     *
     * @param string $ipAddress
     * @return string
     */
    public function resolveDnsAddr($ipAddress = null)
    {
        if (is_null($ipAddress)) {
            $ipAddress = $this->getIpAddress();
        }
        if ('127.0.0.1' == $ipAddress) {
            return 'localhost';
        }
        return gethostbyaddr($ipAddress);
    }
}
