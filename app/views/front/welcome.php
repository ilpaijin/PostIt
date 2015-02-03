<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='Good questions and Answers' name='description'/>
    <meta content='Questions,Answers,Solutions,Improvements,talk,discussions' name='keywords'/>
    <meta content='Ilpaijin' name='Author'/>
    <meta content='ilpaijin@gmail.com' name='Email'/>
    <meta content='all' name='robots'/>
    <meta content='index, follow' name='robots'/>
    <meta content='english' name='language'/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:domain" content="postis-local">
    <meta property="og:type" content="website">
    <meta property="og:image" itemprop="image primaryImageOfPage" content="images.postis-local/answers.png">
    <meta name="twitter:title" property="og:title" itemprop="title name" content="PostIt">
    <meta name="twitter:description" property="og:description" itemprop="description" content="Q&amp;A for everyone, about everything">
    <meta property="og:url" content="http://stackoverflow.com/">
    <title>PostIt - What's the post you've liked the most?</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/posts.css">
    <link rel="stylesheet" href="/css/posts.css">
    <link rel="stylesheet" href="/css/datepicker.css">
</head>
<body>
    {% include 'front/sections/nav.php' ignore missing %}

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

                {% include 'front/sections/postsfeed.php' ignore missing %}

            </div>

            <!-- Sidebar -->
            <div class="col-md-4">

                {% include 'front/sections/sidebar.php' ignore missing %}

            </div>

        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © <a href="https://github.com/ilpaijin/PostIt">ilpaijin</a></p>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="/js/login.js"></script>
    <script src="/js/posts.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>>
</body>
</html>
