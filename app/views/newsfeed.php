<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PostIt - What's the post you've liked the most?</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">

                <div id="login">

                    <div id="login-account" class="login-ui pull-right account">
                            <img id="account-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=36"
                        alt="">
                        {% if user %}
                            <span> {{ user.username }} </span>
                        {% else %}
                            <a class="toggle-form" href="#" rel="nofollow">Login</a>
                        {% endif %}
                    </div>
                    <div id="login-form" class="login-ui">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-md-offset-4">
                                <h1 class="text-center login-title">
                                    Log in to create your answer or
                                    <a class="toggle-form" href="#" rel="nofollow">close</a>
                                </h1>
                                <div class="account-wall">
                                    <h4 class="response"></h4>
                                    <img id="login-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                                    alt="">
                                    <form class="form-signin"  method="POST" action="/login">
                                        <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
                                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                        <label class="checkbox pull-left">
                                            <input type="checkbox" value="remember-me">
                                            Remember me
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">PostIt</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/contact" rel="nofollow">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="jumbotron">
            <div class="container">
                <h1>What's the post you've liked the most?</h1>
                <p>
                    <img src="/images/answers.png" alt="PostIt - the right answer to your question" />
                    For each good question there's always the right answer, and you can find it here.
                </p>
            </div>
        </div>
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                    <h1 class="page-header">
                        A good Questions
                        <small>deserve a good answer!</small>
                    </h1>

                    {% for post in posts %}
                        <h2>
                            <a href="#">{{ post.title }}</a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php">{{ post.author_id }}</a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> {{ post.date_created }}</p>
                        <hr>
                        <img class="img-responsive" src="{{  post.image }}" alt="">
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
                            <a href="#">← Older</a>
                        </li>
                        <li class="next">
                            <a href="#">Newer →</a>
                        </li>
                    </ul>

                </div>

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">

                    <!-- Side Widget Well -->
                    <div class="well">
                        <h4>Side Widget Well</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                    </div>

                </div>

            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright © Your Website 2014</p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->
    </body>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script>

        $(document).ready( function() {

            var loginForm = $('.form-signin');

            $('.toggle-form').click(function() {
                $(this).toggle();
                $('.toggle-form').not(this).show();
                loginForm.parents('#login-form').toggle();
            });

            loginForm.submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "/login",
                    data: loginForm.serialize(),
                    success: function(data) {
                        loginForm.parents('#login-form').hide();
                        $('#login-account').append(data.username).fadeIn();
                    },
                    error: function(xhr, reason, status) {
                        loginForm.siblings('.response').html(status);
                    }
                });
            });
        });
    </script>
</body>
</html>
