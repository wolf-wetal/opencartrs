const custom_block = {
 // url: 'index.php?route=checkout/custom/cart.update',
  'render': function(block){
    $.ajax({
      url: 'index.php?route=checkout/CustomCart.render',
      type: 'get',
      data: {'block': block},
      dataType: 'html',
    /*  beforeSend: function(){
        $('#custom-' + block).addClass('custom_lock');
        $('#button-custom-order').button('loading');
      },*/
      success: function(html) {
        $('#custom-' + block).html(html);
        $('#header-cart').load('index.php?route=common/cart.info');
        /*setTimeout(function(){
          $('#custom-' + block).html(html).removeClass('custom_lock');
        }, 1000);*/
      },
    /*  complete: function(){
        $('#button-custom-order').button('reset');
      },*/
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  },

  'customer': function(value){
    $.ajax({
      url: 'index.php?route=checkout/custom/customer.update&customer_group_id=' + value,
      dataType: 'json',
      success: function(json) {
        $('[id^=customer-field]').hide();
        $('[id^=customer-field]').removeClass('required');

        for (i = 0; i < json.length; i++) {
          field = json[i];

          $('#customer-field-' + field.name).show();

          if (field['required']) {
            $('#customer-field-' + field.name).addClass('required');
          }
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  },

  'shipping': function(value){
    $.ajax({
      url: 'index.php?route=checkout/custom/shipping.update&shipping_method=' + value,
      dataType: 'json',
      success: function(json) {

        if (json.length === 0) {
          $('#custom-shipping-address').hide();
        } else {
          $('#custom-shipping-address').show();
        }

        $('[id^=shipping-field]').hide();
        $('[id^=shipping-field]').removeClass('required');

        for (i = 0; i < json.length; i++) {
          field = json[i];

          $('#shipping-field-' + field['name']).show();

          if (field['required']) {
            $('#shipping-field-' + field['name']).addClass('required');
          }
        }

        setTimeout(function(){
          custom_block.render('total');
        }, 100);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  },

  'payment': function(value){
    $.ajax({
      url: 'index.php?route=checkout/custom/payment.update&customer_group_id=' + value,
      dataType: 'json',
      success: function(json) {

        $('[name=payment_method]').parents('.radio').hide();

        for (i = 0; i < json.length; i++) {
          let method = json[i].name.replace('-', '_');
          $('[name=payment_method][value^='+ method +']').parents('.radio').show();

        }

        $('[name=payment_method]:visible').first().prop('checked', true);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  }

}

function checkoutLogin(){

  return new Promise( (resolve, reject) => {

    $.ajax({
    url: 'index.php?route=checkout/custom/login.save',
    type: 'post',
    data: $('#custom-login input[type=\'radio\']:checked'),
    dataType: 'json',
    beforeSend: function(){
      $('#button-custom-order').button('loading');
    },
    success: function(json) {
      resolve();
    },
    complete: function(){
      $('#button-custom-order').button('reset');
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
    });

  });

}

function checkoutCustomer(){

  return new Promise( (resolve, reject) => {
    $.ajax({
      url: 'index.php?route=checkout/custom/customer.save',
      type: 'post',
      data: $('#custom-customer input[type=\'text\'], #custom-customer input[type=\'date\'], #custom-customer input[type=\'datetime-local\'], #custom-customer input[type=\'time\'], #custom-customer input[type=\'checkbox\']:checked, #custom-customer input[type=\'radio\']:checked, #custom-customer input[type=\'hidden\'], #custom-customer input[type=\'password\'], #custom-customer textarea, #custom-customer select'),
      dataType: 'json',
    /*  beforeSend: function(){
        $('#button-custom-order').button('loading');
      },*/
      success: function(json) {
        $('.alert, .text-danger').remove();
        $('.has-error').removeClass('has-error');
        
        if (json['redirect']) {
          console.log('Redirect to ' + json['redirect']);
          location = json['redirect'];
        } else if (json['error']) {

          if (json['error']['warning']) {
              $('#custom-customer').prepend('<div class="alert alert-warning">' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
          }

          for (i in json['error']) {
            var element = $('#customer-field-' + i.replace('_', '-'));
            $(element).append('<div class="text-danger">' + json['error'][i] + '</div>');

          }

          $('.text-danger').parent().addClass('has-error');

          reject('customer');

        }

        resolve();

      },
      complete: function(){
        $('#button-custom-order').button('reset');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });

  });

}

function checkoutShipping(){

  return new Promise( (resolve, reject) => {
    $.ajax({
      url: 'index.php?route=checkout/custom/shipping.save',
      type: 'post',
      data: $('#custom-shipping input[type=\'text\'], #custom-shipping input[type=\'date\'], #custom-shipping input[type=\'datetime-local\'], #custom-shipping input[type=\'time\'], #custom-shipping input[type=\'checkbox\']:checked, #custom-shipping input[type=\'radio\']:checked, #custom-shipping input[type=\'hidden\'], #custom-shipping textarea, #custom-shipping select'),
      dataType: 'json',
      beforeSend: function(){
        $('#button-custom-order').button('loading');
      },
      success: function(json) {

        

        $('.alert, .text-danger').remove();
        $('.has-error').removeClass('has-error');
        
        if (json['redirect']) {
          console.log('Redirect to ' + json['redirect']);
          location = json['redirect'];
        } else if (json['error']) {

          if (json['error']['warning']) {
              $('#custom-shipping').prepend('<div class="alert alert-warning">' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
          }

          for (i in json['error']) {
            var element = $('#shipping-field-' + i.replace('_', '-'));
            $(element).append('<div class="text-danger">' + json['error'][i] + '</div>');

          }

          $('.text-danger').parent().addClass('has-error');

          reject('shipping');
        }
        
        resolve();

      },
      complete: function(){
        $('#button-custom-order').button('reset');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  });  
}

function checkoutPayment(){
  return new Promise( (resolve, reject) => {
    $.ajax({
      url: 'index.php?route=checkout/custom/payment.save',
      type: 'post',
      data: $('#custom-payment input[name=\'payment_method\']:checked, #custom-control input[name=\'agree\']:checked'),
      dataType: 'json',
      beforeSend: function(){
        $('#button-custom-order').button('loading');
      },
      success: function(json) {

        

        $('#custom-payment .alert, #ccustom-control .alert').remove();
        
        if (json['redirect']) {
           console.log('Redirect to ' + json['redirect']);
          location = json['redirect'];
        } else if (json['error']) {

          if (json['error']['payment_method']) {
            $('#custom-payment').prepend('<div class="alert alert-warning">' + json['error']['payment_method'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            reject('payment');
          }

          if (json['error']['agree']) {
            $('#custom-control').prepend('<div class="alert alert-warning">' + json['error']['agree'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            reject('control');
          }

        }

        resolve();

      },
      complete: function(){
        $('#button-custom-order').button('reset');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  });  
}

function checkoutComment(){
  return new Promise( (resolve, reject) => {
    $.ajax({
      url: 'index.php?route=checkout/custom/comment.save',
      type: 'post',
      data: $('#custom-comment textarea'),
      dataType: 'json',
      beforeSend: function(){
        $('#button-custom-order').button('loading');
      },
      success: function(json) {

        $('.alert').remove();
        
        if (json['error']) {
          if (json['error']['warning']) {
            $('#custom-comment').prepend('<div class="alert alert-warning">' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
          }

          reject('comment');
        }

        resolve();

      },
      complete: function(){
        $('#button-custom-order').button('reset');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  });
}

function checkoutConfirm() {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: 'index.php?route=checkout/confirm.confirm',
      dataType: 'html',
      success: function (html) {
        console.log(html);
        $('#custom-confirm').html(html);
           setTimeout(function () {
          const btn_confirm = $('#checkout-payment button');
          btn_confirm.trigger('click'); // Имитируем клик
        }, 100);
        reject('confirm');
      },
      complete: function () {
        $('#button-custom-order').button('reset');
        setTimeout(function () {
          const btn_confirm = $('#checkout-payment button');
          btn_confirm.trigger('click'); // Имитируем клик
        }, 100);

      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  });
}


function failureCallback(id) {
  $('html, body').animate({ scrollTop: $('#custom-' + id).offset().top }, 'slow');
}

