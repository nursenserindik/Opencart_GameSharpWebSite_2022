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

/* extension/module/ocfeaturedcategory.twig */
class __TwigTemplate_89bee8a88d2e57de23de9ac94c14122877474bb966b34aee76d0a105c9aa8b26 extends \Twig\Template
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
        <button type=\"submit\" form=\"form-ocfeaturedcategory\" data-toggle=\"tooltip\" title=\"";
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
            echo "          <li><a href=\"";
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
  <div class=\"container-fluid\">
    ";
        // line 17
        if (($context["error_warning"] ?? null)) {
            // line 18
            echo "      <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 27
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-ocfeaturedcategory\" class=\"form-horizontal\">
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 29
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 31
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
              ";
        // line 32
        if (($context["error_name"] ?? null)) {
            // line 33
            echo "                <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
              ";
        }
        // line 35
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 38
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"status\" id=\"input-status\" class=\"form-control\">
                ";
        // line 41
        if (($context["status"] ?? null)) {
            // line 42
            echo "                  <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                  <option value=\"0\">";
            // line 43
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        } else {
            // line 45
            echo "                  <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                  <option value=\"0\" selected=\"selected\">";
            // line 46
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        }
        // line 48
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-slider\">";
        // line 52
        echo ($context["entry_slider"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"slider\" id=\"input-slider\" class=\"form-control\">
                ";
        // line 55
        if (($context["slider"] ?? null)) {
            // line 56
            echo "                  <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                  <option value=\"0\">";
            // line 57
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        } else {
            // line 59
            echo "                  <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                  <option value=\"0\" selected=\"selected\">";
            // line 60
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                ";
        }
        // line 62
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-width\">";
        // line 66
        echo ($context["entry_width"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"width\" value=\"";
        // line 68
        echo ($context["width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-width\" class=\"form-control\" />
              ";
        // line 69
        if (($context["error_width"] ?? null)) {
            // line 70
            echo "                <div class=\"text-danger\">";
            echo ($context["error_width"] ?? null);
            echo "</div>
              ";
        }
        // line 72
        echo "            </div>
          </div>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-height\">";
        // line 75
        echo ($context["entry_height"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"height\" value=\"";
        // line 77
        echo ($context["height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-height\" class=\"form-control\" />
              ";
        // line 78
        if (($context["error_height"] ?? null)) {
            // line 79
            echo "                <div class=\"text-danger\">";
            echo ($context["error_height"] ?? null);
            echo "</div>
              ";
        }
        // line 81
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-limit\">";
        // line 84
        echo ($context["entry_limit"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"limit\" value=\"";
        // line 86
        echo ($context["limit"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_limit"] ?? null);
        echo "\" id=\"input-limit\" class=\"form-control\" />
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-item\">";
        // line 90
        echo ($context["entry_item"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"item\" value=\"";
        // line 92
        echo ($context["item"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_item"] ?? null);
        echo "\" id=\"input-item\" class=\"form-control\" />
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-speed\">";
        // line 96
        echo ($context["entry_speed"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"speed\" value=\"";
        // line 98
        echo ($context["speed"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_speed"] ?? null);
        echo "\" id=\"input-speed\" class=\"form-control\" />
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-autoplay\">";
        // line 102
        echo ($context["entry_autoplay"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"autoplay\" id=\"input-autoplay\" class=\"form-control\">
                ";
        // line 105
        if (($context["autoplay"] ?? null)) {
            // line 106
            echo "                  <option value=\"1\" selected=\"selected\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                  <option value=\"0\">";
            // line 107
            echo ($context["text_no"] ?? null);
            echo "</option>
                ";
        } else {
            // line 109
            echo "                  <option value=\"1\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                  <option value=\"0\" selected=\"selected\">";
            // line 110
            echo ($context["text_no"] ?? null);
            echo "</option>
                ";
        }
        // line 112
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-rows\">";
        // line 116
        echo ($context["entry_rows"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"rows\" value=\"";
        // line 118
        echo ($context["rows"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_rows"] ?? null);
        echo "\" id=\"input-rows\" class=\"form-control\" />
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-shownextback\">";
        // line 122
        echo ($context["entry_shownextback"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select  id=\"input-shownextback\" name=\"shownextback\" class=\"form-control\">
                <option value=\"0\"  ";
        // line 125
        if ((($context["shownextback"] ?? null) == 0)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_no"] ?? null);
        echo "</option>
                <option value=\"1\"  ";
        // line 126
        if ((($context["shownextback"] ?? null) == 1)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_yes"] ?? null);
        echo "</option>
              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-shownav\">";
        // line 131
        echo ($context["entry_shownav"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select id=\"input-shownav\" name=\"shownav\" class=\"form-control\">
                <option value=\"0\"  ";
        // line 134
        if ((($context["shownav"] ?? null) == 0)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_no"] ?? null);
        echo "</option>
                <option value=\"1\"  ";
        // line 135
        if ((($context["shownav"] ?? null) == 1)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_yes"] ?? null);
        echo "</option>
              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-showdes\">";
        // line 140
        echo ($context["entry_showdes"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select id=\"input-showdes\" name=\"showdes\" class=\"form-control\">
                <option value=\"0\"  ";
        // line 143
        if ((($context["showdes"] ?? null) == 0)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_no"] ?? null);
        echo "</option>
                <option value=\"1\"  ";
        // line 144
        if ((($context["showdes"] ?? null) == 1)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_yes"] ?? null);
        echo "</option>
              </select>
            </div>
          </div>
          <div class=\"form-group\">
              <label class=\"col-sm-2 control-label\" for=\"input-showsub\">";
        // line 149
        echo ($context["entry_showsub"] ?? null);
        echo "</label>
              <div class=\"col-sm-10\">
                <select  id=\"input-showsub\" name=\"showsub\" class=\"form-control\">
                  <option value=\"0\" ";
        // line 152
        if ((($context["showsub"] ?? null) == 0)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_no"] ?? null);
        echo "</option>
                  <option value=\"1\" ";
        // line 153
        if ((($context["showsub"] ?? null) == 1)) {
            echo " selected=\"selected\" ";
        }
        echo " >";
        echo ($context["text_yes"] ?? null);
        echo "</option>
                </select>
              </div>
          </div>
          <div class=\"form-group \">
            <label class=\"col-sm-2 control-label\" for=\"input-showsubnumber\">";
        // line 158
        echo ($context["entry_showsubnumber"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"showsubnumber\" value=\"";
        // line 160
        echo ($context["showsubnumber"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_showsubnumber"] ?? null);
        echo "\" id=\"input-showsubnumber\" class=\"form-control\" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 168
        echo ($context["footer"] ?? null);
        echo "
<script type=\"text/javascript\">
  \$(document).ready(function() {
    var show_sub = \$('#input-showsub').val();
    if(show_sub == '1') {
      \$('#input-showsubnumber').closest('.form-group').show();
    } else {
      \$('#input-showsubnumber').closest('.form-group').hide();
    }

    \$('#input-showsub').change(function () {
      if(\$('#input-showsub').val() == '1') {
        \$('#input-showsubnumber').closest('.form-group').show();
      } else {
        \$('#input-showsubnumber').closest('.form-group').hide();
      }
    })
  })
</script>";
    }

    public function getTemplateName()
    {
        return "extension/module/ocfeaturedcategory.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  459 => 168,  446 => 160,  441 => 158,  429 => 153,  421 => 152,  415 => 149,  403 => 144,  395 => 143,  389 => 140,  377 => 135,  369 => 134,  363 => 131,  351 => 126,  343 => 125,  337 => 122,  328 => 118,  323 => 116,  317 => 112,  312 => 110,  307 => 109,  302 => 107,  297 => 106,  295 => 105,  289 => 102,  280 => 98,  275 => 96,  266 => 92,  261 => 90,  252 => 86,  247 => 84,  242 => 81,  236 => 79,  234 => 78,  228 => 77,  223 => 75,  218 => 72,  212 => 70,  210 => 69,  204 => 68,  199 => 66,  193 => 62,  188 => 60,  183 => 59,  178 => 57,  173 => 56,  171 => 55,  165 => 52,  159 => 48,  154 => 46,  149 => 45,  144 => 43,  139 => 42,  137 => 41,  131 => 38,  126 => 35,  120 => 33,  118 => 32,  112 => 31,  107 => 29,  102 => 27,  96 => 24,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/ocfeaturedcategory.twig", "");
    }
}
