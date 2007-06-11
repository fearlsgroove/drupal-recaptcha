$Id$

reCAPTCHA for Drupal
====================

The reCAPTCHA module uses the reCAPTCHA web service to
improve the CAPTCHA system and protect email addresses. For
more information on what reCAPTCHA is, please visit:
    http://recaptcha.net


INSTALLATION
------------

1. Extract the reCAPTCHA module to your local favourite
   modules directory (sites/all/modules).
   
2. Download the reCAPTCHA PHP Library from: 
       http://recaptcha.net/plugins/php

3. Extract the files to: modules/recaptcha/recaptcha
   So that recaptchalib.php is available at:
       modules/recaptcha/recaptcha/recaptchalib.php


CONFIGURATION
-------------
   
1. Enable both the reCAPTCHA and CAPTCHA modules in:
       admin/build/modules
   Note: The reCAPTCHA module requires Captcha version 2.1
       http://drupal.org/node/143220
   
2. You'll now find a reCAPTCHA tab in the CAPTCHA
   administration page available at:
       admin/settings/captcha/recaptcha

6. Register for a public and private reCAPTCHA key at:
       http://recaptcha.net/api/getkey

7. Input the keys into the reCAPTCHA settings. The rest of
   the settings should be fine as their defaults.

8. Visit the Captcha administration page and set where you
   want the reCAPTCHA form to be presented:
       admin/settings/captcha


MAILHIDE INPUT FORMAT
---------------------
The reCAPTCHA module also comes with an input format to
protect email addresses. This, of course, is optional to
use and is only there if you want it. The following is how
you use that input filter:

1. Head over to your input format settings:
       admin/settings/filters

2. Edit your default input format and add the reCAPTCHA
   Mailhide filter.
   
3. Click on the Configure tab and put in a public and
   private Mailhide key obtained from:
       http://mailhide.recaptcha.net/apikey

4. Use the Rearrange tab to rearrange the weight of the
   filter depending on what filters already exist.


CHANGELOG
---------

June 11, 2007
 - Patch #149200: Show Error in reCAPTCHA Form
 - Patch #150799: No server settings
 - Patch #150803: Switched package to "SPAM Control"

June 8th, 2007 - Version 1.0
 - Patch #147924: reCAPTCHA Mailhide Input Filter

June 5th, 2007
 - Put the reCAPTCHA server settings into a fieldset
 - Patch #149513: Help topics in admin/help/recaptcha
 - Patch #149427 by kengggg: Thai translation

June 4th, 2007
 - Patch #149230: Display error when PHP library is not present
 - Patch #147907 by lennart: Split up form CSS fix
 - Patch #148347: License issue fix
 - Patch #149283: Uninstaller to remove module variables

May 31st, 2007
 - Patch #148042 by Takafumi: Japanese translation 
 - Removal of title appearing before reCAPTCHA
 - Some Drupal coding standards fixes
 - Documentation

May 30th, 2007
 - First Release


AUTHORS
-------

 * Rob Loach (http://www.robloach.net)
 * Japanese translation by Takafumi (http://drupal.jp)
 * CSS fix by lennart (http://zensci.com)
 * Thai translation by kengggg (http://www.keng.ws)


THANK YOU
---------

 * Thank you goes to the reCAPTCHA team for all their
   help, support and their amazing Captcha solution
       http://www.recaptcha.net
