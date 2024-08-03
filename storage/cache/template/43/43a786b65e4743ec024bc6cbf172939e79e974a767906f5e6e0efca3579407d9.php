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

/* tt_lazio8/template/common/layout_content_built.twig */
class __TwigTemplate_fd355149b6ca69b90c3ae1e2cffc2f2d7b0205723176e33d98421a51cbaf2d15 extends \Twig\Template
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
        if (($context["widgets"] ?? null)) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["widgets"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["rows"]) {
                // line 3
                echo "    <div class=\"main-row ";
                echo twig_get_attribute($this->env, $this->source, $context["rows"], "class", [], "any", false, false, false, 3);
                echo "\">
        <div class=\"container\">
            <div class=\"row\">
                ";
                // line 6
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["rows"], "main_cols", [], "any", false, false, false, 6));
                foreach ($context['_seq'] as $context["_key"] => $context["main_col"]) {
                    // line 7
                    echo "                <div class=\"main-col col-sm-12 col-md-";
                    echo twig_get_attribute($this->env, $this->source, $context["main_col"], "format", [], "any", false, false, false, 7);
                    echo "\">
                    ";
                    // line 8
                    if (twig_get_attribute($this->env, $this->source, $context["main_col"], "sub_rows", [], "any", false, false, false, 8)) {
                        // line 9
                        echo "                        ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["main_col"], "sub_rows", [], "any", false, false, false, 9));
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_row"]) {
                            // line 10
                            echo "                        <div class=\"row sub-row\">
                            ";
                            // line 11
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["sub_row"]);
                            foreach ($context['_seq'] as $context["_key"] => $context["sub_col"]) {
                                // line 12
                                echo "                                <div class=\"sub-col col-sm-12 col-md-";
                                echo twig_get_attribute($this->env, $this->source, $context["sub_col"], "format", [], "any", false, false, false, 12);
                                echo "\">
                                    ";
                                // line 13
                                if (twig_get_attribute($this->env, $this->source, $context["sub_col"], "info", [], "any", false, false, false, 13)) {
                                    // line 14
                                    echo "                                        ";
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sub_col"], "info", [], "any", false, false, false, 14));
                                    foreach ($context['_seq'] as $context["_key"] => $context["modules"]) {
                                        // line 15
                                        echo "                                            ";
                                        echo $context["modules"];
                                        echo "
                                        ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modules'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 17
                                    echo "                                    ";
                                }
                                // line 18
                                echo "                                </div>
                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_col'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 20
                            echo "                        </div>
                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_row'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 22
                        echo "                    ";
                    }
                    // line 23
                    echo "                </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_col'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "            </div>
        </div>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rows'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/common/layout_content_built.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 25,  115 => 23,  112 => 22,  105 => 20,  98 => 18,  95 => 17,  86 => 15,  81 => 14,  79 => 13,  74 => 12,  70 => 11,  67 => 10,  62 => 9,  60 => 8,  55 => 7,  51 => 6,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/common/layout_content_built.twig", "");
    }
}
