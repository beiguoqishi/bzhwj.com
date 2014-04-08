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
  $('#submit').on 'click',(e) ->
      $
      .post '/index.php?app=appointment&act=save',
             $ '#info_table'
             .find 'input,textarea,select'
             .serializeArray(),
             (d) ->
               alert '保存成功！' if d >= 0


