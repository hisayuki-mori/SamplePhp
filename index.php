<?php
require __DIR__ . '\vendor\autoload.php';

?>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>SPIKE Checkout demo program </title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/foundation/5.3.1/css/foundation.min.css">
    <script src="//cdn.jsdelivr.net/foundation/5.3.1/js/vendor/modernizr.js"></script>
  </head>
  <body>

<h1>SPIKE Checkout and charge demo</h1>

  <noscript>Enable Javascript and reload this page.</noscript>

  <div class="row">
    <form action="payment_control.php" method="post" id="form_test">
      <input id="token" type="hidden" name="token" value="">
      <button name="purchase" id="button1">購入</button>
    </form>
  </div>
  <div>
    <a href="https://spike.cc/shop/user_1839152463/products/4Qqj9LcO" class="spike-button" data-code="4Qqj9LcO" data-button-style="pay_large" data-button-text-key="1">今すぐ支払う</a><script src="https://spike.cc/button/v1/button.js" type="text/javascript"></script>
  </div>

  <script src="https://checkout.spike.cc/v1/checkout.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script>
  var handler = SpikeCheckout.configure({
    key: "<?php print htmlspecialchars(addslashes("pk_test_eRPOqMnrbb1nrYA6CH5J0lfX")); ?>",
    token: function(token, args) {
      //alert(token.id);
      $("#customButton").attr('disabled', 'disabled');
      $(':input[type="hidden"][name="token"]').val(token.id);
      $('form#form_test').submit();
    },
    opened: function(e) {
      // Event: Overlay opened
    },
    closed: function(e) {
      // Event: Overlay closed
    }
  });
  $('#button1').click(function(e) {
      handler.open({
        name: "<?php print "クレジット決済" ?>",
        amount: <?php print 2000 ?>,
        currency: "JPY",
        email:"siruvalice@gmail.com",
        guest: true
      });
    e.preventDefault();
  });
  </script>
