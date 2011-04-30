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

USAGE

This small extension saves the remote IP address from where the customer was
registered or created.

The Extension was designed to be used together with the Netzarbeiter_CustomerActivation extension.

To include the customers registration email address in transactional email templates
where the customer object is available you can use {{var customer.getRegistrationRemoteIp()}}


UNINSTALL

To uninstall this extension you need to run the following SQL after removing the
extension files:

  DELETE FROM eav_attribute WHERE attribute_code = 'registration_remote_ip';
  DELETE FROM core_resource WHERE code = 'customerregip_setup';



Thanks to Diana from TradiArt for sponsoring this extension!


KNOWN BUGS:
- None! :D

If you have ideas for improvements or find bugs, please send them to vinai@netzarbeiter.com,
with Netzarbeiter_CustomerRegIp as part of the subject line.

