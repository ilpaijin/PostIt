{% for post in posts %}
    <h2>
        <a href="#">{{ post.title }}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{ post.author }}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> {{ post.date_created }}</p>
    <hr>
    <img class="img-responsive" src="{{ img_path }}{{ post.image_name }}" alt="{{ post.image_name}}" title="{{post.image_title}}">
    <hr>
    <p>{{  post.body }}</p>
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>
{% endfor %}
