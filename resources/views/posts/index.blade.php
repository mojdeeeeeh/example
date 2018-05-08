@extends('layouts.app')

@section('content')

<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


            {{-- Create form --}}
            <div v-show="isCreateMode">
                @include('posts.create')
            </div>

            {{-- index --}}
            <div class="card-body">
                {{-- Header --}}
                <div v-show="! hasPost">
                    No any Post exists.
                </div>
                {{-- /Header --}}

                <div class="list-group" v-show="isNormalMode">
                    <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading"> posts List </h4>
                        <a class="btn btn-info pull-right" href="#" @click="showCreateForm">
                            Create Post
                        </a>
                        <p class="list-group-item-text"></p>
                        
                    </a>
                    <div v-for="post in posts" class="list-group-item">
                        <a href="#" @click.prevent="showPost(post)">
                            <h4 class="list-group-item-heading"> @{{ post.title }}</h4>
                        </a>

                        <p class="list-group-item-text">
                            Start post in: @{{ post.start }} &nbsp; &nbsp;
                            Finish post in: @{{ post.finish }} &nbsp; &nbsp;
                            
                           

                            <a class="btn btn-danger pull-right Button" href="#" data-record-id="post.id" @click="deletePost(post)">&times;</a>
                            <a class="btn btn-primary pull-right Button" href="#" data-record-id="post.id" @click="showUpdateForm(post)">&plus;</a>

                            
                        </p>
                    </div>
                </div>
               
            </div>
        </div>
        @endsection


        @section('scripts')

         <script src="{{ asset('js/main.js') }}"></script>


            <script src="node_modules/moment/moment.js"></script>
            <script src="node_modules/moment-jalaali/build/moment-jalaali.js"></script>
            <script>
                var moment = require('moment-jalaali');
                moment().format('jYYYY/jM/jD');
                


        Vue.use(VeeValidate);


        const C_FORM_MODE_NORMAL = 0;
        const C_FORM_MODE_SHOW = 1;
        const C_FORM_MODE_UPDATE = 2;
        const C_FORM_MODE_CREATE = 3;

        new Vue({
            el: '#app',

            data: {
                post: {},
                posts: [],
                formMode: 0,
            },

            computed: {
                hasPost: state => state.posts.length > 0,
                isNormalMode: state => state.formMode == C_FORM_MODE_NORMAL,
                isShowMode: state => state.formMode == C_FORM_MODE_SHOW,
                isUpdateMode: state => state.formMode == C_FORM_MODE_UPDATE,
                isCreateMode: state => state.formMode == C_FORM_MODE_CREATE,
            },

                mounted() {
                    this.loadPosts();
                },

            methods: {


                /**
                 * Load posts data from server
                 */
                loadPosts() {
                    Axios.get('{{ route('posts.index') }}')
                        .then(res => {
                            this.posts = res.data;
                        })
                        .catch(err => {
                            alert(err.message);
                        });
                },
                   

                /**
                 * Load Post data from server
                 */
                showPost(post) {
                    this.currentPost = post;
                    this.formMode = 1;
                },

                showUpdateForm(post) {
                    this.post = post;
                    this.formMode = 2;
                },

                cancel() {
                    this.formMode = 0;
                },

                /**
                 * New Post data
                 * @return {[type]} [description]
                 */
                showCreateForm() {
                    this.post = {
                        title: '',
                        body: '',
                        start: '',
                        finish: '',
                    };

                    this.formMode = 3;
                },

                /**
                 * Update current Post data
                 */
                updatePost() {
                    Axios.put('{{ route('posts.update', '') }}/' + this.post.id, this.post)
                        .then(res => {
                            alert('Updated');
                        })
                        .catch(err => {
                            alert(err.message);
                        });
                    this.formMode = 0;
                },

                /**
                 * Create a new Post
                 */
                createPost() {
                    this.$validator.validate()
                        .then(res => {
                            if (! res){
                                alert ('error');

                                return;
                            }

                            Axios.post('{{ route('posts.store') }}', this.post)
                                .then(res => {
                                    this.posts.push (res.data);

                                    this.formMode = C_FORM_MODE_NORMAL;

                                    alert('Created');
                                })
                                .catch(err => {
                                    let eCode = err.response.status;

                                    if (eCode == 422){
                                        // console.log(err.response.data);

                                        alert(err.response.data.message);
                                    }
                                    else if (eCode == 403){
                                        alert('UnAuthorized');
                                    }
                                });

                            });
                     },

                /**
                 * Delete current Post data
                 * @return {[type]} [description]
                 */
                deletePost(post) {
                    let confirmed = confirm('Are you sure to delete the Post?');

                    if (!confirmed) {
                        return;
                    }

                    Axios.delete('{{ route('posts.destroy', '') }}/' + post.id)
                        .then(res => {
                            let index = this.posts.map(el => el.id)
                                .indexOf(post.id);

                            this.posts.splice(index, 1);

                            this.formMode = 0;
                        })
                        .catch(err => {
                            alert(err.message);
                        });
                },
            }
        });

 

            $(function() {
                $("#input1, #span1").persianDatepicker();       
            });


            $(function() {
                $("#input2, #span2").persianDatepicker();       
            });

        // $(function() {
        //     $("#finish_time").persianDatepicker();       
        // });

       
        
        </script>
@endsection
