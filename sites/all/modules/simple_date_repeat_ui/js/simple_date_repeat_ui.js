Drupal.behaviors.simpleDateRepeatUi = function() {
  Drupal.simpleDateRepeatUi();
}

Drupal.simpleDateRepeatUi = function() {
  var chb = $('.simple-repeat-check');
  var rruleDesc = $('.rrule-desc');
  var form = $('#' + Drupal.settings.simple_date_repeat_ui.form_id);
  var $date = '';
  var date_val = '';
  var $fieldname = Drupal.settings.simple_date_repeat_ui.field;
  var $interval_text = {
    'DAILY': Drupal.t('days'),
    'WEEKLY': Drupal.t('weeks'),
    'MONTHLY': Drupal.t('months'),
    'YEARLY': Drupal.t('years'),    
  };
  Drupal.settings.simple_date_repeat_ui.continueSubmit = false;
  
  $dialog = function(args) {
    $('.repeat-popup').dialog(args);
  }
  
  $warnlog = function(args) {
    $('.repeat-warn').dialog(args);
  }
  
  init = function() {
    $dialog({
      autoOpen: false,
      draggable: false,
      modal: true,
      resizable: false,
      title: Drupal.t('Repeats'),
      closeText: '',
      buttons: {
        'Done': function() {$dialog('close'); saveRepeat();},
        'Cancel': function() {$dialog('close'); uncheck();},
      },
      
    });
    $warnlog({
      autoOpen: false,
      draggable: false,
      modal: true,
      resizable: false,
      title: Drupal.t('Overlapping Repeats'),
      closeText: '',
      buttons: {
        'Yes': function() {$warnlog('close'); Drupal.settings.simple_date_repeat_ui.continueSubmit = true; $('#' + Drupal.settings.simple_date_repeat_ui.form_id).submit()},
        'No, go back to editing': function() {$warnlog('close');},
      },
      
    });
    var link = $('<a></a>');
    link.attr('href', '#');
    link.addClass('rrule-edit');
    link.text(Drupal.t('Edit'));
    link.appendTo(chb.parent().parent());
    if(!chb.is(':checked')) {
      $('.rrule-edit').hide();
    }
    attachEvents();
    $('#repeat-byday, #repeat-bymonth, .repeat-clone').hide();
    $('.rrule-sum').css('display', 'block');
  }
  
  uncheck = function() {
    chb.attr('checked', false);
    clearRepeat();
  }
  
  attachEvents = function() {
    var $fieldname = Drupal.settings.simple_date_repeat_ui.field;
    chb.bind('change', function () {
      if($(this).is(':checked')) {
        open();
      }
      else {
        clearRepeat()
      }
    });
    $('.rrule-edit').live('click', function() {
      open();
      return false;
    });
    $(form).bind('submit', function() { 
      saveRepeat(true);
      moveForm();
      multiWarn();
      if(Drupal.settings.simple_date_repeat_ui.continueSubmit !== true) {
        return false;
      }
    });
    $('#repeat-freq select').live('change', function() { showExtra($(this)); changeInterval($(this).val())}).trigger('change');
    $('.repeat-popup :input').live('change', function() { updateDesc(true); });
  }
  
  open = function() {
    inputname = 'input[name="' + $fieldname +  '[value][date]"]';
    date_val = $(inputname).val();
    if(date_val != '') {
      $date = new Date(date_val);
    }
    $('.repeat-clone').empty().remove();
    $dialog('open');
    $('#repeat-freq select').trigger('change');
  }
  
  clearRepeat = function() {
    hideExtra();
    rruleDesc.hide();
    $('.rrule-edit').hide();
  }
  
  saveRepeat = function(noAjax) {
    if (!noAjax){
      updateDesc();
      rruleDesc.show();
    }
    $('.rrule-edit').show();
  }
  
  moveForm = function() {
    $('.repeat-popup :input').each(function() {
      $val = $(this).val();
      $name = $(this).attr('name');
      if ((($(this).attr('type') == 'checkbox' || $(this).attr('type') == 'radio') && $(this).is(':checked')) || ($(this).attr('type') != 'checkbox' && $(this).attr('type') != 'radio')){
        $('<input type="hidden"></input>').attr({
          'name': $name,
        })
        .val($val)
        .appendTo(form);
      }
    });
  }
  
  updateDesc = function(only) {
    $url = Drupal.settings.basePath + 'date_repeat_rrule_desc';
    $data = $('.repeat-popup :input').serialize();
    $data = $data + '&' + $fieldname + '[value][date]=' + date_val;
    $.ajax({
      url: $url,
      data: $data,
      dataType: 'json',
      type: 'POST',
      success: function(data) {
        if (only === true) {
         $('.repeat-popup .rrule-desc').text(data.rrule);
         return;
        }
        rruleDesc.text(data.rrule);
      },
    });
  }
  
  showExtra = function(input) {
    hideExtra(input.val());
    if (input.val() == 'WEEKLY'){
      showByDay();
    }
    if (input.val() == 'MONTHLY'){
      showByMonthDay();
    }
    
  }
  
  hideExtra = function(val) {
    hideByDay(val);
    hideByMonthDay(val);
  }
  
  showByDay = function() {
    if ($date) {
      day = $date.getDay();
      $('#repeat-byday input[type="checkbox"]').eq(day).attr('checked', true);
    }
    $('#repeat-byday').show();
  }
  hideByDay = function(val) {
    $('#repeat-byday').hide();
  }
  
  showByMonthDay = function() {
    $('#repeat-bymonth').show();
  }
  hideByMonthDay = function() {
    $('#repeat-bymonth').hide();
  }
  
  changeInterval = function($val) {
    $('#repeat-int-type').text($interval_text[$val]);  
  }
  
  multiWarn = function() {
    if (!chb.is(":checked")){
      Drupal.settings.simple_date_repeat_ui.continueSubmit = true;
      return;
    }
    $date1 = new Date($('input[name="'+$fieldname+'[value][date]"]').val());
    $date2 = new Date($('input[name="'+$fieldname+'[value2][date]"]').val());
    if ($date2 != 'Invalid Date' && Date.parse($date2) != Date.parse($date1)) {
      $('.repeat-warn').text(Drupal.t('You have selected dates that span multiple days, this could cause an overlap with your repeat settings. Do you wish to continue with these repeat settings?'));
      $warnlog('open');
    }
    else {
       Drupal.settings.simple_date_repeat_ui.continueSubmit = true;
    }
  }
  init();
}