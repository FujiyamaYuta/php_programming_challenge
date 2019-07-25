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
        for (var i = 0; i <= data.length; i++) {
          $('#comment').append(
            `
          <div class="ui comments">
            <div class="comment">
              <div class="content">
                <a class="author">` +
              data[i].id +
              `</a>
                <div class="text">
                  ` +
              data[i].title +
              `
                </div>
                <div class="actions">
                  <a class="reply">` +
              data[i].body +
              `</a>
                </div>
              </div>
            </div>
          </div>
            `
          );
        }
      })
      .fail(function(hoge, status) {
        console.error(status);
      });
  });
}.call(this));
