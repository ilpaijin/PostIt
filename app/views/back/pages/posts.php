<h1 class="page-header">Posts</h1>
<h3>Posts list</h3>

{% if posts %}

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                {% for post in posts %}

                    <tr>
                        <td>
                            {{post.id}}
                        </td>
                        <td>
                            {% if(date(post.published) < date('now')) %}
                                <span class="label label-success">Online</span>
                            {% else %}
                                <span class="label label-warning">Pending</span>
                            {% endif %}
                        </td>
                        <td>{{ post.author}}</td>
                        <td>{{ post.title}}</td>
                        <td>{{ post.date_created}}</td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
    
{% endif %}

<hr>
<h3>Post it now!</h3>
{% include 'generic/sections/posts.php' %}
