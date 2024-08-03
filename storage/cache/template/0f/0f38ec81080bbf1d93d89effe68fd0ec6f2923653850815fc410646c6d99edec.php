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

/* extension/module/ocproduct.twig */
class __TwigTemplate_666f6c6710e387239543dc7d58a26d05d3c47c9eecff49c161cb66a6126a14d9 extends \Twig\Template
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
\t\t\t<div class=\"form-group\">
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
      
          <div class=\"form-group parent-form\">
            <label class=\"control-label\" for=\"input-option\">";
        // line 60
        echo ($context["entry_type"] ?? null);
        echo "</label>
            <div class=\"control-option\">
              <div class=\"switch switch-long switch-multi3\">
                <input type=\"radio\" name=\"option\" class=\"switch-input\" id=\"option-all\" value=\"0\" onClick=\"GetOptionsSelect();\" ";
        // line 63
        if ((($context["option"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
                <label for=\"option-all\" class=\"switch-label switch-label-1\">";
        // line 64
        echo ($context["entry_type_all"] ?? null);
        echo "</label>
                <input type=\"radio\" name=\"option\" class=\"switch-input\" id=\"option-cate\" value=\"1\" onClick=\"GetOptionsSelect();\" ";
        // line 65
        if ((($context["option"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
                <label for=\"option-cate\" class=\"switch-label switch-label-2\">";
        // line 66
        echo ($context["entry_type_cate"] ?? null);
        echo "</label>
                 <input type=\"radio\" name=\"option\" class=\"switch-input\" id=\"option-auto\" value=\"2\" onClick=\"GetOptionsSelect();\" ";
        // line 67
        if ((($context["option"] ?? null) == 2)) {
            echo " checked=\"checked\"";
        }
        echo "/>
                <label for=\"option-auto\" class=\"switch-label switch-label-3\">";
        // line 68
        echo ($context["entry_type_auto"] ?? null);
        echo "</label>
                <span class=\"switch-selection\"></span>
              </div>
            </div>
          </div>
       
          ";
        // line 75
        echo "          <div class=\"option-all-selected select-options\">
            <div class=\"form-group\">
              <label class=\"control-label\" for=\"input-product\">";
        // line 77
        echo ($context["entry_product"] ?? null);
        echo "</label>
              <div class=\"control-option width-4\">
                <input type=\"text\" name=\"product\" value=\"\" placeholder=\"";
        // line 79
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-product\" class=\"form-control\" />
                <div id=\"featured-product\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                  ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 82
            echo "          
                  <div id=\"featured-product";
            // line 83
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 83);
            echo "\" class=\"tt-product\">
                  <i class=\"fa fa-times\"></i>
                  <img src=\"";
            // line 85
            echo twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 85);
            echo "\" alt=\"\" />
                  ";
            // line 86
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 86);
            echo "
            
                  <input type=\"hidden\" name=\"product[]\" value=\"";
            // line 88
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 88);
            echo "\" />
                  </div>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "                </div>
              </div>
            </div>
          </div>
          ";
        // line 96
        echo "          <div class=\"option-cate-selected select-options\">
            <div class=\"form-group\">
              <label class=\"control-label\" for=\"input-cate_id\">";
        // line 98
        echo ($context["entry_cate_select"] ?? null);
        echo "</label>
              <div class=\"control-option width-3\">
                <input type=\"text\" name=\"cate_name\" value=\"";
        // line 100
        echo twig_get_attribute($this->env, $this->source, ($context["cate_ids"] ?? null), "name", [], "any", false, false, false, 100);
        echo "\" placeholder=\"Search category\" id=\"input-cate_name\" class=\"form-control\" /><i class=\"fa fa-times\"></i>
                 <input type=\"hidden\" name=\"cate_id\" value=\"";
        // line 101
        echo twig_get_attribute($this->env, $this->source, ($context["cate_ids"] ?? null), "category_id", [], "any", false, false, false, 101);
        echo "\" id=\"input-cate_id\" />
               </div>
               ";
        // line 103
        if (($context["error_category"] ?? null)) {
            // line 104
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_category"] ?? null);
            echo "</div>
               ";
        }
        // line 106
        echo "             </div>
            <div class=\"form-group parent-form\">
              <label class=\"control-label\" for=\"input-productfrom\">";
        // line 108
        echo ($context["entry_pfrom"] ?? null);
        echo "</label>
              <div class=\"control-option width-3\">            
                <div class=\"switch switch-long switch-multi3\">
                  <input type=\"radio\" name=\"productfrom\" class=\"switch-input\" id=\"productfrom-all\" value=\"1\" onClick=\"GetOptionsSelect();\" ";
        // line 111
        if ((($context["productfrom"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
                  <label for=\"productfrom-all\" class=\"switch-label switch-label-1\">";
        // line 112
        echo ($context["entry_pfrom_all"] ?? null);
        echo "</label>
                  <input type=\"radio\" name=\"productfrom\" class=\"switch-input\" id=\"productfrom-select\" value=\"0\" onClick=\"GetOptionsSelect();\" ";
        // line 113
        if ((($context["productfrom"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
                  <label for=\"productfrom-select\" class=\"switch-label switch-label-2\">";
        // line 114
        echo ($context["entry_pfrom_select"] ?? null);
        echo "</label>
                  <input type=\"radio\" name=\"productfrom\" class=\"switch-input\" id=\"specific-product\" value=\"2\" onClick=\"GetOptionsSelect();\" ";
        // line 115
        if ((($context["productfrom"] ?? null) == 2)) {
            echo " checked=\"checked\"";
        }
        echo "/>
                  <label for=\"specific-product\" class=\"switch-label switch-label-3\">";
        // line 116
        echo ($context["entry_specificproduct"] ?? null);
        echo "</label>
                  <span class=\"switch-selection\"></span>
                </div>
              </div>
            </div>
            <div class=\"productfrom-all-selected select-options\">
            </div>
            <div class=\"productfrom-select-selected select-options\">
              <div class=\"form-group\">
                <label class=\"control-label\" for=\"input-productcate\">";
        // line 125
        echo ($context["entry_product"] ?? null);
        echo "</label>
                <div class=\"control-option width-4\">
                  <input type=\"text\" name=\"productcate\" value=\"\" placeholder=\"";
        // line 127
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-productcate\" class=\"form-control\" />
                  <div id=\"category-product\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                    ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["productcates"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["productcate"]) {
            // line 130
            echo "                    <div id=\"category-product";
            echo twig_get_attribute($this->env, $this->source, $context["productcate"], "product_id", [], "any", false, false, false, 130);
            echo "\" class=\"tt-product\">          
                      <img src=\"";
            // line 131
            echo twig_get_attribute($this->env, $this->source, $context["productcate"], "image", [], "any", false, false, false, 131);
            echo "\" alt=\"\" />
                      ";
            // line 132
            echo twig_get_attribute($this->env, $this->source, $context["productcate"], "name", [], "any", false, false, false, 132);
            echo "            
                      <input type=\"hidden\" name=\"productcate[]\" value=\"";
            // line 133
            echo twig_get_attribute($this->env, $this->source, $context["productcate"], "product_id", [], "any", false, false, false, 133);
            echo "\" />
                      <i class=\"fa fa-times\"></i>
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productcate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "                  </div>
                </div>
              </div>
            </div>
            <div class=\"specific-product-selected select-options\">
              <div class=\"form-group\">
                <label class=\"control-label\" for=\"input-specific-product\">";
        // line 143
        echo ($context["entry_selectspecificproduct"] ?? null);
        echo "</label>
                <div class=\"control-option width-3\">
                  <small class=\"text-for-specificproducts\" style=\"padding: 0 0 10px 0; float: left;\">";
        // line 145
        echo ($context["entry_selectspecificproduct_small"] ?? null);
        echo "</small>
                  <select name=\"input_specific_product\" id=\"input-specific-product\" class=\"form-control\">
                    ";
        // line 147
        if ((($context["input_specific_product"] ?? null) == 0)) {
            // line 148
            echo "                      <option value=\"0\" selected=\"selected\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                      <option value=\"1\">";
            // line 149
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                      <option value=\"2\">";
            // line 150
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                      <option value=\"3\">";
            // line 151
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                      <option value=\"4\">";
            // line 152
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                     ";
        } elseif ((        // line 153
($context["input_specific_product"] ?? null) == 1)) {
            // line 154
            echo "                      <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                      <option value=\"1\" selected=\"selected\">";
            // line 155
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                      <option value=\"2\">";
            // line 156
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                      <option value=\"3\">";
            // line 157
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                      <option value=\"4\">";
            // line 158
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                     ";
        } elseif ((        // line 159
($context["input_specific_product"] ?? null) == 2)) {
            // line 160
            echo "                      <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                      <option value=\"1\">";
            // line 161
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                      <option value=\"2\" selected=\"selected\">";
            // line 162
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                      <option value=\"3\">";
            // line 163
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                      <option value=\"4\">";
            // line 164
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                    ";
        } elseif ((        // line 165
($context["input_specific_product"] ?? null) == 3)) {
            // line 166
            echo "                      <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                      <option value=\"1\">";
            // line 167
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                      <option value=\"2\">";
            // line 168
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                      <option value=\"3\" selected=\"selected\">";
            // line 169
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                      <option value=\"4\">";
            // line 170
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 172
            echo "                      <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                      <option value=\"1\">";
            // line 173
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                      <option value=\"2\">";
            // line 174
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                      <option value=\"3\">";
            // line 175
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                      <option value=\"4\" selected=\"selected\">";
            // line 176
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                    ";
        }
        // line 178
        echo "                  </select>
                </div>
              </div>
            </div>
          </div>";
        // line 185
        echo "          <div class=\"option-auto-selected select-options\">
            <div class=\"form-group auto-select\">
              <label class=\"control-label\" for=\"input-autoproduct\">";
        // line 187
        echo ($context["entry_product"] ?? null);
        echo "</label>
              <div class=\"control-option width-2\">
                <select name=\"autoproduct\" id=\"input-select\" class=\"form-control\">
                  ";
        // line 190
        if ((($context["autoproduct"] ?? null) == 0)) {
            // line 191
            echo "                    <option value=\"0\" selected=\"selected\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                    <option value=\"1\">";
            // line 192
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                    <option value=\"2\">";
            // line 193
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                    <option value=\"3\">";
            // line 194
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                    <option value=\"4\">";
            // line 195
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                   ";
        } elseif ((        // line 196
($context["autoproduct"] ?? null) == 1)) {
            // line 197
            echo "                    <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                    <option value=\"1\" selected=\"selected\">";
            // line 198
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                    <option value=\"2\">";
            // line 199
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                    <option value=\"3\">";
            // line 200
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                    <option value=\"4\">";
            // line 201
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                   ";
        } elseif ((        // line 202
($context["autoproduct"] ?? null) == 2)) {
            // line 203
            echo "                    <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                    <option value=\"1\">";
            // line 204
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                    <option value=\"2\" selected=\"selected\">";
            // line 205
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                    <option value=\"3\">";
            // line 206
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                    <option value=\"4\">";
            // line 207
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                  ";
        } elseif ((        // line 208
($context["autoproduct"] ?? null) == 3)) {
            // line 209
            echo "                    <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                    <option value=\"1\">";
            // line 210
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                    <option value=\"2\">";
            // line 211
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                    <option value=\"3\" selected=\"selected\">";
            // line 212
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                    <option value=\"4\">";
            // line 213
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                  ";
        } else {
            // line 215
            echo "                    <option value=\"0\">";
            echo ($context["entry_new"] ?? null);
            echo "</option>
                    <option value=\"1\">";
            // line 216
            echo ($context["entry_sale"] ?? null);
            echo "</option>
                    <option value=\"2\">";
            // line 217
            echo ($context["entry_bestseller"] ?? null);
            echo "</option>
                    <option value=\"3\">";
            // line 218
            echo ($context["entry_mostview"] ?? null);
            echo "</option>
                    <option value=\"4\" selected=\"selected\">";
            // line 219
            echo ($context["entry_dealproducts"] ?? null);
            echo "</option>
                  ";
        }
        // line 221
        echo "                </select>
              </div>
            </div>
          </div>
     
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-row\">";
        // line 227
        echo ($context["entry_title"] ?? null);
        echo "</label>
            <div class=\"control-option width-4\">
              ";
        // line 229
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 230
            echo "                <div class=\"input-group\">
                  <span class=\"input-group-addon\">";
            // line 231
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 231);
            echo "</span>
                  <input type=\"text\" name=\"title_lang[";
            // line 232
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 232);
            echo "][title]\" value=\"";
            echo ((twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["title_lang"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 232)] ?? null) : null), "title", [], "any", false, false, false, 232)) ? (twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["title_lang"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 232)] ?? null) : null), "title", [], "any", false, false, false, 232)) : (""));
            echo "\" placeholder=\"\" id=\"input-title";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 232);
            echo "\" class=\"form-control\" />
                </div>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 235
        echo "            </div>
          </div>
      ";
        // line 238
        echo "      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-description";
        // line 239
        echo twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "language_id", [], "any", false, false, false, 239);
        echo "\">";
        echo ($context["entry_description"] ?? null);
        echo "</label>
          <div class=\"control-control\">
            <div class=\"tab-content\" style=\"margin: 10px;\">
              ";
        // line 242
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 243
            echo "              <div id=\"language";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 243);
            echo "\">
                  <a href=\"javascript:void(0)\" class=\"language-label\"><span>";
            // line 244
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 244);
            echo "</span><i class=\"fa fa-angle-down\"></i></a>
                  <div class=\"html-content\">
                     <textarea name=\"module_description[";
            // line 246
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 246);
            echo "][description]\" placeholder=\"";
            echo ($context["entry_description"] ?? null);
            echo "\" id=\"input-description";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 246);
            echo "\" class=\"form-control summernote\">";
            echo (((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["module_description"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 246)] ?? null) : null)) ? (twig_get_attribute($this->env, $this->source, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["module_description"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 246)] ?? null) : null), "description", [], "any", false, false, false, 246)) : (""));
            echo "</textarea>
                  </div>
              </div>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 250
        echo "          </div>
        </div>
      </div>
      ";
        // line 254
        echo "      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-type\">";
        // line 255
        echo ($context["entry_product_type"] ?? null);
        echo "</label>
        <div class=\"control-option width-1\">
          <div class=\"switch switch-long switch-multi3\">
            <input type=\"radio\" name=\"type\" class=\"switch-input\" id=\"type-grid\" value=\"0\" ";
        // line 258
        if ((($context["type"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"type-grid\" class=\"switch-label switch-label-1\">";
        // line 259
        echo ($context["entry_grid"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"type\" class=\"switch-input\" id=\"type-list\" value=\"1\" ";
        // line 260
        if ((($context["type"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"type-list\" class=\"switch-label switch-label-2\">";
        // line 261
        echo ($context["entry_list"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"type\" class=\"switch-input\" id=\"type-other\" value=\"2\" ";
        // line 262
        if ((($context["type"] ?? null) == 2)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"type-other\" class=\"switch-label switch-label-3\">";
        // line 263
        echo ($context["entry_other"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group parent-form\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 269
        echo ($context["entry_slider"] ?? null);
        echo "</label>
        <div class=\"control-option\">    
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"slider\" class=\"switch-input\" id=\"slider-on\" value=\"1\" onClick=\"GetOptionsSelect();\" ";
        // line 272
        if ((($context["slider"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"slider-on\" class=\"switch-label switch-label-on\">";
        // line 273
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"slider\" class=\"switch-input\" id=\"slider-off\" value=\"0\" onClick=\"GetOptionsSelect();\" ";
        // line 274
        if ((($context["slider"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"slider-off\" class=\"switch-label switch-label-off\">";
        // line 275
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"slider-on-selected select-options\">
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-items\">";
        // line 282
        echo ($context["entry_item"] ?? null);
        echo "</label>
          <div class=\"control-option width-1\">
            <input type=\"text\" name=\"items\" value=\"";
        // line 284
        echo ($context["items"] ?? null);
        echo "\" placeholder=\"\" id=\"input-items\" class=\"tt-number-field\" />
          </div>
        </div>  
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-auto\">";
        // line 288
        echo ($context["entry_auto"] ?? null);
        echo "</label>
          <div class=\"control-option\">
            <div class=\"switch switch-bol\">
              <input type=\"radio\" name=\"auto\" class=\"switch-input\" id=\"auto-on\" value=\"1\" ";
        // line 291
        if ((($context["auto"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"auto-on\" class=\"switch-label switch-label-on\">";
        // line 292
        echo ($context["entry_yes"] ?? null);
        echo "</label>
              <input type=\"radio\" name=\"auto\" class=\"switch-input\" id=\"auto-off\" value=\"0\" ";
        // line 293
        if ((($context["auto"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"auto-off\" class=\"switch-label switch-label-off\">";
        // line 294
        echo ($context["entry_no"] ?? null);
        echo "</label>
              <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-time\">";
        // line 300
        echo ($context["entry_time"] ?? null);
        echo "</label>
          <div class=\"control-option width-2\">
            <input type=\"text\" name=\"time\" value=\"";
        // line 302
        echo ($context["time"] ?? null);
        echo "\" placeholder=\"\" id=\"input-time\" class=\"tt-number-field\" />
            <span class=\"suffix\">miliseconds</span>
          </div>
        </div>  
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-time\">";
        // line 307
        echo ($context["entry_speed"] ?? null);
        echo "</label>
          <div class=\"control-option width-2\">
            <input type=\"text\" name=\"speed\" value=\"";
        // line 309
        echo ($context["speed"] ?? null);
        echo "\" placeholder=\"\" id=\"input-speed\" class=\"tt-number-field\" />
            <span class=\"suffix\">miliseconds</span>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-row\">";
        // line 314
        echo ($context["entry_rows"] ?? null);
        echo "</label>
          <div class=\"control-option width-1\">
            <input type=\"text\" name=\"row\" value=\"";
        // line 316
        echo ($context["row"] ?? null);
        echo "\" placeholder=\"\" id=\"input-row\" class=\"tt-number-field\" />
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-loop\">";
        // line 320
        echo ($context["entry_loop"] ?? null);
        echo "</label>
          <div class=\"control-option\">
            <div class=\"switch switch-bol\">
              <input type=\"radio\" name=\"loop\" class=\"switch-input\" id=\"loop-on\" value=\"1\" ";
        // line 323
        if ((($context["loop"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"loop-on\" class=\"switch-label switch-label-on\">";
        // line 324
        echo ($context["entry_yes"] ?? null);
        echo "</label>
              <input type=\"radio\" name=\"loop\" class=\"switch-input\" id=\"loop-off\" value=\"0\" ";
        // line 325
        if ((($context["loop"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
              <label for=\"loop-off\" class=\"switch-label switch-label-off\">";
        // line 326
        echo ($context["entry_no"] ?? null);
        echo "</label>
              <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-time\">";
        // line 332
        echo ($context["entry_margin"] ?? null);
        echo "</label>
          <div class=\"control-option width-2\">
            <input type=\"text\" name=\"margin\" value=\"";
        // line 334
        echo ($context["margin"] ?? null);
        echo "\" placeholder=\"\" id=\"input-margin\" class=\"tt-number-field\" />
            <span class=\"suffix\">pixels</span>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-navigation\">";
        // line 339
        echo ($context["entry_navigation"] ?? null);
        echo "</label>
          <div class=\"control-option\">           
            <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"navigation\" class=\"switch-input\" id=\"navigation-on\" value=\"1\" ";
        // line 342
        if ((($context["navigation"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"navigation-on\" class=\"switch-label switch-label-on\">";
        // line 343
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"navigation\" class=\"switch-input\" id=\"navigation-off\" value=\"0\" ";
        // line 344
        if ((($context["navigation"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"navigation-off\" class=\"switch-label switch-label-off\">";
        // line 345
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-pagination\">";
        // line 351
        echo ($context["entry_pagination"] ?? null);
        echo "</label>
          <div class=\"control-option\">       
            <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"pagination\" class=\"switch-input\" id=\"pagination-on\" value=\"1\" ";
        // line 354
        if ((($context["pagination"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"pagination-on\" class=\"switch-label switch-label-on\">";
        // line 355
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"pagination\" class=\"switch-input\" id=\"pagination-off\" value=\"0\" ";
        // line 356
        if ((($context["pagination"] ?? null) == 0)) {
            echo "  checked=\"checked\"";
        }
        echo "/>
            <label for=\"pagination-off\" class=\"switch-label switch-label-off\">";
        // line 357
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label class=\"control-label\" for=\"input-width\">";
        // line 363
        echo ($context["entry_responsive"] ?? null);
        echo "</label>
          <div class=\"control-option width-6\">
           <i class=\"fa fa-desktop\"></i> ";
        // line 365
        echo ($context["entry_desktop"] ?? null);
        echo "
           <input type=\"text\" name=\"desktop\" value=\"";
        // line 366
        echo ($context["desktop"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-desktop\" class=\"tt-number-field\" />
            ";
        // line 367
        if (($context["error_width"] ?? null)) {
            // line 368
            echo "            <div class=\"text-danger\">";
            echo ($context["error_responsive"] ?? null);
            echo "</div>
            ";
        }
        // line 370
        echo "            <i class=\"fa fa-laptop\"></i> ";
        echo ($context["entry_sdesktop"] ?? null);
        echo "
            <input type=\"text\" name=\"tablet\" value=\"";
        // line 371
        echo ($context["tablet"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-tablet\" class=\"tt-number-field\" />
            ";
        // line 372
        if (($context["error_width"] ?? null)) {
            // line 373
            echo "            <div class=\"text-danger\">";
            echo ($context["error_responsive"] ?? null);
            echo "</div>
            ";
        }
        // line 375
        echo "            <i class=\"fa fa-tablet\"></i> ";
        echo ($context["entry_tablet"] ?? null);
        echo "
            <input type=\"text\" name=\"mobile\" value=\"";
        // line 376
        echo ($context["mobile"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-mobile\" class=\"tt-number-field\" />
            ";
        // line 377
        if (($context["error_width"] ?? null)) {
            // line 378
            echo "            <div class=\"text-danger\">";
            echo ($context["error_responsive"] ?? null);
            echo "</div>
            ";
        }
        // line 380
        echo "             <i class=\"fa fa-mobile\"></i> ";
        echo ($context["entry_mobile"] ?? null);
        echo "
            <input type=\"text\" name=\"smobile\" value=\"";
        // line 381
        echo ($context["smobile"] ?? null);
        echo "\" placeholder=\"\" id=\"responsive-smobile\" class=\"tt-number-field\" />
            ";
        // line 382
        if (($context["error_width"] ?? null)) {
            // line 383
            echo "            <div class=\"text-danger\">";
            echo ($context["error_responsive"] ?? null);
            echo "</div>
            ";
        }
        // line 385
        echo "          </div>
        </div>
      </div>
      <div class=\"slider-off-selected select-options\">
        <div class=\"form-group\">";
        // line 390
        echo "          <label class=\"control-label\" for=\"input-row\">";
        echo ($context["entry_pprow"] ?? null);
        echo "</label>
          <div class=\"control-option width-1\">
            <select name=\"nrow\" id=\"input-nrow\" class=\"form-control\">
              ";
        // line 393
        if ((($context["nrow"] ?? null) == 0)) {
            // line 394
            echo "                <option value=\"0\" selected=\"selected\">2</option>
                <option value=\"1\">3</option>
                <option value=\"2\">4</option>
                <option value=\"3\">6</option>
              ";
        } elseif ((        // line 398
($context["nrow"] ?? null) == 1)) {
            // line 399
            echo "                <option value=\"0\">2</option>
                <option value=\"1\" selected=\"selected\">3</option>
                <option value=\"2\">4</option>
                <option value=\"3\">6</option>
              ";
        } elseif ((        // line 403
($context["nrow"] ?? null) == 2)) {
            // line 404
            echo "                <option value=\"0\">2</option>
                <option value=\"1\">3</option>
                <option value=\"2\" selected=\"selected\">4</option>
                <option value=\"3\">6</option>
              ";
        } else {
            // line 409
            echo "                <option value=\"0\">2</option>
                <option value=\"1\">3</option>
                <option value=\"2\">4</option>
                <option value=\"3\" selected=\"selected\">6</option>
              ";
        }
        // line 414
        echo "            </select>
          </div>
        </div>
      </div>
      ";
        // line 419
        echo "      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 420
        echo ($context["entry_show_description"] ?? null);
        echo "</label>
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"description\" class=\"switch-input\" id=\"description-on\" value=\"1\" ";
        // line 423
        if ((($context["description"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"description-on\" class=\"switch-label switch-label-on\">";
        // line 424
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"description\" class=\"switch-input\" id=\"description-off\" value=\"0\" <";
        // line 425
        if ((($context["description"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"description-off\" class=\"switch-label switch-label-off\">";
        // line 426
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 432
        echo ($context["entry_countdown"] ?? null);
        echo "<small>";
        echo ($context["entry_countdown_small"] ?? null);
        echo "</small></label>
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"countdown\" class=\"switch-input\" id=\"countdown-on\" value=\"1\" ";
        // line 435
        if ((($context["countdown"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"countdown-on\" class=\"switch-label switch-label-on\">";
        // line 436
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"countdown\" class=\"switch-input\" id=\"countdown-off\" value=\"0\" ";
        // line 437
        if ((($context["countdown"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"countdown-off\" class=\"switch-label switch-label-off\">";
        // line 438
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 444
        echo ($context["entry_rotator"] ?? null);
        echo "</label>   
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"rotator\" class=\"switch-input\" id=\"rotator-on\" value=\"1\" ";
        // line 447
        if ((($context["rotator"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"rotator-on\" class=\"switch-label switch-label-on\">";
        // line 448
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"rotator\" class=\"switch-input\" id=\"rotator-off\" value=\"0\" ";
        // line 449
        if ((($context["rotator"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"rotator-off\" class=\"switch-label switch-label-off\">";
        // line 450
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 456
        echo ($context["entry_newlabel"] ?? null);
        echo "</label>    
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"newlabel\" class=\"switch-input\" id=\"newlabel-on\" value=\"1\" ";
        // line 459
        if ((($context["newlabel"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"newlabel-on\" class=\"switch-label switch-label-on\">";
        // line 460
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"newlabel\" class=\"switch-input\" id=\"newlabel-off\" value=\"0\" ";
        // line 461
        if ((($context["newlabel"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"newlabel-off\" class=\"switch-label switch-label-off\">";
        // line 462
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-navigation\">";
        // line 468
        echo ($context["entry_salelabel"] ?? null);
        echo "</label>   
        <div class=\"control-option\">
          <div class=\"switch switch-bol\">
            <input type=\"radio\" name=\"salelabel\" class=\"switch-input\" id=\"salelabel-on\" value=\"1\" ";
        // line 471
        if ((($context["salelabel"] ?? null) == 1)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"salelabel-on\" class=\"switch-label switch-label-on\">";
        // line 472
        echo ($context["entry_yes"] ?? null);
        echo "</label>
            <input type=\"radio\" name=\"salelabel\" class=\"switch-input\" id=\"salelabel-off\" value=\"0\" ";
        // line 473
        if ((($context["salelabel"] ?? null) == 0)) {
            echo " checked=\"checked\"";
        }
        echo "/>
            <label for=\"salelabel-off\" class=\"switch-label switch-label-off\">";
        // line 474
        echo ($context["entry_no"] ?? null);
        echo "</label>
            <span class=\"switch-selection\"></span>
          </div>
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-limit\">";
        // line 480
        echo ($context["entry_limit"] ?? null);
        echo "</label>
        <div class=\"control-option width-1\">
          <input type=\"text\" name=\"limit\" value=\"";
        // line 482
        echo ($context["limit"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_limit"] ?? null);
        echo "\" id=\"input-limit\" class=\"tt-number-field\" />
        </div>
      </div>
      <div class=\"form-group\">
        <label class=\"control-label\" for=\"input-width\">";
        // line 486
        echo ($context["entry_size"] ?? null);
        echo "<small>";
        echo ($context["entry_dessize"] ?? null);
        echo "</small></label>
        <div class=\"control-option width-2\">
          <input type=\"text\" name=\"width\" value=\"";
        // line 488
        echo ($context["width"] ?? null);
        echo "\" placeholder=\"\" id=\"input-width\" class=\"tt-number-field\" />
          ";
        // line 489
        if (($context["error_width"] ?? null)) {
            // line 490
            echo "          <div class=\"text-danger\">";
            echo ($context["error_width"] ?? null);
            echo "</div>
          ";
        }
        // line 492
        echo "           x
          <input type=\"text\" name=\"height\" value=\"";
        // line 493
        echo ($context["height"] ?? null);
        echo "\" placeholder=\"\" id=\"input-height\" class=\"tt-number-field\" />
          ";
        // line 494
        if (($context["error_height"] ?? null)) {
            // line 495
            echo "          <div class=\"text-danger\">";
            echo ($context["error_height"] ?? null);
            echo "</div>
          ";
        }
        // line 497
        echo "        </div>
      </div>

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
\$('input[name=\\'product\\']').autocomplete({
  source: function(request, response) {
    \$.ajax({
      url: 'index.php?route=extension/module/ocproduct/autocomplete&user_token=";
        // line 519
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
    \$('input[name=\\'product\\']').val('');
    
    \$('#featured-product' + item['value']).remove();
    
    \$('#featured-product').append('<div id=\"featured-product' + item['value'] + '\" class=\"tt-product\"><i class=\"fa fa-times\"></i> ' + '<img src=\"' +item['image']+ '\" alt=\"\"/>' + item['label'] + '<input type=\"hidden\" name=\"product[]\" value=\"' + item['value'] + '\" /></div>');  
    
    \$('#featured-product').scrollTop(1000);
  }
});
\$('#featured-product').delegate('.fa-times', 'click', function() {
  \$(this).parent().remove();
});
// Search category
\$('input[name=\\'cate_name\\']').autocomplete({
  source: function(request, response) {
    \$.ajax({
      url: 'index.php?route=extension/module/ocproduct/autocompleteCategory&user_token=";
        // line 549
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
    document.getElementById(\"input-cate_name\").value= item['label'];  
    document.getElementById(\"input-cate_id\").value= item['value'];  
    \$('#featured-productcate').children().remove();
    }
});
\$('#input-cate_name').parent().delegate('.fa-times', 'click', function() {
  document.getElementById(\"input-cate_name\").value= '';
  document.getElementById(\"input-cate_id\").value= '';
  \$('#category-product').children().remove();
});

// Search product from category
\$('input[name=\\'productcate\\']').autocomplete({
  source: function( request, response) {
    \$.ajax({
      url: 'index.php?route=extension/module/ocproduct/getProductCategory&user_token=";
        // line 577
        echo ($context["user_token"] ?? null);
        echo "&category_id=' + \$(\"#input-cate_id\").val()+ '&filter_name=' +  encodeURIComponent(request),
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
    
    \$('#category-product' + item['value']).remove();
    
    \$('#category-product').append('<div id=\"category-product' + item['value'] + '\" class=\"tt-product\"><i class=\"fa fa-times\"></i> ' + '<img src=\"' +item['image']+ '\" alt=\"\"/>' + item['label'] + '<input type=\"hidden\" name=\"productcate[]\" value=\"' + item['value'] + '\" /></div>');  
    
    \$('#category-product').scrollTop(1000);
  }
});
  
\$('#category-product').delegate('.fa-times', 'click', function() {
  \$(this).parent().remove();
});

function GetOptionsSelect() {
    \$('.select-options').hide();
    var ParentForms = document.getElementsByClassName('parent-form');
    for (var j = 0; j < ParentForms.length; j ++){
      var InputChilds = ParentForms[j].getElementsByTagName('input');
      for (var i = 0; i < InputChilds.length; i++) {
            if (InputChilds[i].checked) {
              console.log(id);
              var id = InputChilds[i].id;
              var test = \$('.'+id+'-selected');
              \$(test).show();

            } //end if
 
      } // end for
    };
    
} //end

\$(document).ready(function(){
  GetOptionsSelect(); 
  \$('.list-selection label').on('click',function(){
      \$(this).parent().find('.active').removeClass('active');
      \$(this).addClass('active');
  });

})
";
        // line 635
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 636
            echo "\$('#input-description";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 636);
            echo "').summernote({height: 300});
\$('#language";
            // line 637
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 637);
            echo " .html-content').hide();
\$('#language";
            // line 638
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 638);
            echo " a').click(function(){
  \$('#language";
            // line 639
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 639);
            echo " .html-content').slideToggle();
});
\$('#input-title";
            // line 641
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 641);
            echo "').parent().parent().parent().css('border-top','2px solid #279CBB');
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 643
        echo "//--></script>
</div>
";
        // line 645
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/ocproduct.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1517 => 645,  1513 => 643,  1505 => 641,  1500 => 639,  1496 => 638,  1492 => 637,  1487 => 636,  1483 => 635,  1422 => 577,  1391 => 549,  1358 => 519,  1334 => 497,  1328 => 495,  1326 => 494,  1322 => 493,  1319 => 492,  1313 => 490,  1311 => 489,  1307 => 488,  1300 => 486,  1291 => 482,  1286 => 480,  1277 => 474,  1271 => 473,  1267 => 472,  1261 => 471,  1255 => 468,  1246 => 462,  1240 => 461,  1236 => 460,  1230 => 459,  1224 => 456,  1215 => 450,  1209 => 449,  1205 => 448,  1199 => 447,  1193 => 444,  1184 => 438,  1178 => 437,  1174 => 436,  1168 => 435,  1160 => 432,  1151 => 426,  1145 => 425,  1141 => 424,  1135 => 423,  1129 => 420,  1126 => 419,  1120 => 414,  1113 => 409,  1106 => 404,  1104 => 403,  1098 => 399,  1096 => 398,  1090 => 394,  1088 => 393,  1081 => 390,  1075 => 385,  1069 => 383,  1067 => 382,  1063 => 381,  1058 => 380,  1052 => 378,  1050 => 377,  1046 => 376,  1041 => 375,  1035 => 373,  1033 => 372,  1029 => 371,  1024 => 370,  1018 => 368,  1016 => 367,  1012 => 366,  1008 => 365,  1003 => 363,  994 => 357,  988 => 356,  984 => 355,  978 => 354,  972 => 351,  963 => 345,  957 => 344,  953 => 343,  947 => 342,  941 => 339,  933 => 334,  928 => 332,  919 => 326,  913 => 325,  909 => 324,  903 => 323,  897 => 320,  890 => 316,  885 => 314,  877 => 309,  872 => 307,  864 => 302,  859 => 300,  850 => 294,  844 => 293,  840 => 292,  834 => 291,  828 => 288,  821 => 284,  816 => 282,  806 => 275,  800 => 274,  796 => 273,  790 => 272,  784 => 269,  775 => 263,  769 => 262,  765 => 261,  759 => 260,  755 => 259,  749 => 258,  743 => 255,  740 => 254,  735 => 250,  719 => 246,  714 => 244,  709 => 243,  705 => 242,  697 => 239,  694 => 238,  690 => 235,  677 => 232,  673 => 231,  670 => 230,  666 => 229,  661 => 227,  653 => 221,  648 => 219,  644 => 218,  640 => 217,  636 => 216,  631 => 215,  626 => 213,  622 => 212,  618 => 211,  614 => 210,  609 => 209,  607 => 208,  603 => 207,  599 => 206,  595 => 205,  591 => 204,  586 => 203,  584 => 202,  580 => 201,  576 => 200,  572 => 199,  568 => 198,  563 => 197,  561 => 196,  557 => 195,  553 => 194,  549 => 193,  545 => 192,  540 => 191,  538 => 190,  532 => 187,  528 => 185,  522 => 178,  517 => 176,  513 => 175,  509 => 174,  505 => 173,  500 => 172,  495 => 170,  491 => 169,  487 => 168,  483 => 167,  478 => 166,  476 => 165,  472 => 164,  468 => 163,  464 => 162,  460 => 161,  455 => 160,  453 => 159,  449 => 158,  445 => 157,  441 => 156,  437 => 155,  432 => 154,  430 => 153,  426 => 152,  422 => 151,  418 => 150,  414 => 149,  409 => 148,  407 => 147,  402 => 145,  397 => 143,  389 => 137,  379 => 133,  375 => 132,  371 => 131,  366 => 130,  362 => 129,  357 => 127,  352 => 125,  340 => 116,  334 => 115,  330 => 114,  324 => 113,  320 => 112,  314 => 111,  308 => 108,  304 => 106,  298 => 104,  296 => 103,  291 => 101,  287 => 100,  282 => 98,  278 => 96,  272 => 91,  263 => 88,  258 => 86,  254 => 85,  249 => 83,  246 => 82,  242 => 81,  237 => 79,  232 => 77,  228 => 75,  219 => 68,  213 => 67,  209 => 66,  203 => 65,  199 => 64,  193 => 63,  187 => 60,  177 => 53,  171 => 52,  167 => 51,  161 => 50,  155 => 47,  150 => 44,  144 => 42,  142 => 41,  136 => 40,  131 => 38,  126 => 35,  120 => 33,  118 => 32,  112 => 31,  107 => 29,  102 => 27,  96 => 24,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/ocproduct.twig", "");
    }
}
