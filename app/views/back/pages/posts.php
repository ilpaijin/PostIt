<h1 class="page-header">Posts</h1>
<div class="well create-posts">
    <h3>Post it now!</h3>
    <div class="post-image pull-right">
        <img src="{{ img_path }}post-wall.png" alt="write your post">
    </div>
    <div class="create-posts-wall" style="clear:both">
        <form class="form-create-posts"  method="POST" action="/posts" enctype="multipart/form-data">
            <div class="form-group">
                <label for="post_title">Title</label>
                <input name="post_title" id="post_title" type="text" class="form-control" placeholder="title" required autofocus>
            </div>
            <div class="form-group">
                <label for="post_body">Body</label>
                <textarea name="post_body" id="post_body" class="form-control" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="post_image">Image</label>
                <input name="post_image" id="post_image" type="file" accept="image/*" class="form-control">
            </div>
            <div id="preview_post_image">
                <img class="img" src="#" alt="preview post image">
            </div>
            <div class="form-group">
                <label for="published">Published on</label>

                <div class="input-group col-sm-6">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    </div>
                    <input name="post_published" id="psublished" class="datepicker form-control" type="text" value="{{ now|date('m/d/Y') }}">
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
        </form>
    </div>
</div>
