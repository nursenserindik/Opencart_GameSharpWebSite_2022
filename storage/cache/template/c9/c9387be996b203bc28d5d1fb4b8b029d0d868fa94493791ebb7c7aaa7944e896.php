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

/* tt_lazio8/template/common/currency.twig */
class __TwigTemplate_02bec55aa0d535a6e93b91dc1b88f47c844bb791910dac73654cd263b13743c1 extends \Twig\Template
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
        if ((twig_length_filter($this->env, ($context["currencies"] ?? null)) > 1)) {
            // line 2
            echo "<form action=\"";
            echo ($context["action"] ?? null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-currency\">
\t<div class=\"currency\">
\t\t<label>";
            // line 4
            echo ($context["text_currency"] ?? null);
            echo "</label>
\t  <button class=\"btn btn-link dropdown-toggle btn-currency\" data-toggle=\"dropdown\">";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["currencies"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 6
                echo "      ";
                if ((twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_left", [], "any", false, false, false, 6) && (twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 6) == ($context["code"] ?? null)))) {
                    echo " <strong>";
                    echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 6);
                    echo "</strong> ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_right", [], "any", false, false, false, 6) && (twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 6) == ($context["code"] ?? null)))) {
                    echo " <strong>";
                    echo twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_right", [], "any", false, false, false, 6);
                    echo "</strong> ";
                }
                // line 7
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "<i class=\"ion-arrow-down-b\"></i></button>
\t  <ul class=\"dropdown-menu\">
\t\t";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["currencies"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 10
                echo "\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 10) == ($context["code"] ?? null))) {
                    // line 11
                    echo "\t\t<li>
\t\t  <button class=\"item-selected currency-select btn btn-link btn-block\" type=\"button\" name=\"";
                    // line 12
                    echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 12);
                    echo "\">
\t\t\t";
                    // line 13
                    if (twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_left", [], "any", false, false, false, 13)) {
                        echo " 
\t\t\t\t";
                        // line 14
                        echo twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_left", [], "any", false, false, false, 14);
                        echo "
\t\t\t";
                    }
                    // line 15
                    echo "\t\t\t
\t\t\t";
                    // line 16
                    echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 16);
                    echo "
\t\t\t";
                    // line 17
                    if (twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_right", [], "any", false, false, false, 17)) {
                        echo " 
\t\t\t\t";
                        // line 18
                        echo twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_right", [], "any", false, false, false, 18);
                        echo "
\t\t\t";
                    }
                    // line 20
                    echo "\t\t</button>
\t\t</li>
\t\t";
                } else {
                    // line 23
                    echo "\t\t<li>
\t\t  <button class=\"currency-select btn btn-link btn-block\" type=\"button\" name=\"";
                    // line 24
                    echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 24);
                    echo "\">
\t\t\t";
                    // line 25
                    if (twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_left", [], "any", false, false, false, 25)) {
                        echo " 
\t\t\t\t";
                        // line 26
                        echo twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_left", [], "any", false, false, false, 26);
                        echo "
\t\t\t";
                    }
                    // line 27
                    echo "\t\t\t
\t\t\t";
                    // line 28
                    echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 28);
                    echo "
\t\t\t";
                    // line 29
                    if (twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_right", [], "any", false, false, false, 29)) {
                        echo " 
\t\t\t\t";
                        // line 30
                        echo twig_get_attribute($this->env, $this->source, $context["currency"], "symbol_right", [], "any", false, false, false, 30);
                        echo "
\t\t\t";
                    }
                    // line 32
                    echo "\t\t  </button>
\t\t</li>
\t\t";
                }
                // line 35
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "\t  </ul>
\t</div>
\t<input type=\"hidden\" name=\"code\" value=\"\" />
\t<input type=\"hidden\" name=\"redirect\" value=\"";
            // line 39
            echo ($context["redirect"] ?? null);
            echo "\" />
</form>
";
        }
        // line 41
        echo " ";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/common/currency.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 41,  165 => 39,  160 => 36,  154 => 35,  149 => 32,  144 => 30,  140 => 29,  136 => 28,  133 => 27,  128 => 26,  124 => 25,  120 => 24,  117 => 23,  112 => 20,  107 => 18,  103 => 17,  99 => 16,  96 => 15,  91 => 14,  87 => 13,  83 => 12,  80 => 11,  77 => 10,  73 => 9,  64 => 7,  53 => 6,  49 => 5,  45 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/common/currency.twig", "");
    }
}
