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
    urlRoot: '/index.php?app=storeinterpose&act=member_community_list'
    parse: (resp,opts)->
      resp.data
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
    initialize:->
      this.render()
    render: ->
      this.$el.html this.template(this.model.toJSON())
      this
    events:
      'click .remove-member': 'remove_item'
    remove_item: (e) ->
      self = this
      if confirm '你确定要删除 "' + this.$el.find('.user_name').text() + '" 会员吗？'
        this.model.destroy
          success: (m,resp)->
            if resp < 0
              if self.collection?
                self.collection.fetch
                  reset:true
              alert '删除失败，请联系网站管理员！'
            else
              alert '删除成功！'
              self.$el.remove()

  MemberList = Backbone.Collection.extend
    url: '/index.php?app=storeinterpose&act=member_community_list'
    model: MemberModel
    comparator:(m1,m2) ->
      c = m1.get('id') - m2.get('id')
      c < 0 ? 1 : -1

  MemberListView = Backbone.View.extend
    el: $('.container')
    initialize:->
      this.member_list = new MemberList
      this.listenTo this.member_list,'add',this.addOne
      this.listenTo this.member_list,'destroy',this.destroy
      this.member_list.fetch()
    events:
      'click #auth_member' : 'auth_member'
      'click #nav_cols li' : 'switch_module'
    render:->
      this.$el.find('tbody').empty()
      this.member_list.each this.addOne,this
    switch_module:(e)->
      $('#nav_cols').find('li')
      .removeClass('active')
      .each (idx,el)->
          $($(el).attr('for')).hide()
      target = $(e.target)
      if !target.is('li')
        target = target.closest('li')
      target.addClass('active')
      $(target.attr('for')).show()

    auth_member:->
      val = $.trim($('#member_username').val())
      if (!val)
        alert('请您输入用户名！')
        return

      self = this
      member = new MemberModel
      member.save user_name: val,
        success:(m,res,opts) ->
          if !res
            alert '保存失败，请联系网站管理员！'
          if res and res.status == -2
            alert '您输入的用户名不存在，请联系你要增加的会员获取准确的用户名！'
          if res.status == 0
            alert '该用户已经是本店会员！'
          if res.status >0
            alert('保存成功')
            self.member_list.add m

    addOne: (item)->
      member = new MemberItemView model:item
      this.$el.find('tbody').append member.el
    destroy:->
      this.render()

  new MemberListView

  CommentView = Backbone.View.extend
    tagName   : 'li'
    className : 'list-group-item'
    template  : _.template($('#comment_item_tpl').html())
    initialize:->
      this.render()
      this.listenTo this.model,'sync',this.sync
      this.listenTo this.model,'destroy',this.destroy
    destroy:->
      this.$el.remove()
    sync:->
      this.render()
    render    :->
      this.$el.empty()
      this.$el.html this.template this.model.toJSON()
      this
    events:
      'click .reply-btn': 'reply'
      'click .delete-sub-comment': 'removeSubComment'
      'click .delete-comment'    : 'removeComment'
    reply:(e)->
      cnt = $.trim this.$el.find('.reply_area').val()
      this.model.reply(e,cnt)
    removeSubComment: (e)->
      target = $(e.target)
      id = target.data('id')
      if confirm '您确定要删除这条评论吗？'
        this.model.removeComment(e,id,1)
    removeComment: (e) ->
      target = $(e.target)
      id = target.data('id')
      if confirm '您确定要删除这条评论吗？'
        this.model.removeComment(e,id,0)

  CommentModel = Backbone.Model.extend
    urlRoot: '/index.php?app=storeinterpose&act=member_community_comments'
    url    : ->
      base =
        _.result(this, 'urlRoot') or
        _.result(this.collection, 'url')
      if this.isNew()
        return base
      base.replace(/([^\/])$/, '$1&') + ('id=' + encodeURIComponent this.id)
    removeComment:(e,id,type) ->
      self = this
      $.post '/index.php?app=storeinterpose&act=member_community_comments_del_comment',
        id: id
        type: type
        (d)->
          if d >= 0
            if type isnt 1
              self.destroy()
            else
              self.fetch()
            alert('删除成功！')
          else
            alert '删除失败，请联系网站管理员！'
    reply:(e,cnt)->
      self = this
      if not cnt
        alert('请输入评论内容！');
        return
      $.post '/index.php?app=storeinterpose&act=member_community_comments_reply',
        cnt: cnt
        id : self.get('id'),
        (d)->
          if d >= 0
            self.fetch()
            alert('回复成功！')
          else
            alert '回复失败，请联系网站管理员！'

  CommentCollection = Backbone.Collection.extend
    model: CommentModel
    url  : '/index.php?app=storeinterpose&act=member_community_comments'

  commentList = new CommentCollection

  CommentAppView = Backbone.View.extend
    el        :$('#comment_list')
    initialize:->
      this.listenTo commentList,'add',this.addOne
      commentList.fetch()
    addOne    :(m)->
      view = new CommentView model:m
      this.$el.append view.el

  new CommentAppView