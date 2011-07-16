<?php
/**
 * @file
 * Code to add a date repeat selection form to a date field and create
 * an iCal RRULE from the chosen selections.
 *
 * Moved to a separate file since it is not used on most pages
 * so the code is not parsed unless needed.
 *
 * Currently implemented:
 * INTERVAL, UNTIL, EXDATE, RDATE, BYDAY, BYMONTHDAY, BYMONTH,
 * YEARLY, MONTHLY, WEEKLY, DAILY
 *
 * Currently not implemented:
 *
 * BYYEARDAY, MINUTELY, HOURLY, SECONDLY, BYMINUTE, BYHOUR, BYSECOND
 *   These could be implemented in the future.
 *
 * COUNT
 *   The goal of this module is to create a way we can parse an iCal
 *   RRULE and pull out just dates for a specified date range, for
 *   instance with a date that repeats daily for several years, we might
 *   want to only be able to pull out the dates for the current year.
 *
 *   Adding COUNT to the rules we create makes it impossible to do that
 *   without parsing and computing the whole range of dates that the rule
 *   will create. COUNT is left off of the user form completely for this
 *   reason.
 *
 * BYSETPOS
 *   Seldom used anywhere, so no reason to complicated the code.
 */
/**
 * Generate the repeat setting form.
 */
function _simple_date_repeat_ui_rrule_process($element, $edit, $form_state, $form) {
  require_once('./'. drupal_get_path('module', 'date_api') .'/date_api_ical.inc');
  require_once('./'. drupal_get_path('module', 'date_repeat') .'/date_repeat_form.inc');
  
  drupal_add_js(drupal_get_path('module', 'simple_date_repeat_ui') . '/js/simple_date_repeat_ui.js');
  drupal_add_css(drupal_get_path('module', 'simple_date_repeat_ui') . '/css/simple_date_repeat_ui.css');
  jquery_ui_add(array('ui.dialog'));
  drupal_add_js(array('simple_date_repeat_ui' => array('form_id' => $element['#form_id'], 'field' => $element['#field_name'])), 'setting');
  
  if (empty($element['#date_repeat_widget'])) {
    $element['#date_repeat_widget'] = module_exists('date_popup') ? 'date_popup' : 'date_select';
  }
  if (is_array($element['#value'])) {
    $element['#value'] = date_repeat_merge($element['#value'], $element);
    $rrule = date_api_ical_build_rrule($element['#value']);
    $rule = $rrule;
  }
  else {
    $rule = $rrule = $element['#value'];
  }
  // Empty the original string value of the RRULE so we can create
  // an array of values for the form from the RRULE's contents.
  $element['#value'] = '';

  $parts = date_repeat_split_rrule($rrule);
  $rrule = $parts[0];
  $exceptions = $parts[1];
  $additions = $parts[2];
  if (isset($rrule['FREQ']) && $rrule['FREQ'] == 'NONE') {
    $rule = '';
    $rrule['FREQ'] = NULL;
  }
  //Set up some default options for the form we will generate
  $freq_options = array(
    'DAILY' => t('Daily'),
    'WEEKLY' => t('Weekly'),
    'MONTHLY' => t('Monthly'),
    'YEARLY' => t('Yearly'),    
  );
  
  $interval_text = array(
    'DAILY' => t('days'),
    'WEEKLY' => t('weeks'),
    'MONTHLY' => t('months'),
    'YEARLY' => t('years'),    
  );
  
  for ($i = 1; $i < 32; $i++) {
    $interval_options[$i] = $i;
  }
  
  $byday_abr = date_week_days_abbr(TRUE, TRUE, 1);
  //we first grab the translated strings for our days of the week options
  //then we array shift through the different values assigning them to thier ICAL non-translated value.
  $byday_options = array(
    'SU' => array_shift($byday_abr),
    'MO' => array_shift($byday_abr),
    'TU' => array_shift($byday_abr),
    'WE' => array_shift($byday_abr),
    'TH' => array_shift($byday_abr),
    'FR' => array_shift($byday_abr),
    'SA' => array_shift($byday_abr),
  );
  
  $bymonth_options = array('BYMONTHDAY' => t('day of the month'), 'BYDAY' => t('day of the week'));
  //END of settig up default options
  
  
  $timezone = !empty($element['#date_timezone']) ? $element['#date_timezone'] : date_default_timezone_name();
  $merged_values = date_repeat_merge($rrule, $element);
  
  $UNTIL = date_convert(strtotime('NOW +1 MONTH'), DATE_UNIX, DATE_DATETIME, $timezone);
  if (!empty($merged_values['UNTIL']['datetime'])) {
    $until_date = date_make_date($merged_values['UNTIL']['datetime'], $merged_values['UNTIL']['tz']);
    date_timezone_set($until_date, timezone_open($timezone));
    $UNTIL = date_format($until_date, DATE_FORMAT_DATETIME);
  }
 
  $parent_collapsed = !empty($rrule['INTERVAL']) || !empty($rrule['FREQ']) ? 0 : (!empty($element['#date_repeat_collapsed']) ? $element['#date_repeat_collapsed'] : 0);
  $element['#type'] = 'markup';
  $freq = (!empty($rrule['FREQ']) ? $rrule['FREQ'] : 'WEEKLY');
  //dpm($rrule);
  // Make sure we don't get floating parts where we don't want them.
  $element['#prefix'] = '<div class="date-clear">';
  $element['#suffix'] = '</div>';
  $element['repeats'] = array(
    '#type' => 'checkbox',
    '#title' => empty($element['#checkbox_label']) ? t('Repeats') : check_plain($element['#checkbox_label']),
    '#default_value' => !empty($rrule['FREQ']),
    '#attributes' => array('class' => 'simple-repeat-check'),
    '#suffix' => '<div class="rrule-desc">' . date_repeat_rrule_description($rule) . '</div>' . '<div class="repeat-popup">',
  );
  $element['FREQ'] = array(
    '#prefix' => '<div id="repeat-freq">',
    '#suffix' => '</div>',
    '#type' => 'select',
    '#options' => $freq_options,
    '#title' => t('Repeats'),
    '#default_value' => $freq,
  );
  $element['INTERVAL'] = array(
    '#type' => 'select',
    '#title' => t('Repeats every'),
    '#default_value' => (!empty($rrule['INTERVAL']) ? $rrule['INTERVAL'] : 0),
    '#options' => $interval_options,
    '#prefix' => '<div id="repeat-int">',
    '#suffix' => '<span id="repeat-int-type">' . $interval_text[$freq] .'</span></div>',
  );
  $element['BYDAY'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Repeat On'),
    '#default_value' => (!empty($rrule['BYDAY']) ? $rrule['BYDAY'] : array()),
    '#options' => $byday_options,
    '#prefix' => '<div id="repeat-byday">',
    '#suffix' => '</div>',
  );
  $element['bymonth'] = array(
    '#type' => 'radios',
    '#title' => t('Repeat By'),
    '#default_value' => 'BYMONTHDAY',
    '#options' => $bymonth_options,
    '#prefix' => '<div id="repeat-bymonth">',
    '#suffix' => '</div>',
  );
  $element['UNTIL'] = array(
    '#tree' => TRUE,
    '#prefix' => '<div class="date-clear">',
    '#suffix' => '</div>',
    'datetime' => array(
      '#type' => $element['#date_repeat_widget'],
      '#title' => t('Until'),
      '#description' => t('Date to stop repeating this item.'),
      '#default_value' => $UNTIL,
      '#date_timezone' => $timezone,
      '#date_format' => !empty($element['#date_format']) ? date_limit_format($element['#date_format'], array('year', 'month', 'day')) : 'Y-m-d',
      '#date_text_parts'  => !empty($element['#date_text_parts']) ? $element['#date_text_parts'] : array(),
      '#date_year_range'  => '-3:+3',
      '#date_label_position' => !empty($element['#date_label_position']) ? $element['#date_label_position'] : 'within',
      ),
    'tz' => array('#type' => 'hidden', '#value' => $element['#date_timezone']),
    'all_day' => array('#type' => 'hidden', '#value' => 1),
    'granularity' => array('#type' => 'hidden', '#value' => serialize(array('year', 'month', 'day'))),
    );
  $element['summary']['#value'] = '<div class="form-item rrule-sum"><label>'.t('Summary').':</label><div class="rrule-desc">' . date_repeat_rrule_description($rule) . '</div></div></div><div class="repeat-warn"></div>';
  $collapsed = TRUE;
  if (!empty($merged_values['BYDAY']) || !empty($merged_values['BYMONTH'])) {
    $collapsed = FALSE;
  }
 
  /**
   * KILL THE EXCEPTIONS AND ADDITIONS FIELDS FOR NOW.
   * 
  //Collect exceptions to the rule.
  $element['exceptions'] = array(
    '#type' => 'fieldset',
    '#collapsible' => TRUE,
    '#collapsed' => empty($exceptions) ? TRUE : FALSE,
    '#title' => t('Except'),
    '#description' => t('Dates to omit from the list of repeating dates.'),
    '#prefix' => '<div id="date-repeat-exceptions" class="date-repeat">',
    '#suffix' => '</div>',
    );
  $max = !empty($exceptions) ? sizeof($exceptions) : 0;
  for ($i = 0; $i <= $max; $i++) {
    $EXCEPT = '';
    if (!empty($exceptions[$i]['datetime'])) {
      $EXCEPT = $exceptions[$i]['datetime'];
    }
    $element['exceptions']['EXDATE'][$i] = array(
      '#tree' => TRUE,
      'datetime' => array(
        '#type' => $element['#date_repeat_widget'],
        '#default_value' => $EXCEPT,
        '#date_timezone' => !empty($element['#date_timezone']) ? $element['#date_timezone'] : date_default_timezone_name(),
        '#date_format' => !empty($element['#date_format']) ? date_limit_format($element['#date_format'], array('year', 'month', 'day')) : 'Y-m-d',
        '#date_text_parts'  => !empty($element['#date_text_parts']) ? $element['#date_text_parts'] : array(),
        '#date_year_range'  => !empty($element['#date_year_range']) ? $element['#date_year_range'] : '-3:+3',
        '#date_label_position' => !empty($element['#date_label_position']) ? $element['#date_label_position'] : 'within',
        ),
      'tz' => array('#type' => 'hidden', '#value' => $element['#date_timezone']),
      'all_day' => array('#type' => 'hidden', '#value' => 1),
      'granularity' => array('#type' => 'hidden', '#value' => serialize(array('year', 'month', 'day'))),
      );
  }
  
  // collect additions in the same way as exceptions - implements RDATE.
  $element['additions'] = array(
    '#type' => 'fieldset',
    '#collapsible' => TRUE,
    '#collapsed' => empty($additions) ? TRUE : FALSE,
    '#title' => t('Additional'),
    '#description' => t('Dates to add to the list of repeating dates.'),
    '#prefix' => '<div id="date-repeat-additions" class="date-repeat">',
    '#suffix' => '</div>',
    );
  $max = !empty($additions) ? sizeof($additions) : 0;
  for ($i = 0; $i <= $max; $i++) {
    $RDATE = '';
    if (!empty($additions[$i]['datetime'])) {
      $RDATE = $additions[$i]['datetime'];
    }
    $element['additions']['RDATE'][$i] = array(
      '#tree' => TRUE,
      'datetime' => array(
        '#type' => $element['#date_repeat_widget'],
        '#default_value' => $RDATE,
        '#date_timezone' => !empty($element['#date_timezone']) ? $element['#date_timezone'] : date_default_timezone_name(),
        '#date_format' => !empty($element['#date_format']) ? date_limit_format($element['#date_format'], array('year', 'month', 'day')) : 'Y-m-d',
        '#date_text_parts'  => !empty($element['#date_text_parts']) ? $element['#date_text_parts'] : array(),
        '#date_year_range'  => !empty($element['#date_year_range']) ? $element['#date_year_range'] : '-3:+3',
        '#date_label_position' => !empty($element['#date_label_position']) ? $element['#date_label_position'] : 'within',
        ),
      'tz' => array('#type' => 'hidden', '#value' => $element['#date_timezone']),
      'all_day' => array('#type' => 'hidden', '#value' => 1),
      'granularity' => array('#type' => 'hidden', '#value' => serialize(array('year', 'month', 'day'))),
      );
  }

  // Create an "Add another" button for the exceptions.
  $field_name = $element['#parents'][0];
  $element['exceptions']['exceptions_addmore'] = array(
    '#type' => 'button',
    '#value' => t('Add more exceptions'),
    '#ahah' => array(
      'event' => 'click',
      'path' => 'date_repeat_get_exception_form_ajax/exceptions/' . $field_name,
      'wrapper' => 'date-repeat-exceptions',
      'method' => 'replace',
      'effect' => 'fade'
    )
  );
  // Create an "Add another" button for the additions.
  $field_name = $element['#parents'][0];
  $element['additions']['additions_addmore'] = array(
    '#type' => 'button',
    '#value' => t('Add more additions'),
    '#ahah' => array(
      'event' => 'click',
      'path' => 'date_repeat_get_exception_form_ajax/additions/' . $field_name,
      'wrapper' => 'date-repeat-additions',
      'method' => 'replace',
      'effect' => 'fade'
    )
  );
  **/
  return $element;
}

/**
 * Build a RRULE out of the form values.
 */
function simple_date_repeat_ui_rrule_validate($element, &$form_state) {
  require_once('./'. drupal_get_path('module', 'date_api') .'/date_api_ical.inc');
  require_once('./'. drupal_get_path('module', 'date_repeat') .'/date_repeat_form.inc');
  $form_values = $form_state['values'];
  $field_name = $element['#parents'][0];
  $item = $form_values[$field_name]['rrule'];
  $start_date = date_make_date(strtotime($form_values[$field_name]['value']['date']), $element['#date_timezone'], DATE_UNIX);;
  $nojs = empty($item['nojs']);
  if (!empty($item['repeats'])) {
    $item = date_repeat_merge($item, $element);
    if (!empty($item['UNTIL']['datetime'])) {
      $date = date_make_date($item['UNTIL']['datetime'], $element['#date_timezone']);
      date_time_set($date, 23, 59, 59);
      date_timezone_set($date, timezone_open('UTC'));
      $item['UNTIL']['datetime'] = date_format($date, DATE_FORMAT_DATETIME);
    }
    if($item['FREQ'] != 'WEEKLY') {
      //kill the byday if the freq isn't set to weekly as then we don't need it.
      unset($item['BYDAY']);
    }
    if(isset($item['BYDAY']) && is_array($item['BYDAY'])) {
      //We need to loop through and kill any zero or false BYDAY values passed
      foreach ($item['BYDAY'] as $key => $wkdy) {
        if(!$wkdy) {
          unset($item['BYDAY'][$key]);
        }
      }
    }
    if ($item['FREQ'] == 'MONTHLY') {
      //We need to build the the BYMONTHDAY or BYDAY options
      switch ($item['bymonth']) {
        case 'BYMONTHDAY':
          $item['BYMONTHDAY'][] = date_format_date($start_date, 'custom', 'j');
          break;
        case 'BYDAY':
          $day_date = $start_date;
          $dow = date_format_date($day_date, 'custom', 'w');
          $dom = date_format_date($day_date, 'custom', 'j');
          $byday = array(
            'SU',
            'MO',
            'TU',
            'WE',
            'TH',
            'FR',
            'SA',
          );
          $num = array(8, 15, 22, 28);
          $day = $byday[$dow];
          foreach ($num as $wkno => $week) {
            if ($dom < $week) {
              $day = '+' . ($wkno + 1) . $day;
              break;
            }
          }
          $item['BYDAY'][] = $day;          
          break;
      }
    }
  }
  else {
    //If the Repeat checkbox was not checked we set the repeat rule to NULL
    $item['FREQ'] = 'NONE';
    $item['INTERVAL'] = 0;
    $item['UNTIL'] = array();
    unset($item['BYDAY']);
  }
  $rrule = date_api_ical_build_rrule($item);
  form_set_value($element, $rrule, $form_state);
}