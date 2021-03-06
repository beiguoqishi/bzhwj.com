// Generated by CoffeeScript 1.7.1
(function() {
  var execute;

  window.PATH = {
    BASEURL: '/themes/resource/js/'
  };

  require.config({
    baseUrl: window.PATH.BASEURL,
    shim: {
      bootstrap: {
        deps: ['backbone']
      }
    },
    paths: {
      bootstrap: 'bootstrap/js/bootstrap'
    }
  });

  require(['bootstrap'], function(bootstrap) {
    return execute(Backbone);
  });

  execute = function(Backbone) {
    $('body').on('click', 'a.remove-item', function(e) {
      var $li, $this, $title;
      $this = $(this);
      $li = $this.parents('li.item').eq(0);
      $title = $li.find('a.txt').text();
      if (confirm('您确定要删除' + $title + '吗？')) {
        $.post('/index.php?app=bzhwj_user_appointment&act=remove', {
          ids: $this.attr('e_id')
        }, function(d) {
          if (d >= 0) {
            $li.remove();
            return alert('删除成功');
          } else {
            return alert('系统错误，请联系网站管理员！');
          }
        });
      }
      e.preventDefault();
      return false;
    });
    $('#select_all').on('change', function(e) {
      if ($(this).prop('checked')) {
        $('.select-item').each(function(idx, el) {
          return el.checked = true;
        });
      } else {
        $('.select-item').each(function(idx, el) {
          return el.checked = false;
        });
      }
      e.preventDefault();
      return false;
    });
    return $('#batch_remove').on('click', function(e) {
      var $els, ids;
      ids = [];
      $els = [];
      $('.select-item').each(function(idx, el) {
        var $li;
        el = $(el);
        $li = el.parents('li.item');
        if (el.prop('checked')) {
          $els.push($li);
          return ids.push(el.attr('e_id'));
        }
      });
      if (ids.length === 0) {
        alert('请选择您要删除的项目');
        return;
      }
      if (confirm('您确定要删除选择的项目吗？')) {
        $.post('/index.php?app=bzhwj_user_appointment&act=remove', {
          ids: ids.join(',')
        }, function(d) {
          var $li, _i, _len;
          if (d >= 0) {
            for (_i = 0, _len = $els.length; _i < _len; _i++) {
              $li = $els[_i];
              $li.remove();
            }
            return alert('删除成功');
          } else {
            return alert('系统错误，请联系网站管理员！');
          }
        });
      }
      e.preventDefault();
      return false;
    });
  };

}).call(this);
