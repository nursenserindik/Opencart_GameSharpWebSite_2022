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

/* tt_lazio6/template/extension/module/ocajaxlogin/ocajaxlogin.twig */
class __TwigTemplate_ae71171ee706fc7776c5a713d5cd61b88e35af4936195fa2f7af2bea719dd57d extends \Twig\Template
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
        echo "<div id=\"ajax-login-block\">
</div>
<div id=\"ajax-loader\">
    <img src=\"";
        // line 4
        echo ($context["loader_img"] ?? null);
        echo "\" alt=\"\" />
</div>
<div class=\"ajax-body-login\">
    <div class=\"account-login\">
        <div class=\"page-title\">
            <h1>";
        // line 9
        echo ($context["heading_title"] ?? null);
        echo "</h1>
            <a href=\"javascript:void(0);\" class=\"a-close-frm\" onclick=\"ocajaxlogin.closeForm();\"><span>Close</span></a>
        </div>
        <div class=\"ajax-content\">
            ";
        // line 13
        echo ($context["ajax_login_content"] ?? null);
        echo "
        </div>
    </div>
    <div class=\"account-register\">
        <div class=\"page-title\">
            <h1>";
        // line 18
        echo ($context["heading_title"] ?? null);
        echo "</h1>
            <a href=\"javascript:void(0);\" class=\"a-close-frm\" onclick=\"ocajaxlogin.closeForm();\"><span>Close</span></a>
        </div>
        <div class=\"ajax-content\">
            ";
        // line 22
        echo ($context["ajax_register_content"] ?? null);
        echo "
        </div>
    </div>
    <div class=\"account-success\">
        <div class=\"ajax-content\">
            ";
        // line 27
        echo ($context["ajax_success_content"] ?? null);
        echo "
        </div>
    </div>
    <div class=\"logout-success\">
        <div class=\"ajax-content\">
            ";
        // line 32
        echo ($context["ajax_logoutsuccess_content"] ?? null);
        echo "
        </div>
    </div>
</div>
<div class=\"opc-hidden\">
    ";
        // line 37
        if (($context["enable_status"] ?? null)) {
            // line 38
            echo "        <input type=\"hidden\" id=\"input-opc-status\" value=\"1\" />
    ";
        } else {
            // line 40
            echo "        <input type=\"hidden\" id=\"input-opc-status\" value=\"0\" />
    ";
        }
        // line 42
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "tt_lazio6/template/extension/module/ocajaxlogin/ocajaxlogin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 42,  102 => 40,  98 => 38,  96 => 37,  88 => 32,  80 => 27,  72 => 22,  65 => 18,  57 => 13,  50 => 9,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio6/template/extension/module/ocajaxlogin/ocajaxlogin.twig", "");
    }
}
