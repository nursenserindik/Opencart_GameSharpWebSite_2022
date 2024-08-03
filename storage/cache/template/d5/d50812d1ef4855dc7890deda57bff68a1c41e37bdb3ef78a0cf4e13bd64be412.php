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

/* extension/module/ocpagebuilder/oc_page_builder.twig */
class __TwigTemplate_44c769e0a3e898ef02066e357ff3eef89df2279b5132370166ba442a8684e9ce extends \Twig\Template
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
                <button type=\"submit\" form=\"form-page-builder\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
                <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
            <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
            <ul class=\"breadcrumb\">
                ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "                    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "            </ul>
        </div>
    </div>
    <div class=\"container-fluid\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i>";
        // line 19
        echo ($context["text_edit"] ?? null);
        echo "</h3>
            </div>
        </div>
        <div class=\"panel-body\">
            <form action=\"";
        // line 23
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-page-builder\" class=\"form-horizontal\">
                <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 25
        echo ($context["entry_name"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"name\" value=\"";
        // line 27
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
                        ";
        // line 28
        if (($context["error_name"] ?? null)) {
            // line 29
            echo "                            <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                        ";
        }
        // line 31
        echo "                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 35
        echo ($context["entry_status"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"status\" id=\"input-status\" class=\"form-control\">
                            ";
        // line 38
        if (($context["status"] ?? null)) {
            // line 39
            echo "                                <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                <option value=\"0\">";
            // line 40
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                            ";
        } else {
            // line 42
            echo "                                <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                <option value=\"0\" selected=\"selected\">";
            // line 43
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                            ";
        }
        // line 45
        echo "                        </select>
                    </div>
                </div>

                <div class=\"form-group\">
                    <div class=\"widget-container col-sm-12\">
                        ";
        // line 51
        if (($context["widgets"] ?? null)) {
            // line 52
            echo "                            ";
            $context["widget_row"] = 0;
            // line 53
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["widgets"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["main_row"]) {
                // line 54
                echo "                                ";
                list($context["cols_format"], $context["main_col_count"]) =                 ["", 0];
                // line 55
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["main_row"], "main_cols", [], "any", false, false, false, 55));
                foreach ($context['_seq'] as $context["_key"] => $context["main_col"]) {
                    // line 56
                    echo "                                    ";
                    $context["main_col_count"] = (($context["main_col_count"] ?? null) + 1);
                    // line 57
                    echo "                                    ";
                    if (($context["main_col"] == twig_last($this->env, twig_get_attribute($this->env, $this->source, $context["main_row"], "main_cols", [], "any", false, false, false, 57)))) {
                        // line 58
                        echo "                                        ";
                        $context["cols_format"] = (($context["cols_format"] ?? null) . twig_get_attribute($this->env, $this->source, $context["main_col"], "format", [], "any", false, false, false, 58));
                        // line 59
                        echo "                                    ";
                    } else {
                        // line 60
                        echo "                                        ";
                        $context["cols_format"] = ((($context["cols_format"] ?? null) . twig_get_attribute($this->env, $this->source, $context["main_col"], "format", [], "any", false, false, false, 60)) . " + ");
                        // line 61
                        echo "                                    ";
                    }
                    // line 62
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_col'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                echo "                                <div class=\"widget-row col-sm-12\">
                                    <div class=\"row-action\">
                                        <div class=\"action-group\">
                                            <input type=\"text\" class=\"form-control input-class-name\" name=\"widget[";
                // line 66
                echo ($context["widget_row"] ?? null);
                echo "][class]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["main_row"], "class", [], "any", false, false, false, 66);
                echo "\" placeholder=\"";
                echo ($context["text_custom_classname"] ?? null);
                echo "\" />
                                            <span class=\"row-identify\">";
                // line 67
                echo ($context["text_columns"] ?? null);
                echo "</span>
                                            <div class=\"col-count\">
                                                <a href=\"javascript:void(0);\" onclick=\"builder.plusMainColumn(\$(this));\" rel=\"1\" class=\"col-plus\"></a>
                                                <span class=\"count\">";
                // line 70
                echo ($context["main_col_count"] ?? null);
                echo "</span>
                                                <a href=\"javascript:void(0);\" onclick=\"builder.minusMainColumn(\$(this));\" rel=\"1\" class=\"col-minus\"></a>
                                            </div>
                                            <div class=\"a-group\">
                                                <a class=\"a-column-custom\" title=\"";
                // line 74
                echo ($context["text_custom_columns"] ?? null);
                echo "\" onclick=\"builder.customMainColumns(\$(this));\" href=\"javascript:void(0);\"></a>
                                                <a class=\"a-row-delete\" onclick=\"builder.removeRow(\$(this));\" href=\"javascript:void(0);\"></a>
                                            </div>
                                        </div>
                                        <input type=\"hidden\" class=\"cols-format\" value=\"";
                // line 78
                echo ($context["cols_format"] ?? null);
                echo "\" />
                                    </div>
                                    <div class=\"row-content row-";
                // line 80
                echo ($context["widget_row"] ?? null);
                echo "\">
                                        ";
                // line 81
                $context["main_col_count"] = 0;
                // line 82
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["main_row"], "main_cols", [], "any", false, false, false, 82));
                foreach ($context['_seq'] as $context["_key"] => $context["main_col"]) {
                    // line 83
                    echo "                                            <div class=\"col-sm-";
                    echo twig_get_attribute($this->env, $this->source, $context["main_col"], "format", [], "any", false, false, false, 83);
                    echo " main-column\">
                                                <input type=\"hidden\" class=\"main-col-pos\" value=\"";
                    // line 84
                    echo ($context["main_col_count"] ?? null);
                    echo "\" />
                                                <input type=\"hidden\" class=\"main-col-format\" name=\"widget[";
                    // line 85
                    echo ($context["widget_row"] ?? null);
                    echo "][main_cols][";
                    echo ($context["main_col_count"] ?? null);
                    echo "][format]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["main_col"], "format", [], "any", false, false, false, 85);
                    echo "\" />
                                                <a class=\"a-sub-row-add\" href=\"javascript:void(0);\" onclick=\"builder.drawSubRow(\$(this))\">";
                    // line 86
                    echo ($context["text_add_sub_row"] ?? null);
                    echo "</a>
                                                <div class=\"main-col-content main-col-";
                    // line 87
                    echo ($context["main_col_count"] ?? null);
                    echo "\">
                                                    ";
                    // line 88
                    $context["widget_sub_row"] = 0;
                    // line 89
                    echo "                                                    ";
                    if (twig_get_attribute($this->env, $this->source, $context["main_col"], "sub_rows", [], "any", false, false, false, 89)) {
                        // line 90
                        echo "                                                        ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["main_col"], "sub_rows", [], "any", false, false, false, 90));
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_row"]) {
                            // line 91
                            echo "                                                            ";
                            list($context["sub_cols_format"], $context["sub_col_count"]) =                             ["", 0];
                            // line 92
                            echo "                                                            ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sub_row"], "sub_cols", [], "any", false, false, false, 92));
                            foreach ($context['_seq'] as $context["_key"] => $context["sub_col"]) {
                                // line 93
                                echo "                                                                ";
                                $context["sub_col_count"] = (($context["sub_col_count"] ?? null) + 1);
                                // line 94
                                echo "                                                                ";
                                if (($context["sub_col"] == twig_last($this->env, twig_get_attribute($this->env, $this->source, $context["sub_row"], "sub_cols", [], "any", false, false, false, 94)))) {
                                    // line 95
                                    echo "                                                                    ";
                                    $context["sub_cols_format"] = (($context["sub_cols_format"] ?? null) . twig_get_attribute($this->env, $this->source, $context["sub_col"], "format", [], "any", false, false, false, 95));
                                    // line 96
                                    echo "                                                                ";
                                } else {
                                    // line 97
                                    echo "                                                                    ";
                                    $context["sub_cols_format"] = ((($context["sub_cols_format"] ?? null) . twig_get_attribute($this->env, $this->source, $context["sub_col"], "format", [], "any", false, false, false, 97)) . " + ");
                                    // line 98
                                    echo "                                                                ";
                                }
                                // line 99
                                echo "                                                            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_col'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 100
                            echo "                                                            <div class=\"sub-row sub-row-";
                            echo ($context["widget_sub_row"] ?? null);
                            echo "\">
                                                                <div class=\"sub-row-action\">
                                                                    <div class=\"action-group\">
                                                                        <span class=\"row-identify\">";
                            // line 103
                            echo ($context["text_columns"] ?? null);
                            echo "</span>
                                                                        <div class=\"sub-col-count\">
                                                                            <a href=\"javascript:void(0);\" onclick=\"builder.plusSubColumn(\$(this))\" rel=\"1\" class=\"col-plus\"></a>
                                                                            <span class=\"count\">";
                            // line 106
                            echo ($context["sub_col_count"] ?? null);
                            echo "</span>
                                                                            <a href=\"javascript:void(0);\" onclick=\"builder.minusSubColumn(\$(this))\" rel=\"1\" class=\"col-minus\"></a>
                                                                        </div>
                                                                        <div class=\"a-group\">
                                                                            <a class=\"a-column-custom\" title=\"";
                            // line 110
                            echo ($context["text_custom_columns"] ?? null);
                            echo "\" onclick=\"builder.customSubColumns(\$(this))\" href=\"javascript:void(0);\"></a>
                                                                            <a class=\"a-row-delete\" onclick=\"builder.removeSubRow(\$(this))\" href=\"javascript:void(0);\"></a>
                                                                        </div>
                                                                    </div>
                                                                    <input type=\"hidden\" class=\"sub-cols-format\" value=\"";
                            // line 114
                            echo ($context["sub_cols_format"] ?? null);
                            echo "\" />
                                                                </div>
                                                                <div class=\"sub-row-content\">
                                                                    ";
                            // line 117
                            $context["sub_col_count"] = 0;
                            // line 118
                            echo "                                                                    ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sub_row"], "sub_cols", [], "any", false, false, false, 118));
                            foreach ($context['_seq'] as $context["_key"] => $context["sub_col"]) {
                                // line 119
                                echo "                                                                        <div class=\"col-sm-";
                                echo twig_get_attribute($this->env, $this->source, $context["sub_col"], "format", [], "any", false, false, false, 119);
                                echo " column-area\">
                                                                            <div class=\"module-area droparea ui-droppable ui-sortable sub-col-";
                                // line 120
                                echo ($context["sub_col_count"] ?? null);
                                echo "\">
                                                                                <div class=\"text-insert-module\"><span class=\"\">";
                                // line 121
                                echo ($context["text_insert_module"] ?? null);
                                echo "</span></div>
                                                                                ";
                                // line 122
                                if (twig_get_attribute($this->env, $this->source, $context["sub_col"], "info", [], "any", false, false, false, 122)) {
                                    // line 123
                                    echo "                                                                                    ";
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sub_col"], "info", [], "any", false, false, false, 123));
                                    foreach ($context['_seq'] as $context["_key"] => $context["modules"]) {
                                        // line 124
                                        echo "                                                                                        ";
                                        $context["position"] = 0;
                                        // line 125
                                        echo "                                                                                        ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["modules"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                                            // line 126
                                            echo "                                                                                            ";
                                            $context["module_name"] = "";
                                            // line 127
                                            echo "                                                                                            ";
                                            $context["module_url"] = "";
                                            // line 128
                                            echo "                                                                                            ";
                                            $context['_parent'] = $context;
                                            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
                                            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                                                // line 129
                                                echo "                                                                                                ";
                                                if (( !twig_get_attribute($this->env, $this->source, $context["extension"], "modules", [], "any", false, false, false, 129) && (twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 129) == twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 129)))) {
                                                    // line 130
                                                    echo "                                                                                                    ";
                                                    $context["module_url"] = twig_get_attribute($this->env, $this->source, $context["extension"], "url", [], "any", false, false, false, 130);
                                                    // line 131
                                                    echo "                                                                                                    ";
                                                    $context["module_name"] = twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 131);
                                                    // line 132
                                                    echo "                                                                                                ";
                                                } else {
                                                    // line 133
                                                    echo "                                                                                                    ";
                                                    $context['_parent'] = $context;
                                                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "modules", [], "any", false, false, false, 133));
                                                    foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                                                        // line 134
                                                        echo "                                                                                                        ";
                                                        if ((twig_get_attribute($this->env, $this->source, $context["m"], "code", [], "any", false, false, false, 134) == twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 134))) {
                                                            // line 135
                                                            echo "                                                                                                            ";
                                                            $context["module_url"] = twig_get_attribute($this->env, $this->source, $context["m"], "url", [], "any", false, false, false, 135);
                                                            // line 136
                                                            echo "                                                                                                            ";
                                                            $context["module_name"] = twig_get_attribute($this->env, $this->source, $context["m"], "name", [], "any", false, false, false, 136);
                                                            // line 137
                                                            echo "                                                                                                        ";
                                                        }
                                                        // line 138
                                                        echo "                                                                                                    ";
                                                    }
                                                    $_parent = $context['_parent'];
                                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                                    // line 139
                                                    echo "                                                                                                ";
                                                }
                                                // line 140
                                                echo "                                                                                            ";
                                            }
                                            $_parent = $context['_parent'];
                                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
                                            $context = array_intersect_key($context, $_parent) + $_parent;
                                            // line 141
                                            echo "                                                                                            <div class=\"layout-module-info moveable\">
                                                                                                <div class=\"top\">
                                                                                                    <div class=\"module-info\">
                                                                                                        <p>";
                                            // line 144
                                            echo ($context["module_name"] ?? null);
                                            echo "</p>
                                                                                                        <a class=\"btn-edit\" href=\"javascript:void(0);\" onclick=\"loadModule('";
                                            // line 145
                                            echo ($context["module_url"] ?? null);
                                            echo "')\"></a>
                                                                                                        <a class=\"btn-remove\" href=\"javascript:void(0);\" onclick=\"builder.removeModule(\$(this))\"></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type=\"hidden\" class=\"module-in-main-row\" value=\"";
                                            // line 149
                                            echo ($context["widget_row"] ?? null);
                                            echo "\" />
                                                                                                <input type=\"hidden\" class=\"module-in-main-col\" value=\"";
                                            // line 150
                                            echo ($context["main_col_count"] ?? null);
                                            echo "\" />
                                                                                                <input type=\"hidden\" class=\"module-in-sub-row\" value=\"";
                                            // line 151
                                            echo ($context["widget_sub_row"] ?? null);
                                            echo "\" />
                                                                                                <input type=\"hidden\" class=\"module-in-sub-col\" value=\"";
                                            // line 152
                                            echo ($context["sub_col_count"] ?? null);
                                            echo "\" />
                                                                                                <input type=\"hidden\" class=\"module-code\" name=\"widget[";
                                            // line 153
                                            echo ($context["widget_row"] ?? null);
                                            echo "][main_cols][";
                                            echo ($context["main_col_count"] ?? null);
                                            echo "][sub_rows][";
                                            echo ($context["widget_sub_row"] ?? null);
                                            echo "][sub_cols][";
                                            echo ($context["sub_col_count"] ?? null);
                                            echo "][info][module][";
                                            echo ($context["position"] ?? null);
                                            echo "][code]\" value=\"";
                                            echo twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 153);
                                            echo "\" />
                                                                                                <input type=\"hidden\" class=\"module-name\" name=\"widget[";
                                            // line 154
                                            echo ($context["widget_row"] ?? null);
                                            echo "][main_cols][";
                                            echo ($context["main_col_count"] ?? null);
                                            echo "][sub_rows][";
                                            echo ($context["widget_sub_row"] ?? null);
                                            echo "][sub_cols][";
                                            echo ($context["sub_col_count"] ?? null);
                                            echo "][info][module][";
                                            echo ($context["position"] ?? null);
                                            echo "][name]\" value=\"";
                                            echo twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 154);
                                            echo "\" />
                                                                                                <input type=\"hidden\" class=\"module-url\"  name=\"widget[";
                                            // line 155
                                            echo ($context["widget_row"] ?? null);
                                            echo "][main_cols][";
                                            echo ($context["main_col_count"] ?? null);
                                            echo "][sub_rows][";
                                            echo ($context["widget_sub_row"] ?? null);
                                            echo "][sub_cols][";
                                            echo ($context["sub_col_count"] ?? null);
                                            echo "][info][module][";
                                            echo ($context["position"] ?? null);
                                            echo "][url]\"  value=\"";
                                            echo twig_get_attribute($this->env, $this->source, $context["module"], "url", [], "any", false, false, false, 155);
                                            echo "\" />
                                                                                            </div>
                                                                                            ";
                                            // line 157
                                            $context["position"] = (($context["position"] ?? null) + 1);
                                            // line 158
                                            echo "                                                                                        ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 159
                                        echo "                                                                                    ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modules'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 160
                                    echo "                                                                                ";
                                }
                                // line 161
                                echo "                                                                            </div>
                                                                            <div class=\"col-action\">
                                                                                <div class=\"action-group\">
                                                                                    <a class=\"a-module-add\" onclick=\"builder.showAllModules(\$(this))\" href=\"javascript:void(0);\"><i class=\"fa fa-plus\"></i> ";
                                // line 164
                                echo ($context["text_add_module"] ?? null);
                                echo "</a>
                                                                                </div>
                                                                            </div>
                                                                            <input type=\"hidden\" class=\"sub-col-pos\" value=\"";
                                // line 167
                                echo ($context["sub_col_count"] ?? null);
                                echo "\" />
                                                                            <input type=\"hidden\" class=\"sub-col-format\" name=\"widget[";
                                // line 168
                                echo ($context["widget_row"] ?? null);
                                echo "][main_cols][";
                                echo ($context["main_col_count"] ?? null);
                                echo "][sub_rows][";
                                echo ($context["widget_sub_row"] ?? null);
                                echo "][sub_cols][";
                                echo ($context["sub_col_count"] ?? null);
                                echo "][format]\" value=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["sub_col"], "format", [], "any", false, false, false, 168);
                                echo "\" />
                                                                        </div>
                                                                        ";
                                // line 170
                                $context["sub_col_count"] = (($context["sub_col_count"] ?? null) + 1);
                                // line 171
                                echo "                                                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_col'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 172
                            echo "                                                                </div>
                                                                <input type=\"hidden\" class=\"sub-row-pos\" value=\"";
                            // line 173
                            echo ($context["widget_sub_row"] ?? null);
                            echo "\" />
                                                            </div>
                                                            ";
                            // line 175
                            $context["widget_sub_row"] = (($context["widget_sub_row"] ?? null) + 1);
                            // line 176
                            echo "                                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_row'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 177
                        echo "                                                    ";
                    } else {
                        // line 178
                        echo "                                                        <div class=\"sub-row sub-row-";
                        echo ($context["widget_sub_row"] ?? null);
                        echo "\">
                                                            <div class=\"sub-row-action\">
                                                                <div class=\"action-group\">
                                                                    <span class=\"row-identify\">";
                        // line 181
                        echo ($context["text_columns"] ?? null);
                        echo "</span>
                                                                    <div class=\"sub-col-count\">
                                                                        <a href=\"javascript:void(0);\" onclick=\"builder.plusSubColumn(\$(this))\" rel=\"1\" class=\"col-plus\"></a>
                                                                        <span class=\"count\">1</span>
                                                                        <a href=\"javascript:void(0);\" onclick=\"builder.minusSubColumn(\$(this))\" rel=\"1\" class=\"col-minus\"></a>
                                                                    </div>
                                                                    <div class=\"a-group\">
                                                                        <a class=\"a-column-custom\" title=\"";
                        // line 188
                        echo ($context["text_custom_columns"] ?? null);
                        echo "\" onclick=\"builder.customSubColumns(\$(this))\" href=\"javascript:void(0);\"></a>
                                                                        <a class=\"a-row-delete\" onclick=\"builder.removeSubRow(\$(this))\" href=\"javascript:void(0);\"></a>
                                                                    </div>
                                                                </div>
                                                                <input type=\"hidden\" class=\"sub-cols-format\" value=\"12\" />
                                                            </div>
                                                            <div class=\"sub-row-content\">
                                                                <div class=\"col-sm-12 column-area\">
                                                                    <div class=\"module-area droparea ui-droppable ui-sortable sub-col-";
                        // line 196
                        echo ($context["sub_col_count"] ?? null);
                        echo "\">
                                                                        <div class=\"text-insert-module\"><span class=\"\">";
                        // line 197
                        echo ($context["text_insert_module"] ?? null);
                        echo "</span></div>
                                                                    </div>
                                                                    <div class=\"col-action\">
                                                                        <div class=\"action-group\">
                                                                            <a class=\"a-module-add\" onclick=\"builder.showAllModules(\$(this))\" href=\"javascript:void(0);\"><i class=\"fa fa-plus\"></i> ";
                        // line 201
                        echo ($context["text_add_module"] ?? null);
                        echo "</a>
                                                                        </div>
                                                                    </div>
                                                                    <input type=\"hidden\" class=\"sub-col-pos\" value=\"";
                        // line 204
                        echo ($context["sub_col_count"] ?? null);
                        echo "\" />
                                                                    <input type=\"hidden\" class=\"sub-col-format\" name=\"widget[0][main_cols][0][sub_rows][0][sub_cols][0][format]\" value=\"12\" />
                                                                </div>
                                                            </div>
                                                            <input type=\"hidden\" class=\"sub-row-pos\" value=\"";
                        // line 208
                        echo ($context["widget_sub_row"] ?? null);
                        echo "\" />
                                                        </div>
                                                    ";
                    }
                    // line 211
                    echo "                                                </div>
                                            </div>
                                            ";
                    // line 213
                    $context["main_col_count"] = (($context["main_col_count"] ?? null) + 1);
                    // line 214
                    echo "                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_col'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 215
                echo "                                    </div>
                                    <input type=\"hidden\" class=\"main-row-pos\" value=\"";
                // line 216
                echo ($context["widget_row"] ?? null);
                echo "\" />
                                </div>
                                ";
                // line 218
                $context["widget_row"] = (($context["widget_row"] ?? null) + 1);
                // line 219
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 220
            echo "                        ";
        } else {
            // line 221
            echo "                            ";
            $context["widget_row"] = 0;
            // line 222
            echo "                            <div class=\"widget-row col-sm-12\">
                                <div class=\"row-action\">
                                    <div class=\"action-group\">
                                        <input type=\"text\" class=\"form-control input-class-name\" name=\"widget[0][class]\" value=\"\" placeholder=\"";
            // line 225
            echo ($context["text_custom_classname"] ?? null);
            echo "\" />
                                        <span class=\"row-identify\">";
            // line 226
            echo ($context["text_columns"] ?? null);
            echo "</span>
                                        <div class=\"col-count\">
                                            <a href=\"javascript:void(0);\" onclick=\"builder.plusMainColumn(\$(this));\" rel=\"1\" class=\"col-plus\"></a>
                                            <span class=\"count\">1</span>
                                            <a href=\"javascript:void(0);\" onclick=\"builder.minusMainColumn(\$(this));\" rel=\"1\" class=\"col-minus\"></a>
                                        </div>
                                        <div class=\"a-group\">
                                            <a class=\"a-column-custom\" title=\"";
            // line 233
            echo ($context["text_custom_columns"] ?? null);
            echo "\" onclick=\"builder.customMainColumns(\$(this));\" href=\"javascript:void(0);\"></a>
                                            <a class=\"a-row-delete\" onclick=\"builder.removeRow(\$(this));\" href=\"javascript:void(0);\"></a>
                                        </div>
                                    </div>
                                    <input type=\"hidden\" class=\"cols-format\" value=\"12\" />
                                </div>
                                <div class=\"row-content row-";
            // line 239
            echo ($context["widget_row"] ?? null);
            echo "\">
                                    ";
            // line 240
            $context["main_col_count"] = 0;
            // line 241
            echo "                                    ";
            $context["sub_col_count"] = 0;
            // line 242
            echo "                                    <div class=\"col-sm-12 main-column\">
                                        <input type=\"hidden\" class=\"main-col-pos\" value=\"";
            // line 243
            echo ($context["main_col_count"] ?? null);
            echo "\" />
                                        <input type=\"hidden\" class=\"main-col-format\" name=\"widget[0][main_cols][0][format]\" value=\"12\" />
                                        <a class=\"a-sub-row-add\" href=\"javascript:void(0);\" onclick=\"builder.drawSubRow(\$(this))\">";
            // line 245
            echo ($context["text_add_sub_row"] ?? null);
            echo "</a>
                                        <div class=\"main-col-content main-col-";
            // line 246
            echo ($context["main_col_count"] ?? null);
            echo "\">
                                            ";
            // line 247
            $context["widget_sub_row"] = 0;
            // line 248
            echo "                                            <div class=\"sub-row sub-row-";
            echo ($context["widget_sub_row"] ?? null);
            echo "\">
                                                <div class=\"sub-row-action\">
                                                    <div class=\"action-group\">
                                                        <span class=\"row-identify\">";
            // line 251
            echo ($context["text_columns"] ?? null);
            echo "</span>
                                                        <div class=\"sub-col-count\">
                                                            <a href=\"javascript:void(0);\" onclick=\"builder.plusSubColumn(\$(this))\" rel=\"1\" class=\"col-plus\"></a>
                                                            <span class=\"count\">1</span>
                                                            <a href=\"javascript:void(0);\" onclick=\"builder.minusSubColumn(\$(this))\" rel=\"1\" class=\"col-minus\"></a>
                                                        </div>
                                                        <div class=\"a-group\">
                                                            <a class=\"a-column-custom\" title=\"";
            // line 258
            echo ($context["text_custom_columns"] ?? null);
            echo "\" onclick=\"builder.customSubColumns(\$(this))\" href=\"javascript:void(0);\"></a>
                                                            <a class=\"a-row-delete\" onclick=\"builder.removeSubRow(\$(this))\" href=\"javascript:void(0);\"></a>
                                                        </div>
                                                    </div>
                                                    <input type=\"hidden\" class=\"sub-cols-format\" value=\"12\" />
                                                </div>
                                                <div class=\"sub-row-content\">
                                                    <div class=\"col-sm-12 column-area\">
                                                        <div class=\"module-area droparea ui-droppable ui-sortable sub-col-";
            // line 266
            echo ($context["sub_col_count"] ?? null);
            echo "\">
                                                            <div class=\"text-insert-module\"><span class=\"\">";
            // line 267
            echo ($context["text_insert_module"] ?? null);
            echo "</span></div>
                                                        </div>
                                                        <div class=\"col-action\">
                                                            <div class=\"action-group\">
                                                                <a class=\"a-module-add\" onclick=\"builder.showAllModules(\$(this))\" href=\"javascript:void(0);\"><i class=\"fa fa-plus\"></i> ";
            // line 271
            echo ($context["text_add_module"] ?? null);
            echo "</a>
                                                            </div>
                                                        </div>
                                                        <input type=\"hidden\" class=\"sub-col-pos\" value=\"";
            // line 274
            echo ($context["sub_col_count"] ?? null);
            echo "\" />
                                                        <input type=\"hidden\" class=\"sub-col-format\" name=\"widget[0][main_cols][0][sub_rows][0][sub_cols][0][format]\" value=\"12\" />
                                                    </div>
                                                </div>
                                                <input type=\"hidden\" class=\"sub-row-pos\" value=\"";
            // line 278
            echo ($context["widget_sub_row"] ?? null);
            echo "\" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type=\"hidden\" class=\"main-row-pos\" value=\"";
            // line 283
            echo ($context["widget_row"] ?? null);
            echo "\" />
                            </div>
                        ";
        }
        // line 286
        echo "                    </div>
                    <div class=\"widget-info-group col-sm-12\">
                        <button type=\"button\" class=\"btn-insert btn\">
                            <i class=\"fa fa-plus\"></i>
                            <span>";
        // line 290
        echo ($context["text_add_row"] ?? null);
        echo "</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class=\"all-modules-container row\">
            <div class=\"modules-container\">
                ";
        // line 298
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
            // line 299
            echo "                    ";
            if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "modules", [], "any", false, false, false, 299)) {
                // line 300
                echo "                        ";
                $context["extension_url"] = twig_get_attribute($this->env, $this->source, $context["extension"], "url", [], "any", false, false, false, 300);
                // line 301
                echo "                        ";
                $context["extension_code"] = twig_get_attribute($this->env, $this->source, $context["extension"], "code", [], "any", false, false, false, 301);
                // line 302
                echo "                        ";
                $context["extension_name"] = twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 302);
                // line 303
                echo "                        <div class=\"col-sm-4\">
                            <button type=\"button\" onclick=\"builder.addModule('";
                // line 304
                echo ($context["extension_name"] ?? null);
                echo "', '";
                echo ($context["extension_code"] ?? null);
                echo "', '";
                echo ($context["extension_url"] ?? null);
                echo "')\" class=\"btn-choose-module btn btn-default\" value=\"";
                echo ($context["extension_code"] ?? null);
                echo "\">
                                <span>
                                    ";
                // line 306
                echo ($context["extension_name"] ?? null);
                echo "
                                </span>
                            </button>
                        </div>
                    ";
            } else {
                // line 311
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "modules", [], "any", false, false, false, 311));
                foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                    // line 312
                    echo "                            ";
                    $context["module_url"] = twig_get_attribute($this->env, $this->source, $context["module"], "url", [], "any", false, false, false, 312);
                    // line 313
                    echo "                            ";
                    $context["module_code"] = twig_get_attribute($this->env, $this->source, $context["module"], "code", [], "any", false, false, false, 313);
                    // line 314
                    echo "                            ";
                    $context["module_name"] = twig_get_attribute($this->env, $this->source, $context["module"], "name", [], "any", false, false, false, 314);
                    // line 315
                    echo "                            <div class=\"col-sm-4\">
                                <button type=\"button\" onclick=\"builder.addModule('";
                    // line 316
                    echo ($context["module_name"] ?? null);
                    echo "', '";
                    echo ($context["module_code"] ?? null);
                    echo "', '";
                    echo ($context["module_url"] ?? null);
                    echo "')\" class=\"btn-choose-module btn btn-default\" value=\"";
                    echo ($context["module_code"] ?? null);
                    echo "\">
                                    <span>
                                        ";
                    // line 318
                    echo ($context["module_name"] ?? null);
                    echo "
                                    </span>
                                </button>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 323
                echo "                    ";
            }
            // line 324
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 325
        echo "            </div>
            <input type=\"hidden\" id=\"module-row\" value=\"0\" />
            <input type=\"hidden\" id=\"module-col\" value=\"0\" />
            <input type=\"hidden\" id=\"module-sub-row\" value=\"0\" />
            <input type=\"hidden\" id=\"module-sub-col\" value=\"0\" />
            <div class=\"modules-btn-group\">
                <button type=\"button\" class=\"btn-close btn-default pull-right\" onclick=\"builder.closeAllModules();\">Close</button>
            </div>
        </div>
    </div>
</div>

<input type=\"hidden\" id=\"text-columns\" value=\"";
        // line 337
        echo ($context["text_columns"] ?? null);
        echo "\" />
<input type=\"hidden\" id=\"text-insert-module\" value=\"";
        // line 338
        echo ($context["text_insert_module"] ?? null);
        echo "\" />
<input type=\"hidden\" id=\"text-add-module\" value=\"";
        // line 339
        echo ($context["text_add_module"] ?? null);
        echo "\" />
<input type=\"hidden\" id=\"text-custom-columns\" value=\"";
        // line 340
        echo ($context["text_custom_columns"] ?? null);
        echo "\" />
<input type=\"hidden\" id=\"text-custom-classname\" value=\"";
        // line 341
        echo ($context["text_custom_classname"] ?? null);
        echo "\" />
<input type=\"hidden\" id=\"text-number-min-over\" value=\"";
        // line 342
        echo ($context["text_number_min_over"] ?? null);
        echo "\" />
<input type=\"hidden\" id=\"text-number-max-over\" value=\"";
        // line 343
        echo ($context["text_number_max_over"] ?? null);
        echo "\" />
<input type=\"hidden\" id=\"text-columns-error-format\" value=\"";
        // line 344
        echo ($context["text_columns_error_format"] ?? null);
        echo "\" />

<div class=\"popup-background\"></div>
    <div class=\"popup-loader-img\">
    </div>
    <div class=\"popup-container\">
        <div class=\"popup-content\">
            <iframe src=\"\" id=\"module-frame\" scrolling=\"yes\"></iframe>
        </div>
        <div class=\"popup-btn-group\">
            <button type=\"button\" class=\"btn-close btn-default pull-right\" onclick=\"closePopup();\">Close</button>
        </div>
    </div>
";
        // line 357
        echo ($context["footer"] ?? null);
        echo "

<script type=\"text/javascript\">
    \$('.btn-insert').click(function () {
        var row_number = \$('.widget-row:last .main-row-pos').val();
        if(row_number == null) {
            row_number = 0;
        } else {
            row_number++;
        }
        builder.drawMainRow(row_number);
    });

    var module_edit_frame = \$('#module-frame');

    function closePopup() {
        \$('.popup-background').hide();
        \$('.popup-loader-img').hide();
        \$('.popup-container').hide();
        module_edit_frame.attr('src', \"\");
    }

    function loadModule(url) {
        module_edit_frame.attr('src', url);
        \$('.popup-background').show();
        \$('.popup-loader-img').show();
    }

    module_edit_frame.on('load', function(event) {
        var current_url = document.getElementById(\"module-frame\").contentWindow.location.href;

        if(module_edit_frame.attr('src') != \"\" && current_url.search('route=extension/module') > -1) {
            module_edit_frame.contents().find('#header,#content .page-header .breadcrumb,#column-left,#footer').hide();
            module_edit_frame.contents().find('#column-left + #content').css('margin', '0px');
            module_edit_frame.contents().find('#content').css('padding', '20px 0 0');
            \$('.popup-container').show();
        } else {
            \$('.popup-background').hide();
            \$('.popup-loader-img').hide();
            \$('.popup-container').hide();
        }
    });

    \$('.popup-background').on('click', function(){
        closePopup();
        builder.closeAllModules();
    });
</script>";
    }

    public function getTemplateName()
    {
        return "extension/module/ocpagebuilder/oc_page_builder.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  959 => 357,  943 => 344,  939 => 343,  935 => 342,  931 => 341,  927 => 340,  923 => 339,  919 => 338,  915 => 337,  901 => 325,  895 => 324,  892 => 323,  881 => 318,  870 => 316,  867 => 315,  864 => 314,  861 => 313,  858 => 312,  853 => 311,  845 => 306,  834 => 304,  831 => 303,  828 => 302,  825 => 301,  822 => 300,  819 => 299,  815 => 298,  804 => 290,  798 => 286,  792 => 283,  784 => 278,  777 => 274,  771 => 271,  764 => 267,  760 => 266,  749 => 258,  739 => 251,  732 => 248,  730 => 247,  726 => 246,  722 => 245,  717 => 243,  714 => 242,  711 => 241,  709 => 240,  705 => 239,  696 => 233,  686 => 226,  682 => 225,  677 => 222,  674 => 221,  671 => 220,  665 => 219,  663 => 218,  658 => 216,  655 => 215,  649 => 214,  647 => 213,  643 => 211,  637 => 208,  630 => 204,  624 => 201,  617 => 197,  613 => 196,  602 => 188,  592 => 181,  585 => 178,  582 => 177,  576 => 176,  574 => 175,  569 => 173,  566 => 172,  560 => 171,  558 => 170,  545 => 168,  541 => 167,  535 => 164,  530 => 161,  527 => 160,  521 => 159,  515 => 158,  513 => 157,  498 => 155,  484 => 154,  470 => 153,  466 => 152,  462 => 151,  458 => 150,  454 => 149,  447 => 145,  443 => 144,  438 => 141,  432 => 140,  429 => 139,  423 => 138,  420 => 137,  417 => 136,  414 => 135,  411 => 134,  406 => 133,  403 => 132,  400 => 131,  397 => 130,  394 => 129,  389 => 128,  386 => 127,  383 => 126,  378 => 125,  375 => 124,  370 => 123,  368 => 122,  364 => 121,  360 => 120,  355 => 119,  350 => 118,  348 => 117,  342 => 114,  335 => 110,  328 => 106,  322 => 103,  315 => 100,  309 => 99,  306 => 98,  303 => 97,  300 => 96,  297 => 95,  294 => 94,  291 => 93,  286 => 92,  283 => 91,  278 => 90,  275 => 89,  273 => 88,  269 => 87,  265 => 86,  257 => 85,  253 => 84,  248 => 83,  243 => 82,  241 => 81,  237 => 80,  232 => 78,  225 => 74,  218 => 70,  212 => 67,  204 => 66,  199 => 63,  193 => 62,  190 => 61,  187 => 60,  184 => 59,  181 => 58,  178 => 57,  175 => 56,  170 => 55,  167 => 54,  162 => 53,  159 => 52,  157 => 51,  149 => 45,  144 => 43,  139 => 42,  134 => 40,  129 => 39,  127 => 38,  121 => 35,  115 => 31,  109 => 29,  107 => 28,  101 => 27,  96 => 25,  91 => 23,  84 => 19,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/ocpagebuilder/oc_page_builder.twig", "");
    }
}
