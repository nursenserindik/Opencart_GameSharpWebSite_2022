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

/* tt_lazio8/template/extension/module/ochozmegamenu.twig */
class __TwigTemplate_da286a0cb1da3dbb43613d3588593e2771a7afb21df76e736c0fca57f528c546 extends \Twig\Template
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
        echo "<div class=\"hozmenu-container\">
\t<div class=\"ma-nav-mobile-container\">
\t\t<div class=\"hozmenu\">
\t\t\t<div class=\"navbar\">
\t\t\t\t<div id=\"navbar-inner\" class=\"navbar-inner navbar-inactive\">
\t\t\t\t\t\t<div class=\"menu-mobile\">
\t\t\t\t\t\t\t<a class=\"btn btn-navbar navbar-toggle\">
\t\t\t\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t\t</a>
                        ";
        // line 12
        if (($context["mobile_menu"] ?? null)) {
            // line 13
            echo "                        \t<span class=\"brand navbar-brand\">";
            echo ($context["menu_title"] ?? null);
            echo "</span>
                        ";
        } else {
            // line 15
            echo "                        \t<span class=\"brand navbar-brand\">";
            echo ($context["category_title"] ?? null);
            echo "</span>
                        ";
        }
        // line 17
        echo "                    </div>
\t\t\t\t
\t\t\t\t\t";
        // line 19
        echo ($context["_menu"] ?? null);
        echo " 
\t\t\t\t
\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
<div class=\"nav-container visible-lg visible-md\">\t\t
\t\t<div id=\"pt_custommenu\" class=\"pt_custommenu\">
\t\t\t<!-- <div class=\"container\"> -->
\t\t\t\t";
        // line 28
        echo ($context["hozmegamenu"] ?? null);
        echo "
\t\t\t<!-- </div> -->
\t\t</div>
\t</div>
</div>
<div id=\"sticky-menu\" data-sticky=\"";
        // line 33
        echo ($context["sticky_menu"] ?? null);
        echo "\"></div>
<script type=\"text/javascript\">
//<![CDATA[
\tvar body_class = \$('body').attr('class'); 
\tif(body_class.search('common-home') != -1) {
\t\t\$('#pt_menu_home').addClass('act');
\t}\t
var CUSTOMMENU_POPUP_EFFECT =";
        // line 40
        echo ($context["effect"] ?? null);
        echo "
var CUSTOMMENU_POPUP_TOP_OFFSET = ";
        // line 41
        echo ($context["top_offset"] ?? null);
        echo "
//]]>
</script>";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/extension/module/ochozmegamenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 41,  98 => 40,  88 => 33,  80 => 28,  68 => 19,  64 => 17,  58 => 15,  52 => 13,  50 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/extension/module/ochozmegamenu.twig", "");
    }
}
