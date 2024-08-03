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

/* extension/extension/dashboard.twig */
class __TwigTemplate_04c58126a4e19ef8a0ef1e4318d7c2e58e36c4dbd28e6a5e1fef67d48ae10aee extends \Twig\Template
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
        echo ($context["promotion"] ?? null);
        echo "
<fieldset>
  <legend>";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</legend>
  ";
        // line 4
        if (($context["error_warning"] ?? null)) {
            // line 5
            echo "  <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  </div>
  ";
        }
        // line 9
        echo "  ";
        if (($context["success"] ?? null)) {
            // line 10
            echo "  <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo ($context["success"] ?? null);
            echo "
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  </div>
  ";
        }
        // line 14
        echo "  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-left\">";
        // line 18
        echo ($context["column_name"] ?? null);
        echo "</td>
          <td class=\"text-right\">";
        // line 19
        echo ($context["column_width"] ?? null);
        echo "</td>
          <td class=\"text-left\">";
        // line 20
        echo ($context["column_status"] ?? null);
        echo "</td>
          <td class=\"text-right\">";
        // line 21
        echo ($context["column_sort_order"] ?? null);
        echo "</td>
          <td class=\"text-right\">";
        // line 22
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 26
        if (($context["extensions"] ?? null)) {
            // line 27
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 28
                echo "        <tr>
          <td class=\"text-left\">";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 29);
                echo "</td>
          <td class=\"text-right\">";
                // line 30
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "width", [], "any", false, false, false, 30);
                echo "</td>
          <td class=\"text-left\">";
                // line 31
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "status", [], "any", false, false, false, 31);
                echo "</td>
          <td class=\"text-right\">";
                // line 32
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "sort_order", [], "any", false, false, false, 32);
                echo "</td>
          <td class=\"text-right\">";
                // line 33
                if (twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 33)) {
                    // line 34
                    echo "            <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "edit", [], "any", false, false, false, 34);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_edit"] ?? null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
            ";
                } else {
                    // line 36
                    echo "            <button type=\"button\" class=\"btn btn-primary\" disabled=\"disabled\"><i class=\"fa fa-pencil\"></i></button>
            ";
                }
                // line 38
                echo "            ";
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 38)) {
                    // line 39
                    echo "            <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 39);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_install"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa fa-plus-circle\"></i></a>
            ";
                } else {
                    // line 41
                    echo "            <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "uninstall", [], "any", false, false, false, 41);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_uninstall"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></a>
            ";
                }
                // line 42
                echo "</td>
        </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "        ";
        } else {
            // line 46
            echo "        <tr>
          <td class=\"text-center\" colspan=\"3\">";
            // line 47
            echo ($context["text_no_results"] ?? null);
            echo "</td>
        </tr>
        ";
        }
        // line 50
        echo "      </tbody>
    </table>
  </div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "extension/extension/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 50,  169 => 47,  166 => 46,  163 => 45,  155 => 42,  147 => 41,  139 => 39,  136 => 38,  132 => 36,  124 => 34,  122 => 33,  118 => 32,  114 => 31,  110 => 30,  106 => 29,  103 => 28,  98 => 27,  96 => 26,  89 => 22,  85 => 21,  81 => 20,  77 => 19,  73 => 18,  67 => 14,  59 => 10,  56 => 9,  48 => 5,  46 => 4,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/extension/dashboard.twig", "");
    }
}
