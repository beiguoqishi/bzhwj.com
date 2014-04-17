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
    var MemberItemView, MemberList, MemberListView, MemberModel;
    Backbone.emulateHTTP = true;
    MemberModel = Backbone.Model.extend({
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
      initialize: this.render(),
      render: function() {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
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
      el: $('.member-list'),
      initialize: function() {
        this.member_list = new MemberList;
        this.listenTo(this.member_list, 'add', this.addOne);
        return this.member_list.fetch();
      },
      events: {
        'click #auth_member': 'auth_member'
      },
      auth_member: function() {
        var val;
        val = $.trim($('#member_username').val());
        if (!val) {
          alert('请您输入用户名！');
          return;
        }
        return this.member_list.create({
          user_name: val
        });
      },
      addOne: function(item) {
        var member;
        member = new MemberItemView({
          model: item
        });
        return this.$el.find('tbody').append(member.el);
      }
    });
    return new MemberListView;
  };

}).call(this);