@extends('layouts.app')

@section('content')
<div id="root2" class="container">

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
        el: '#root2',
        data:
                tasks:[
                    {description: 'go to store', completed: true},
                    {description: 'go to home', completed: false},
                    {description: 'go to word', completed: true},
                    {description: 'go to ...', completed: false},
                ]
            },
        });

        

   
</script>
@endsection
