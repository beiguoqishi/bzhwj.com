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
    var CommentAppView, CommentCollection, CommentModel, CommentView, MemberItemView, MemberList, MemberListView, MemberModel, commentList;
    Backbone.emulateHTTP = true;
    MemberModel = Backbone.Model.extend({
      urlRoot: '/index.php?app=storeinterpose&act=member_community_list',
      parse: function(resp, opts) {
        return resp.data;
      },
      url: function() {
        var base;
        base = _.result(this, 'urlRoot') || _.result(this.collection, 'url');
        if (this.isNew()) {
          return base;
        }
        return base.replace(/([^\/])$/, '$1&') + ('id=' + encodeURIComponent(this.id));
      }
    });
    MemberItemView = Backbone.View.extend({
      template: _.template($('#member_item_tpl').html()),
      tagName: 'tr',
      initialize: function() {
        return this.render();
      },
      render: function() {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
      },
      events: {
        'click .remove-member': 'remove_item'
      },
      remove_item: function(e) {
        var self;
        self = this;
        if (confirm('你确定要删除 "' + this.$el.find('.user_name').text() + '" 会员吗？')) {
          return this.model.destroy({
            success: function(m, resp) {
              if (resp < 0) {
                if (self.collection != null) {
                  self.collection.fetch({
                    reset: true
                  });
                }
                return alert('删除失败，请联系网站管理员！');
              } else {
                alert('删除成功！');
                return self.$el.remove();
              }
            }
          });
        }
      }
    });
    MemberList = Backbone.Collection.extend({
      url: '/index.php?app=storeinterpose&act=member_community_list',
      model: MemberModel,
      comparator: function(m1, m2) {
        var c, _ref;
        c = m1.get('id') - m2.get('id');
        return (_ref = c < 0) != null ? _ref : {
          1: -1
        };
      }
    });
    MemberListView = Backbone.View.extend({
      el: $('.container'),
      initialize: function() {
        this.member_list = new MemberList;
        this.listenTo(this.member_list, 'add', this.addOne);
        this.listenTo(this.member_list, 'destroy', this.destroy);
        return this.member_list.fetch();
      },
      events: {
        'click #auth_member': 'auth_member',
        'click #nav_cols li': 'switch_module'
      },
      render: function() {
        this.$el.find('tbody').empty();
        return this.member_list.each(this.addOne, this);
      },
      switch_module: function(e) {
        var target;
        $('#nav_cols').find('li').removeClass('active').each(function(idx, el) {
          return $($(el).attr('for')).hide();
        });
        target = $(e.target);
        if (!target.is('li')) {
          target = target.closest('li');
        }
        target.addClass('active');
        return $(target.attr('for')).show();
      },
      auth_member: function() {
        var member, self, val;
        val = $.trim($('#member_username').val());
        if (!val) {
          alert('请您输入用户名！');
          return;
        }
        self = this;
        member = new MemberModel;
        return member.save({
          user_name: val
        }, {
          success: function(m, res, opts) {
            if (!res) {
              alert('保存失败，请联系网站管理员！');
            }
            if (res && res.status === -2) {
              alert('您输入的用户名不存在，请联系你要增加的会员获取准确的用户名！');
            }
            if (res.status === 0) {
              alert('该用户已经是本店会员！');
            }
            if (res.status > 0) {
              alert('保存成功');
              return self.member_list.add(m);
            }
          }
        });
      },
      addOne: function(item) {
        var member;
        member = new MemberItemView({
          model: item
        });
        return this.$el.find('tbody').append(member.el);
      },
      destroy: function() {
        return this.render();
      }
    });
    new MemberListView;
    CommentView = Backbone.View.extend({
      tagName: 'li',
      className: 'list-group-item',
      template: _.template($('#comment_item_tpl').html()),
      initialize: function() {
        this.render();
        this.listenTo(this.model, 'sync', this.sync);
        return this.listenTo(this.model, 'destroy', this.destroy);
      },
      destroy: function() {
        return this.$el.remove();
      },
      sync: function() {
        return this.render();
      },
      render: function() {
        this.$el.empty();
        this.$el.html(this.template(this.model.toJSON()));
        return this;
      },
      events: {
        'click .reply-btn': 'reply',
        'click .delete-sub-comment': 'removeSubComment',
        'click .delete-comment': 'removeComment'
      },
      reply: function(e) {
        var cnt;
        cnt = $.trim(this.$el.find('.reply_area').val());
        return this.model.reply(e, cnt);
      },
      removeSubComment: function(e) {
        var id, target;
        target = $(e.target);
        id = target.data('id');
        if (confirm('您确定要删除这条评论吗？')) {
          return this.model.removeComment(e, id, 1);
        }
      },
      removeComment: function(e) {
        var id, target;
        target = $(e.target);
        id = target.data('id');
        if (confirm('您确定要删除这条评论吗？')) {
          return this.model.removeComment(e, id, 0);
        }
      }
    });
    CommentModel = Backbone.Model.extend({
      urlRoot: '/index.php?app=storeinterpose&act=member_community_comments',
      url: function() {
        var base;
        base = _.result(this, 'urlRoot') || _.result(this.collection, 'url');
        if (this.isNew()) {
          return base;
        }
        return base.replace(/([^\/])$/, '$1&') + ('id=' + encodeURIComponent(this.id));
      },
      removeComment: function(e, id, type) {
        var self;
        self = this;
        return $.post('/index.php?app=storeinterpose&act=member_community_comments_del_comment', {
          id: id,
          type: type
        }, function(d) {
          if (d >= 0) {
            if (type !== 1) {
              self.destroy();
            } else {
              self.fetch();
            }
            return alert('删除成功！');
          } else {
            return alert('删除失败，请联系网站管理员！');
          }
        });
      },
      reply: function(e, cnt) {
        var self;
        self = this;
        if (!cnt) {
          alert('请输入评论内容！');
          return;
        }
        return $.post('/index.php?app=storeinterpose&act=member_community_comments_reply', {
          cnt: cnt,
          id: self.get('id')
        }, function(d) {
          if (d >= 0) {
            self.fetch();
            return alert('回复成功！');
          } else {
            return alert('回复失败，请联系网站管理员！');
          }
        });
      }
    });
    CommentCollection = Backbone.Collection.extend({
      model: CommentModel,
      url: '/index.php?app=storeinterpose&act=member_community_comments'
    });
    commentList = new CommentCollection;
    CommentAppView = Backbone.View.extend({
      el: $('#comment_list'),
      initialize: function() {
        this.listenTo(commentList, 'add', this.addOne);
        return commentList.fetch();
      },
      addOne: function(m) {
        var view;
        view = new CommentView({
          model: m
        });
        return this.$el.append(view.el);
      }
    });
    return new CommentAppView;
  };

}).call(this);
