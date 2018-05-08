Vue.component('task-list',{
	template:'
		<div>
			<task v-for="task in tasks"> {{ task.task }} </task>
		</div>
	',
	data(){
		return{
			tasks:[
                {description: 'go to store', completed: true},
                {description: 'go to home', completed: false},
                {description: 'go to word', completed: true},
                {description: 'go to ...', completed: false},
            ]
		};
	}
});
new Vue({
	el: '#root2',
});