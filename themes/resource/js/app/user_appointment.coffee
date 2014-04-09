window.PATH =
  BASEURL:'/themes/resource/js/'

require.config
  baseUrl: window.PATH.BASEURL
  shim:
    bootstrap:deps:['backbone']
  paths:
    bootstrap:'bootstrap/js/bootstrap'

require ['bootstrap'],(bootstrap) ->
  execute(Backbone)

execute = (Backbone) ->
  $ 'body'
  .on 'click','a.remove-item',(e) ->
      $this = $ this
      $li = $this.parents 'li.item'
                 .eq(0)
      $title = $li.find 'a.txt'
                  .text()

      if confirm '您确定要删除' + $title + '吗？'
         $.post '/index.php?app=bzhwj_user_appointment&act=remove',
                ids: $this.attr('e_id'),
                (d) ->
                  if d >= 0
                    $li.remove()
                    alert '删除成功'
                  else
                    alert('系统错误，请联系网站管理员！')
      e.preventDefault()
      false

  $ '#select_all'
  .on 'change',(e) ->
      if $(this).prop('checked')
        $ '.select-item'
        .each (idx,el) ->
            el.checked = true
      else
        $ '.select-item'
        .each (idx,el) ->
            el.checked = false
      e.preventDefault()
      false

  $ '#batch_remove'
  .on 'click',(e) ->
      ids = []
      $els = []
      $ '.select-item'
       .each (idx,el) ->
        el = $ el
        $li = el.parents 'li.item'
        if el.prop 'checked'
          $els.push $li
          ids.push el.attr('e_id')

      if ids.length is 0
            alert '请选择您要删除的项目'
            return

      if confirm '您确定要删除选择的项目吗？'
          $.post '/index.php?app=bzhwj_user_appointment&act=remove',
                 ids: ids.join ','
                 (d) ->
                    if d >= 0
                      $li.remove() for $li in $els
                      alert '删除成功'
                    else
                      alert('系统错误，请联系网站管理员！')

      e.preventDefault()
      false