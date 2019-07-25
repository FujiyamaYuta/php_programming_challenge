(function() {
  $('#submit').on('click', function() {
    params = {};
    var number = $('#form').val(); // ** 入力フォームに入力された文字列
    params.number = number;

    $.ajax({
      url: 'api/function.php',
      'content-type': 'application/json',
      type: 'POST',
      data: params
    })
      .done(function(data) {
        console.log(data);
        alert(data.message);
      })
      .fail(function(hoge, status) {
        console.error(status);
      });
  });
}.call(this));
