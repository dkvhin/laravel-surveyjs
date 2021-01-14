require("./base")

window.Vue = require("vue")

Vue.component('survey-show', require('./components/SurveyShow.vue').default)

new Vue({
    el:'#survey-front'
});