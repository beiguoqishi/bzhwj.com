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
    var App, AppView, AppointmentDetailView, AppointmentList, AppointmentModel, AppointmentView, appoiList;
    Backbone.emulateHTTP = true;
    AppointmentModel = Backbone.Model.extend({
      url: function() {
        var base;
        base = _.result(this, 'urlRoot') || _.result(this.collection, 'url');
        if (this.isNew()) {
          return base;
        }
        return base.replace(/([^\/])$/, '$1&') + ('id=' + encodeURIComponent(this.id));
      }
    });
    AppointmentDetailView = Backbone.View.extend({
      el: '#item_detail',
      template: _.template($('#item_detail_tpl').html()),
      initialize: function() {
        return this.render();
      },
      render: function() {
        this.$el.html(this.template(this.model.toJSON()));
        return $('#item_detail_modal').modal({
          keyboard: false
        });
      },
      events: {
        'click button.save': 'save'
      },
      save: function() {
        var item, params, vals, _i, _len;
        params = this.$el.find('input,textarea,select').serialize().split('&');
        vals = {};
        for (_i = 0, _len = params.length; _i < _len; _i++) {
          item = params[_i];
          vals[item.split('=')[0]] = decodeURIComponent(item.split('=')[1]);
        }
        return this.model.save(vals, {
          patch: true,
          success: function(model, res, options) {
            if (res < 0) {
              model.set(model.previousAttributes());
              return alert('保存失败，请联系网站管理员！');
            } else {
              alert('保存成功！');
              return $('#item_detail_modal').modal('hide');
            }
          },
          error: function() {}
        });
      }
    });
    AppointmentView = Backbone.View.extend({
      tagName: 'li',
      className: 'list-group-item',
      template: _.template($('#appointment_item_tpl').html()),
      initialize: function() {
        this.listenTo(this.model, 'change', this.change);
        return this.listenTo(this.model, 'destroy', this.destroy);
      },
      render: function() {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
      },
      events: {
        'click a.a-tle,a.view': 'viewItem',
        'click a.remove': 'remove'
      },
      change: function(model) {
        if ((model.changed != null) && (model.changed.hasOwnProperty('name') || model.changed.hasOwnProperty('address'))) {
          return this.render();
        }
      },
      viewItem: function(e) {
        var self;
        self = this;
        return new AppointmentDetailView({
          model: self.model
        });
      },
      remove: function() {
        var collection;
        collection = this.model.collection;
        if (confirm('您确定要删除' + this.model.get('name') + '的预约体验单吗？')) {
          return this.model.destroy({
            wait: true,
            success: function(model, res) {
              if (res < 0) {
                if (collection != null) {
                  collection.fetch({
                    reset: true
                  });
                }
                alert('删除失败，请联系网站管理员！');
              } else {
                return alert('删除成功');
              }
            }
          });
        }
      }
    });
    AppointmentList = Backbone.Collection.extend({
      url: 'index.php?app=storeinterpose&act=appointment_list',
      model: AppointmentModel
    });
    appoiList = new AppointmentList;
    AppView = Backbone.View.extend({
      el: '.main',
      initialize: function() {
        this.listenTo(appoiList, 'add', this.addOne);
        this.listenTo(appoiList, 'destroy', this.destroy);
        this.listenTo(appoiList, 'reset', this.reset);
        return appoiList.fetch({
          success: function(coll, res, options) {
            if (coll.length === 0) {
              return $('#no_appointment_tip').show();
            }
          }
        });
      },
      render: function() {
        this.$('#appointment_list').empty();
        return appoiList.each(this.addOne, this);
      },
      addOne: function(item) {
        var view;
        view = new AppointmentView({
          model: item
        });
        return this.$('#appointment_list').append(view.render().el);
      },
      destroy: function() {
        return this.render();
      },
      reset: function() {
        return this.render();
      }
    });
    return App = new AppView;
  };

}).call(this);
