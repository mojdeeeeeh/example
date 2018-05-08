<div class="card">
    <div class="card-header">
        Create Book
    </div>

    <div class="card-body">
        <div class="form-group row" >
            <label for="name" class="col-md-4 col-form-label text-md-right">
            	Title
            </label>

            <div class="col-md-6">
                <input type="text" class="form-control" data-vv-delay="1000"
                    :class="{'input': true, 'is-danger': errors.has('title') }"
                    v-validate="'required|min:3|max:15'" name="title"
                    v-model="book.title"  autofocus />
            </div>
        </div>

        <div class="form-group row" >
            <label for="name" class="col-md-4 col-form-label text-md-right">
            	Body
            </label>

            <div class="col-md-6">
                <input type="text"
                	class="form-control"
                	v-model="book.body" 
                    name="body"/>
            </div>
        </div>

        <div class="form-group row" >
            <label for="name" class="col-md-4 col-form-label text-md-right">
                Start
            </label>
<!--             <pdatepicker v-model='date' v-on:selected="dateSelectedEvent"></pdatepicker>
 -->            <div class="col-md-6">
                <input type="text" 
                    class="example1"
                    v-model="book.start" />
                   
            </div>
        </div>

        <div class="form-group row" >
            <label for="name" class="col-md-4 col-form-label text-md-right">
                Finish
            </label>

            <div class="col-md-6">
                <input type="text"
                    class="form-control"
                    v-model="book.finish" 
                    name="finish_time" 
                    id="finish_time" />
            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <input type="submit" class="btn btn-primary" value="Create" @click="createBook" />
                <input type="button" class="btn btn-danger" value="Cancel" @click="cancel" />
            </div>
        </div>
    </div>
</div>
