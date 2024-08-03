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

/* extension/module/octabproducts.twig */
class __TwigTemplate_872fe7b16231e023edf3c70cd2b053c4874d0e2fb4311e3ff833e0f47ac0ca05 extends \Twig\Template
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
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 17
        if (($context["error_warning"] ?? null)) {
            // line 18
            echo "    <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default tt-panel\">
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
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal tt-module\">
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-name\">";
        // line 29
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"control-option width-4\">
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
            echo "              <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
              ";
        }
        // line 35
        echo "            </div>
          </div>
\t\t  <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-class\">";
        // line 38
        echo ($context["entry_class"] ?? null);
        echo "</label>
            <div class=\"control-option width-4\">
              <input type=\"text\" name=\"class\" value=\"";
        // line 40
        echo ($context["class"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_class"] ?? null);
        echo "\" id=\"input-class\" class=\"form-control\" />
              ";
        // line 41
        if (($context["error_class"] ?? null)) {
            // line 42
            echo "              <div class=\"text-danger\">";
            echo ($context["error_class"] ?? null);
            echo "</div>
              ";
        }
        // line 44
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-status\">";
        // line 47
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"control-option\">
            <div class=\"switch tt-switch\">
              <input type=\"radio\" name=\"status\" class=\"switch-input\" id=\"status-on\" value=\"1\" ";
        // line 50
        if ((($context["status"] ?? null) == 1)) {
            echo " checked=\"checked\" ";
        }
        echo "/>
              <label for=\"status-on\" class=\"switch-label switch-label-on\">";
        // line 51
        echo ($context["text_enabled"] ?? null);
        echo "</label>
              <input type=\"radio\" name=\"status\" class=\"switch-input\" id=\"status-off\" value=\"0\" ";
        // line 52
        if ((($context["status"] ?? null) == 0)) {
            echo " checked=\"checked\" ";
        }
        echo "/>
              <label for=\"status-off\" class=\"switch-label switch-label-off\">";
        // line 53
        echo ($context["text_disabled"] ?? null);
        echo "</label>
              <span class=\"switch-selection\"></span>
                  </div>
            </div>
          </div>
          
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-row\">";
        // line 60
        echo ($context["entry_title"] ?? null);
        echo "</label>
            <div class=\"control-option width-4\">
              ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 63
            echo "                <div class=\"input-group\">
                  <span class=\"input-group-addon\">";
            // line 64
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 64);
            echo "</span>
                  <input type=\"text\" name=\"title_lang[";
            // line 65
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 65);
            echo "][title]\" value=\"";
            echo ((twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["title_lang"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 65)] ?? null) : null), "title", [], "any", false, false, false, 65)) ? (twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["title_lang"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 65)] ?? null) : null), "title", [], "any", false, false, false, 65)) : (""));
            echo "\" placeholder=\"\" id=\"input-title";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 65);
            echo "\" class=\"form-control\" />
                </div>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "            </div>
          </div>
      ";
        // line 71
        echo "      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-description";
        // line 72
        echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "language_id", [], "any", false, false, false, 72);
        echo "\">";
        echo ($context["entry_description"] ?? null);
        echo "</label>
          <div class=\"control-control\">
            <div class=\"tabdes-content\" style=\"margin: 10px;\">
              ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 76
            echo "              <div id=\"language";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 76);
            echo "\">
                  <a href=\"javascript:void(0)\" class=\"language-label\"><span>";
            // line 77
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 77);
            echo "</span><i class=\"fa fa-angle-down\"></i></a>
                  <div class=\"html-content\">
                     <textarea name=\"module_description[";
            // line 79
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 79);
            echo "][description]\" placeholder=\"";
            echo ($context["entry_description"] ?? null);
            echo "\" id=\"input-description";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 79);
            echo "\" class=\"form-control summernote\">";
            echo (((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["module_description"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 79)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["module_description"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 79)] ?? null) : null), "description", [], "any", false, false, false, 79)) : (""));
            echo "</textarea>
                  </div>
              </div>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "          </div>
        </div>
      </div>
      ";
        // line 87
        echo "      <div class=\"form-group\" style=\"border-top: 2px solid #279CBB;\">
        <label class=\"control-label\" for=\"input-type\">";
        // line 88
        echo ($context["entry_product_type"] ?? null);
        echo "</label>
        <div class=\"control-option width-1\">
          <div class=\"switch switch-long switch-multi3\">
            <input type=\"radio\" name=\"type\" class=\"switch-input\" id=\"type-grid\" value=\"0\" ";
        // line 91
        if ((($context["type"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"type-grid\" class=\"switch-label switch-label-1\">";
        // line 92
        echo ($context["entry_grid"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"type\" class=\"switch-input\" id=\"type-list\" value=\"1\" ";
        // line 93
        if ((($context["type"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"type-list\" class=\"switch-label switch-label-2\">";
        // line 94
        echo ($context["entry_list"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"type\" class=\"switch-input\" id=\"type-other\" value=\"2\" ";
        // line 95
        if ((($context["type"] ?? null) == 2)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"type-other\" class=\"switch-label switch-label-3\">";
        // line 96
        echo ($context["entry_other"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group parent-form\"  style=\"border-top: 2px solid #279CBB;\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 102
        echo ($context["entry_slider"] ?? null);
        echo "</label>
        <div class=\"control-option\">    
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"slider\" class=\"switch-input\" id=\"slider-on\" value=\"1\" onClick=\"GetOptionsSelect();\" ";
        // line 105
        if ((($context["slider"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"slider-on\" class=\"switch-label switch-label-on\">";
        // line 106
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"slider\" class=\"switch-input\" id=\"slider-off\" value=\"0\" onClick=\"GetOptionsSelect();\" ";
        // line 107
        if ((($context["slider"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"slider-off\" class=\"switch-label switch-label-off\">";
        // line 108
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"slider-on-selected select-options\">
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-items\">";
        // line 115
        echo ($context["entry_item"] ?? null);
        echo "</label>
          <div class=\"control-option width-1\">
            <input type=\"text\" name=\"items\" value=\"";
        // line 117
        echo ($context["items"] ?? null);
        echo "\" placeholder=\"\" id=\"input-items\" class=\"tt-number-field\" />
          </div>
        </div>  
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-row\">";
        // line 121
        echo ($context["entry_rows"] ?? null);
        echo "</label>
          <div class=\"control-option width-1\">
            <input type=\"text\" name=\"row\" value=\"";
        // line 123
        echo ($context["row"] ?? null);
        echo "\" placeholder=\"\" id=\"input-row\" class=\"tt-number-field\" />
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-loop\">";
        // line 127
        echo ($context["entry_loop"] ?? null);
        echo "</label>
          <div class=\"control-option\">
            <div class=\"switch switch-bol\">
              <input type=\"radio\" name=\"loop\" class=\"switch-input\" id=\"loop-on\" value=\"1\" ";
        // line 130
        if ((($context["loop"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"loop-on\" class=\"switch-label switch-label-on\">";
        // line 131
        echo ($context["entry_yes"] ?? null);
        echo "</label>
              <input type=\"radio\" name=\"loop\" class=\"switch-input\" id=\"loop-off\" value=\"0\" ";
        // line 132
        if ((($context["loop"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"loop-off\" class=\"switch-label switch-label-off\">";
        // line 133
        echo ($context["entry_no"] ?? null);
        echo "</label>
              <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-time\">";
        // line 139
        echo ($context["entry_margin"] ?? null);
        echo "</label>
          <div class=\"control-option width-2\">
            <input type=\"text\" name=\"margin\" value=\"";
        // line 141
        echo ($context["margin"] ?? null);
        echo "\" placeholder=\"\" id=\"input-margin\" class=\"tt-number-field\" />
            <span class=\"suffix\">pixels</span>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-auto\">";
        // line 146
        echo ($context["entry_auto"] ?? null);
        echo "</label>
          <div class=\"control-option\">
            <div class=\"switch switch-bol\">
              <input type=\"radio\" name=\"auto\" class=\"switch-input\" id=\"auto-on\" value=\"1\" ";
        // line 149
        if ((($context["auto"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"auto-on\" class=\"switch-label switch-label-on\">";
        // line 150
        echo ($context["entry_yes"] ?? null);
        echo "</label>
              <input type=\"radio\" name=\"auto\" class=\"switch-input\" id=\"auto-off\" value=\"0\" ";
        // line 151
        if ((($context["auto"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"auto-off\" class=\"switch-label switch-label-off\">";
        // line 152
        echo ($context["entry_no"] ?? null);
        echo "</label>
              <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-time\">";
        // line 158
        echo ($context["entry_time"] ?? null);
        echo "</label>
          <div class=\"control-option width-2\">
            <input type=\"text\" name=\"time\" value=\"";
        // line 160
        echo ($context["time"] ?? null);
        echo "\" placeholder=\"\" id=\"input-time\" class=\"tt-number-field\" />
            <span class=\"suffix\">miliseconds</span>
          </div>
        </div>  
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-time\">";
        // line 165
        echo ($context["entry_speed"] ?? null);
        echo "</label>
          <div class=\"control-option width-2\">
            <input type=\"text\" name=\"speed\" value=\"";
        // line 167
        echo ($context["speed"] ?? null);
        echo "\" placeholder=\"\" id=\"input-speed\" class=\"tt-number-field\" />
            <span class=\"suffix\">miliseconds</span>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-navigation\">";
        // line 172
        echo ($context["entry_navigation"] ?? null);
        echo "</label>
          <div class=\"control-option\">           
            <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"navigation\" class=\"switch-input\" id=\"navigation-on\" value=\"1\" ";
        // line 175
        if ((($context["navigation"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"navigation-on\" class=\"switch-label switch-label-on\">";
        // line 176
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"navigation\" class=\"switch-input\" id=\"navigation-off\" value=\"0\" ";
        // line 177
        if ((($context["navigation"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"navigation-off\" class=\"switch-label switch-label-off\">";
        // line 178
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-pagination\">";
        // line 184
        echo ($context["entry_pagination"] ?? null);
        echo "</label>
          <div class=\"control-option\">       
            <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"pagination\" class=\"switch-input\" id=\"pagination-on\" value=\"1\" ";
        // line 187
        if ((($context["pagination"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"pagination-on\" class=\"switch-label switch-label-on\">";
        // line 188
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"pagination\" class=\"switch-input\" id=\"pagination-off\" value=\"0\" ";
        // line 189
        if ((($context["pagination"] ?? null) == 0)) {
            echo "  checked=\"checked\"";
        }
        echo "/>
            <label for=\"pagination-off\" class=\"switch-label switch-label-off\">";
        // line 190
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-width\">";
        // line 196
        echo ($context["entry_responsive"] ?? null);
        echo "</label>
          <div class=\"control-option width-6\">
           <i class=\"fa fa-desktop\"></i> ";
        // line 198
        echo ($context["entry_desktop"] ?? null);
        echo "
           <input type=\"text\" name=\"desktop\" value=\"";
        // line 199
        echo ($context["desktop"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-desktop\" class=\"tt-number-field\" />
            ";
        // line 200
        if (($context["error_width"] ?? null)) {
            // line 201
            echo "            <div class=\"text-danger\">";
            echo ($context["error_responsive"] ?? null);
            echo "</div>
            ";
        }
        // line 203
        echo "            <i class=\"fa fa-laptop\"></i> ";
        echo ($context["entry_sdesktop"] ?? null);
        echo "
            <input type=\"text\" name=\"tablet\" value=\"";
        // line 204
        echo ($context["tablet"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-tablet\" class=\"tt-number-field\" />
            ";
        // line 205
        if (($context["error_width"] ?? null)) {
            // line 206
            echo "            <div class=\"text-danger\">";
            echo ($context["error_responsive"] ?? null);
            echo "</div>
            ";
        }
        // line 208
        echo "            <i class=\"fa fa-tablet\"></i> ";
        echo ($context["entry_tablet"] ?? null);
        echo "
            <input type=\"text\" name=\"mobile\" value=\"";
        // line 209
        echo ($context["mobile"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-mobile\" class=\"tt-number-field\" />
            ";
        // line 210
        if (($context["error_width"] ?? null)) {
            // line 211
            echo "            <div class=\"text-danger\">";
            echo ($context["error_responsive"] ?? null);
            echo "</div>
            ";
        }
        // line 213
        echo "             <i class=\"fa fa-mobile\"></i> ";
        echo ($context["entry_mobile"] ?? null);
        echo "
            <input type=\"text\" name=\"smobile\" value=\"";
        // line 214
        echo ($context["smobile"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-smobile\" class=\"tt-number-field\" />
          </div>
        </div>
      </div>
      <div class=\"slider-off-selected select-options\">
        <div class=\"form-group\">";
        // line 220
        echo "          <label class=\"control-label\" for=\"input-row\">";
        echo ($context["entry_pprow"] ?? null);
        echo "</label>
          <div class=\"control-option width-1\">
            <select name=\"nrow\" id=\"input-nrow\" class=\"form-control\">
              ";
        // line 223
        if ((($context["nrow"] ?? null) == 0)) {
            // line 224
            echo "                <option value=\"0\" selected=\"select-options\">2</option>
                <option value=\"1\">3</option>
                <option value=\"2\">4</option>
                <option value=\"3\">6</option>
              ";
        } elseif ((        // line 228
($context["nrow"] ?? null) == 1)) {
            // line 229
            echo "                <option value=\"0\">2</option>
                <option value=\"1\" selected=\"select-options\">3</option>
                <option value=\"2\">4</option>
                <option value=\"3\">6</option>
              ";
        } elseif ((        // line 233
($context["nrow"] ?? null) == 2)) {
            // line 234
            echo "                <option value=\"0\">2</option>
                <option value=\"1\">3</option>
                <option value=\"2\" selected=\"select-options\">4</option>
                <option value=\"3\">6</option>
              ";
        } else {
            // line 239
            echo "                <option value=\"0\">2</option>
                <option value=\"1\">3</option>
                <option value=\"2\">4</option>
                <option value=\"3\" selected=\"select-options\">6</option>
              ";
        }
        // line 244
        echo "            </select>
          </div>
        </div>
      </div>
      ";
        // line 249
        echo "      <div class=\"form-group\"  style=\"border-top: 2px solid #279CBB;\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 250
        echo ($context["entry_show_description"] ?? null);
        echo "</label>
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"description\" class=\"switch-input\" id=\"description-on\" value=\"1\" ";
        // line 253
        if ((($context["description"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"description-on\" class=\"switch-label switch-label-on\">";
        // line 254
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"description\" class=\"switch-input\" id=\"description-off\" value=\"0\" <";
        // line 255
        if ((($context["description"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"description-off\" class=\"switch-label switch-label-off\">";
        // line 256
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 262
        echo ($context["entry_countdown"] ?? null);
        echo "<small>";
        echo ($context["entry_countdown_small"] ?? null);
        echo "</small></label>
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"countdown\" class=\"switch-input\" id=\"countdown-on\" value=\"1\" ";
        // line 265
        if ((($context["countdown"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"countdown-on\" class=\"switch-label switch-label-on\">";
        // line 266
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"countdown\" class=\"switch-input\" id=\"countdown-off\" value=\"0\" ";
        // line 267
        if ((($context["countdown"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"countdown-off\" class=\"switch-label switch-label-off\">";
        // line 268
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 274
        echo ($context["entry_rotator"] ?? null);
        echo "</label>   
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"rotator\" class=\"switch-input\" id=\"rotator-on\" value=\"1\" ";
        // line 277
        if ((($context["rotator"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"rotator-on\" class=\"switch-label switch-label-on\">";
        // line 278
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"rotator\" class=\"switch-input\" id=\"rotator-off\" value=\"0\" ";
        // line 279
        if ((($context["rotator"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"rotator-off\" class=\"switch-label switch-label-off\">";
        // line 280
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 286
        echo ($context["entry_newlabel"] ?? null);
        echo "</label>    
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"newlabel\" class=\"switch-input\" id=\"newlabel-on\" value=\"1\" ";
        // line 289
        if ((($context["newlabel"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"newlabel-on\" class=\"switch-label switch-label-on\">";
        // line 290
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"newlabel\" class=\"switch-input\" id=\"newlabel-off\" value=\"0\" ";
        // line 291
        if ((($context["newlabel"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"newlabel-off\" class=\"switch-label switch-label-off\">";
        // line 292
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 298
        echo ($context["entry_salelabel"] ?? null);
        echo "</label>   
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"salelabel\" class=\"switch-input\" id=\"salelabel-on\" value=\"1\" ";
        // line 301
        if ((($context["salelabel"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"salelabel-on\" class=\"switch-label switch-label-on\">";
        // line 302
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"salelabel\" class=\"switch-input\" id=\"salelabel-off\" value=\"0\" ";
        // line 303
        if ((($context["salelabel"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"salelabel-off\" class=\"switch-label switch-label-off\">";
        // line 304
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-limit\">";
        // line 310
        echo ($context["entry_limit"] ?? null);
        echo "</label>
        <div class=\"control-option width-1\">
          <input type=\"text\" name=\"limit\" value=\"";
        // line 312
        echo ($context["limit"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_limit"] ?? null);
        echo "\" id=\"input-limit\" class=\"tt-number-field\" />
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-width\">";
        // line 316
        echo ($context["entry_size"] ?? null);
        echo "<small>";
        echo ($context["entry_dessize"] ?? null);
        echo "</small></label>
        <div class=\"control-option width-2\">
          <input type=\"text\" name=\"width\" value=\"";
        // line 318
        echo ($context["width"] ?? null);
        echo "\" placeholder=\"\" id=\"input-width\" class=\"tt-number-field\" />
          ";
        // line 319
        if (($context["error_width"] ?? null)) {
            // line 320
            echo "          <div class=\"text-danger\">";
            echo ($context["error_width"] ?? null);
            echo "</div>
          ";
        }
        // line 322
        echo "           x
          <input type=\"text\" name=\"height\" value=\"";
        // line 323
        echo ($context["height"] ?? null);
        echo "\" placeholder=\"\" id=\"input-height\" class=\"tt-number-field\" />
          ";
        // line 324
        if (($context["error_height"] ?? null)) {
            // line 325
            echo "          <div class=\"text-danger\">";
            echo ($context["error_height"] ?? null);
            echo "</div>
          ";
        }
        // line 327
        echo "        </div>
      </div>
\t<div class=\"form-group\">
        <label class=\"control-label\" for=\"input-width\">";
        // line 330
        echo ($context["entry_module_image"] ?? null);
        echo "</label>
        <div class=\"control-option width-2\">
          <a href=\"javascript:void(0);\" id=\"module-image\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 332
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a>
                            <input type=\"hidden\" name=\"module_image\" value=\"";
        // line 333
        echo ($context["module_image"] ?? null);
        echo "\" id=\"input-module-image\" />
        </div>
      </div>


      <div class=\"tabs-container\">
          ";
        // line 339
        $context["tab_id"] = 0;
        // line 340
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["octabs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["octab"]) {
            // line 341
            echo "          <div class=\"tab-container\">
          <div class=\"tab-heading\">Tab-";
            // line 342
            echo ($context["tab_id"] ?? null);
            echo "<span class=\"delete_tab\"><i class=\"fa fa-times\"></i>";
            echo ($context["entry_deletetab"] ?? null);
            echo "</span></div>
          <div class=\"tab-content\">
            <div class=\"form-group\">
              <label class=\"control-label\" for=\"input-row\">";
            // line 345
            echo ($context["entry_overwritetitle"] ?? null);
            echo "</label>
              <div class=\"control-option width-4\">
                ";
            // line 347
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 348
                echo "                  <div class=\"input-group\">
                    <span class=\"input-group-addon\">";
                // line 349
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 349);
                echo "</span>
                    <input type=\"text\" name=\"octab[";
                // line 350
                echo ($context["tab_id"] ?? null);
                echo "][tab_name][";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 350);
                echo "][title]\" value=\"";
                echo ((twig_get_attribute($this->env, $this->source, (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = twig_get_attribute($this->env, $this->source, $context["octab"], "tab_name", [], "any", false, false, false, 350)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 350)] ?? null) : null), "title", [], "any", false, false, false, 350)) ? (twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = twig_get_attribute($this->env, $this->source, $context["octab"], "tab_name", [], "any", false, false, false, 350)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 350)] ?? null) : null), "title", [], "any", false, false, false, 350)) : (""));
                echo "\" placeholder=\"\" id=\"input-title";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 350);
                echo "-";
                echo ($context["tab_id"] ?? null);
                echo "\" class=\"form-control\" />
                  </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 353
            echo "              </div>
            </div>
            <div class=\"form-group parent-form\">
              <label class=\"control-label\" for=\"input-option\">";
            // line 356
            echo ($context["entry_type"] ?? null);
            echo "</label>
              <div class=\"control-option\">
              <div class=\"switch switch-long switch-multi4\">
                <input type=\"radio\" name=\"octab[";
            // line 359
            echo ($context["tab_id"] ?? null);
            echo "][option]\" class=\"switch-input switch-input-1\" id=\"option-all-";
            echo ($context["tab_id"] ?? null);
            echo "\" onClick=\"GetOptionsSelect();\" value=\"0\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "option", [], "any", false, false, false, 359) == 0)) {
                echo "checked=\"checked\"";
            }
            echo "/>
                <label for=\"option-all-";
            // line 360
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-1\" >";
            echo ($context["entry_type_all"] ?? null);
            echo "</label>
                <input type=\"radio\" name=\"octab[";
            // line 361
            echo ($context["tab_id"] ?? null);
            echo "][option]\" class=\"switch-input switch-input-2\" onClick=\"GetOptionsSelect();\" id=\"option-cate-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"1\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "option", [], "any", false, false, false, 361) == 1)) {
                echo "checked=\"checked\"";
            }
            echo "/>
                <label for=\"option-cate-";
            // line 362
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-2\">";
            echo ($context["entry_type_cate"] ?? null);
            echo "</label>
                <input type=\"radio\" name=\"octab[";
            // line 363
            echo ($context["tab_id"] ?? null);
            echo "][option]\" class=\"switch-input switch-input-3\" onClick=\"GetOptionsSelect();\" id=\"option-auto-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"2\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "option", [], "any", false, false, false, 363) == 2)) {
                echo "checked=\"checked\"";
            }
            echo "/>
                <label for=\"option-auto-";
            // line 364
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-3\">";
            echo ($context["entry_type_auto"] ?? null);
            echo "</label>
                <input type=\"radio\" name=\"octab[";
            // line 365
            echo ($context["tab_id"] ?? null);
            echo "][option]\" class=\"switch-input switch-input-3\" onClick=\"GetOptionsSelect();\" id=\"option-manu-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"3\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "option", [], "any", false, false, false, 365) == 3)) {
                echo "checked=\"checked\"";
            }
            echo "/>
                <label for=\"option-manu-";
            // line 366
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-4\">";
            echo ($context["entry_type_manu"] ?? null);
            echo "</label>
                <span class=\"switch-selection\"></span>
              </div>
              </div>
            </div>

            <div class=\"option-all-";
            // line 372
            echo ($context["tab_id"] ?? null);
            echo "-selected select-options\">
            <div class=\"form-group\">
              <label class=\"control-label\" for=\"input-productall-";
            // line 374
            echo ($context["tab_id"] ?? null);
            echo "\">";
            echo ($context["entry_product"] ?? null);
            echo "</label>
              <div class=\"control-option width-4\">
                <input type=\"text\" name=\"octab[";
            // line 376
            echo ($context["tab_id"] ?? null);
            echo "][productall]\" value=\"\" placeholder=\"";
            echo ($context["entry_product"] ?? null);
            echo "\" id=\"input-productall-";
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"form-control\" />
                <div id=\"featured-product-";
            // line 377
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                  ";
            // line 378
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["octab"], "productalls", [], "any", false, false, false, 378));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
                  <div id=\"featured-product";
                // line 379
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 379);
                echo "\" class=\"tt-product\">
                  <i class=\"fa fa-times\"></i>
                  <img src=\"";
                // line 381
                echo twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 381);
                echo "\" alt=\"\" />
                  ";
                // line 382
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 382);
                echo "     
                  <input type=\"hidden\" name=\"octab[";
                // line 383
                echo ($context["tab_id"] ?? null);
                echo "][productall][]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 383);
                echo "  \" />
                  </div>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 386
            echo "                </div>
              </div>
            </div>
          </div>
          <!--  Manufacturer selection -->
          <div class=\"option-manu-";
            // line 391
            echo ($context["tab_id"] ?? null);
            echo "-selected select-options\">
            <div class=\"form-group\">
                <label class=\"control-label\" for=\"input-manu_id-";
            // line 393
            echo ($context["tab_id"] ?? null);
            echo "\">";
            echo ($context["entry_manu_select"] ?? null);
            echo "</label>
                <div class=\"control-option width-3\">
                  <input type=\"text\" name=\"octab[";
            // line 395
            echo ($context["tab_id"] ?? null);
            echo "][manu_name]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["octab"], "manu_name", [], "any", false, false, false, 395);
            echo "\" placeholder=\"Search manufacturer\" id=\"input-manu_name-";
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"form-control input-manu_name\" /><i class=\"fa fa-times\"></i>
                  <input type=\"hidden\" name=\"octab[";
            // line 396
            echo ($context["tab_id"] ?? null);
            echo "][manu_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["octab"], "manu_id", [], "any", false, false, false, 396);
            echo "\" id=\"input-manu_id-";
            echo ($context["tab_id"] ?? null);
            echo "\" />
                </div>
            </div>
            <div class=\"form-group\">
              <label class=\"control-label\" for=\"input-manu_logo\">";
            // line 400
            echo ($context["entry_manu_logo"] ?? null);
            echo "</label>
              <div class=\"control-option\">
                <div class=\"switch switch-bol\">
                  <input type=\"radio\" name=\"octab[";
            // line 403
            echo ($context["tab_id"] ?? null);
            echo "][manu_logo]\" class=\"switch-input\" id=\"manu_logo-on-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"1\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "manu_logo", [], "any", false, false, false, 403) == 1)) {
                echo " checked=\"checked\"";
            }
            echo "/>
                  <label for=\"manu_logo-on-";
            // line 404
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-on\">";
            echo ($context["entry_yes"] ?? null);
            echo "</label>
                  <input type=\"radio\" name=\"octab[";
            // line 405
            echo ($context["tab_id"] ?? null);
            echo "][manu_logo]\" class=\"switch-input\" id=\"manu_logo-off-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"0\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "manu_logo", [], "any", false, false, false, 405) == 0)) {
                echo " checked=\"checked\"";
            }
            echo "/>
                  <label for=\"manu_logo-off-";
            // line 406
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-off\">";
            echo ($context["entry_no"] ?? null);
            echo "</label>
                  <span class=\"switch-selection\"></span>
                </div>
              </div>
            </div>
          </div>
          <!--------------------------- Categories tab-------------------------->
          <div class=\"option-cate-";
            // line 413
            echo ($context["tab_id"] ?? null);
            echo "-selected select-options\">
            <div class=\"form-group\">
              <label class=\"control-label\" for=\"input-cate_id-";
            // line 415
            echo ($context["tab_id"] ?? null);
            echo "\">";
            echo ($context["entry_cate_select"] ?? null);
            echo "</label>
              <div class=\"control-option width-3\">
                <input type=\"text\" name=\"octab[";
            // line 417
            echo ($context["tab_id"] ?? null);
            echo "][cate_name]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["octab"], "cate_name", [], "any", false, false, false, 417);
            echo "\" placeholder=\"Search category\" id=\"input-cate_name-";
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"form-control input-cate_name\" /><i class=\"fa fa-times\"></i>
              <input type=\"hidden\" name=\"octab[";
            // line 418
            echo ($context["tab_id"] ?? null);
            echo "][cate_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["octab"], "cate_id", [], "any", false, false, false, 418);
            echo "\" id=\"input-cate_id-";
            echo ($context["tab_id"] ?? null);
            echo "\" />
            </div>
            </div>
             <div class=\"form-group parent-form\">
              <label class=\"control-label\" for=\"input-productfrom-";
            // line 422
            echo ($context["tab_id"] ?? null);
            echo "\">";
            echo ($context["entry_pfrom"] ?? null);
            echo "</label>
              <div class=\"control-option width-3\">            
                <div class=\"switch switch-long switch-multi3\">
                <input type=\"radio\" name=\"octab[";
            // line 425
            echo ($context["tab_id"] ?? null);
            echo "][productfrom]\" class=\"switch-input\" id=\"productfrom-all-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"1\" onClick=\"GetOptionsSelect();\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "productfrom", [], "any", false, false, false, 425) == 1)) {
                echo "checked=\"checked\"";
            }
            echo "/>
                <label for=\"productfrom-all-";
            // line 426
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-1\">";
            echo ($context["entry_pfrom_all"] ?? null);
            echo "</label>
                <input type=\"radio\" name=\"octab[";
            // line 427
            echo ($context["tab_id"] ?? null);
            echo "][productfrom]\" class=\"switch-input\" id=\"productfrom-select-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"0\" onClick=\"GetOptionsSelect();\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "productfrom", [], "any", false, false, false, 427) == 0)) {
                echo "checked=\"checked\"";
            }
            echo "/>
                <label for=\"productfrom-select-";
            // line 428
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-2\">";
            echo ($context["entry_pfrom_select"] ?? null);
            echo "</label>
                <input type=\"radio\" name=\"octab[";
            // line 429
            echo ($context["tab_id"] ?? null);
            echo "][productfrom]\" class=\"switch-input\" id=\"productfrom-specific-";
            echo ($context["tab_id"] ?? null);
            echo "\" value=\"2\" onClick=\"GetOptionsSelect();\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "productfrom", [], "any", false, false, false, 429) == 2)) {
                echo "checked=\"checked\"";
            }
            echo "/>
                <label for=\"productfrom-specific-";
            // line 430
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"switch-label switch-label-3\">";
            echo ($context["entry_specificproduct"] ?? null);
            echo "</label>
                <span class=\"switch-selection\"></span>
                 
              </div>
              </div>
            </div>
            <div class=\"productfrom-all-";
            // line 436
            echo ($context["tab_id"] ?? null);
            echo "-selected select-options\">
              <!-- <small class=\"text-for-allproducts\" style=\"padding: 10px 0; float: left;\"><?php echo \$entry_textall; ?></small> -->
            </div>
            <div class=\"productfrom-select-";
            // line 439
            echo ($context["tab_id"] ?? null);
            echo "-selected select-options\">
              <div class=\"form-group\">
                <label class=\"control-label\" for=\"input-productcate-";
            // line 441
            echo ($context["tab_id"] ?? null);
            echo "\">";
            echo ($context["entry_product"] ?? null);
            echo "</label>
                <div class=\"control-option width-4\">
                  <input type=\"text\" name=\"octab[";
            // line 443
            echo ($context["tab_id"] ?? null);
            echo "][productcate]\" value=\"\" placeholder=\"";
            echo ($context["entry_product"] ?? null);
            echo "\" id=\"input-productcate-";
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"form-control\" />
                  <div id=\"category-product-";
            // line 444
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                    ";
            // line 445
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["octab"], "productcates", [], "any", false, false, false, 445));
            foreach ($context['_seq'] as $context["_key"] => $context["productcate"]) {
                echo "   
                    <div id=\"category-product";
                // line 446
                echo twig_get_attribute($this->env, $this->source, $context["productcate"], "product_id", [], "any", false, false, false, 446);
                echo "\" class=\"tt-product\">       
                    <img src=\"";
                // line 447
                echo twig_get_attribute($this->env, $this->source, $context["productcate"], "image", [], "any", false, false, false, 447);
                echo "\" alt=\"\" /> 
                    ";
                // line 448
                echo twig_get_attribute($this->env, $this->source, $context["productcate"], "name", [], "any", false, false, false, 448);
                echo "      
                    <input type=\"hidden\" name=\"octab[";
                // line 449
                echo ($context["tab_id"] ?? null);
                echo "][productcate][]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["productcate"], "product_id", [], "any", false, false, false, 449);
                echo "\" />
                    <i class=\"fa fa-times\"></i>
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productcate'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 453
            echo "                  </div>
                </div>
              </div>
            </div>
            <div class=\"productfrom-specific-";
            // line 457
            echo ($context["tab_id"] ?? null);
            echo "-selected select-options\">
              <div class=\"form-group\">
                <label class=\"control-label\" for=\"input-specific-product-";
            // line 459
            echo ($context["tab_id"] ?? null);
            echo "\">";
            echo ($context["entry_selectspecificproduct"] ?? null);
            echo "</label>
                <div class=\"control-option width-3\">
                 <small class=\"text-for-specificproducts\" style=\"padding: 0 0 10px 0; float: left;\">";
            // line 461
            echo ($context["entry_selectspecificproduct_small"] ?? null);
            echo "</small>
                  <select name=\"octab[";
            // line 462
            echo ($context["tab_id"] ?? null);
            echo "][input_specific_product]\" id=\"input-specific-product-";
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"form-control\">
                    ";
            // line 463
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "input_specific_product", [], "any", false, false, false, 463) == 0)) {
                // line 464
                echo "                    <option value=\"0\" selected=\"select-options\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                    <option value=\"1\">";
                // line 465
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                    <option value=\"2\">";
                // line 466
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                    <option value=\"3\">";
                // line 467
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                    <option value=\"4\">";
                // line 468
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                    ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 469
$context["octab"], "input_specific_product", [], "any", false, false, false, 469) == 1)) {
                // line 470
                echo "                    <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                    <option value=\"1\" selected=\"select-options\">";
                // line 471
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                    <option value=\"2\">";
                // line 472
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                    <option value=\"3\">";
                // line 473
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                    <option value=\"4\">";
                // line 474
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                    ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 475
$context["octab"], "input_specific_product", [], "any", false, false, false, 475) == 2)) {
                // line 476
                echo "                    <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                    <option value=\"1\">";
                // line 477
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                    <option value=\"2\" selected=\"select-options\">";
                // line 478
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                    <option value=\"3\">";
                // line 479
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                    <option value=\"4\">";
                // line 480
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                    ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 481
$context["octab"], "input_specific_product", [], "any", false, false, false, 481) == 3)) {
                // line 482
                echo "                    <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                    <option value=\"1\">";
                // line 483
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                    <option value=\"2\">";
                // line 484
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                    <option value=\"3\" selected=\"select-options\">";
                // line 485
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                    <option value=\"4\">";
                // line 486
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                    ";
            } else {
                // line 488
                echo "                    <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                    <option value=\"1\">";
                // line 489
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                    <option value=\"2\">";
                // line 490
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                    <option value=\"3\">";
                // line 491
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                    <option value=\"4\" selected=\"select-options\">";
                // line 492
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                    ";
            }
            // line 494
            echo "                  </select>
                </div>
              </div>
            </div>
          </div>
          <!--------------------------- Auto tab ----------------------- -->
          <div class=\"option-auto-";
            // line 500
            echo ($context["tab_id"] ?? null);
            echo "-selected select-options\">
            <div class=\"form-group auto-select\">
              <label class=\"control-label\" for=\"input-autoproduct-";
            // line 502
            echo ($context["tab_id"] ?? null);
            echo "\">";
            echo ($context["entry_product"] ?? null);
            echo "</label>
              <div class=\"control-option width-2\">
                <select name=\"octab[";
            // line 504
            echo ($context["tab_id"] ?? null);
            echo "][autoproduct]\" id=\"input-autoproduct-";
            echo ($context["tab_id"] ?? null);
            echo "\" class=\"form-control\">
                  ";
            // line 505
            if ((twig_get_attribute($this->env, $this->source, $context["octab"], "autoproduct", [], "any", false, false, false, 505) == 0)) {
                // line 506
                echo "                  <option value=\"0\" selected=\"select-options\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                  <option value=\"1\">";
                // line 507
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                  <option value=\"2\">";
                // line 508
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                  <option value=\"3\">";
                // line 509
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                  <option value=\"4\">";
                // line 510
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                  ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 511
$context["octab"], "autoproduct", [], "any", false, false, false, 511) == 1)) {
                // line 512
                echo "                  <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                  <option value=\"1\" selected=\"select-options\">";
                // line 513
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                  <option value=\"2\">";
                // line 514
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                  <option value=\"3\">";
                // line 515
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                  <option value=\"4\">";
                // line 516
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                  ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 517
$context["octab"], "autoproduct", [], "any", false, false, false, 517) == 2)) {
                // line 518
                echo "                  <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                  <option value=\"1\">";
                // line 519
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                  <option value=\"2\" selected=\"select-options\">";
                // line 520
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                  <option value=\"3\">";
                // line 521
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                  <option value=\"4\">";
                // line 522
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                  ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 523
$context["octab"], "autoproduct", [], "any", false, false, false, 523) == 3)) {
                // line 524
                echo "                  <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                  <option value=\"1\">";
                // line 525
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                  <option value=\"2\">";
                // line 526
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                  <option value=\"3\" selected=\"select-options\">";
                // line 527
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                  <option value=\"4\">";
                // line 528
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                  ";
            } else {
                // line 530
                echo "                  <option value=\"0\">";
                echo ($context["entry_new"] ?? null);
                echo "</option>
                  <option value=\"1\">";
                // line 531
                echo ($context["entry_sale"] ?? null);
                echo "</option>
                  <option value=\"2\">";
                // line 532
                echo ($context["entry_bestseller"] ?? null);
                echo "</option>
                  <option value=\"3\">";
                // line 533
                echo ($context["entry_mostview"] ?? null);
                echo "</option>
                  <option value=\"4\" selected=\"select-options\">";
                // line 534
                echo ($context["entry_dealproducts"] ?? null);
                echo "</option>
                  ";
            }
            // line 536
            echo "                </select>
              </div>
            </div>
          </div>
        </div>
        </div>
      ";
            // line 542
            $context["tab_id"] = (($context["tab_id"] ?? null) + 1);
            // line 543
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['octab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 544
        echo "      </div>
      <button class=\"button-addnew\" type=\"button\" onClick=\"addTabs();\">";
        // line 545
        echo ($context["entry_addnewtab"] ?? null);
        echo "</button>
    </form>
    </div>
  </div>
</div>
<link href=\"view/javascript/codemirror/lib/codemirror.css\" rel=\"stylesheet\" />
  <link href=\"view/javascript/codemirror/theme/monokai.css\" rel=\"stylesheet\" />
  <script type=\"text/javascript\" src=\"view/javascript/codemirror/lib/codemirror.js\"></script> 
  <script type=\"text/javascript\" src=\"view/javascript/codemirror/lib/xml.js\"></script> 
  <script type=\"text/javascript\" src=\"view/javascript/codemirror/lib/formatting.js\"></script> 
    
  <script type=\"text/javascript\" src=\"view/javascript/summernote/summernote.js\"></script>
  <link href=\"view/javascript/summernote/summernote.css\" rel=\"stylesheet\" />
  <script type=\"text/javascript\" src=\"view/javascript/summernote/summernote-image-attributes.js\"></script>
  <script type=\"text/javascript\" src=\"view/javascript/summernote/opencart.js\"></script>
  <script type=\"text/javascript\"><!--
  var category_id;
  var tab_id = ";
        // line 562
        echo ($context["tab_id"] ?? null);
        echo ";
function loadAutocomplete(i){
  \$(\"input[name=\\'octab[\"+i+\"][productall]\\']\").autocomplete({
    source: function(request, response) {
      \$.ajax({
        url: 'index.php?route=extension/module/ocproduct/autocomplete&user_token=";
        // line 567
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response(\$.map(json, function(item) {
            return {
              image: item['image'],
              label: item['name'],
              value: item['product_id'] 
            }
          }));
        }
      });
    },
    select: function(item) {
      \$(\"input[name=\\'octab[\"+i+\"][productall]\\']\").val('');
      
      \$('#featured-product-'+ i+ + item['value']).remove();
      \$('#featured-product-'+ i).append('<div id=\"featured-product-'+i + item['value'] + '\" class=\"tt-product\"><i class=\"fa fa-times\"></i> ' + '<img src=\"' +item['image']+ '\" alt=\"\"/>' + item['label'] + '<input type=\"hidden\" name=\"octab['+i+'][productall][]\" value=\"' + item['value'] + '\" /></div>');  
      
      \$('#featured-product-'+i).scrollTop(1000);
    }
  });
  \$('#featured-product-'+i).delegate('.fa-times', 'click', function() {
    \$(this).parent().remove();
  });

  // Search category
  \$(\"input[name=\\'octab[\"+i+\"][cate_name]\\']\").autocomplete({
    source: function(request, response) {
      \$.ajax({
        url: 'index.php?route=extension/module/ocproduct/autocompleteCategory&user_token=";
        // line 597
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response(\$.map(json, function(item) {
            return {
              label: item['name'],
              value: item['category_id']
            }
          }));
        }
      });
    },
    select: function(item) {  
      document.getElementById(\"input-cate_name-\"+i).value= item['label'];  
      document.getElementById(\"input-cate_id-\"+i).value= item['value'];  
      \$('#category-product-'+i).children().remove();
      }
  });
  \$('#input-cate_name-'+i).parent().delegate('.fa-times', 'click', function() {
    document.getElementById(\"input-cate_name-\"+i).value= '';
    document.getElementById(\"input-cate_id-\"+i).value= '';
    \$('#category-product-'+i).children().remove();
  });

  // Search manufacturer
  \$(\"input[name=\\'octab[\"+i+\"][manu_name]\\']\").autocomplete({
    source: function(request, response) {
      \$.ajax({
        url: 'index.php?route=extension/module/octabproducts/autocompleteManufacturer&user_token=";
        // line 625
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response(\$.map(json, function(item) {
            return {
              label: item['name'],
              value: item['manufacturer_id']
            }
          }));
        }
      });
    },
    select: function(item) {  
      document.getElementById(\"input-manu_name-\"+i).value= item['label'];  
      document.getElementById(\"input-manu_id-\"+i).value= item['value'];  
      }
  });
  \$('#input-manu_name-'+i).parent().delegate('.fa-times', 'click', function() {
    document.getElementById(\"input-manu_name-\"+i).value= '';
    document.getElementById(\"input-manu_id-\"+i).value= '';
  });

  // Search product from category
  \$(\"input[name=\\'octab[\"+i+\"][productcate]\\']\").autocomplete({
    source: function( request, response) {
      \$.ajax({
        url: 'index.php?route=extension/module/ocproduct/getProductCategory&user_token=";
        // line 651
        echo ($context["user_token"] ?? null);
        echo "&category_id=' + \$(\"#input-cate_id-\"+i).val()+ '&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        data: {
        },
        success: function(json) {
          response(\$.map(json, function(item) {
            return {
              image: item['image'],
              label: item['name'],
              value: item['product_id'] 
            }
          }));
          
        }
      });
    },
    select: function(item) {
      \$('input[name=\\'productcate\\']').val('');
      
      \$('#category-product-' + i + item['value']).remove();
      
      \$('#category-product-' +i).append('<div id=\"category-product-' + i + item['value'] + '\" class=\"tt-product\"><i class=\"fa fa-times\"></i> ' + '<img src=\"' +item['image']+ '\" alt=\"\"/>' + item['label'] + '<input type=\"hidden\" name=\"octab['+i+'][productcate][]\" value=\"' + item['value'] + '\" /></div>');  
      
      \$('#category-product'+i).scrollTop(1000);
    }
  });
    
  \$('#category-product-'+i).delegate('.fa-times', 'click', function() {
    \$(this).parent().remove();
  });
}
function GetOptionsSelect() {
    \$('.select-options').hide();
    var ParentForms = document.getElementsByClassName('parent-form');
    for (var j = 0; j < ParentForms.length; j ++){
      var InputChilds = ParentForms[j].getElementsByTagName('input');
      for (var i = 0; i < InputChilds.length; i++) {
            if (InputChilds[i].checked) {
              var id = InputChilds[i].id;
              var test = \$('.'+id+'-selected');
              \$(test).show();

            } //end if
 
      } // end for
    };
    
} //end

\$(document).ready(function(){
  GetOptionsSelect(); 
  afterAdd();
  \$('.list-selection label').on('click',function(){
      \$(this).parent().find('.active').removeClass('active');
      \$(this).addClass('active');
  });
  for(i=0; i <= tab_id; i++){
    loadAutocomplete(i);
  }
  \$('.tab-content').hide(); 
})
";
        // line 712
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 713
            echo "  \$('#input-description";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 713);
            echo "').summernote({height: 300});
  \$('#language";
            // line 714
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 714);
            echo " .html-content').hide();
  \$('#language";
            // line 715
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 715);
            echo " a').click(function(){
    \$('#language";
            // line 716
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 716);
            echo " .html-content').slideToggle();
  });
  \$('#input-title";
            // line 718
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 718);
            echo "').parent().parent().parent().css('border-top','2px solid #279CBB');
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 720
        echo "

function afterAdd(){
  \$('.tab-heading').on('click', function(){    
    \$(this).next('.tab-content').slideToggle();
\tevent.stoppropagation();
  })
  \$('.delete_tab').click(function(){
    \$(this).parent().parent().remove();
  })
}
function addTabs() {
  html  = '<div class=\"tab-container\"><div class=\"tab-heading\">Tab-'+tab_id+'<span class=\"delete_tab\"><i class=\"fa fa-times\"></i>";
        // line 732
        echo ($context["entry_deletetab"] ?? null);
        echo "</span></div><div class=\"tab-content\">';
    html += '<div class=\"form-group\">';
    html += '<label class=\"control-label\" for=\"input-row\">";
        // line 734
        echo ($context["entry_overwritetitle"] ?? null);
        echo "</label>';
    html += '<div class=\"control-option width-4\">';
    ";
        // line 736
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 737
            echo "    html += '<div class=\"input-group\">';
    html += '<span class=\"input-group-addon\">";
            // line 738
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 738);
            echo "</span>';
    html += '<input type=\"text\" name=\"octab[' + tab_id + '][tab_name][";
            // line 739
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 739);
            echo "][title]\" value=\"\" placeholder=\"\" id=\"input-tabname";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 739);
            echo "-'+ tab_id +'\" class=\"form-control\" />';
    html += '</div>';
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 742
        echo "    html += '</div></div>';
    html += '<div class=\"form-group parent-form\">';
    html += '<label class=\"control-label\" for=\"input-option\">";
        // line 744
        echo ($context["entry_type"] ?? null);
        echo "</label>';
    html += '<div class=\"control-option\"><div class=\"switch switch-long switch-multi4\">';
    html += '<input type=\"radio\" name=\"octab[' + tab_id + '][option]\" class=\"switch-input switch-input-1\" id=\"option-all-' + tab_id + '\" onClick=\"GetOptionsSelect();\" value=\"0\" checked=\"checked\"/>';
      html += '<label for=\"option-all-' + tab_id + '\" class=\"switch-label switch-label-1\" >";
        // line 747
        echo ($context["entry_type_all"] ?? null);
        echo "</label>';
    html += '<input type=\"radio\" name=\"octab[' + tab_id + '][option]\" class=\"switch-input switch-input-2\" onClick=\"GetOptionsSelect();\" id=\"option-cate-' + tab_id + '\" value=\"1\"/>';
    html += '<label for=\"option-cate-' + tab_id + '\" class=\"switch-label switch-label-2\">";
        // line 749
        echo ($context["entry_type_cate"] ?? null);
        echo "</label>';
    html += '<input type=\"radio\" name=\"octab[' + tab_id + '][option]\" class=\"switch-input switch-input-3\" onClick=\"GetOptionsSelect();\" id=\"option-auto-' + tab_id + '\" value=\"2\"/>';
    html += '<label for=\"option-auto-' + tab_id + '\" class=\"switch-label switch-label-3\">";
        // line 751
        echo ($context["entry_type_auto"] ?? null);
        echo "</label>';
    html += '<input type=\"radio\" name=\"octab[' + tab_id + '][option]\" class=\"switch-input switch-input-4\" onClick=\"GetOptionsSelect();\" id=\"option-manu-' + tab_id + '\" value=\"3\"/>';
    html += '<label for=\"option-manu-' + tab_id + '\" class=\"switch-label switch-label-4\">";
        // line 753
        echo ($context["entry_type_manu"] ?? null);
        echo "</label>';
    html += '<span class=\"switch-selection\"></span>';
    html += '</div></div>';
    html += '</div>';

    /////////////////////////////////

    html += '<div class=\"option-all-' + tab_id + '-selected select-options\">';
        html += '<div class=\"form-group\">';
        html += '<label class=\"control-label\" for=\"input-product\">";
        // line 762
        echo ($context["entry_product"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option width-4\">';
        html += '<input type=\"text\" name=\"octab[' + tab_id + '][productall]\" value=\"\" placeholder=\"";
        // line 764
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-product-' + tab_id + '\" class=\"form-control\" />';
        html += '<div id=\"featured-product-' + tab_id + '\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">';
        html += '</div></div></div></div>'; 

        ////////////////////////////////////

        html += '<div class=\"option-cate-' + tab_id + '-selected select-options\">';
        html += '<div class=\"form-group\">';
        html += '<label class=\"control-label\" for=\"input-cate_id\">";
        // line 772
        echo ($context["entry_cate_select"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option width-3\">';
        html += '<input type=\"text\" name=\"octab[' + tab_id + '][cate_name]\" value=\"\" placeholder=\"Search category\" id=\"input-cate_name-' + tab_id + '\" class=\"form-control input-cate_name\" /><i class=\"fa fa-times\"></i>';
        html += '<input type=\"hidden\" name=\"octab[' + tab_id + '][cate_id]\" value=\"\" id=\"input-cate_id-' + tab_id + '\" />';
        html += '</div></div>';

        html += '<div class=\"form-group parent-form\">';
        html += '<label class=\"control-label\" for=\"input-productfrom\">";
        // line 779
        echo ($context["entry_pfrom"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option width-3\">';             
        html += '<div class=\"switch switch-long switch-multi3\">';
        html += '<input type=\"radio\" name=\"octab[' + tab_id + '][productfrom]\" class=\"switch-input\" id=\"productfrom-all-' + tab_id + '\" value=\"1\" checked=\"checked\"  onClick=\"GetOptionsSelect();\"/>';
        html += '<label for=\"productfrom-all-' + tab_id + '\" class=\"switch-label switch-label-1\">";
        // line 783
        echo ($context["entry_pfrom_all"] ?? null);
        echo "</label>';
        html += '<input type=\"radio\" name=\"octab[' + tab_id + '][productfrom]\" class=\"switch-input\" id=\"productfrom-select-' + tab_id + '\" value=\"0\" onClick=\"GetOptionsSelect();\"/>';
        html += '<label for=\"productfrom-select-' + tab_id + '\" class=\"switch-label switch-label-2\">";
        // line 785
        echo ($context["entry_pfrom_select"] ?? null);
        echo "</label>';
        html += '<input type=\"radio\" name=\"octab[' + tab_id + '][productfrom]\" class=\"switch-input\" id=\"productfrom-specific-' + tab_id + '\" value=\"2\" onClick=\"GetOptionsSelect();\"/>';
        html += '<label for=\"productfrom-specific-' + tab_id + '\" class=\"switch-label switch-label-3\">";
        // line 787
        echo ($context["entry_specificproduct"] ?? null);
        echo "</label>';
        html += '<span class=\"switch-selection\"></span>';                 
        html += '</div></div></div>';

        html += '<div class=\"productfrom-all-' + tab_id + '-selected select-options\"></div>';

        html += '<div class=\"productfrom-select-' + tab_id + '-selected select-options\">';
        html += '<div class=\"form-group\">';
        html += '<label class=\"control-label\" for=\"input-productcate-' + tab_id + '\">";
        // line 795
        echo ($context["entry_product"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option width-4\">';
        html += '<input type=\"text\" name=\"octab[' + tab_id + '][productcate]\" value=\"\" placeholder=\"";
        // line 797
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-productcate-' + tab_id + '\" class=\"form-control\" />';
        html += '<div id=\"category-product-' + tab_id + '\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">';
        html += '</div></div></div></div>';


        html += '<div class=\"productfrom-specific-' + tab_id + '-selected select-options\">';
        html += '<div class=\"form-group\">';
        html += '<label class=\"control-label\" for=\"input-specific-product-' + tab_id + '\">";
        // line 804
        echo ($context["entry_selectspecificproduct"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option width-3\">';
        html += '<small class=\"text-for-specificproducts\" style=\"padding: 0 0 10px 0; float: left;\">";
        // line 806
        echo ($context["entry_selectspecificproduct_small"] ?? null);
        echo "</small>';
        html += '<select name=\"octab[' + tab_id + '][input_specific_product]\" id=\"input-specific-product-' + tab_id + '\" class=\"form-control\">';
        html += '<option value=\"0\">";
        // line 808
        echo ($context["entry_new"] ?? null);
        echo "</option>';
        html += '<option value=\"1\">";
        // line 809
        echo ($context["entry_sale"] ?? null);
        echo "</option>';
        html += '<option value=\"2\">";
        // line 810
        echo ($context["entry_bestseller"] ?? null);
        echo "</option>';
        html += '<option value=\"3\">";
        // line 811
        echo ($context["entry_mostview"] ?? null);
        echo "</option>';
        html += '<option value=\"4\">";
        // line 812
        echo ($context["entry_dealproducts"] ?? null);
        echo "</option>';
        html += '</select></div></div></div></div>';

        html += '<div class=\"option-auto-' + tab_id + '-selected select-options\">';
        html += '<div class=\"form-group auto-select\">';
        html += '<label class=\"control-label\" for=\"input-autoproduct-' + tab_id + '\">";
        // line 817
        echo ($context["entry_product"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option width-2\">';
        html += '<select name=\"octab[' + tab_id + '][autoproduct]\" id=\"input-select-' + tab_id + '\" class=\"form-control\">';
        html += '<option value=\"0\">";
        // line 820
        echo ($context["entry_new"] ?? null);
        echo "</option>';
        html += '<option value=\"1\">";
        // line 821
        echo ($context["entry_sale"] ?? null);
        echo "</option>';
        html += '<option value=\"2\">";
        // line 822
        echo ($context["entry_bestseller"] ?? null);
        echo "</option>';
        html += '<option value=\"3\">";
        // line 823
        echo ($context["entry_mostview"] ?? null);
        echo "</option>';
        html += '<option value=\"4\">";
        // line 824
        echo ($context["entry_dealproducts"] ?? null);
        echo "</option>';
        html += '</select></div></div></div>';

        html += '<div class=\"option-manu-' + tab_id + '-selected select-options\">';
        html += '<div class=\"form-group\">';
        html += '<label class=\"control-label\" for=\"input-manu_id\">";
        // line 829
        echo ($context["entry_manu_select"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option width-3\">';
        html += '<input type=\"text\" name=\"octab[' + tab_id + '][manu_name]\" value=\"\" placeholder=\"Search manufacturer\" id=\"input-manu_name-' + tab_id + '\" class=\"form-control input-manu_name\" /><i class=\"fa fa-times\"></i>';
        html += '<input type=\"hidden\" name=\"octab[' + tab_id + '][manu_id]\" value=\"\" id=\"input-manu_id-' + tab_id + '\" />';
        html += '</div></div>';

        html += '<div class=\"form-group\">';
        html += '<label class=\"control-label\" for=\"input-manu_logo\">";
        // line 836
        echo ($context["entry_manu_logo"] ?? null);
        echo "</label>';
        html += '<div class=\"control-option\"><div class=\"switch switch-bol\">';
          html += '<input type=\"radio\" name=\"octab[' + tab_id + '][manu_logo]\" class=\"switch-input\" id=\"manu_logo-on-' + tab_id + '\" value=\"1\" checked=\"checked\">';
          html += '<label for=\"manu_logo-on-' + tab_id + '\" class=\"switch-label switch-label-on\">";
        // line 839
        echo ($context["entry_yes"] ?? null);
        echo "</label>';
          html += '<input type=\"radio\" name=\"octab[' + tab_id + '][manu_logo]\" class=\"switch-input\" id=\"manu_logo-off-' + tab_id + '\" value=\"0\">';
          html += '<label for=\"manu_logo-off-' + tab_id + '\" class=\"switch-label switch-label-off\">";
        // line 841
        echo ($context["entry_no"] ?? null);
        echo "</label>';
          html += '<span class=\"switch-selection\"></span>';
        html += '</div></div>';
        html += '</div>';
        html += '</div>';

    html += '</div></div>';
  
  \$('.tabs-container').append(html); 
  GetOptionsSelect(); 
  afterAdd();
  loadAutocomplete(tab_id);
  tab_id++;
  \$('body').scrollTop(10000);
}
//--></script>
</div>
";
        // line 858
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/octabproducts.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2069 => 858,  2049 => 841,  2044 => 839,  2038 => 836,  2028 => 829,  2020 => 824,  2016 => 823,  2012 => 822,  2008 => 821,  2004 => 820,  1998 => 817,  1990 => 812,  1986 => 811,  1982 => 810,  1978 => 809,  1974 => 808,  1969 => 806,  1964 => 804,  1954 => 797,  1949 => 795,  1938 => 787,  1933 => 785,  1928 => 783,  1921 => 779,  1911 => 772,  1900 => 764,  1895 => 762,  1883 => 753,  1878 => 751,  1873 => 749,  1868 => 747,  1862 => 744,  1858 => 742,  1847 => 739,  1843 => 738,  1840 => 737,  1836 => 736,  1831 => 734,  1826 => 732,  1812 => 720,  1804 => 718,  1799 => 716,  1795 => 715,  1791 => 714,  1786 => 713,  1782 => 712,  1718 => 651,  1689 => 625,  1658 => 597,  1625 => 567,  1617 => 562,  1597 => 545,  1594 => 544,  1588 => 543,  1586 => 542,  1578 => 536,  1573 => 534,  1569 => 533,  1565 => 532,  1561 => 531,  1556 => 530,  1551 => 528,  1547 => 527,  1543 => 526,  1539 => 525,  1534 => 524,  1532 => 523,  1528 => 522,  1524 => 521,  1520 => 520,  1516 => 519,  1511 => 518,  1509 => 517,  1505 => 516,  1501 => 515,  1497 => 514,  1493 => 513,  1488 => 512,  1486 => 511,  1482 => 510,  1478 => 509,  1474 => 508,  1470 => 507,  1465 => 506,  1463 => 505,  1457 => 504,  1450 => 502,  1445 => 500,  1437 => 494,  1432 => 492,  1428 => 491,  1424 => 490,  1420 => 489,  1415 => 488,  1410 => 486,  1406 => 485,  1402 => 484,  1398 => 483,  1393 => 482,  1391 => 481,  1387 => 480,  1383 => 479,  1379 => 478,  1375 => 477,  1370 => 476,  1368 => 475,  1364 => 474,  1360 => 473,  1356 => 472,  1352 => 471,  1347 => 470,  1345 => 469,  1341 => 468,  1337 => 467,  1333 => 466,  1329 => 465,  1324 => 464,  1322 => 463,  1316 => 462,  1312 => 461,  1305 => 459,  1300 => 457,  1294 => 453,  1282 => 449,  1278 => 448,  1274 => 447,  1270 => 446,  1264 => 445,  1260 => 444,  1252 => 443,  1245 => 441,  1240 => 439,  1234 => 436,  1223 => 430,  1213 => 429,  1207 => 428,  1197 => 427,  1191 => 426,  1181 => 425,  1173 => 422,  1162 => 418,  1154 => 417,  1147 => 415,  1142 => 413,  1130 => 406,  1120 => 405,  1114 => 404,  1104 => 403,  1098 => 400,  1087 => 396,  1079 => 395,  1072 => 393,  1067 => 391,  1060 => 386,  1049 => 383,  1045 => 382,  1041 => 381,  1036 => 379,  1030 => 378,  1026 => 377,  1018 => 376,  1011 => 374,  1006 => 372,  995 => 366,  985 => 365,  979 => 364,  969 => 363,  963 => 362,  953 => 361,  947 => 360,  937 => 359,  931 => 356,  926 => 353,  909 => 350,  905 => 349,  902 => 348,  898 => 347,  893 => 345,  885 => 342,  882 => 341,  877 => 340,  875 => 339,  866 => 333,  860 => 332,  855 => 330,  850 => 327,  844 => 325,  842 => 324,  838 => 323,  835 => 322,  829 => 320,  827 => 319,  823 => 318,  816 => 316,  807 => 312,  802 => 310,  793 => 304,  787 => 303,  783 => 302,  777 => 301,  771 => 298,  762 => 292,  756 => 291,  752 => 290,  746 => 289,  740 => 286,  731 => 280,  725 => 279,  721 => 278,  715 => 277,  709 => 274,  700 => 268,  694 => 267,  690 => 266,  684 => 265,  676 => 262,  667 => 256,  661 => 255,  657 => 254,  651 => 253,  645 => 250,  642 => 249,  636 => 244,  629 => 239,  622 => 234,  620 => 233,  614 => 229,  612 => 228,  606 => 224,  604 => 223,  597 => 220,  589 => 214,  584 => 213,  578 => 211,  576 => 210,  572 => 209,  567 => 208,  561 => 206,  559 => 205,  555 => 204,  550 => 203,  544 => 201,  542 => 200,  538 => 199,  534 => 198,  529 => 196,  520 => 190,  514 => 189,  510 => 188,  504 => 187,  498 => 184,  489 => 178,  483 => 177,  479 => 176,  473 => 175,  467 => 172,  459 => 167,  454 => 165,  446 => 160,  441 => 158,  432 => 152,  426 => 151,  422 => 150,  416 => 149,  410 => 146,  402 => 141,  397 => 139,  388 => 133,  382 => 132,  378 => 131,  372 => 130,  366 => 127,  359 => 123,  354 => 121,  347 => 117,  342 => 115,  332 => 108,  326 => 107,  322 => 106,  316 => 105,  310 => 102,  301 => 96,  295 => 95,  291 => 94,  285 => 93,  281 => 92,  275 => 91,  269 => 88,  266 => 87,  261 => 83,  245 => 79,  240 => 77,  235 => 76,  231 => 75,  223 => 72,  220 => 71,  216 => 68,  203 => 65,  199 => 64,  196 => 63,  192 => 62,  187 => 60,  177 => 53,  171 => 52,  167 => 51,  161 => 50,  155 => 47,  150 => 44,  144 => 42,  142 => 41,  136 => 40,  131 => 38,  126 => 35,  120 => 33,  118 => 32,  112 => 31,  107 => 29,  102 => 27,  96 => 24,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/octabproducts.twig", "");
    }
}
