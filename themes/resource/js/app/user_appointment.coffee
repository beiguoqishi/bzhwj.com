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
                store_id: $this.attr('store_id')
                goods_id: $this.attr('goods_id'),
                (d) ->
                  if d >= 0 then $li.remove() else alert('系统错误，请联系网站管理员！')
