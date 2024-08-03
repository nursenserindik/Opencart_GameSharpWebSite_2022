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

/* marketplace/event.twig */
class __TwigTemplate_47bb78347882a3eb342f175671fef1bfafc1ebc43742137a91ee6a0cd3ba70d9 extends \Twig\Template
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
        <button type=\"button\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_delete"] ?? null);
        echo "\" class=\"btn btn-danger\" onclick=\"confirm('";
        echo ($context["text_confirm"] ?? null);
        echo "') ? \$('#form-event').submit() : false;\"><i class=\"fa fa-trash-o\"></i></button>
      </div>
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
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\"> ";
        // line 16
        if (($context["error_warning"] ?? null)) {
            // line 17
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 21
        echo "    ";
        if (($context["success"] ?? null)) {
            // line 22
            echo "    <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo ($context["success"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 26
        echo "    <div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> ";
        echo ($context["text_event"] ?? null);
        echo "</div>
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-list\"></i> ";
        // line 29
        echo ($context["text_list"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 32
        echo ($context["delete"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-event\">
          <div class=\"table-responsive\">
            <table class=\"table table-bordered table-hover\">
              <thead>
                <tr>
                  <td style=\"width: 1px;\" class=\"text-center\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', this.checked);\" /></td>
                  <td class=\"text-left\">";
        // line 38
        if ((($context["sort"] ?? null) == "code")) {
            echo "<a href=\"";
            echo ($context["sort_code"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_code"] ?? null);
            echo "</a>";
        } else {
            echo "<a href=\"";
            echo ($context["sort_code"] ?? null);
            echo "\">";
            echo ($context["column_code"] ?? null);
            echo "</a>";
        }
        echo "</td>
                  <td class=\"text-left\">";
        // line 39
        if ((($context["sort"] ?? null) == "status")) {
            echo "<a href=\"";
            echo ($context["sort_status"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_status"] ?? null);
            echo "</a>";
        } else {
            echo "<a href=\"";
            echo ($context["sort_status"] ?? null);
            echo "\">";
            echo ($context["column_status"] ?? null);
            echo "</a>";
        }
        echo "</td>
                  <td class=\"text-right\">";
        // line 40
        if ((($context["sort"] ?? null) == "sort_order")) {
            echo "<a href=\"";
            echo ($context["sort_sort_order"] ?? null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\">";
            echo ($context["column_sort_order"] ?? null);
            echo "</a>";
        } else {
            echo "<a href=\"";
            echo ($context["sort_sort_order"] ?? null);
            echo "\">";
            echo ($context["column_sort_order"] ?? null);
            echo "</a>";
        }
        echo "</td>
                  <td class=\"text-right\">";
        // line 41
        echo ($context["column_action"] ?? null);
        echo "</td>
                </tr>
              </thead>
              <tbody>
              
              ";
        // line 46
        if (($context["events"] ?? null)) {
            // line 47
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 48
                echo "              <tr>
                <td class=\"text-center\">";
                // line 49
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 49), ($context["selected"] ?? null))) {
                    // line 50
                    echo "                  <input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 50);
                    echo "\" checked=\"checked\" />
                  ";
                } else {
                    // line 52
                    echo "                  <input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 52);
                    echo "\" />
                  ";
                }
                // line 53
                echo "</td>
                <td class=\"text-left\">";
                // line 54
                echo twig_get_attribute($this->env, $this->source, $context["event"], "code", [], "any", false, false, false, 54);
                echo "</td>
                <td class=\"text-left\">";
                // line 55
                echo twig_get_attribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 55);
                echo "</td>
                <td class=\"text-right\">";
                // line 56
                echo twig_get_attribute($this->env, $this->source, $context["event"], "sort_order", [], "any", false, false, false, 56);
                echo "</td>
                <td class=\"text-right\"><button type=\"button\" data-toggle=\"modal\" data-target=\"#modal-event";
                // line 57
                echo twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 57);
                echo "\" class=\"btn btn-info\"><i class=\"fa fa-info-circle\"></i></button>
                  ";
                // line 58
                if ( !twig_get_attribute($this->env, $this->source, $context["event"], "enabled", [], "any", false, false, false, 58)) {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["event"], "enable", [], "any", false, false, false, 58);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_enable"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa fa-plus-circle\"></i></a>";
                } else {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["event"], "disable", [], "any", false, false, false, 58);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_disable"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></a>";
                }
                // line 59
                echo "                  <div id=\"modal-event";
                echo twig_get_attribute($this->env, $this->source, $context["event"], "event_id", [], "any", false, false, false, 59);
                echo "\" class=\"modal text-left\">
                    <div class=\"modal-dialog\">
                      <div class=\"modal-content\">
                        <div class=\"modal-header\">
                          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                          <h4 class=\"modal-title\">";
                // line 64
                echo ($context["text_info"] ?? null);
                echo "</h4>
                        </div>
                        <div class=\"modal-body\">
                          <p><strong>";
                // line 67
                echo ($context["text_trigger"] ?? null);
                echo "</strong></p>
                          <p>";
                // line 68
                echo twig_get_attribute($this->env, $this->source, $context["event"], "trigger", [], "any", false, false, false, 68);
                echo "</p>
                          <p><strong>";
                // line 69
                echo ($context["text_action"] ?? null);
                echo "</strong></p>
                          <p>";
                // line 70
                echo twig_get_attribute($this->env, $this->source, $context["event"], "action", [], "any", false, false, false, 70);
                echo "</p>
                        </div>
                      </div>
                    </div>
                  </div></td>
              </tr>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "              ";
        } else {
            // line 78
            echo "              <tr>
                <td class=\"text-center\" colspan=\"5\">";
            // line 79
            echo ($context["text_no_results"] ?? null);
            echo "</td>
              </tr>
              ";
        }
        // line 82
        echo "              </tbody>
            </table>
          </div>
        </form>
        <div class=\"row\">
          <div class=\"col-sm-6 text-left\">";
        // line 87
        echo ($context["pagination"] ?? null);
        echo "</div>
          <div class=\"col-sm-6 text-right\">";
        // line 88
        echo ($context["results"] ?? null);
        echo "</div>
        </div>
      </div>
    </div>
  </div>
</div>
";
        // line 94
        echo ($context["footer"] ?? null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "marketplace/event.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  312 => 94,  303 => 88,  299 => 87,  292 => 82,  286 => 79,  283 => 78,  280 => 77,  267 => 70,  263 => 69,  259 => 68,  255 => 67,  249 => 64,  240 => 59,  226 => 58,  222 => 57,  218 => 56,  214 => 55,  210 => 54,  207 => 53,  201 => 52,  195 => 50,  193 => 49,  190 => 48,  185 => 47,  183 => 46,  175 => 41,  157 => 40,  139 => 39,  121 => 38,  112 => 32,  106 => 29,  99 => 26,  91 => 22,  88 => 21,  80 => 17,  78 => 16,  73 => 13,  62 => 11,  58 => 10,  53 => 8,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "marketplace/event.twig", "");
    }
}
