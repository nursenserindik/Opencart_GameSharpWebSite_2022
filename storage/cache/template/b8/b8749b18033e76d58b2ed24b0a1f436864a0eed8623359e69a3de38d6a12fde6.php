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

/* tt_lazio8/template/extension/module/newsletterpopup.twig */
class __TwigTemplate_b62a06e88a5805d2de7b2c3cd6b3c646d8c906807794f22aa9814e1b419b0512 extends \Twig\Template
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
        echo "<div class=\"newletter-popup\">
<div id=\"boxes\" class=\"newletter-container\">
 <div id=\"dialog\" class=\"window\">
 <div id=\"popup2\">
\t<span class=\"b-close\"><span>X</span></span>
</div>
\t<div class=\"box\">
\t  <div class=\"newletter-title\"><h2>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h2></div>
\t  <div class=\"box-content newleter-content\">
\t\t\t<label>";
        // line 10
        echo ($context["newletter_des"] ?? null);
        echo "</label>
\t\t  <div id=\"frm_subscribe\">
\t\t\t  <form name=\"subscribe\" id=\"subscribe_popup\">
\t\t\t\t  <div>
\t\t\t\t\t <!-- <span class=\"required\">*</span><span>";
        // line 14
        echo ($context["entry_email"] ?? null);
        echo "</span>-->
\t\t\t\t\t <input type=\"text\" value=\"\" name=\"subscribe_pemail\" id=\"subscribe_pemail\" placeholder=\"";
        // line 15
        echo ($context["entry_email"] ?? null);
        echo "\"> 
\t\t\t\t\t <input type=\"hidden\" value=\"\" name=\"subscribe_pname\" id=\"subscribe_pname\" />
\t\t\t\t   <div id=\"notification\"></div>
\t\t\t\t\t<a class=\"button\" onclick=\"email_subscribepopup()\"><span>";
        // line 18
        echo ($context["entry_button"] ?? null);
        echo "</span></a>
\t\t\t\t\t";
        // line 19
        if (($context["option_unsubscribe"] ?? null)) {
            // line 20
            echo "\t\t\t\t\t<a class=\"button\" onclick=\"email_unsubscribepopup()\"><span>";
            echo ($context["entry_unbutton"] ?? null);
            echo "</span></a>
\t\t\t\t\t";
        }
        // line 21
        echo " 
\t\t\t\t  </div>
\t\t\t  </form>
\t\t\t  <div class=\"subscribe-bottom\">
\t\t\t\t<input type=\"checkbox\" id=\"newsletter_popup_dont_show_again\">
\t\t\t\t<label for=\"newsletter_popup_dont_show_again\">";
        // line 26
        echo ($context["entry_show_again"] ?? null);
        echo "</label>
\t\t\t  </div>
\t\t  </div><!-- /#frm_subscribe -->
\t\t</div><!-- /.box-content -->
 </div>
</div>\t
<script type=\"text/javascript\">
function email_subscribepopup(){
\t\$.ajax({
\t\t\ttype: 'post',
\t\t\turl: 'index.php?route=extension/module/newslettersubscribe/subscribepopup',
\t\t\tdataType: 'html',
            data:\$(\"#subscribe_popup\").serialize(),
\t\t\tsuccess: function (html) {
\t\t\t\t// \$.cookie('shownewsletter', '1');
\t\t\t\ttry {
\t\t\t\t\teval(html);
\t\t\t\t} 
\t\t\t\tcatch (e) {
\t\t\t\t}
\t\t\t}}); 
}
function email_unsubscribepopup(){
\t\$.ajax({
\t\t\ttype: 'post',
\t\t\turl: 'index.php?route=extension/module/newslettersubscribe/unsubscribe',
\t\t\tdataType: 'html',
            data:\$(\"#subscribe_popup\").serialize(),
\t\t\tsuccess: function (html) {
\t\t\t\ttry {
\t\t\t\t\teval(html);
\t\t\t\t} 
\t\t\t\tcatch (e) {
\t\t\t\t}
\t\t\t}}); 
\t\$('html, body').delay( 1500 ).animate({ scrollTop: 0 }, 'slow'); 
}
</script>
<script type=\"text/javascript\">
    \$(document).ready(function() {

\t\tif(\$.cookie('shownewsletter')==1) \$('.newletter-popup').hide();
\t\t\$('#subscribe_pemail').keypress(function(e) {
            if(e.which == 13) {
                e.preventDefault();
                email_subscribepopup();
            }
\t\t\tvar name= \$(this).val();
\t\t  \t\$('#subscribe_pname').val(name);
        });
\t\t\$('#subscribe_pemail').change(function() {
\t\t var name= \$(this).val();
\t\t  \t\t\$('#subscribe_pname').val(name);
\t\t});
        //transition effect
        if(\$.cookie(\"shownewsletter\") != 1){
\t\t\t\$('.newletter-popup').bPopup();
        }
\t\t\$('#newsletter_popup_dont_show_again').on('change', function(){
\t\t\tif(\$.cookie(\"shownewsletter\") != 1){   
\t\t\t\t\$.cookie(\"shownewsletter\",'1')
\t\t\t}else{
\t\t\t\t\$.cookie(\"shownewsletter\",'0')
\t\t\t}
\t\t}); 
    });
</script>
</div><!-- /.box -->
</div>";
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/extension/module/newsletterpopup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 26,  80 => 21,  74 => 20,  72 => 19,  68 => 18,  62 => 15,  58 => 14,  51 => 10,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/extension/module/newsletterpopup.twig", "");
    }
}
