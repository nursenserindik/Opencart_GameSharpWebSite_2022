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

/* extension/module/occmsblock/config.twig */
class __TwigTemplate_23438762b0c948564b4c40d219871bc8a21b2034b360800d6a6feb11a35644ec extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-module\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "\t\t<li><a href=\"";
        echo ($context["cms_link"] ?? null);
        echo "\"><span class=\"icon-banner\"></span><span>";
        echo ($context["text_cmsblock_slide"] ?? null);
        echo "</span></a></li>
      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 18
        if (($context["error_warning"] ?? null)) {
            // line 19
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 23
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 25
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 28
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 30
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 32
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
              ";
        // line 33
        if (($context["error_name"] ?? null)) {
            // line 34
            echo "              <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
              ";
        }
        // line 36
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-cmsblock\">";
        // line 39
        echo ($context["entry_cmsblock"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"cmsblock_id\" id=\"input-cmsblock\" class=\"form-control\">
                ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cmsblocks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 43
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["block"], "cmsblock_id", [], "any", false, false, false, 43) == ($context["cmsblock_id"] ?? null))) {
                // line 44
                echo "                <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["block"], "cmsblock_id", [], "any", false, false, false, 44);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["block"], "title", [], "any", false, false, false, 44);
                echo "</option>
                ";
            } else {
                // line 46
                echo "                <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["block"], "cmsblock_id", [], "any", false, false, false, 46);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["block"], "title", [], "any", false, false, false, 46);
                echo "</option>
                ";
            }
            // line 48
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "              </select>
            </div>
          </div>
 
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 54
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"status\" id=\"input-status\" class=\"form-control\">
                ";
        // line 57
        if (($context["status"] ?? null)) {
            // line 58
            echo "                <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                <option value=\"0\">";
            // line 59
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        } else {
            // line 61
            echo "                <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                <option value=\"0\" selected=\"selected\">";
            // line 62
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        }
        // line 64
        echo "              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 72
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/occmsblock/config.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 72,  206 => 64,  201 => 62,  196 => 61,  191 => 59,  186 => 58,  184 => 57,  178 => 54,  171 => 49,  165 => 48,  157 => 46,  149 => 44,  146 => 43,  142 => 42,  136 => 39,  131 => 36,  125 => 34,  123 => 33,  117 => 32,  112 => 30,  107 => 28,  101 => 25,  97 => 23,  89 => 19,  87 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/occmsblock/config.twig", "");
    }
}
