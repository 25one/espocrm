define('custom:views/fields/uistage', 'views/fields/base', function (Dep) {

    return Dep.extend({

        detailTemplate: 'custom:fields/uistage/detail',
        listTemplate: 'custom:fields/uistage/list',
        editTemplate: 'custom:fields/uistage/edit',
        //searchTemplate: 'custom:fields/uistage/search',

        setup: function () {

        },

        afterRender: function () {

        },
    });
});