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

/* tt_lazio8/template/product/special.twig */
class __TwigTemplate_7641f6b9deb7840f4dcfad3f6cbef1bf2a84a6d0e92ada0fb89d2701d30abf3e extends \Twig\Template
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
      <h2>";
        // line 17
        echo ($context["heading_title"] ?? null);
        echo "</h2>
      ";
        // line 18
        if (($context["products"] ?? null)) {
            // line 19
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
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 30
                echo "\t\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["limits"], "value", [], "any", false, false, false, 30) == ($context["limit"] ?? null))) {
                    // line 31
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 31);
                    echo "\" selected=\"selected\">";
                    echo (($context["text_limit"] ?? null) . twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 31));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 33
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 33);
                    echo "\">";
                    echo (($context["text_limit"] ?? null) . twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 33));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                }
                // line 35
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limits'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "\t\t\t\t\t\t</select>
                    </div>
\t\t\t\t\t<div class=\"col-md-2 toolbar1 pull-right\">
                        <select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
\t\t\t\t\t\t\t";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 41
                echo "\t\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 41) == sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                    // line 42
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 42);
                    echo "\" selected=\"selected\">";
                    echo (($context["text_sort"] ?? null) . twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 42));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 44
                    echo "\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 44);
                    echo "\">";
                    echo (($context["text_sort"] ?? null) . twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 44));
                    echo "</option>
\t\t\t\t\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "\t\t\t\t\t\t</select>
                    </div>
\t\t\t\t</div>
                <div class=\"custom-products\">
                    ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 52
                echo "                    <div class=\"product-layout product-list col-xs-12\">
                        <div class=\"product-thumb\">
\t\t\t\t\t\t\t<div class=\"item-inner\">
\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t<!-- ";
                // line 56
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 56)) {
                    // line 57
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                    echo ($context["text_label_sale"] ?? null);
                    echo "</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 59
                echo "\t\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 59)) {
                    // line 60
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                    echo ($context["text_label_new"] ?? null);
                    echo "</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 61
                echo " -->
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 62
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 62);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 63
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 63);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 63);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 63);
                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t<img class=\"img-r\" src=\"";
                // line 64
                echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 64);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 64);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 64);
                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t<div class=\"qv-button-container\">
\t\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" title=\"";
                // line 67
                echo ($context["button_quickview"] ?? null);
                echo "\" onclick=\"ocquickview.ajaxView('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 67);
                echo "')\"><span>";
                echo ($context["button_quickview"] ?? null);
                echo "</span></button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t";
                // line 71
                if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 71)) {
                    // line 72
                    echo "\t\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 73
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 73);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 73);
                    echo "</a>
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t";
                }
                // line 76
                echo "\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 76);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 76);
                echo "</a></h4>
\t\t\t\t\t\t\t\t\t";
                // line 77
                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 77)) {
                    // line 78
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 80
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 81
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 81) == $context["i"])) {
                            // line 82
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["class_r"] = ("rating" . $context["i"]);
                            // line 83
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                            echo ($context["class_r"] ?? null);
                            echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 85
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 86
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 89
                echo "\t\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 89)) {
                    // line 90
                    echo "\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 91
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 91)) {
                        // line 92
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 92);
                        echo "
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 94
                        echo "\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 94);
                        echo "</span><span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 94);
                        echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 96
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 96)) {
                        // line 97
                        echo "\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                        echo ($context["text_tax"] ?? null);
                        echo " ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 97);
                        echo "</span>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 99
                    echo "\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t";
                }
                // line 101
                echo "\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 101);
                echo "</p>
\t\t\t\t\t\t\t\t\t<div class=\"item-hover\">
\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"add-to-links\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"wishlist\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                // line 106
                echo ($context["button_wishlist"] ?? null);
                echo "\" onclick=\"wishlist.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 106);
                echo "');\"><span>";
                echo ($context["button_wishlist"] ?? null);
                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cart\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                // line 109
                echo ($context["button_cart"] ?? null);
                echo "\" onclick=\"cart.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 109);
                echo "', '";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 109);
                echo "')\"><span>";
                echo ($context["button_cart"] ?? null);
                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"compare\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                // line 112
                echo ($context["button_compare"] ?? null);
                echo "\" onclick=\"compare.add('";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 112);
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
            // line 122
            echo "                </div>
                <div class=\"row toolbar4\">
                    <div class=\"col-sm-6\">";
            // line 124
            echo ($context["pagination"] ?? null);
            echo "</div>
                    <div class=\"col-sm-6 text-right\">";
            // line 125
            echo ($context["results"] ?? null);
            echo "</div>
                </div>
                ";
        } else {
            // line 127
            echo "                
\t\t\t\t  <p>";
            // line 128
            echo ($context["text_empty"] ?? null);
            echo "</p>
\t\t\t\t  <div class=\"buttons\">
\t\t\t\t\t<div class=\"pull-right\"><a href=\"";
            // line 130
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
\t\t\t\t  </div>
\t\t\t\t  ";
        }
        // line 133
        echo "      ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 134
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 136
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/product/special.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  428 => 136,  423 => 134,  418 => 133,  410 => 130,  405 => 128,  402 => 127,  396 => 125,  392 => 124,  388 => 122,  368 => 112,  356 => 109,  346 => 106,  337 => 101,  333 => 99,  325 => 97,  322 => 96,  314 => 94,  308 => 92,  306 => 91,  303 => 90,  300 => 89,  295 => 86,  289 => 85,  283 => 83,  280 => 82,  277 => 81,  273 => 80,  269 => 78,  267 => 77,  260 => 76,  252 => 73,  249 => 72,  247 => 71,  236 => 67,  226 => 64,  218 => 63,  214 => 62,  211 => 61,  205 => 60,  202 => 59,  196 => 57,  194 => 56,  188 => 52,  184 => 51,  178 => 47,  172 => 46,  164 => 44,  156 => 42,  153 => 41,  149 => 40,  143 => 36,  137 => 35,  129 => 33,  121 => 31,  118 => 30,  114 => 29,  98 => 19,  96 => 18,  92 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/product/special.twig", "");
    }
}
