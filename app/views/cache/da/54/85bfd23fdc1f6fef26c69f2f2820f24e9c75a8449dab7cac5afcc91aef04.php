<?php

/* welcome.php */
class __TwigTemplate_da5485bfd23fdc1f6fef26c69f2f2820f24e9c75a8449dab7cac5afcc91aef04 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Laravel PHP Framework</title>
    <style>
    @import url(//fonts.googleapis.com/css?family=Lato:700);

    body {
        margin:0;
        font-family:'Lato', sans-serif;
        text-align:center;
        color: #999;
    }

    .welcome {
        width: 300px;
        height: 200px;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -150px;
        margin-top: -100px;
    }

    a, a:visited {
        text-decoration:none;
    }

    h1 {
        font-size: 32px;
        margin: 16px 0 0 0;
    }
    </style>
</head>
<body>
    <div class=\"welcome\">
        ";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
        echo "
        <h1>You have arrived.</h1>
    </div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "welcome.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 38,  19 => 1,);
    }
}
