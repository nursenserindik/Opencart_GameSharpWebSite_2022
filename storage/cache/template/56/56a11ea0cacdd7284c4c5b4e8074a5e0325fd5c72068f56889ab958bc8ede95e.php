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

/* tt_lazio8/template/product/ocnewproduct.twig */
class __TwigTemplate_dcc38c3546bbb6326678592179d45ae19c811cfe6a2c1f3731e62821b5f99add extends \Twig\Template
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
<div class=\"container\">
    <ul class=\"breadcrumb\">
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "            <li><a href=\"";
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
        echo "    </ul>
    <div class=\"row\">";
        // line 8
        echo ($context["column_left"] ?? null);
        echo "
        ";
        // line 9
        if ((($context["column_left"] ?? null) && ($context["column_right"] ?? null))) {
            // line 10
            echo "            ";
            $context["class"] = "col-sm-6";
            // line 11
            echo "        ";
        } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
            // line 12
            echo "            ";
            $context["class"] = "col-sm-9";
            // line 13
            echo "        ";
        } else {
            // line 14
            echo "            ";
            $context["class"] = "col-sm-12";
            // line 15
            echo "        ";
        }
        // line 16
        echo "        <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
            <div class=\"page-title\"><h2>";
        // line 17
        echo ($context["heading_title"] ?? null);
        echo "</h2></div>
            ";
        // line 18
        if (($context["newproductpage_status"] ?? null)) {
            // line 19
            echo "                ";
            if (($context["products"] ?? null)) {
                // line 20
                echo "\t\t\t\t\t<div><a href=\"";
                echo ($context["compare"] ?? null);
                echo "\" id=\"compare-total\">";
                echo ($context["text_compare"] ?? null);
                echo "</a></div>
                    <div class=\"toolbar\">
                        <div class=\"col-md-2 toolbar3 pull-left\">
                            <div class=\"btn-group\">
                                <button type=\"button\" id=\"list-view\" class=\"btn btn-default\"></button>
\t\t\t\t\t\t\t\t<button type=\"button\" id=\"grid-view\" class=\"btn btn-default\"></button>
                            </div>
                        </div>
\t\t\t\t\t\t<div class=\"col-md-2 toolbar2 pull-right\">
\t\t\t\t\t\t\t<select id=\"input-limit\" class=\"form-control\" onchange=\"location = this.value;\">
\t\t\t\t\t\t\t\t";
                // line 30
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["limits"]);
                foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                    // line 31
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, $context["limits"], "value", [], "any", false, false, false, 31) == ($context["limit"] ?? null))) {
                        // line 32
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 32);
                        echo "\" selected=\"selected\">";
                        echo twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 32);
                        echo "</option>
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 34
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 34);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 34);
                        echo "</option>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 36
                    echo "\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limits'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 37
                echo "\t\t\t\t\t\t\t</select>
                        </div>
                        <div class=\"col-md-2 toolbar1 pull-right\">
\t\t\t\t\t\t\t<select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
\t\t\t\t\t\t\t\t";
                // line 41
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["sorts"]);
                foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                    // line 42
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 42) == sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                        // line 43
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 43);
                        echo "\" selected=\"selected\">";
                        echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 43);
                        echo "</option>
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 45
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 45);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 45);
                        echo "</option>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 47
                    echo "\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "\t\t\t\t\t\t\t</select>
                        </div>
                    </div>
                    <div class=\"custom-products\">
                        ";
                // line 52
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 53
                    echo "                            <div class=\"product-layout product-list col-xs-12\">
                                <div class=\"product-thumb\">
\t\t\t\t\t\t\t\t\t<div class=\"item-inner\">
\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 57
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 57);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 57);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 57);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 57);
                    echo "\" class=\"img-responsive\" /></a>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"qv-button-container\">
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" title=\"";
                    // line 59
                    echo ($context["button_quickview"] ?? null);
                    echo "\" onclick=\"ocquickview.ajaxView('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 59);
                    echo "')\"><span>";
                    echo ($context["button_quickview"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                    // line 63
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 63);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 63);
                    echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 64
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 64)) {
                        // line 65
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 67
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(range(1, 5));
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 68
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 68) == $context["i"])) {
                                // line 69
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["class_r"] = ("rating" . $context["i"]);
                                // line 70
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                echo ($context["class_r"] ?? null);
                                echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 72
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 73
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 76
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 76)) {
                        // line 77
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 77)) {
                            // line 78
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 78);
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 79
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 79);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 79);
                            echo "</span> ";
                        }
                        // line 80
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 80)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 80);
                            echo "</span> ";
                        }
                        echo " </p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 82
                    echo "\t\t\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 82);
                    echo "</p>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"item-hover\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"add-to-links\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"wishlist\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                    // line 87
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 87);
                    echo "');\"><span>";
                    echo ($context["button_wishlist"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cart\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" onclick=\"cart.add('";
                    // line 90
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 90);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 90);
                    echo "');\"><span>";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"compare\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                    // line 93
                    echo ($context["button_compare"] ?? null);
                    echo "\" onclick=\"compare.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 93);
                    echo "');\"><span>";
                    echo ($context["button_compare"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                echo "                    </div>
                    <div class=\"row toolbar4\">
                        <div class=\"col-sm-6\">";
                // line 105
                echo ($context["pagination"] ?? null);
                echo "</div>
                        <div class=\"col-sm-6 text-right\">";
                // line 106
                echo ($context["results"] ?? null);
                echo "</div>
                    </div>
                ";
            } else {
                // line 109
                echo "                    <p>";
                echo ($context["text_empty"] ?? null);
                echo "</p>
                    <div class=\"buttons\">
                        <div class=\"pull-right\"><a href=\"";
                // line 111
                echo ($context["continue"] ?? null);
                echo "\" class=\"btn btn-primary\">";
                echo ($context["button_continue"] ?? null);
                echo "</a></div>
                    </div>
                ";
            }
            // line 114
            echo "            ";
        } else {
            // line 115
            echo "                <p>";
            echo ($context["text_not_available"] ?? null);
            echo "</p>
                <div class=\"buttons\">
                    <div class=\"pull-right\"><a href=\"";
            // line 117
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
                </div>
            ";
        }
        // line 120
        echo "            ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
        ";
        // line 121
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 123
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/product/ocnewproduct.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  393 => 123,  388 => 121,  383 => 120,  375 => 117,  369 => 115,  366 => 114,  358 => 111,  352 => 109,  346 => 106,  342 => 105,  338 => 103,  318 => 93,  308 => 90,  298 => 87,  289 => 82,  277 => 80,  270 => 79,  264 => 78,  261 => 77,  258 => 76,  253 => 73,  247 => 72,  241 => 70,  238 => 69,  235 => 68,  231 => 67,  227 => 65,  225 => 64,  219 => 63,  208 => 59,  197 => 57,  191 => 53,  187 => 52,  181 => 48,  175 => 47,  167 => 45,  159 => 43,  156 => 42,  152 => 41,  146 => 37,  140 => 36,  132 => 34,  124 => 32,  121 => 31,  117 => 30,  101 => 20,  98 => 19,  96 => 18,  92 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/product/ocnewproduct.twig", "");
    }
}
