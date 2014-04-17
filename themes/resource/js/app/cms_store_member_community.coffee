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

# member list
  MemberModel = Backbone.Model.extend
    url: ->
      base =
        _.result(this, 'urlRoot') or
        _.result(this.collection, 'url')
      if this.isNew()
        return base
      base.replace(/([^\/])$/, '$1&') + ('id=' + encodeURIComponent this.id)

  MemberItemView = Backbone.View.extend
    template: _.template($('#member_item_tpl').html())
    tagName: 'tr'
    initialize:
      this.render()
    render:
      this.$el.html this.template this.model.toJSON()
      this

  MemberList = Backbone.Collection.extend
    url: '/index.php?app=storeinterpose&act=member_community_list'
    model: MemberModel

  MemberListView = Backbone.View.extend
    el: $('#member_table')
    initialize:
      member_list = new MemberList
      this.listenTo member_list,'add',this.addOne
      member_list.fetch()
    addOne: (item)->
      member = new MemberItemView model:item
      this.$el.find('tbody').append member.el

  new MemberListView