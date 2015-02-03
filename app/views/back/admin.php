<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <title>PostIt - Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/posts.css">
</head>
<body>

    {% include 'front/sections/nav.php' %}

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li {% if page == '' %} class="active" {% endif %}>
                        <a href="/admin">Dashboard </a>
                    </li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li {% if page == 'posts' %} class="active" {% endif %}>
                        <a href="/admin/posts">Posts</a>
                    </li>
                    <li {% if page == 'users' %} class="active" {% endif %}>
                        <a href="/admin/users">Users</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                {% if page %}
                    {% include "back/pages/#{page}.php"  ignore missing %}
                {% else %}
                    <h1 class="page-header">Dashboard</h1>
                {% endif %}

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="/js/login.js"></script>
    <script src="/js/posts.js"></script>
</body>
</html>
