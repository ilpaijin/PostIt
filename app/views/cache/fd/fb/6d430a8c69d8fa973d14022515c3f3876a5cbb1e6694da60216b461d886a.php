<?php

/* login.php */
class __TwigTemplate_fdfb6d430a8c69d8fa973d14022515c3f3876a5cbb1e6694da60216b461d886a extends Twig_Template
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
        echo "<form method=\"POST\" action=\"/login\">
    <div class=\"form-group\">
        <label for=\"exampleInputUsername\">Email address</label>
        <input name=\"username\" type=\"text\" class=\"form-control\" id=\"exampleInputUsername\" placeholder=\"Enter username\">
    </div>
    <div class=\"form-group\">
        <label for=\"exampleInputPassword\">Password</label>
        <input name=\"password\" type=\"password\" class=\"form-control\" id=\"exampleInputPassword\" placeholder=\"Password\">
    </div>
    <!-- <div class=\"form-group\">
        <label for=\"exampleInputFile\">File input</label>
        <input type=\"file\" id=\"exampleInputFile\">
        <p class=\"help-block\">Example block-level help text here.</p>
    </div> -->
    <div class=\"checkbox\">
        <label>
            <input type=\"checkbox\"> remember me
        </label>
    </div>
    <button type=\"submit\" class=\"btn btn-default\">Submit</button>
</form>
";
    }

    public function getTemplateName()
    {
        return "login.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
