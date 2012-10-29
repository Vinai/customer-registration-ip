Customer Registration IP
========================
Magento module to display a customer's IP used during registration.

Facts
-----
- version: check the [config.xml](https://github.com/Vinai/customer-registration-ip/blob/master/app/code/community/Netzarbeiter/CustomerRegIp/etc/config.xml)
- extension key: Netzarbeiter_CustomerRegIp
- [extension on Magento Connect](http://www.magentocommerce.com/magento-connect/customer-registration-ip.html)
- Magento Connect 1.0 extension key: magento-community/Netzarbeiter_CustomerRegIp
- Magento Connect 2.0 extension key: http://connect20.magentocommerce.com/community/Netzarbeiter_CustomerRegIp
- [extension on GitHub](https://github.com/Vinai/customer-registration-ip)
- [direct download link](https://github.com/Vinai/customer-registration-ip/zipball/master)

Description
-----------
This small extension saves the remote IP address from where the customer was
registered or created, and displays it on the admin customer dashboard.

To include the customers registration IP in transactional email templates
where the customer object is available you can use {{var customer.getRegistrationRemoteIp()}}

If you register a (free or commercial) API key for http://ipinfodb.com/ you can
configure it at
Admin - System Configuration - Netzarbeiter Extensions - Customer Registration IP

If a API key is registered a button to query the API will beavailable beside the
customers IP address. Regardless of the API key settings, a link to lookup addresses
via http://ip2location.com/ in a new window is always displayed.

Compatibility
-------------
- Magento >= 1.4

Installation Instructions
-------------------------
1. Install the extension via Magento Connect with the key shown above or copy all the files into your document root.
2. Clear the cache, logout from the admin panel and then login again.
3. Configure and activate the extension under System - Configuration - Netzarbeiter Extensions - Customer Registration IP.

Uninstallation
--------------
To uninstall this extension you need to run the following SQL after removing the extension files:
```sql
  DELETE FROM eav_attribute WHERE attribute_code = 'registration_remote_ip';
  DELETE FROM core_resource WHERE code = 'customerregip_setup';
```

Support
-------
If you have any issues with this extension, open an issue on GitHub (see URL above)

Contribution
------------
Any contributions are highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Vinai Kopp
[http://www.netzarbeiter.com](http://www.netzarbeiter.com)
[@VinaiKopp](https://twitter.com/VinaiKopp)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2012 Vinai Kopp