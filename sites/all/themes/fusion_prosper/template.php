<?php

/**
 * Template overrides.
 */

 /**
 * Override or insert variables into the page template for HTML output.
 */

function fusion_prosper_form_alter(&$form, &$form_state, $form_id) {
switch($form_id){
case 'views_exposed_form':

  foreach ($form['field_aruhaz_tid_selective']['#options'] as $tid => &$value) {
    $query = db_select('field_data_field_aruhaz', 'f')
            ->condition('f.field_aruhaz_tid', $tid);
    $query->addExpression('COUNT(*)');
    $count = $query->execute()->fetchField();
    $value = $value . ' (' . $count . ')';
  }
  
  foreach ($form['field_kategoria_tid_selective']['#options'] as $tid => &$value) {
    $query = db_select('field_data_field_kategoria', 'f')
            ->condition('f.field_kategoria_tid', $tid);
    $query->addExpression('COUNT(*)');
    $count = $query->execute()->fetchField();
    $value = $value . ' (' . $count . ')';
  }

  break;
}

  if ( TRUE === in_array( $form_id, array( 'user_login', 'user_login_block', 'user_register_form') ) )
    $form['name']['#attributes']['placeholder'] = t( 'email' );
    $form['pass']['#attributes']['placeholder'] = t( 'jelszó' );
    $form['name']['#attributes']['placeholder'] = t( 'email' );
    $form['mail']['#attributes']['placeholder'] = t( 'jelszó' );
    $form['account']['name']['#attributes']['placeholder'] = t(' felhasználónév ');
    $form['account']['mail']['#attributes']['placeholder'] = t(' email ');
    $form['account']['pass']['pass1']['#attributes']['placeholder'] = t(' jelszó ');
    $form['account']['pass']['pass2']['#attributes']['placeholder'] = t(' jelszó ismét ');
	
}



  function fusion_prosper_preprocess_page(&$vars) {
    if(drupal_is_front_page()) {
      drupal_add_js(drupal_get_path('theme', 'fusion_prosper') . '/js/common.js', array('weight' => -13) );
      drupal_add_js(drupal_get_path('theme', 'fusion_prosper') . '/js/infinite-ruler.js', array('weight' => -14) );
      drupal_add_js(drupal_get_path('theme', 'fusion_prosper') . '/js/pager.js');
    }
    
    $path = $_SERVER['REQUEST_URI'];
    $find = '?mode=racsos&masonry=racsos';
    $pos = strpos($path, $find);
    if ($pos !== false) {
    drupal_add_js(drupal_get_path('theme', 'fusion_prosper') . '/js/masonry-extra.js', array('weight' => -12));
    }
    
    $path = $_SERVER['REQUEST_URI'];
    $find = 'cart';
    $pos = strpos($path, $find);
    if ($pos !== false) {
    drupal_add_js(drupal_get_path('theme', 'fusion_prosper') . '/js/aruhazlogo.js', array('weight' => -12));
    }
  }

 
function fusion_prosper_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

 /**
 * Override or insert variables into the page template.
 */
function fusion_prosper_process_page(&$variables) {
  // Hook into color.module.
  drupal_add_library('system', 'ui');
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
 }

/**
 * Override or insert variables into the node template.
 */
function fusion_prosper_preprocess_node(&$vars) {

  // Render Ubercart fields into separate variables for node--product.tpl.php
  if (module_exists('uc_product') && uc_product_is_product($vars)) {
    $vars['fusion_uc_image'] = drupal_render($vars['content']['uc_product_image']);
    $vars['fusion_uc_body'] = drupal_render($vars['content']['body']);
    $vars['fusion_uc_display_price'] = drupal_render($vars['content']['display_price']);
    $vars['fusion_uc_add_to_cart'] = drupal_render($vars['content']['add_to_cart']);
    $vars['fusion_uc_sell_price'] = drupal_render($vars['content']['sell_price']);
    $vars['fusion_uc_cost'] = drupal_render($vars['content']['cost']);
    $vars['fusion_uc_sku'] = drupal_render($vars['content']['sku']);
    $vars['fusion_uc_weight'] = (!empty($vars['content']['weight'])) ? drupal_render($vars['content']['weight']) : ''; // Hide weight if empty
    if ($vars['fusion_uc_weight'] == '') {
      unset($vars['content']['weight']);
    }
    $dimensions = !empty($vars['content']['height']) && !empty($vars['content']['width']) && !empty($vars['content']['length']); // Hide dimensions if empty
    $vars['fusion_uc_dimensions'] = ($dimensions) ? drupal_render($vars['content']['dimensions']) : '';
    if ($vars['fusion_uc_dimensions'] == '') {
      unset($vars['content']['dimensions']);
    }
    $list_price = !empty($vars['content']['list_price']) && $vars['content']['list_price'] > 0; // Hide list price if empty or zero
    $vars['fusion_uc_list_price'] = ($list_price) ? drupal_render($vars['content']['list_price']) : '';
    if ($vars['fusion_uc_list_price'] == '') {
      unset($vars['content']['list_price']);
    }
    $vars['fusion_uc_additional'] = drupal_render($vars['content']); // Render remaining fields
  }
}
