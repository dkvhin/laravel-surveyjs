<template>
    <div>
        <survey-builder :json="survey.json" :id="survey.id" v-if="Object.keys(survey).length"></survey-builder>
    </div>
</template>

<script>
    import SurveyBuilder from './../components/SurveyBuilder'

    export default {
        components: {
            SurveyBuilder
        },
        data () {
            return {
                survey: {},
                surveyName: '',
                nameField: false,

            }
        },
        mounted() {
            this.getSurvey(this.$route.params.id);
        },
        methods: {
            getSurvey(id) {
                axios.get('/survey/' + id)
                    .then((response) => {
                        this.survey = response.data.data;
                        this.surveyName = response.data.data.name;
                    })
                    .catch((error) => {
                        console.log(error.response)
                    })
            },
            onCancelEdit() {
                this.nameField = false;
                this.surveyName = this.survey.name;
            },
            postEdit() {
                axios.put('/survey/' + this.survey.id, {name: this.surveyName})
                    .then((response) => {
                        this.nameField = false;
                        this.$root.snackbarMsg = response.data.message;
                        this.$root.snackbar = true;
                    })
                    .catch((error) => {
                        console.error(error.response);
                    })
            }
        }
    }
</script>