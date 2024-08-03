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

/* tt_lazio6/template/extension/module/carousel.twig */
class __TwigTemplate_751266a37d00785fd00efaafa2a5d402b08b2302ce77fff11687d2adcf09324d extends \Twig\Template
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
        $context["rows"] = 2;
        // line 2
        $context["count"] = 0;
        // line 3
        echo "<div class=\"brand-container\">
\t<div id=\"carousel";
        // line 4
        echo ($context["module"] ?? null);
        echo "\" class=\"swiper-container\">
\t\t<div class=\"swiper-wrapper\">
\t\t\t";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["banners"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 7
            echo "\t\t\t";
            if (((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0)) {
                // line 8
                echo "\t\t\t\t\t<div class=\"swiper-slide text-center\">
\t\t\t\t";
            }
            // line 10
            echo "\t\t\t\t";
            $context["count"] = (($context["count"] ?? null) + 1);
            // line 11
            echo "\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t";
            // line 12
            if (twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 12)) {
                // line 13
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 13);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "image", [], "any", false, false, false, 13);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 13);
                echo "\" class=\"img-responsive\" /></a>";
            } else {
                echo "<img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "image", [], "any", false, false, false, 13);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 13);
                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t";
            }
            // line 15
            echo "\t\t\t\t\t</div>
\t\t\t";
            // line 16
            if ((((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0) || (($context["count"] ?? null) == twig_length_filter($this->env, ($context["banners"] ?? null))))) {
                // line 17
                echo "\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 19
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "\t\t</div>
\t</div>
\t<div class=\"swiper-pagination carousel";
        // line 22
        echo ($context["module"] ?? null);
        echo "\"></div>
\t<div class=\"swiper-pager\">
\t\t<div class=\"swiper-button-next\"></div>
\t\t<div class=\"swiper-button-prev\"></div>
\t</div>
</div>
<script type=\"text/javascript\"><!--
\$('#carousel";
        // line 29
        echo ($context["module"] ?? null);
        echo "').swiper({
\tmode: 'horizontal',
\tslidesPerView: 3,
\tpagination: '.carousel";
        // line 32
        echo ($context["module"] ?? null);
        echo "',
\tpaginationClickable: true,
\tnextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
\tautoplay: false,
\tloop: false
});
--></script>";
    }

    public function getTemplateName()
    {
        return "tt_lazio6/template/extension/module/carousel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 32,  113 => 29,  103 => 22,  99 => 20,  93 => 19,  89 => 17,  87 => 16,  84 => 15,  68 => 13,  66 => 12,  63 => 11,  60 => 10,  56 => 8,  53 => 7,  49 => 6,  44 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio6/template/extension/module/carousel.twig", "");
    }
}
