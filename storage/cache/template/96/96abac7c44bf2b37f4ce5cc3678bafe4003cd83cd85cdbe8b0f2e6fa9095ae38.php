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

/* tt_lazio8/template/common/footer.twig */
class __TwigTemplate_0fcce20faed17c90b68c74b3c287b76b8259e6dae6218d7e8885772563a3dc67 extends \Twig\Template
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
        echo "<footer>
\t";
        // line 2
        if (($context["block4"] ?? null)) {
            // line 3
            echo "\t\t";
            echo ($context["block4"] ?? null);
            echo "
\t";
        }
        // line 5
        echo "\t<div class=\"footer-static\">
\t\t<div class=\"container\">
\t\t\t<div class=\"container-inner\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-12 col-md-8 col-xs-12\">
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-xs-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t";
        // line 12
        if (($context["informations"] ?? null)) {
            // line 13
            echo "\t\t\t\t\t\t\t\t<div class=\"col col1\">
\t\t\t\t\t\t\t\t\t<div class=\"footer-title\"><h2>";
            // line 14
            echo ($context["text_information"] ?? null);
            echo "</h2></div>
\t\t\t\t\t\t\t\t\t<div class=\"footer-content\">
\t\t\t\t\t\t\t\t\t\t<ul class=\"list-unstyled\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
                // line 18
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "href", [], "any", false, false, false, 18);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 18);
                echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 24
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-xs-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t<div class=\"col col2\">
\t\t\t\t\t\t\t\t\t<div class=\"footer-title\"><h2>";
        // line 27
        echo ($context["text_extra"] ?? null);
        echo "</h2></div>
\t\t\t\t\t\t\t\t\t<div class=\"footer-content\">
\t\t\t\t\t\t\t\t\t\t<ul class=\"list-unstyled\">
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 30
        echo ($context["manufacturer"] ?? null);
        echo "\">";
        echo ($context["text_manufacturer"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 31
        echo ($context["voucher"] ?? null);
        echo "\">";
        echo ($context["text_voucher"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 32
        echo ($context["affiliate"] ?? null);
        echo "\">";
        echo ($context["text_affiliate"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 33
        echo ($context["special"] ?? null);
        echo "\">";
        echo ($context["text_special"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-xs-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t<div class=\"col col3\">
\t\t\t\t\t\t\t\t\t<div class=\"footer-title\"><h2>";
        // line 40
        echo ($context["text_account"] ?? null);
        echo "</h2></div>
\t\t\t\t\t\t\t\t\t<div class=\"footer-content\">
\t\t\t\t\t\t\t\t\t\t<ul class=\"list-unstyled\">
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 43
        echo ($context["account"] ?? null);
        echo "\">";
        echo ($context["text_account"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 44
        echo ($context["order"] ?? null);
        echo "\">";
        echo ($context["text_order"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 45
        echo ($context["wishlist"] ?? null);
        echo "\">";
        echo ($context["text_wishlist"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 46
        echo ($context["newsletter"] ?? null);
        echo "\">";
        echo ($context["text_newsletter"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-12 col-md-4 col-xs-12\">
\t\t\t\t\t\t<div class=\"col col4\">
\t\t\t\t\t\t\t<div class=\"footer-title\">
\t\t\t\t\t\t\t\t<h2>";
        // line 56
        echo ($context["text_download_app"] ?? null);
        echo "</h2>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"footer-content\">
\t\t\t\t\t\t\t\t<div class=\"download-app\">
\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/app1.png\" alt=\"\"></a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/app2.png\" alt=\"\"></a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        // line 65
        if (($context["block5"] ?? null)) {
            echo " ";
            echo ($context["block5"] ?? null);
            echo " ";
        }
        // line 66
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"footer-linklogo\">
\t\t<div class=\"container\">
\t\t\t<div class=\"footer-logo\">
\t\t\t\t<a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/logo2-footer.png\" alt=\"\"></a>
\t\t\t</div>
\t\t\t";
        // line 78
        if (($context["block6"] ?? null)) {
            echo " ";
            echo ($context["block6"] ?? null);
            echo " ";
        }
        // line 79
        echo "\t\t</div>
\t</div>
\t<div class=\"copyright\">
\t\t<div class=\"container\">
\t\t\t<div class=\"container-inner\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6 col-sm-6 col-sms-12\">
\t\t\t\t\t\t<p class=\"copyright-text\">";
        // line 86
        echo ($context["powered"] ?? null);
        echo "</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6 col-sm-6 col-sms-12\">
\t\t\t\t\t\t<div class=\"footer-paypal\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/paypal.jpg\" alt=\"image\"></a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/paypal1.jpg\" alt=\"image\"></a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/paypal2.jpg\" alt=\"image\"></a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/paypal3.jpg\" alt=\"image\"></a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/paypal4.jpg\" alt=\"image\"></a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"catalog/view/theme/tt_lazio8/image/paypal5.jpg\" alt=\"image\"></a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
        // line 104
        if (($context["block7"] ?? null)) {
            echo " ";
            echo ($context["block7"] ?? null);
            echo " ";
        }
        // line 105
        echo "\t<div id=\"back-top\">";
        echo ($context["text_backtop"] ?? null);
        echo "</div>
</footer>
<script type=\"text/javascript\">
\$(document).ready(function(){
\t// hide #back-top first
\t\$(\"#back-top\").hide();
\t// fade in #back-top
\t\$(function () {
\t\t\$(window).scroll(function () {
\t\t\tif (\$(this).scrollTop() > 300) {
\t\t\t\t\$('#back-top').fadeIn();
\t\t\t} else {
\t\t\t\t\$('#back-top').fadeOut();
\t\t\t}
\t\t});
\t\t// scroll body to 0px on click
\t\t\$('#back-top').click(function () {
\t\t\t\$('body,html').animate({scrollTop: 0}, 800);
\t\t\treturn false;
\t\t});
\t});
\tif (jQuery(window).width() < 992) {   
\t\tjQuery('.footer-static .footer-title').click(function(){     
\t\t\tjQuery(this).parent('.col').toggleClass('active').siblings().removeClass('active'); 
\t\t\tjQuery(this).next('.col .footer-content').toggle(300);
\t\t\tjQuery(this).parent('.col.active').siblings().children('.col .footer-content').slideUp(300); 
\t\t}); 
\t\t 
\t}
});
</script>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</div><!-- wrapper -->
</body></html>";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/common/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 105,  237 => 104,  216 => 86,  207 => 79,  201 => 78,  187 => 66,  181 => 65,  169 => 56,  154 => 46,  148 => 45,  142 => 44,  136 => 43,  130 => 40,  118 => 33,  112 => 32,  106 => 31,  100 => 30,  94 => 27,  89 => 24,  83 => 20,  72 => 18,  68 => 17,  62 => 14,  59 => 13,  57 => 12,  48 => 5,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/common/footer.twig", "");
    }
}
