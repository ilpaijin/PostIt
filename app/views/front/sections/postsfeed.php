{% if posts %}
    {% for post in posts %}
        <h2>
            #{{ post.id }}
            <a href="#">{{ post.title }}</a>
        </h2>
        <p class="lead">
            by <a href="#">{{ post.author }}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> {{ post.date_created }}</p>
        <hr>
            <img class="img-responsive" src="{{ img_path }}{{ post.image_name | default('no-image') }}" alt="{{ post.image_name | default('no-image') }}" title="{{ post.image_name | default('no-image') }}">

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

    {% include 'front/sections/pager.php' %}

{% else %}
        <h3>Write the first post!</h3>
{% endif %}
