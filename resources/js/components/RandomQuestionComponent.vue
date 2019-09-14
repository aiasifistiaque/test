<template>
    <div class="container">
        <h3>Random Question</h3>
        <hr>
        <h4>Session Marks: {{sessionMarks}}/{{questionCount}}</h4>
        <div v-if="loading">
            <div>
                <h2>Loading...</h2>
            </div>
        </div>
        <div v-if="loading==false">
            <h4>Question: {{question.question}}</h4><hr>
            <div v-if="submitClicked==false">
                <input type="radio" :id="question.optionOne" :name="question.optionOne" :value="question.optionOne" v-model="selectedAnswer">
                <label :for="question.optionOne"> A: {{question.optionOne}}</label><br>
                <input type="radio" :id="question.optionTwo" :name="question.optionTwo" :value="question.optionTwo" v-model="selectedAnswer">
                <label :for="questions.optionTwo"> B: {{question.optionTwo}}</label><br>
                <input type="radio" :id="question.optionThree" :name="question.optionThree" :value="question.optionThree" v-model="selectedAnswer">
                <label :for="question.optionThree"> C: {{question.optionThree}}</label><br>
                <input type="radio" :id="question.optionFour" :name="question.optionFour" :value="question.optionFour" v-model="selectedAnswer">
                <label :for="question.optionFour"> D: {{question.optionFour}}</label><br>
                <span>Selected answer: {{selectedAnswer}} </span><br>
            </div>
            <div v-else>
                    <div v-if="selectedAnswer!= question.answer">
                        <span class="badge badge-danger">Wrong Answer</span>
                        
                    </div>
                    <div v-else-if="selectedAnswer == question.answer">
                        <span class="badge badge-success">Correct Answer</span>

                    </div>
                    
                    <div v-if="selectedAnswer == null">
                        <span class="badge badge-warning">
                            ***this question was not answered 
                        </span>
                    </div>
                        <span class="badge badge-success text-bold">
                            **Correct answer: {{question.answer}}
                        </span>
                    <div v-if="question.answer==question.optionOne || selectedAnswer == question.optionOne">
                        <div v-if="selectedAnswer==question.optionOne && question.answer == selectedAnswer">
                            <div class="alert alert-success" role="alert">
                                A: {{question.optionOne}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer==question.optionOne && question.answer != selectedAnswer">
                            <div class="alert alert-danger" role="alert">
                                A: {{question.optionOne}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer!=question.optionOne && question.answer == question.optionOne">
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
                    <div v-if="question.answer==question.optionTwo || selectedAnswer == question.optionTwo">
                        <div v-if="selectedAnswer==question.optionTwo && question.answer == selectedAnswer">
                            <div class="alert alert-success" role="alert">
                                B: {{question.optionTwo}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer==question.optionTwo && question.answer != selectedAnswer">
                            <div class="alert alert-danger" role="alert">
                                B: {{question.optionTwo}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer!=question.optionTwo && question.answer == question.optionTwo">
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
                    <div v-if="question.answer==question.optionThree || selectedAnswer == question.optionThree">
                        <div v-if="selectedAnswer==question.optionThree && question.answer == selectedAnswer">
                            <div class="alert alert-success" role="alert">
                                C: {{question.optionThree}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer==question.optionThree && question.answer != selectedAnswer">
                            <div class="alert alert-danger" role="alert">
                                C: {{question.optionThree}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer!=question.optionThree && question.answer == question.optionThree">
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
                    <div v-if="question.answer==question.optionFour || selectedAnswer == question.optionFour">
                        <div v-if="selectedAnswer==question.optionFour && question.answer == selectedAnswer">
                            <div class="alert alert-success" role="alert">
                                D: {{question.optionFour}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer==question.optionFour && question.answer != selectedAnswer">
                            <div class="alert alert-danger" role="alert">
                                D: {{question.optionFour}}
                            </div>
                        </div>
                        <div v-else-if="selectedAnswer!=question.optionFour && question.answer == question.optionFour">
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
            <div v-if="savingQuestion==false">

                <div v-if="submitClicked==false">
                    <button class="btn btn-primary btn-block" v-on:click="submitButton()">Submit</button><br>
                    <!-- <button class="btn btn-primary btn-block">View Answer</button>     -->
                </div>
                <div v-else>
                    <button class="btn btn-primary btn-block" v-on:click="nextQuestionButton()">NextQuestion</button><br>
                </div>
                <button class="btn btn-primary btn-block" v-on:click="saveQuestionButton()">Save Question</button>
            </div>
            <div v-else>
                <p>Saving Question.....</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return{
                loading:'',
                question:{

                },
                questions:[],
                questionArray:[],
                selectedAnswer:'',
                correct:'',
                submitClicked:'',
                sessionMarks:'',
                questionCount:'',
                savingQuestion:'',
                saveData:{}
            }
        },
        props:{
            userid: Number
        },
        created() {
            this.sessionMarks = 0;
            this.questionCount = 0;
            this.loading = true;
            this.savingQuestion = false;
            this.fetchQuestion();
        },
        methods:{
            fetchQuestion(){
                this.submitClicked = false;
                fetch('/api/randomquestion')
                .then(res => res.json())
                .then(res => {
                    this.question = res.data;
                    this.loading = false;
                    //this.totalQuestions = this.questions.length;
                    //this.viewAnswers = false;
                    
            })
            },
            submitButton(){
                this.submitClicked = true;
                this.questionCount++;
                if(this.selectedAnswer == this.question.answer){
                    this.correct = true;
                    this.sessionMarks++;
                }else{
                    this.correct = false;
                }
            },
            nextQuestionButton(){
                this.loading = true;
                this.question={};
                this.fetchQuestion();
                this.submitClicked = false;
                this.correct = false;
                this.selectedAnswer = null;
            },
            saveQuestionButton(){
                this.savingQuestion = true;
                this.saveData.studentid = this.userid;
                this.saveData.questionid = this.question.id;
                axios.post('http://localhost:8000/api/savequestion',this.saveData)
                    .then( response => {
                        this.savingQuestion = false;
                    }, error => {
                        console.log('erro');
                    });  
            }
        }
    }
</script>