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

  AppointmentView = Backbone.View.extend
    tagName:'li'
    className:'list-group-item'
    template: _.template($('#appointment_item_tpl').html())
    render: ->
      this.$el.html this.template(this.model.toJSON())
      this


  AppointmentList = Backbone.Collection.extend
    url:'index.php?app=storeinterpose&act=appointment_list'

  appoiList = new AppointmentList

  AppView = Backbone.View.extend
    el: '.main'
    initialize: ->
      this.listenTo appoiList,'add',this.addOne
      appoiList.fetch()
    addOne: (item) ->
      view = new AppointmentView model:item
      this.$('#appointment_list').append view.render().el

  App = new AppView
