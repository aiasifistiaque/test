<template>
    <div class="container">
        <br><h2>All Questions: View or Delete</h2> <hr><br>
        <div v-if="loading==true">
            <h1 class="text-center">Loading....</h1>
        </div>
        <div v-for="question in questions" v-bind:key="question.id">
            <h3>{{question.id}}: {{question.question}}</h3>
            <p>A: {{question.optionOne}}</p>
            <p>B: {{question.optionTwo}}</p>
            <p>B: {{question.optionThree}}</p>
            <p>D: {{question.optionFour}}</p>
            <br>
            <p>Correct Answer: {{question.answer}}</p>
            <button class="btn btn-success">Edit Question</button>
            <button class="btn btn-danger">Delete Question</button>
            <br><br><hr>
        </div>
    </div>
</template>
<script>
export default {
    data:function(){
        return{
            questions:[],
            loading:''
        }
    },
    created(){
        this.fetch_questions();
        this.loading = true;
    },
    methods:{
        fetch_questions(){
            fetch('/api/questionsapi')
                .then(res => res.json())
                .then(res => {
                    this.questions = res.data;
                    this.loading = false;
                    //this.totalQuestions = this.questions.length;
                    
            })
        },

    }
}
</script>