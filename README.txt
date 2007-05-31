// $id$

reCAPTCHA for Drupal
====================

The reCAPTCHA module uses the reCAPTCHA web service to
improve Drupal's Captcha system. For more information
on what reCAPTCHA is, please visit http://recaptcha.net.


INSTALLATION
------------

1. Extract the reCAPTCHA module in your local favourite
   modules directory (sites/all/modules).
   
2. Enable both the reCAPTCHA and Captcha modules in:
       admin/build/modules
   
3. You'll now find a reCAPTCHA tab in the Captcha
   administration page available at:
       admin/settings/captcha/recaptcha

4. Register for a public and private reCAPTCHA key at:
       http://recaptcha.net/api/getkey

5. Input the keys into the reCAPTCHA settings. The rest
   of the settings should be fine as default.

6. Visit the Captcha administration page and set where
   you want the reCAPTCHA form to be presented:
       admin/settings/captcha

7. Enjoy the reCAPTCHA goodness.


CHANGELOG
---------

May 31st, 2007: Development Snapshot
 * Japanese translation by Takafumi
 * Removal of title appearing before reCAPTCHA
 * Some Drupal coding standards fixes
 * Documentation

May 30th, 2007: Development Snapshot
 * First Release


AUTHORS
-------

 * Rob Loach (http://www.robloach.net)
 * Japanese translation by Takafumi (http://drupal.jp)


THANK YOU
---------

 * Thank you goes to the reCAPTCHA team for all their
   help, support and their amazing Captcha solution
       http://www.recaptcha.net
