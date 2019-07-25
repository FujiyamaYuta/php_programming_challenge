(function() {
  $('#submit').on('click', function() {
    params = {};
    var number = $('#form').val(); // ** 入力フォームに入力された文字列
    $('#comment').empty();

    $.ajax({
      url: 'api/function.php',
      'content-type': 'application/json',
      type: 'POST',
      data: params
    })
      .done(function(data) {
        $('#comment').append(
          `
          <div class="ui comments">
            <div class="comment">
              <div class="content">
                <a class="author">` +
            data.zundoko +
            `</a>
              </div>
            </div>
          </div>
            `
        );

        if (data.zundoko == 'ズンズンズンズンドコ') {
          alert('キヨシ！');
        }
      })
      .fail(function(hoge, status) {
        console.error(status);
      });
  });
}.call(this));
