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

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            {% if current_page < (posts_count.count-1) %}
            <a href="/p/{{current_page+1}}">←  Older</a>
            {% else %}
            <span>←  Older</span>
            {% endif %}
        </li>
        <li class="next">
            {% if current_page > 0  %}
            <a href="{% if current_page == 1 %} / {% else %} /p/{{current_page-1}} {% endif %}">Newer →</a>
            {% else %}
            <span>Newer →</span>
            {% endif %}
        </li>
    </ul>
{% else %}
        <h3>Write the first post!</h3>
{% endif %}
