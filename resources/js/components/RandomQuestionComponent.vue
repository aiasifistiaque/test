<template>
    <div class="container">
        
    </div>
</template>

<script>
    export default {
        data:function(){
            return{

            }
        },
        created() {
            
        },
        methods:{
            fetchQuestion(){
                fetch('/api/question/ssc/'+this.subject+'/'+this.board+'/'+this.year)
                .then(res => res.json())
                .then(res => {
                    this.questions = res.data;
                    this.loading = false;
                    this.totalQuestions = this.questions.length;
                    this.viewAnswers = false;
                    
            })
            }
        }
    }
</script>