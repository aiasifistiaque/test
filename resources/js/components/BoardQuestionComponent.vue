<template>
    <div class="container">
        <br><br>
        <div v-if="quizSubmitted==false">   

            <!-- <p>{{questions}}</p>
            <p>q:{{questions.question}}</p> -->
            <div v-if="loading">
                <h1 class="text-center">LOADING</h1>
            </div>
            <div v-if="loading==false">
                <h2>SSC Exam {{questions[0].subjectCode}}, {{questions[0].boardCode}} board {{questions[0].year}}</h2>
                <hr><br>
                <div v-for="question in questions" v-bind:key="question.id">
                    <div>
                        <h4>{{questions.indexOf(question)+1}}: {{question.question}}</h4>
                        <input type="radio" :id="question.optionOne" :name="question.optionOne" :value="question.optionOne" v-model="selectedAnswer[questions.indexOf(question)]">
                        <label :for="question.optionOne"> A: {{question.optionOne}}</label>
                        <input type="radio" :id="question.optionTwo" :name="question.optionTwo" :value="question.optionTwo" v-model="selectedAnswer[questions.indexOf(question)]">
                        <label :for="questions.optionTwo"> B: {{question.optionTwo}}</label>
                        <input type="radio" :id="question.optionThree" :name="question.optionThree" :value="question.optionThree" v-model="selectedAnswer[questions.indexOf(question)]">
                        <label :for="question.optionThree"> C: {{question.optionThree}}</label>
                        <input type="radio" :id="question.optionFour" :name="question.optionFour" :value="question.optionFour" v-model="selectedAnswer[questions.indexOf(question)]">
                        <label :for="question.optionFour"> D: {{question.optionFour}}</label><br>
                        <span>Selected answer: {{selectedAnswer[questions.indexOf(question)]}} </span><br>
                        <!-- <span>Correct answer: {{question.answer}}</span> -->
                        
                        <br><br>
                    </div>
                </div>
                <!-- <p>check answer: {{checkAnswers}}</p> -->
                <div v-if="checkAnswers==true">

                    <!-- <p>Score: {{score}}</p>
                    <p>{{questions[3]}}</p> -->
                </div>
                <button class="btn btn-primary" v-on:click="submitquiz()">Submit Answers</button><br>
            </div>
        </div>
        <div v-if="quizSubmitted==true && viewAnswers==false">
            <h1 class="text-center">Your Score is:</h1>
            <h3 class="text-center">{{score}}/{{totalQuestions}}</h3>
            <div class="text-ceter">  
                <button class="btn btn-success btn-block" v-on:click="viewAnswers=true">View Answers</button>
                <button class="btn btn-primary btn-block" v-on:click="newQuiz()">Take Another Test</button>
            </div>
        </div>
            <div v-if="viewAnswers == true">
                <br>
                <h5>Score: {{score}}/{{totalQuestions}}</h5>
                <div v-for="question in questions" v-bind:key="question.id">
                    <hr>
                    <h6>Question: {{questions.indexOf(question)+1}}</h6><hr>
                    <div v-if="selectedAnswer[questions.indexOf(question)] != question.answer">
                        <span class="badge badge-danger">Wrong Answer</span><h5>Q:  {{question.question}}</h5>
                        
                    </div>
                    <div v-else-if="selectedAnswer[questions.indexOf(question)] == question.answer">
                        <span class="badge badge-success">Correct Answer</span><h5>Q:  {{question.question}}</h5>

                    </div>
                    
                    <div v-if="selectedAnswer[questions.indexOf(question)]==null">
                        <span class="badge badge-warning">
                            ***this question was not answered 
                        </span>
                    </div>
                        <span class="badge badge-success text-bold">
                            **Correct answer: {{question.answer}}
                        </span>
                    <div v-if="question.answer==question.optionOne || selectedAnswer[questions.indexOf(question)] == question.optionOne">
                        <div v-if="selectedAnswer[questions.indexOf(question)]==question.optionOne && question.answer == selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-success" role="alert">
                                A: {{question.optionOne}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]==question.optionOne && question.answer != selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-danger" role="alert">
                                A: {{question.optionOne}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]!=question.optionOne && question.answer == question.optionOne">
                            <div class="alert alert-success" role="alert">
                                A: {{question.optionOne}}
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div>
                            A: {{question.optionOne}}
                        </div>
                    </div>
                    <div v-if="question.answer==question.optionTwo || selectedAnswer[questions.indexOf(question)] == question.optionTwo">
                        <div v-if="selectedAnswer[questions.indexOf(question)]==question.optionTwo && question.answer == selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-success" role="alert">
                                B: {{question.optionTwo}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]==question.optionTwo && question.answer != selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-danger" role="alert">
                                B: {{question.optionTwo}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]!=question.optionTwo && question.answer == question.optionTwo">
                            <div class="alert alert-success" role="alert">
                                B: {{question.optionTwo}}
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div>
                            B: {{question.optionTwo}}
                        </div>
                    </div>
                    <div v-if="question.answer==question.optionThree || selectedAnswer[questions.indexOf(question)] == question.optionThree">
                        <div v-if="selectedAnswer[questions.indexOf(question)]==question.optionThree && question.answer == selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-success" role="alert">
                                C: {{question.optionThree}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]==question.optionThree && question.answer != selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-danger" role="alert">
                                C: {{question.optionThree}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]!=question.optionThree && question.answer == question.optionThree">
                            <div class="alert alert-success" role="alert">
                                C: {{question.optionThree}}
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div>
                            C: {{question.optionThree}}
                        </div>
                    </div>
                    <div v-if="question.answer==question.optionFour || selectedAnswer[questions.indexOf(question)] == question.optionFour">
                        <div v-if="selectedAnswer[questions.indexOf(question)]==question.optionFour && question.answer == selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-success" role="alert">
                                D: {{question.optionFour}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]==question.optionFour && question.answer != selectedAnswer[questions.indexOf(question)]">
                            <div class="alert alert-danger" role="alert">
                                D: {{question.optionFour}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer[questions.indexOf(question)]!=question.optionFour && question.answer == question.optionFour">
                            <div class="alert alert-success" role="alert">
                                D: {{question.optionFour}}
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div>
                            D: {{question.optionFour}}
                        </div>
                    </div>
                </div>
                <button class="btn btn-link" v-on:click="viewAnswers=false">Go back</button>
                <button class="btn btn-success" v-on:click="newQuiz()">Take a new test</button><br><br>
            </div>
    </div>    
</template>

<script>
export default {
    data:function(){
        return{
            questions:[],
            selectedAnswer:[],
            loading:'',
            i:'',
            score:'',
            checkAnswers:'',
            q:'',
            a:'',
            totalQuestions:'',
            quizSubmitted:'',
            viewAnswers:'',
            subject:'physics',
            board:'dhaka',
            year:2016
        }
    },
    props:{
        userid: Number,
    },
    created(){
        this.fetch_questions();
        this.loading = true;
        this.checkAnswers = true;
        this.quizSubmitted = false;
        this.totalQuestions = 0;
        
    },
    methods:{
        fetch_questions(){
            fetch('/api/question/ssc/'+this.subject+'/'+this.board+'/'+this.year)
                .then(res => res.json())
                .then(res => {
                    this.questions = res.data;
                    this.loading = false;
                    this.totalQuestions = this.questions.length;
                    this.viewAnswers = false;
                    
            })
        },
        newQuiz(){
            this.quizSubmitted = false;
            this.loading = true;
            this.totalQuestions = 0;
            this.viewAnswers = false;
            this.fetch_questions();
        },
        
        submitquiz(){
            this.score = 0;
            let j = 0;
            this.quizSubmitted = true;
            
            for(j=0;j<this.selectedAnswer.length;j++){
                if(this.selectedAnswer[j]==this.questions[j].answer){
                    this.score++;
                }
            }

            },
        viewAnswerFunction(){
            this.viewAnswers = true;
        }

        }
    }
</script>