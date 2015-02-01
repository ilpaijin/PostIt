{% if user %}
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
{% endif %}
<div class="well">
    <h3>Mr. Postman</h3>
    <div class="wall">
        <p>
            Cheese strings jarlsberg cheesy grin. Swiss cheesy feet cheese strings halloumi halloumi cheese slices parmesan queso. Taleggio cheese slices pecorino camembert de normandie hard cheese mozzarella stilton cheese and biscuits. Feta mascarpone emmental boursin cheese strings.
        </p>

        <p>
            Say cheese fromage manchego. Say cheese the big cheese macaroni cheese fondue ricotta brie cow croque monsieur. Cheese triangles cheese triangles cheese triangles melted cheese cheesecake rubber cheese fromage frais croque monsieur. Hard cheese cheese and biscuits parmesan.
        </p>

        <p>
            Everyone loves brie ricotta. Swiss edam everyone loves stinking bishop cheesecake emmental cheese and biscuits rubber cheese. Feta blue castello cow cream cheese stilton cheese triangles goat cheesy feet. Say cheese.
        </p>
    </div>
</div>
