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

/* tt_lazio6/template/extension/module/newslettersubscribe.twig */
class __TwigTemplate_0086982790b89ca790cfa54c1b22f370f864e43594133e97923af94a6f3f1200 extends \Twig\Template
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
        echo "<div class=\"newletter-subscribe-container\">
\t<div class=\"container\">
\t\t<div class=\"newletter-subscribe\">
\t\t\t<div id=\"boxes-normal\" class=\"newletter-container\">
\t\t\t\t<div style=\"\" id=\"dialog-normal\" class=\"window\">
\t\t\t\t\t<div class=\"box\">
\t\t\t\t\t\t<div class=\"newletter-title\">
\t\t\t\t\t\t\t<div class=\"icon-newletter\"></div>
\t\t\t\t\t\t\t<div class=\"text-newletter\">
\t\t\t\t\t\t\t\t<h6>";
        // line 10
        echo ($context["heading_title"] ?? null);
        echo "</h6>
\t\t\t\t\t\t\t\t<h3>";
        // line 11
        echo ($context["heading_title2"] ?? null);
        echo "</h3>\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"box-content newleter-content\">
\t\t\t\t\t\t\t<div id=\"frm_subscribe-normal\">
\t\t\t\t\t\t\t\t<form name=\"subscribe\" id=\"subscribe\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" value=\"\" name=\"subscribe_email\" id=\"subscribe_email\" placeholder=\"";
        // line 17
        echo ($context["entry_email"] ?? null);
        echo "\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"\" name=\"subscribe_name\" id=\"subscribe_name\" />
\t\t\t\t\t\t\t\t\t<a class=\"btn\" onclick=\"email_subscribe()\">";
        // line 19
        echo ($context["entry_button"] ?? null);
        echo "</a>
\t\t\t\t\t\t\t\t\t";
        // line 20
        if (($context["option_unsubscribe"] ?? null)) {
            // line 21
            echo "\t\t\t\t\t\t\t\t\t\t<a class=\"btn\" onclick=\"email_unsubscribe()\">";
            echo ($context["entry_unbutton"] ?? null);
            echo "</a>
\t\t\t\t\t\t\t\t\t";
        }
        // line 22
        echo "   
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div><!-- /#frm_subscribe -->
\t\t\t\t\t\t\t<div id=\"notification-normal\"></div>
\t\t\t\t\t\t</div><!-- /.box-content -->
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t<script type=\"text/javascript\">
\t\tfunction email_subscribe(){
\t\t\t\$.ajax({
\t\t\t\ttype: 'post',
\t\t\t\turl: 'index.php?route=extension/module/newslettersubscribe/subscribe',
\t\t\t\tdataType: 'html',
\t\t\t\tdata:\$(\"#subscribe\").serialize(),
\t\t\t\tsuccess: function (html) {
\t\t\t\t\ttry {
\t\t\t\t\t\teval(html);
\t\t\t\t\t} 
\t\t\t\t\tcatch (e) {
\t\t\t\t\t}\t\t\t\t
\t\t\t\t}});
\t\t}
\t\tfunction email_unsubscribe(){
\t\t\t\$.ajax({
\t\t\t\ttype: 'post',
\t\t\t\turl: 'index.php?route=extension/module/newslettersubscribe/unsubscribe',
\t\t\t\tdataType: 'html',
\t\t\t\tdata:\$(\"#subscribe\").serialize(),
\t\t\t\tsuccess: function (html) {
\t\t\t\t\ttry {
\t\t\t\t\t
\t\t\t\t\t\teval(html);
\t\t\t\t\t
\t\t\t\t\t} catch (e) {
\t\t\t\t\t}
\t\t\t\t}}); 
\t\t\t\$('html, body').delay( 1500 ).animate({ scrollTop: 0 }, 'slow'); 
\t\t}
\t\t</script>
\t\t<script type=\"text/javascript\">
\t\t\t\$(document).ready(function() {
\t\t\t\t\$('#subscribe_email').keypress(function(e) {
\t\t\t\t\tif(e.which == 13) {
\t\t\t\t\t\te.preventDefault();
\t\t\t\t\t\temail_subscribe();
\t\t\t\t\t}
\t\t\t\t\tvar name= \$(this).val();
\t\t\t\t\t\$('#subscribe_name').val(name);
\t\t\t\t});
\t\t\t\t\$('#subscribe_email').change(function() {
\t\t\t\t var name= \$(this).val();
\t\t\t\t\t\t\$('#subscribe_name').val(name);
\t\t\t\t});
\t\t\t
\t\t\t});
\t\t</script>
\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "tt_lazio6/template/extension/module/newslettersubscribe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 22,  72 => 21,  70 => 20,  66 => 19,  61 => 17,  52 => 11,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio6/template/extension/module/newslettersubscribe.twig", "");
    }
}
