window.PATH = {
    BASEURL:'/themes/resource/js/'
};

require.config({
    baseUrl: window.PATH.BASEURL,
    shim:{
        bootstrap: {deps:['backbone']}
    },
    paths:{
        bootstrap:'bootstrap/js/bootstrap'
    }
});

require(['bootstrap'],function(bootstrap){
    execute(Backbone);
});

function execute(Backbone) {
    var StoreCollection = new Backbone.Collection(window.store_list);
    var StoreView = Backbone.View.extend({
        tagName:'li',
        className:'list-group-item',
        template: _.template($('#store_item').html()),
        render: function() {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });
    var AppView = Backbone.View.extend({
          addOne: function(store) {
              var view = new StoreView({model:store});
              this.$('.store-list').append(view.render().el);
          },
          render: function() {
              StoreCollection.each(this.addOne);
          },
          initialize: function() {
              this.render();
          }
    });
    new AppView();
}