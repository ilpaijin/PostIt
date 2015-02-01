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

        {% include 'nav.php' ignore missing %}

        <div class="jumbotron">
            <div class="container">
                <h1>What's the answer you've liked most?</h1>
                <p>
                    <img src="/images/answers.png" alt="PostIt - the right answer to your question" />
                    For each good question there's always the right answer, and you can find it here.
                </p>
            </div>
        </div>
        <div class="container">

            <div class="row">

                <!-- Blog Entries -->
                <div class="col-md-8">

                    <h1 class="page-header">
                        A good Question
                        <small>deserve a good Answer!</small>
                    </h1>

                    {% include 'postsfeed.php' ignore missing %}

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

                </div>

                <!-- Sidebar -->
                <div class="col-md-4">

                    {% include 'sidebar.php' ignore missing %}

                </div>

            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright © <a href="https://github.com/ilpaijin/PostIt">ilpaijin</a></p>
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

            var postsForm = $('.form-create-posts');

            postsForm.submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "/posts",
                    data: $(this).serialize(),
                    success: function(data) {
                        console.info(data);
                        if (data.response) {
                            location.reload();
                        }
                    },
                    error: function(xhr, reason, status) {
                        console.info(xhr);
                        // loginForm.siblings('.response').html(status);
                    }
                });
            });

            function readImage(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#preview_post_image').show().find('img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);

                    $.ajax({
                        type: 'POST',
                        url: "/files",
                        contentType: false,
                        cache: false,
                        processData:false,
                        data: new FormData(postsForm[0]),
                        success: function(data) {
                            $('#post_image_preview').remove();
                            postsForm.append('<input type="hidden" id="post_image_preview" name="post_image_preview" value="'+data+'">');
                        },
                        error: function(xhr, reason, status) {
                            console.info(xhr);
                        }
                    });
                }
            }

            $("#post_image").change(function(){
                readImage(this);
            });
        });
    </script>
</body>
</html>
