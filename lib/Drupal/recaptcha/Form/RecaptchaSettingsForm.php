<?php

/**
 * @file
 * Contains \Drupal\recaptcha\Form\RecaptchaSettingsForm.
 */

namespace Drupal\recaptcha\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Config\ConfigFactory;

/**
 * Provides the reCAPTCHA administration settings.
 */
class RecaptchaSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'recaptcha_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    // Load the recaptcha library. Error if library does not load.
    if (!_recaptcha_load_library()) {
      drupal_set_message($this->t('Error loading recaptchalib.'), 'error');
      return FALSE;
    }
    $config = $this->configFactory->get('recaptcha.settings');

    $form = array();
    $form['recaptcha_public_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Public Key'),
      '#default_value' => $config->get('recaptcha_public_key'),
      '#maxlength' => 40,
      '#description' => $this->t('The public key given to you when you <a href="@url" target="_blank">register for reCAPTCHA</a>.',
                                  array('@url' => recaptcha_get_signup_url(\Drupal::request()->server->get('SERVER_NAME'), $this->configFactory->get('system.site')->get('name')))),
      '#required' => TRUE,
    );
    $form['recaptcha_private_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Private Key'),
      '#default_value' => $config->get('recaptcha_private_key'),
      '#maxlength' => 40,
      '#description' => $this->t('The private key given to you when you <a href="@url" target="_blank">register for reCAPTCHA</a>.',
                                  array('@url' => recaptcha_get_signup_url(\Drupal::request()->server->get('SERVER_NAME'), $this->configFactory->get('system.site')->get('name')))),
      '#required' => TRUE,
    );
    $form['recaptcha_ajax_api'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('AJAX API'),
      '#default_value' => $config->get('recaptcha_ajax_api'),
      '#description' => $this->t('Use the AJAX API to display reCAPTCHA.'),
    );
    $form['recaptcha_nocookies'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Disable Client-Side Cookies'),
      '#default_value' => $config->get('recaptcha_nocookies'),
      '#description' => $this->t('Add flag to disable third-party cookies set by reCAPTCHA.'),
    );
    $form['recaptcha_theme_settings'] = array(
      '#type' => 'fieldset',
      '#title' => $this->t('Theme Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['recaptcha_theme_settings']['recaptcha_theme'] = array(
      '#type' => 'select',
      '#title' => $this->t('Theme'),
      '#description' => $this->t('Defines which theme to use for reCAPTCHA.'),
      '#options' => array(
        'red' => $this->t('Red'),
        'white' => $this->t('White'),
        'blackglass' => $this->t('Black Glass'),
        'clean' => $this->t('Clean'),
        'custom' => $this->t('Custom'),
      ),
      '#default_value' => $config->get('recaptcha_theme'),
      '#required' => TRUE,
    );
    $form['recaptcha_theme_settings']['recaptcha_tabindex'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Tab Index'),
      '#description' => $this->t('Sets a <a href="@tabindex" target="_blank">tabindex</a> for the reCAPTCHA text box.
                                  If other elements in the form use a tabindex, this should be set so that navigation is easier for the user.',
                                  array('@tabindex' => 'http://www.w3.org/TR/html4/interact/forms.html#adef-tabindex')),
      '#default_value' => $config->get('recaptcha_tabindex'),
      '#size' => 4,
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, array &$form_state) {
    $tabindex = $form_state['values']['recaptcha_tabindex'];
    if (!empty($tabindex) && !is_numeric($tabindex)) {
      form_set_error('recaptcha_tabindex', $form_state, $this->t('The Tab Index must be an integer.'));
    }

    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    $this->configFactory->get('recaptcha.settings')
      ->set('recaptcha_public_key', $form_state['values']['recaptcha_public_key'])
      ->set('recaptcha_private_key', $form_state['values']['recaptcha_private_key'])
      ->set('recaptcha_ajax_api', $form_state['values']['recaptcha_ajax_api'])
      ->set('recaptcha_nocookies', $form_state['values']['recaptcha_nocookies'])
      ->set('recaptcha_theme', $form_state['values']['recaptcha_theme'])
      ->set('recaptcha_tabindex', $form_state['values']['recaptcha_tabindex'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
