define('custom:ToWord', ['action-handler'], function (Dep) {

   return Dep.extend({

        actionSomeName: function (data, e) {
            Espo.Ajax.getRequest('Opportunity/word/' + this.view.model.id + '/' + localStorage.getItem('template')).then(function (response) {
                console.log(localStorage.getItem('template'));
                if (response === true) alert('Document is ready');
                else alert('There is a error of document creating');
            });            
        },

        initSomeName: function () {
            this.controlButtonVisibility();
            this.view.listenTo(
                this.view.model, 'change:status', this.controlButtonVisibility.bind(this)
            );
        },

        controlButtonVisibility: function () {
            if (~['Converted', 'Dead', 'Recycled'].indexOf(this.view.model.get('status'))) {
                this.view.hideHeaderActionItem('someName');
            } else {
                this.view.showHeaderActionItem('someName');
            }
        },
   });
});