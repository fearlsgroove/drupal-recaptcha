<?php

namespace ReCaptcha\RequestMethod;

use ReCaptcha\RequestMethod;
use ReCaptcha\RequestParameters;

/**
 * Sends POST requests to the reCAPTCHA service with Drupal 8 GuzzleHttp.
 */
class Drupal8 implements RequestMethod {

  /**
   * URL to which requests are POSTed.
   * @const string
   */
  const SITE_VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

  /**
   * Submit the POST request with the specified parameters.
   *
   * @param RequestParameters $params Request parameters
   * @return string Body of the reCAPTCHA response
   */
  public function submit(RequestParameters $params) {

    try {
      $options = [
        'headers' => [
          'Content-type' => 'application/x-www-form-urlencoded',
        ],
        'body' => $params->toQueryString(),
      ];

      $response = \Drupal::httpClient()->post(self::SITE_VERIFY_URL, $options);
    }
    catch (RequestException $exception) {
      \Drupal::logger('reCAPTCHA web service')->error($exception);
    }
    // Just for debugging if needed.
    //\Drupal::logger('reCAPTCHA web service')->debug('<pre>@debug</pre>', ['@debug' => print_r($response, TRUE)]);

    return (string) $response->getBody();
  }
}
