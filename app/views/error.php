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

                    <h2>Error!</h2>
                    <p>
                        {{status}}
                    </p>

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

</body>
</html>
