<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* tt_lazio8/template/common/search.twig */
class __TwigTemplate_58cf386d09bce8c26f6dd9522172fa3a3327f16bc75cd337e11c7c5327e895f4 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"search-container\">
\t<div class=\"search-content\">
\t\t<div id=\"search\">
\t\t\t<!-- <h1>";
        // line 4
        echo ($context["text_search"] ?? null);
        echo "</h1> -->
\t\t\t<input type=\"text\" name=\"search\" value=\"";
        // line 5
        echo ($context["search"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["text_search"] ?? null);
        echo "\" class=\"form-control input-lg\" />
\t\t\t<button type=\"button\" class=\"btn btn-default btn-lg\"><i class=\"ion-ios-search-strong\"></i></button>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/common/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/common/search.twig", "");
    }
}
