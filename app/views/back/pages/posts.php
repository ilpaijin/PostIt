<h1 class="page-header">Posts</h1>
<div class="well create-posts">
    <h3>Post it now!</h3>
    <div class="create-posts-wall">
        <div class="post-image pull-right">
            <img src="{{ img_path }}post-wall.png" alt="write your post">
        </div>
        <form class="form-create-posts"  method="POST" action="/posts" enctype="multipart/form-data">
            <input name="post_title" id="post_title" type="text" class="form-control" placeholder="title" required autofocus>
            <textarea name="post_body" id="post_body" class="form-control" rows="10" required></textarea>
            <input name="post_image" id="post_image" type="file" accept="image/*" class="form-control">
            <div id="preview_post_image">
                <img class="img" src="#" alt="preview post image">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
        </form>
    </div>
</div>
