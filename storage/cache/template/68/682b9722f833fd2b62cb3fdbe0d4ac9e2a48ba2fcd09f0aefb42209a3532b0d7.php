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

/* common/developer.twig */
class __TwigTemplate_4e3440b8be8eb0443e2ebb53da704486d625000a78caea1e25d087c38205a722 extends \Twig\Template
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
        echo "<div class=\"modal-dialog\">
  <div class=\"modal-content\">
    <div class=\"modal-header\">
      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
      <h4 class=\"modal-title\"><i class=\"fa fa-cog\"></i> ";
        // line 5
        echo ($context["heading_title"] ?? null);
        echo "</h4>
    </div>
    <div class=\"modal-body\">
      <table class=\"table table-bordered\">
        <thead>
          <tr>
            <td>";
        // line 11
        echo ($context["column_component"] ?? null);
        echo "</td>
            <td style=\"width: 150px;\">";
        // line 12
        echo ($context["entry_cache"] ?? null);
        echo "</td>
            <td class=\"text-right\" style=\"width: 1px;\">";
        // line 13
        echo ($context["column_action"] ?? null);
        echo "</td>
          </tr>
        </thead>
        <tr>
          <td>";
        // line 17
        echo ($context["entry_theme"] ?? null);
        echo "</td>
          <td ><div class=\"btn-group\" data-toggle=\"buttons\">";
        // line 18
        if (($context["developer_theme"] ?? null)) {
            // line 19
            echo "              <label class=\"btn btn-success active\" ";
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"1\" autocomplete=\"off\" ";
            // line 20
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo " checked/>
              ";
            // line 21
            echo ($context["button_on"] ?? null);
            echo "
              </label>
              ";
        } else {
            // line 24
            echo "              <label class=\"btn btn-success\" ";
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"1\" autocomplete=\"off\" ";
            // line 25
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo "/>
              ";
            // line 26
            echo ($context["button_on"] ?? null);
            echo "
              </label>
              ";
        }
        // line 29
        echo "              
              ";
        // line 30
        if ( !($context["developer_theme"] ?? null)) {
            // line 31
            echo "              <label class=\"btn btn-danger active\" ";
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"0\" autocomplete=\"off\" ";
            // line 32
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo " checked/>
              ";
            // line 33
            echo ($context["button_off"] ?? null);
            echo "
              </label>
              ";
        } else {
            // line 36
            echo "              <label class=\"btn btn-danger\" ";
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo ">
              <input type=\"radio\" name=\"developer_theme\" value=\"0\" autocomplete=\"off\" ";
            // line 37
            if ( !($context["eval"] ?? null)) {
                echo "disabled=\"disabled\"";
            }
            echo "/>
              ";
            // line 38
            echo ($context["button_off"] ?? null);
            echo "
              </label>
              ";
        }
        // line 40
        echo "</div></td>
          <td class=\"text-right\"><button type=\"button\" value=\"theme\" data-toggle=\"tooltip\" title=\"";
        // line 41
        echo ($context["button_refresh"] ?? null);
        echo "\" class=\"btn btn-warning\"><i class=\"fa fa-refresh\"></i></button></td>
        </tr>
        <tr>
          <td>";
        // line 44
        echo ($context["entry_sass"] ?? null);
        echo "</td>
          <td><div class=\"btn-group\" data-toggle=\"buttons\">";
        // line 45
        if (($context["developer_sass"] ?? null)) {
            // line 46
            echo "              <label class=\"btn btn-success active\">
                <input type=\"radio\" name=\"developer_sass\" value=\"1\" autocomplete=\"off\" checked>
                ";
            // line 48
            echo ($context["button_on"] ?? null);
            echo "</label>
              ";
        } else {
            // line 50
            echo "              <label class=\"btn btn-success\">
                <input type=\"radio\" name=\"developer_sass\" value=\"1\" autocomplete=\"off\">
                ";
            // line 52
            echo ($context["button_on"] ?? null);
            echo "</label>
              ";
        }
        // line 54
        echo "              ";
        if ( !($context["developer_sass"] ?? null)) {
            // line 55
            echo "              <label class=\"btn btn-danger active\">
                <input type=\"radio\" name=\"developer_sass\" value=\"0\" autocomplete=\"off\" checked>
                ";
            // line 57
            echo ($context["button_off"] ?? null);
            echo "</label>
              ";
        } else {
            // line 59
            echo "              <label class=\"btn btn-danger\">
                <input type=\"radio\" name=\"developer_sass\" value=\"0\" autocomplete=\"off\">
                ";
            // line 61
            echo ($context["button_off"] ?? null);
            echo "</label>
              ";
        }
        // line 62
        echo "</div></td>
          <td class=\"text-right\"><button type=\"button\" value=\"sass\" data-toggle=\"tooltip\" title=\"";
        // line 63
        echo ($context["button_refresh"] ?? null);
        echo "\" class=\"btn btn-warning\"><i class=\"fa fa-refresh\"></i></button></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('input[name=\\'developer_theme\\'], input[name=\\'developer_sass\\']').on('change', function() {
\t\$.ajax({
\t\turl: 'index.php?route=common/developer/edit&user_token=";
        // line 72
        echo ($context["user_token"] ?? null);
        echo "',\t\t
\t\ttype: 'post',
        data: \$('input[name=\\'developer_theme\\']:checked, input[name=\\'developer_sass\\']:checked'),
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('input[name=\\'developer_theme\\'], input[name=\\'developer_sass\\']').prop('disabled', true);
\t\t},
\t\tcomplete: function() {
\t\t\t\$('input[name=\\'developer_theme\\'], input[name=\\'developer_sass\\']').prop('disabled', false);
\t\t},
\t\tsuccess: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
            }

            if (json['success']) {
\t\t\t\t\$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t}\t\t\t
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});\t
});\t

\$('#modal-developer table button').on('click', function() {
\tvar element = this;
\t
\t\$.ajax({
\t\turl: 'index.php?route=common/developer/' + \$(element).attr('value') + '&user_token=";
        // line 103
        echo ($context["user_token"] ?? null);
        echo "',\t\t
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$(element).button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$(element).button('reset');
\t\t},
\t\tsuccess: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
            }

            if (json['success']) {
\t\t\t\t\$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t}\t\t\t
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});
//--></script>
";
    }

    public function getTemplateName()
    {
        return "common/developer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 103,  223 => 72,  211 => 63,  208 => 62,  203 => 61,  199 => 59,  194 => 57,  190 => 55,  187 => 54,  182 => 52,  178 => 50,  173 => 48,  169 => 46,  167 => 45,  163 => 44,  157 => 41,  154 => 40,  148 => 38,  142 => 37,  135 => 36,  129 => 33,  123 => 32,  116 => 31,  114 => 30,  111 => 29,  105 => 26,  99 => 25,  92 => 24,  86 => 21,  80 => 20,  73 => 19,  71 => 18,  67 => 17,  60 => 13,  56 => 12,  52 => 11,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "common/developer.twig", "");
    }
}
