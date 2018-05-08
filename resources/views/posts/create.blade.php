<div class="card">
    <div class="card-header">
        Create post
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
                    v-model="post.title"  autofocus />
            </div>
        </div>

        <div class="form-group row" >
            <label for="name" class="col-md-4 col-form-label text-md-right">
            	Body
            </label>

            <div class="col-md-6">
                <input type="text"
                	class="form-control"
                	v-model="post.body" 
                    name="body"/>
            </div>
        </div>

        <div class="form-group row" >
            <label for="name" class="col-md-4 col-form-label text-md-right">
                Start
            </label>

            <div class="col-md-6">
                <input type="text" 
                    id="input1"
                    class="form-control"
                    v-model="post.start"/>
                    <span id="span1"></span>
            </div>
        </div>

        <div class="form-group row" >
            <label for="name" class="col-md-4 col-form-label text-md-right">
                Finish
            </label>

            <div class="col-md-6">
                <input type="text"
                    class="form-control"
                    v-model="post.finish" 
                    name="finish_time" 
                    id="input1" />
                <span id="span1"></span>
            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <input type="submit" class="btn btn-primary" value="Create" @click="createPost" />
                <input type="button" class="btn btn-danger" value="Cancel" @click="cancel" />
            </div>
        </div>
    </div>
</div>
