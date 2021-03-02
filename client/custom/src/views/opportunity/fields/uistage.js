define('custom:views/opportunity/fields/uistage', 'custom:views/fields/uistage', function (Dep) {

   return Dep.extend({

        setup: function () {
            Dep.prototype.setup.call(this);
            // some initialization
            this.stageSelect();   
        },

        afterRender: function () {
            Dep.prototype.afterRender.call(this);
            // your customizations executed after the field is rendered
            this.stageSelect();      
        },

        stageSelect() {
            var arrayStage = this.getMetadata().get('entityDefs.Opportunity.fields.stage.options');

            this.model.attributes.uistage = [];

            for (var i = 0; i < arrayStage.length; ++i) {
               this.model.attributes.uistage[i] = false;
            }

            var keyStage = arrayStage.indexOf(this.model.attributes.stage);

            this.model.attributes.uistage[keyStage] = true;

            for (var i = 0; i < keyStage; ++i) {
               this.model.attributes.uistage[i] = true;
            }
        },
    });
});