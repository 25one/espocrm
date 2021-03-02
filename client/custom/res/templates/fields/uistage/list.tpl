{{#each this.model.attributes.uistage}}
{{#if this}}
<div class="d-inline-block uistage-loader uistage-loader-gold"></div>
{{else}}
<div class="d-inline-block uistage-loader uistage-loader-lightgray"></div>
{{/if}}
{{/each}}

