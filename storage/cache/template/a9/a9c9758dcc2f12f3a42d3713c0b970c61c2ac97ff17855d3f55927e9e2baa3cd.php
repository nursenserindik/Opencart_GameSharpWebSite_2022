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

/* extension/module/ocblog.twig */
class __TwigTemplate_d4455515d8b95f46a3a47062984f19926ad8093d072734ba69cb4e2f8d8080a4 extends \Twig\Template
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
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
    <div class=\"page-header\">
        <div class=\"container-fluid\">
            <div class=\"pull-right\">
                <a href=\"";
        // line 6
        echo ($context["list_action"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_article_list"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-pencil-square-o\"></i></a>
                <button type=\"submit\" form=\"form-blog\" data-toggle=\"tooltip\" title=\"";
        // line 7
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
                <a href=\"";
        // line 8
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
            </div>
            <h1>";
        // line 10
        echo ($context["heading_title"] ?? null);
        echo "</h1>
            <ul class=\"breadcrumb\">
                ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 13
            echo "                    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 13);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 13);
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "            </ul>
        </div>
    </div>
    <div class=\"container-fluid\">
        ";
        // line 19
        if (($context["error_warning"] ?? null)) {
            // line 20
            echo "        <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        </div>
        ";
        }
        // line 24
        echo "        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 26
        echo ($context["text_edit"] ?? null);
        echo "</h3>
            </div>
            <div class=\"panel-body\">
                <form action=\"";
        // line 29
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-blog\" class=\"form-horizontal\">
                    <fieldset>
                          <div class=\"form-group required\">
                            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 32
        echo ($context["entry_name"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                              <input type=\"text\" name=\"name\" value=\"";
        // line 34
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
                              ";
        // line 35
        if (($context["error_name"] ?? null)) {
            // line 36
            echo "                              <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                              ";
        }
        // line 38
        echo "                            </div>
                          </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 41
        echo ($context["entry_status"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <select name=\"status\" id=\"input-status\" class=\"form-control\">
                                    ";
        // line 44
        if (($context["status"] ?? null)) {
            // line 45
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 46
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                    ";
        } else {
            // line 48
            echo "                                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 49
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                    ";
        }
        // line 51
        echo "                                </select>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-list\">";
        // line 55
        echo ($context["entry_article_list"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <select name=\"list\" id=\"input-list\" class=\"form-control\">
                                ";
        // line 58
        if (($context["article_lists"] ?? null)) {
            // line 59
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["article_lists"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["article_list"]) {
                // line 60
                echo "                                        ";
                if (($context["list"] ?? null)) {
                    // line 61
                    echo "                                            ";
                    if ((($context["list"] ?? null) == twig_get_attribute($this->env, $this->source, $context["article_list"], "article_list_id", [], "any", false, false, false, 61))) {
                        // line 62
                        echo "                                                <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["article_list"], "article_list_id", [], "any", false, false, false, 62);
                        echo "\" selected=\"selected\">";
                        echo twig_get_attribute($this->env, $this->source, $context["article_list"], "name", [], "any", false, false, false, 62);
                        echo "</option>
                                            ";
                    } else {
                        // line 64
                        echo "                                                <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["article_list"], "article_list_id", [], "any", false, false, false, 64);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["article_list"], "name", [], "any", false, false, false, 64);
                        echo "</option>
                                            ";
                    }
                    // line 66
                    echo "                                        ";
                } else {
                    // line 67
                    echo "                                            <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["article_list"], "article_list_id", [], "any", false, false, false, 67);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["article_list"], "name", [], "any", false, false, false, 67);
                    echo "</option>
                                        ";
                }
                // line 69
                echo "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article_list'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "                                ";
        }
        // line 71
        echo "                                </select>
                            </div>
                        </div>
                        <div class=\"form-group required\">
                            <label class=\"col-sm-2 control-label\" for=\"input-width\">";
        // line 75
        echo ($context["entry_width"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"width\" value=\"";
        // line 77
        echo ($context["width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-width\" class=\"form-control\" />
                                ";
        // line 78
        if (($context["error_width"] ?? null)) {
            // line 79
            echo "                                <div class=\"text-danger\">";
            echo ($context["error_width"] ?? null);
            echo "</div>
                                ";
        }
        // line 81
        echo "                            </div>
                        </div>

                        <div class=\"form-group required\">
                            <label class=\"col-sm-2 control-label\" for=\"input-height\">";
        // line 85
        echo ($context["entry_height"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"height\" value=\"";
        // line 87
        echo ($context["height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-height\" class=\"form-control\" />
                                ";
        // line 88
        if (($context["error_height"] ?? null)) {
            // line 89
            echo "                                <div class=\"text-danger\">";
            echo ($context["error_height"] ?? null);
            echo "</div>
                                ";
        }
        // line 91
        echo "                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-auto\">";
        // line 95
        echo ($context["entry_auto"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <select name=\"auto\" id=\"input-auto\" class=\"form-control\">
                                    ";
        // line 98
        if (($context["auto"] ?? null)) {
            // line 99
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 100
            echo ($context["text_no"] ?? null);
            echo "</option>
                                    ";
        } else {
            // line 102
            echo "                                    <option value=\"1\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 103
            echo ($context["text_no"] ?? null);
            echo "</option>
                                    ";
        }
        // line 105
        echo "                                </select>
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-items\">";
        // line 110
        echo ($context["entry_items"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"items\" value=\"";
        // line 112
        echo ($context["items"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_items"] ?? null);
        echo "\" id=\"input-items\" class=\"form-control\" />
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-speed\">";
        // line 117
        echo ($context["entry_speed"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"speed\" value=\"";
        // line 119
        echo ($context["speed"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_speed"] ?? null);
        echo "\" id=\"input-speed\" class=\"form-control\" />
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-rows\">";
        // line 124
        echo ($context["entry_rows"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"rows\" value=\"";
        // line 126
        echo ($context["rows"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_rows"] ?? null);
        echo "\" id=\"input-rows\" class=\"form-control\" />
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-navigation\">";
        // line 131
        echo ($context["entry_navigation"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <select name=\"navigation\" id=\"input-navigation\" class=\"form-control\">
                                    ";
        // line 134
        if (($context["navigation"] ?? null)) {
            // line 135
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 136
            echo ($context["text_no"] ?? null);
            echo "</option>
                                    ";
        } else {
            // line 138
            echo "                                    <option value=\"1\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 139
            echo ($context["text_no"] ?? null);
            echo "</option>
                                    ";
        }
        // line 141
        echo "                                </select>
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"input-pagination\">";
        // line 146
        echo ($context["entry_pagination"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <select name=\"pagination\" id=\"input-pagination\" class=\"form-control\">
                                    ";
        // line 149
        if (($context["pagination"] ?? null)) {
            // line 150
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 151
            echo ($context["text_no"] ?? null);
            echo "</option>
                                    ";
        } else {
            // line 153
            echo "                                    <option value=\"1\">";
            echo ($context["text_yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 154
            echo ($context["text_no"] ?? null);
            echo "</option>
                                    ";
        }
        // line 156
        echo "                                </select>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
";
        // line 165
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/ocblog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  438 => 165,  427 => 156,  422 => 154,  417 => 153,  412 => 151,  407 => 150,  405 => 149,  399 => 146,  392 => 141,  387 => 139,  382 => 138,  377 => 136,  372 => 135,  370 => 134,  364 => 131,  354 => 126,  349 => 124,  339 => 119,  334 => 117,  324 => 112,  319 => 110,  312 => 105,  307 => 103,  302 => 102,  297 => 100,  292 => 99,  290 => 98,  284 => 95,  278 => 91,  272 => 89,  270 => 88,  264 => 87,  259 => 85,  253 => 81,  247 => 79,  245 => 78,  239 => 77,  234 => 75,  228 => 71,  225 => 70,  219 => 69,  211 => 67,  208 => 66,  200 => 64,  192 => 62,  189 => 61,  186 => 60,  181 => 59,  179 => 58,  173 => 55,  167 => 51,  162 => 49,  157 => 48,  152 => 46,  147 => 45,  145 => 44,  139 => 41,  134 => 38,  128 => 36,  126 => 35,  120 => 34,  115 => 32,  109 => 29,  103 => 26,  99 => 24,  91 => 20,  89 => 19,  83 => 15,  72 => 13,  68 => 12,  63 => 10,  56 => 8,  52 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/ocblog.twig", "");
    }
}
