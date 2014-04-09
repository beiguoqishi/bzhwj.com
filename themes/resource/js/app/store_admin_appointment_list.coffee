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

  AppointmentModel = Backbone.Model.extend
    url: ->
      base =
        _.result(this, 'urlRoot') or
        _.result(this.collection, 'url')
      if this.isNew()
        return base
      base.replace(/([^\/])$/, '$1&') + encodeURIComponent 'id=' + this.id

  AppointmentDetailView = Backbone.View.extend
    template: _.template $('#item_detail_tpl').html()
    initialize: ->
      this.listenTo this.model,'change','render'
      this.render()
    render: ->
      $('#item_detail').html this.template this.model.toJSON()
      $('#item_detail_modal').modal()


  AppointmentView = Backbone.View.extend
    tagName:'li'
    className:'list-group-item'
    template: _.template($('#appointment_item_tpl').html())
    render: ->
      this.$el.html this.template(this.model.toJSON())
      this
    events:
      'click a.a-tle,a.view': 'viewItem'

    viewItem: (e) ->
      self = this
      new AppointmentDetailView({model:self.model})

  AppointmentList = Backbone.Collection.extend
    url:'index.php?app=storeinterpose&act=appointment_list'
    model: AppointmentModel

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
