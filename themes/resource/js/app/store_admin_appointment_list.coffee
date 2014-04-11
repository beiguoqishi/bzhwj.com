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

  Backbone.emulateHTTP = true
  AppointmentModel = Backbone.Model.extend
    url: ->
      base =
        _.result(this, 'urlRoot') or
        _.result(this.collection, 'url')
      if this.isNew()
        return base
      base.replace(/([^\/])$/, '$1&') + ('id=' + encodeURIComponent this.id)

  AppointmentDetailView = Backbone.View.extend
    el:'#item_detail'
    template: _.template $('#item_detail_tpl').html()
    initialize: ->
      this.render()
    render: ->
      this.$el.html this.template this.model.toJSON()
      $('#item_detail_modal').modal({keyboard:false})
    events:
      'click button.save': 'save'
    save: ->
      params = this.$el.find('input,textarea,select').serialize().split('&')
      vals = {}
      for item in params
        vals[item.split('=')[0]] = decodeURIComponent item.split('=')[1]
      this.model.save vals,
        patch:true
        success:(model,res,options)->
          if res < 0
            model.set(model.previousAttributes())
            alert('保存失败，请联系网站管理员！')
          else
            alert('保存成功！')
            $('#item_detail_modal').modal('hide')
        error:->

  AppointmentView = Backbone.View.extend
    tagName:'li'
    className:'list-group-item'
    template: _.template($('#appointment_item_tpl').html())
    initialize:() ->
      this.listenTo this.model,'change',this.change
      this.listenTo this.model,'destroy',this.destroy
    render: ->
      this.$el.html this.template(this.model.toJSON())
      this
    events:
      'click a.a-tle,a.view': 'viewItem'
      'click a.remove'      : 'remove'

    change: (model)->
      if model.changed? and (model.changed.hasOwnProperty('name') or model.changed.hasOwnProperty('address'))
        this.render()
    viewItem: (e) ->
      self = this
      new AppointmentDetailView({model:self.model})
    remove: ->
      collection = this.model.collection
      if confirm '您确定要删除' + this.model.get('name') + '的预约体验单吗？'
        this.model.destroy
          wait:true
          success: (model,res)->
            if res < 0
              if collection?
                collection.fetch
                  reset:true
              alert('删除失败，请联系网站管理员！')
              return
            else
              alert('删除成功')


  AppointmentList = Backbone.Collection.extend
    url:'index.php?app=storeinterpose&act=appointment_list'
    model: AppointmentModel

  appoiList = new AppointmentList

  AppView = Backbone.View.extend
    el: '.main'
    initialize: ->
      this.listenTo appoiList,'add',this.addOne
      this.listenTo appoiList,'all',this.all
      this.listenTo appoiList,'destroy',this.destroy
      this.listenTo appoiList,'reset',this.reset
      appoiList.fetch
        success: (coll,res,options) ->
          $('#no_appointment_tip').show() if coll.length == 0
    render:->
      this.$('#appointment_list').empty()
      appoiList.each this.addOne,this
    addOne: (item) ->
      view = new AppointmentView model:item
      this.$('#appointment_list').append view.render().el
    destroy: ->
      this.render()
    reset: ->
      this.render()
    all: ->
      console.log 'all'

  App = new AppView
