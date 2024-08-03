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

/* tt_lazio8/template/extension/module/ocvermegamenu.twig */
class __TwigTemplate_daa08f24fe8ab988f75382252ecb840ef0b567dc7cfd805aa647582d451f8aae extends \Twig\Template
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
        echo "<div class=\"vermagemenu hidden-xs hidden-sm\">
    <div class=\"content-vermagemenu\"> 
        <div class=\"title-vetical\"><h2>";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</h2></div>
        <div class=\"navleft-container\">
            <div id=\"pt_vmegamenu\" class=\"pt_vmegamenu\">
                ";
        // line 6
        echo ($context["vermegamenu"] ?? null);
        echo " 
            </div>\t
        </div>
    </div>
</div>
<script type=\"text/javascript\">
//<![CDATA[
var VCUSTOMMENU_POPUP_EFFECT = ";
        // line 13
        echo ($context["effect"] ?? null);
        echo "
var VCUSTOMMENU_POPUP_TOP_OFFSET = ";
        // line 14
        echo ($context["top_offset"] ?? null);
        echo "
//]]>
        \$('.vermagemenu h2').click(function () {
            \$( \".navleft-container\" ).slideToggle(\"slow\");
        });
</script>";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/extension/module/ocvermegamenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 14,  57 => 13,  47 => 6,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/extension/module/ocvermegamenu.twig", "");
    }
}
