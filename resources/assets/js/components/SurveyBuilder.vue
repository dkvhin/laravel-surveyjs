<template>
    <div>
        <div id="surveyEditorContainer">
        </div>
    </div>
</template>


<script>
    import * as SurveyCreator from 'survey-creator'
    import 'survey-creator/survey-creator.css';

    export default {
        name: 'survey-builder',
        props: ['json', 'id'],
        data () {
            return {
                surveyData: this.json,
                surveyId: this.id
            }
        },
        mounted () {
            let editorOptions = SurveyConfig.builder;
            SurveyCreator.StylesManager.applyTheme(SurveyConfig.builder.theme);
            this.editor = new SurveyCreator.SurveyCreator('surveyEditorContainer', editorOptions);
            if(SurveyConfig.onSurveyBeforeBuild) {
                SurveyConfig.onSurveyBeforeBuild(this.editor);
            }
            this.editor.text = JSON.stringify(this.surveyData);
            
            if(SurveyConfig.onSurveyBuilderCompleted) {
                SurveyConfig.onSurveyBuilderCompleted(this.editor);
            }
            var self = this;
            this.editor.saveSurveyFunc = function () {
                if(!SurveyConfig.saveSurveyCallBack) {
                    axios.put('/survey/' + self.id, {json: JSON.parse(this.text)})
                        .then((response) => {
                            self.editor.text = JSON.stringify(response.data.data.json);
                            self.$root.snackbar = true;
                            self.$root.snackbarMsg = response.data.message;
                        })
                        .catch((error) => {
                            console.error(error.response);
                        })
                } else {
                    SurveyConfig.saveSurveyCallBack(self.id, JSON.parse(this.text));
                }
               
            };
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
    .btn-primary {
        background-color: #1976d2 !important
    }
</style>