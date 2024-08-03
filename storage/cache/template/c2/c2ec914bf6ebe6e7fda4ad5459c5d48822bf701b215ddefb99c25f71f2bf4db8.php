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

/* tt_lazio8/template/extension/module/ocajaxlogin/success.twig */
class __TwigTemplate_e99d683caf520dda73b46d90202c3336168cd67e3f1f37f70bb54ea6e20e1a3f extends \Twig\Template
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
        echo "<div class=\"ajax-container\">
  <div class=\"success-content\">
    <div class=\"page-title\"><h1>";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</h1></div>
    ";
        // line 4
        echo ($context["text_message"] ?? null);
        echo "
    <div class=\"buttons\">
      <div class=\"pull-right\"><button class=\"button\" onclick=\"window.location.href='";
        // line 6
        echo ($context["continue"] ?? null);
        echo "'\"><span>";
        echo ($context["button_continue"] ?? null);
        echo "</span></button></div>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/extension/module/ocajaxlogin/success.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 6,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/extension/module/ocajaxlogin/success.twig", "");
    }
}
