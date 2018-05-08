@extends('layouts.app')

@section('content')

<div id="app3" class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


            {{-- Create form --}}
            <div v-show="isCreateMode">
                @include('books.create')
            </div>

            {{-- index --}}
            <div class="card-body">
                {{-- Header --}}
                <div v-show="! hasBook">
                    No any Book exists.
                </div>
                {{-- /Header --}}

                <div class="list-group" v-show="isNormalMode">
                    <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading"> Books List </h4>
                        <a class="btn btn-info pull-right" href="#" @click="showCreateForm">
                            Create Book
                        </a>
                        <p class="list-group-item-text"></p>
                        
                    </a>
                    <div v-for="book in books" class="list-group-item">
                        <a href="#" @click.prevent="showBook(book)">
                            <h4 class="list-group-item-heading"> @{{ book.title }}</h4>
                        </a>

                        <p class="list-group-item-text">
                            Start Book in: @{{ book.start }} &nbsp; &nbsp;
                            Finish Book in: @{{ book.finish }} &nbsp; &nbsp;
                            
                           

                            <a class="btn btn-danger pull-right Button" href="#" data-record-id="book.id" @click="deleteBook(book)">&times;</a>
                            <a class="btn btn-primary pull-right Button" href="#" data-record-id="book.id" @click="showUpdateForm(book)">&plus;</a>

                            
                        </p>
                    </div>
                </div>
               
            </div>
        </div>
        @endsection


        @section('scripts')
        <script type="text/javascript">
        Vue.use(VeeValidate);


        const C_FORM_MODE_NORMAL = 0;
        const C_FORM_MODE_SHOW = 1;
        const C_FORM_MODE_UPDATE = 2;
        const C_FORM_MODE_CREATE = 3;

        new Vue({
            el: '#app3',

            data: {
                book: {},
                books: [],
                formMode: 0,
            },

            computed: {
                hasBook: state => state.books.length > 0,
                isNormalMode: state => state.formMode == C_FORM_MODE_NORMAL,
                isShowMode: state => state.formMode == C_FORM_MODE_SHOW,
                isUpdateMode: state => state.formMode == C_FORM_MODE_UPDATE,
                isCreateMode: state => state.formMode == C_FORM_MODE_CREATE,
            },

                mounted() {
                    this.loadBooks();
                },

            methods: {


                /**
                 * Load books data from server
                 */
                loadBooks() {
                    Axios.get('{{ route('books.index') }}')
                        .then(res => {
                            this.books = res.data;
                        })
                        .catch(err => {
                            alert(err.message);
                        });
                },
                   

                /**
                 * Load book data from server
                 */
                showBook(book) {
                    this.currentBook = book;
                    this.formMode = 1;
                },

                showUpdateForm(book) {
                    this.book = book;
                    this.formMode = 2;
                },

                cancel() {
                    this.formMode = 0;
                },

                /**
                 * New book data
                 * @return {[type]} [description]
                 */
                showCreateForm() {
                    this.book = {
                        title: '',
                        body: '',
                        start: '',
                        finish: '',
                    };

                    this.formMode = 3;
                },

                /**
                 * Update current book data
                 */
                updateBook() {
                    Axios.put('{{ route('books.update', '') }}/' + this.book.id, this.book)
                        .then(res => {
                            alert('Updated');
                        })
                        .catch(err => {
                            alert(err.message);
                        });
                    this.formMode = 0;
                },

                /**
                 * Create a new book
                 */
                createBook() {
                    this.$validator.validate()
                        .then(res => {
                            if (! res){
                                alert ('error');

                                return;
                            }

                            Axios.post('{{ route('books.store') }}', this.book)
                                .then(res => {
                                    this.books.push (res.data);

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
                 * Delete current Book data
                 * @return {[type]} [description]
                 */
                deleteBook(book) {
                    let confirmed = confirm('Are you sure to delete the Book?');

                    if (!confirmed) {
                        return;
                    }

                    Axios.delete('{{ route('books.destroy', '') }}/' + book.id)
                        .then(res => {
                            let index = this.books.map(el => el.id)
                                .indexOf(book.id);

                            this.books.splice(index, 1);

                            this.formMode = 0;
                        })
                        .catch(err => {
                            alert(err.message);
                        });
                },
            }
        });

 // $(document).ready(function() {
 //    $(".example1").pDatepicker();
 //  });
        
//         $('.observer-example').persianDatepicker({
//     observer: true,
//     format: 'YYYY/MM/DD',
//     altField: '.observer-example-alt'
// });

new persianDate().format();
$(document).ready(function() {
    $(".example1").pDatepicker();
  });

        </script>
@endsection
