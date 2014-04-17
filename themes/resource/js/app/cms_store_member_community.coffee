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
    render: ->
      this.$el.html this.template(this.model.toJSON())
      this

  MemberList = Backbone.Collection.extend
    url: '/index.php?app=storeinterpose&act=member_community_list'
    model: MemberModel
    comparator:(m1,m2) ->
      c = m1.get('id') - m2.get('id')
      c < 0 ? 1 : -1

  MemberListView = Backbone.View.extend
    el: $('.member-list')
    initialize:->
      this.member_list = new MemberList
      this.listenTo this.member_list,'add',this.addOne
      this.member_list.fetch()
    events:
      'click #auth_member': 'auth_member'
    auth_member:->
      val = $.trim($('#member_username').val())
      if (!val)
        alert('请您输入用户名！')
        return

      this.member_list.create
        user_name:val
    addOne: (item)->
      member = new MemberItemView model:item
      this.$el.find('tbody').append member.el

  new MemberListView