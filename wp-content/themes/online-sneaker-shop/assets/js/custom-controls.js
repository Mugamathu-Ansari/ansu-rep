(function(api) {

    api.sectionConstructor['online-sneaker-shop-upsell'] = api.Section.extend({
        attachEvents: function() {},
        isContextuallyActive: function() {
            return true;
        }
    });

})(wp.customize);