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

/* tt_lazio6/template/product/search.twig */
class __TwigTemplate_ba057c8dd6566db6aee8e5b35da2f7730a79f7d11c843418f54f7123265bfd20 extends \Twig\Template
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
        echo "
<div id=\"product-search\" class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 5);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 5);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "  </ul>
  <div class=\"row\">";
        // line 8
        echo ($context["column_left"] ?? null);
        echo "
    ";
        // line 9
        if ((($context["column_left"] ?? null) && ($context["column_right"] ?? null))) {
            // line 10
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 11
            echo "    ";
        } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
            // line 12
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 13
            echo "    ";
        } else {
            // line 14
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 15
            echo "    ";
        }
        // line 16
        echo "    <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
      <h1>";
        // line 17
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <label class=\"control-label\" for=\"input-search\">";
        // line 18
        echo ($context["entry_search"] ?? null);
        echo "</label>
      <div class=\"row\">
        <div class=\"col-sm-4\">
          <input type=\"text\" name=\"search\" value=\"";
        // line 21
        echo ($context["search"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["text_keyword"] ?? null);
        echo "\" id=\"input-search\" class=\"form-control\" />
        </div>
        <div class=\"col-sm-3\">
          <select name=\"category_id\" class=\"form-control\">
            <option value=\"0\">";
        // line 25
        echo ($context["text_category"] ?? null);
        echo "</option>
            ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category_1"]) {
            // line 27
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["category_1"], "category_id", [], "any", false, false, false, 27) == ($context["category_id"] ?? null))) {
                // line 28
                echo "            <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["category_1"], "category_id", [], "any", false, false, false, 28);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["category_1"], "name", [], "any", false, false, false, 28);
                echo "</option>
            ";
            } else {
                // line 30
                echo "            <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["category_1"], "category_id", [], "any", false, false, false, 30);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["category_1"], "name", [], "any", false, false, false, 30);
                echo "</option>
            ";
            }
            // line 32
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category_1"], "children", [], "any", false, false, false, 32));
            foreach ($context['_seq'] as $context["_key"] => $context["category_2"]) {
                // line 33
                echo "            ";
                if ((twig_get_attribute($this->env, $this->source, $context["category_2"], "category_id", [], "any", false, false, false, 33) == ($context["category_id"] ?? null))) {
                    // line 34
                    echo "            <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category_2"], "category_id", [], "any", false, false, false, 34);
                    echo "\" selected=\"selected\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo twig_get_attribute($this->env, $this->source, $context["category_2"], "name", [], "any", false, false, false, 34);
                    echo "</option>
            ";
                } else {
                    // line 36
                    echo "            <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category_2"], "category_id", [], "any", false, false, false, 36);
                    echo "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo twig_get_attribute($this->env, $this->source, $context["category_2"], "name", [], "any", false, false, false, 36);
                    echo "</option>
            ";
                }
                // line 38
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category_2"], "children", [], "any", false, false, false, 38));
                foreach ($context['_seq'] as $context["_key"] => $context["category_3"]) {
                    // line 39
                    echo "            ";
                    if ((twig_get_attribute($this->env, $this->source, $context["category_3"], "category_id", [], "any", false, false, false, 39) == ($context["category_id"] ?? null))) {
                        // line 40
                        echo "            <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["category_3"], "category_id", [], "any", false, false, false, 40);
                        echo "\" selected=\"selected\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo twig_get_attribute($this->env, $this->source, $context["category_3"], "name", [], "any", false, false, false, 40);
                        echo "</option>
            ";
                    } else {
                        // line 42
                        echo "            <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["category_3"], "category_id", [], "any", false, false, false, 42);
                        echo "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo twig_get_attribute($this->env, $this->source, $context["category_3"], "name", [], "any", false, false, false, 42);
                        echo "</option>
            ";
                    }
                    // line 44
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_3'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_2'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_1'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "          </select>
        </div>
        <div class=\"col-sm-3\">
          <label class=\"checkbox-inline\">
            ";
        // line 51
        if (($context["sub_category"] ?? null)) {
            // line 52
            echo "            <input type=\"checkbox\" name=\"sub_category\" value=\"1\" checked=\"checked\" />
            ";
        } else {
            // line 54
            echo "            <input type=\"checkbox\" name=\"sub_category\" value=\"1\" />
            ";
        }
        // line 56
        echo "            ";
        echo ($context["text_sub_category"] ?? null);
        echo "</label>
        </div>
      </div>
      <p>
        <label class=\"checkbox-inline\">
          ";
        // line 61
        if (($context["description"] ?? null)) {
            // line 62
            echo "          <input type=\"checkbox\" name=\"description\" value=\"1\" id=\"description\" checked=\"checked\" />
          ";
        } else {
            // line 64
            echo "          <input type=\"checkbox\" name=\"description\" value=\"1\" id=\"description\" />
          ";
        }
        // line 66
        echo "          ";
        echo ($context["entry_description"] ?? null);
        echo "</label>
      </p>
      <input type=\"button\" value=\"";
        // line 68
        echo ($context["button_search"] ?? null);
        echo "\" id=\"button-search\" class=\"btn btn-primary\" />
      <h2>";
        // line 69
        echo ($context["text_search"] ?? null);
        echo "</h2>
      ";
        // line 70
        if (($context["products"] ?? null)) {
            // line 71
            echo "                <div><a href=\"";
            echo ($context["compare"] ?? null);
            echo "\" id=\"compare-total\">";
            echo ($context["text_compare"] ?? null);
            echo "</a></div>
\t\t\t\t<div class=\"toolbar\">
\t\t\t\t\t<div class=\"col-md-2 toolbar3 pull-left\">
                        <div class=\"btn-group\">
                            <button type=\"button\" id=\"list-view\" class=\"btn btn-default\"></button>
                            <button type=\"button\" id=\"grid-view\" class=\"btn btn-default\"></button>
                        </div>
                    </div>
                    <div class=\"col-md-2 toolbar2 pull-right\">
                        <select id=\"input-limit\" class=\"form-control\" onchange=\"location = this.value;\">
\t\t\t\t\t\t\t";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 82
                echo "\t\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["limits"], "value", [], "any", false, false, false, 82) == ($context["limit"] ?? null))) {
                    // line 83
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 83);
                    echo "\" selected=\"selected\">";
                    echo (($context["text_limit"] ?? null) . twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 83));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 85
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 85);
                    echo "\">";
                    echo (($context["text_limit"] ?? null) . twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 85));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                }
                // line 87
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limits'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "\t\t\t\t\t\t</select>
                    </div>
\t\t\t\t\t<div class=\"col-md-2 toolbar1 pull-right\">
                        <select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
\t\t\t\t\t\t\t";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 93
                echo "\t\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 93) == sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                    // line 94
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 94);
                    echo "\" selected=\"selected\">";
                    echo (($context["text_sort"] ?? null) . twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 94));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 96
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 96);
                    echo "\">";
                    echo (($context["text_sort"] ?? null) . twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 96));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                }
                // line 98
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 99
            echo "\t\t\t\t\t\t</select>
                    </div>
\t\t\t\t</div>
                <div class=\"custom-products\">
                    ";
            // line 103
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 104
                echo "                    <div class=\"product-layout product-list col-xs-12\">
                        <div class=\"product-thumb\">
\t\t\t\t\t\t\t<div class=\"item-inner\">
\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t";
                // line 108
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 108)) {
                    // line 109
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                    echo ($context["text_label_sale"] ?? null);
                    echo "</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 111
                echo "\t\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 111)) {
                    // line 112
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                    echo ($context["text_label_new"] ?? null);
                    echo "</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 114
                echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 114);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 115
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 115);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 115);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 115);
                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t<img class=\"img-r\" src=\"";
                // line 116
                echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 116);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 116);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 116);
                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t<div class=\"qv-button-container\">
\t\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" title=\"";
                // line 119
                echo ($context["button_quickview"] ?? null);
                echo "\" onclick=\"ocquickview.ajaxView('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 119);
                echo "')\"><span>";
                echo ($context["button_quickview"] ?? null);
                echo "</span></button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t";
                // line 123
                if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 123)) {
                    // line 124
                    echo "\t\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 125
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 125);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 125);
                    echo "</a>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t";
                }
                // line 128
                echo "\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 128);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 128);
                echo "</a></h4>
\t\t\t\t\t\t\t\t\t";
                // line 129
                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 129)) {
                    // line 130
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 132
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 133
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 133) == $context["i"])) {
                            // line 134
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["class_r"] = ("rating" . $context["i"]);
                            // line 135
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                            echo ($context["class_r"] ?? null);
                            echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 137
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 138
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 141
                echo "\t\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 141)) {
                    // line 142
                    echo "\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 143
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 143)) {
                        // line 144
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 144);
                        echo "
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 146
                        echo "\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 146);
                        echo "</span><span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 146);
                        echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 148
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 148)) {
                        // line 149
                        echo "\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                        echo ($context["text_tax"] ?? null);
                        echo " ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 149);
                        echo "</span>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 151
                    echo "\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t";
                }
                // line 153
                echo "\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 153);
                echo "</p>
\t\t\t\t\t\t\t\t\t<div class=\"item-hover\">
\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"add-to-links\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"wishlist\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                // line 158
                echo ($context["button_wishlist"] ?? null);
                echo "\" onclick=\"wishlist.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 158);
                echo "');\"><span>";
                echo ($context["button_wishlist"] ?? null);
                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cart\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                // line 161
                echo ($context["button_cart"] ?? null);
                echo "\" onclick=\"cart.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 161);
                echo "', '";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 161);
                echo "')\"><span>";
                echo ($context["button_cart"] ?? null);
                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"compare\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                // line 164
                echo ($context["button_compare"] ?? null);
                echo "\" onclick=\"compare.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 164);
                echo "');\"><span>";
                echo ($context["button_compare"] ?? null);
                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
                        </div>
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 174
            echo "                </div>
                <div class=\"row toolbar4\">
                    <div class=\"col-sm-12\">";
            // line 176
            echo ($context["pagination"] ?? null);
            echo "</div>
                    <div class=\"col-sm-12 text-right\">";
            // line 177
            echo ($context["results"] ?? null);
            echo "</div>
                </div>
                ";
        } else {
            // line 179
            echo "                
\t\t\t\t  <p>";
            // line 180
            echo ($context["text_empty"] ?? null);
            echo "</p>
\t\t\t\t  
\t\t\t\t  ";
        }
        // line 183
        echo "      ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 184
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
<script type=\"text/javascript\"><!--
\$('#button-search').bind('click', function() {
\turl = 'index.php?route=product/search';

\tvar search = \$('#content input[name=\\'search\\']').prop('value');

\tif (search) {
\t\turl += '&search=' + encodeURIComponent(search);
\t}

\tvar category_id = \$('#content select[name=\\'category_id\\']').prop('value');

\tif (category_id > 0) {
\t\turl += '&category_id=' + encodeURIComponent(category_id);
\t}

\tvar sub_category = \$('#content input[name=\\'sub_category\\']:checked').prop('value');

\tif (sub_category) {
\t\turl += '&sub_category=true';
\t}

\tvar filter_description = \$('#content input[name=\\'description\\']:checked').prop('value');

\tif (filter_description) {
\t\turl += '&description=true';
\t}

\tlocation = url;
});

\$('#content input[name=\\'search\\']').bind('keydown', function(e) {
\tif (e.keyCode == 13) {
\t\t\$('#button-search').trigger('click');
\t}
});

\$('select[name=\\'category_id\\']').on('change', function() {
\tif (this.value == '0') {
\t\t\$('input[name=\\'sub_category\\']').prop('disabled', true);
\t} else {
\t\t\$('input[name=\\'sub_category\\']').prop('disabled', false);
\t}
});

\$('select[name=\\'category_id\\']').trigger('change');
--></script>
";
        // line 233
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "tt_lazio6/template/product/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  623 => 233,  571 => 184,  566 => 183,  560 => 180,  557 => 179,  551 => 177,  547 => 176,  543 => 174,  523 => 164,  511 => 161,  501 => 158,  492 => 153,  488 => 151,  480 => 149,  477 => 148,  469 => 146,  463 => 144,  461 => 143,  458 => 142,  455 => 141,  450 => 138,  444 => 137,  438 => 135,  435 => 134,  432 => 133,  428 => 132,  424 => 130,  422 => 129,  415 => 128,  407 => 125,  404 => 124,  402 => 123,  391 => 119,  381 => 116,  373 => 115,  368 => 114,  362 => 112,  359 => 111,  353 => 109,  351 => 108,  345 => 104,  341 => 103,  335 => 99,  329 => 98,  321 => 96,  313 => 94,  310 => 93,  306 => 92,  300 => 88,  294 => 87,  286 => 85,  278 => 83,  275 => 82,  271 => 81,  255 => 71,  253 => 70,  249 => 69,  245 => 68,  239 => 66,  235 => 64,  231 => 62,  229 => 61,  220 => 56,  216 => 54,  212 => 52,  210 => 51,  204 => 47,  198 => 46,  192 => 45,  186 => 44,  178 => 42,  170 => 40,  167 => 39,  162 => 38,  154 => 36,  146 => 34,  143 => 33,  138 => 32,  130 => 30,  122 => 28,  119 => 27,  115 => 26,  111 => 25,  102 => 21,  96 => 18,  92 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio6/template/product/search.twig", "");
    }
}
