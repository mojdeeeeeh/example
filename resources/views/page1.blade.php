@extends('layouts.app')

@section('content')
<div id="root" class="container">
    <h1 :class="className">hello world</h1>
    <ul>
        <li v-for="name in names" v-text="name">
        </li>
    </ul>
        <input type="text" id="input" v-model="newName">
        <button @click="addName">Add Name</button>
        <br/>
        <button @click="method" :title="title" >hover over me</button>
        <button :class="{ 'is_loading': isLoading }" @click="toggleClass"> click me</button>
        <p v-text="new Date()"></p>
        <hr/>
        <h2>all tasks</h2>
        <ul>
            <li v-for="task in tasks" v-text="task.description"></li>
        </ul>
        <h2>incomplete tasks</h2>
        <ul>
            <li v-for="task in incompleteTasks" v-text="task.description"></li>
        </ul>

  

</div>
@endsection

@section('scripts')
<script type="text/javascript">
    new Vue({
        el: '#root',
        data: {
            foo: 'bar',
            names: ['joe','mary','jone'],
            title: 'now the title is being set throught javascript',
            className: 'color_red',
            isLoading: false,
            tasks:[
                {description: 'go to store', completed: true},
                {description: 'go to home', completed: false},
                {description: 'go to word', completed: true},
                {description: 'go to ...', completed: false},
            ]
        },

        computed:{
            incompleteTasks(){
                return this.tasks.filter(task => !task.completed);
            }

        },

        methods:{
            addName(){
                this.names.push(this.newName);
                this.newName= '';
            },
            toggleClass(){
                this.isLoading = true;
            }
        },
        });

        

   
</script>
@endsection
