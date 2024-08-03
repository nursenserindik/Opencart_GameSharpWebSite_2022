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

/* tt_lazio8/template/extension/module/featured.twig */
class __TwigTemplate_6ed1b74290ea4d68b07f822d3b24377723a3b552aa2e592830a47e813f3768dc extends \Twig\Template
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
        echo "<div class=\"feature-products\">
\t<div class=\"module-title\"><h2>";
        // line 2
        echo ($context["heading_title"] ?? null);
        echo "</h2></div>
\t<div class=\"feature-content\">
\t ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 5
            echo "\t  <div class=\"product-layout\">
\t\t<div class=\"product-thumb transition\">
\t\t\t<div class=\"item-inner\">
\t\t\t\t<div class=\"image\">
\t\t\t\t\t<a href=\"";
            // line 9
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 9);
            echo "\"><img src=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 9);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 9);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 9);
            echo "\" class=\"img-responsive\" /></a>
\t\t\t\t</div>
\t\t\t  <div class=\"caption\">
\t\t\t\t<h4 class=\"product-name\"><a href=\"";
            // line 12
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 12);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 12);
            echo "</a></h4>
\t\t\t\t<!-- <p>";
            // line 13
            echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 13);
            echo "</p> -->
\t\t\t\t";
            // line 14
            if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 14)) {
                // line 15
                echo "\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t";
                // line 17
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 18
                    echo "\t\t\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 18) == $context["i"])) {
                        // line 19
                        echo "\t\t\t\t\t\t";
                        $context["class_r"] = ("rating" . $context["i"]);
                        // line 20
                        echo "\t\t\t\t\t\t<div class=\"";
                        echo ($context["class_r"] ?? null);
                        echo "\">rating</div>
\t\t\t\t\t\t";
                    }
                    // line 22
                    echo "\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                echo "\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t";
            }
            // line 26
            echo "\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 26)) {
                // line 27
                echo "\t\t\t\t<p class=\"price\">
\t\t\t\t  ";
                // line 28
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 28)) {
                    // line 29
                    echo "\t\t\t\t  ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 29);
                    echo "
\t\t\t\t  ";
                } else {
                    // line 31
                    echo "\t\t\t\t  <span class=\"price-new\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 31);
                    echo "</span> <span class=\"price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 31);
                    echo "</span>
\t\t\t\t  ";
                }
                // line 33
                echo "\t\t\t\t  ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 33)) {
                    // line 34
                    echo "\t\t\t\t  <span class=\"price-tax\">";
                    echo ($context["text_tax"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 34);
                    echo "</span>
\t\t\t\t  ";
                }
                // line 36
                echo "\t\t\t\t</p>
\t\t\t\t";
            }
            // line 38
            echo "\t\t\t  </div>
\t\t\t  <div class=\"button-group\">
\t\t\t\t<button type=\"button\" onclick=\"cart.add('";
            // line 40
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 40);
            echo "');\"><i class=\"fa fa-shopping-cart\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
            echo ($context["button_cart"] ?? null);
            echo "</span></button>
\t\t\t\t<button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 41
            echo ($context["button_wishlist"] ?? null);
            echo "\" onclick=\"wishlist.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 41);
            echo "');\"><i class=\"fa fa-heart\"></i></button>
\t\t\t\t<button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 42
            echo ($context["button_compare"] ?? null);
            echo "\" onclick=\"compare.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 42);
            echo "');\"><i class=\"fa fa-exchange\"></i></button>
\t\t\t  </div>
\t\t\t</div>
\t\t</div>
\t  </div>
\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "\t  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/extension/module/featured.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 48,  163 => 42,  157 => 41,  151 => 40,  147 => 38,  143 => 36,  135 => 34,  132 => 33,  124 => 31,  118 => 29,  116 => 28,  113 => 27,  110 => 26,  105 => 23,  99 => 22,  93 => 20,  90 => 19,  87 => 18,  83 => 17,  79 => 15,  77 => 14,  73 => 13,  67 => 12,  55 => 9,  49 => 5,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/extension/module/featured.twig", "");
    }
}
