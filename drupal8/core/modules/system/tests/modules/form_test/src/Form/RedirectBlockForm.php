<?php

/**
 * @file
 * Contains \Drupal\form_test\Form\RedirectBlockForm.
 */

namespace Drupal\form_test\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Url;

/**
 * Builds a simple form that redirects on submit.
 *
 * @see \Drupal\form_test\Plugin\Block\RedirectFormBlock
 */
class RedirectBlockForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'redirect_block_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array('#type' => 'submit', '#value' => $this->t('Submit'));

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    $form_state['redirect_route'] = new Url('form_test.route1', array(), array('query' => array('test1' => 'test2')));
  }
}
