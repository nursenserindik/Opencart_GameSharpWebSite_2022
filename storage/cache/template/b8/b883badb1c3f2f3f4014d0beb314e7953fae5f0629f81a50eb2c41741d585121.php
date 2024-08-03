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

/* extension/module/octhemeoption.twig */
class __TwigTemplate_d61b2f2e8c55a0995cf2495a8c0998322217afbee554c358e0c524018afbd5a5 extends \Twig\Template
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
                <button type=\"submit\" form=\"form-octhemeoption\" data-toggle=\"tooltip\" title=\"";
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
        ";
        // line 17
        if (($context["error_warning"] ?? null)) {
            // line 18
            echo "            <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        }
        // line 22
        echo "        ";
        if (($context["error_load_file"] ?? null)) {
            // line 23
            echo "            <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_load_file"] ?? null);
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        }
        // line 27
        echo "        ";
        if (($context["success"] ?? null)) {
            // line 28
            echo "            <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo ($context["success"] ?? null);
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        }
        // line 32
        echo "        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i>";
        // line 34
        echo ($context["text_edit"] ?? null);
        echo "</h3>
            </div>
            <div class=\"panel-body\">
                <form action=\"";
        // line 37
        echo ($context["action_import"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-data\" class=\"form-horizontal\">
                    <input type=\"hidden\" name=\"file\" />
                </form>

                <form action=\"";
        // line 41
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-octhemeoption\" class=\"form-horizontal\">
                    <ul class=\"nav nav-tabs\">
                        <li class=\"active\"><a href=\"#tab-stylesheet\" data-toggle=\"tab\">";
        // line 43
        echo ($context["tab_stylesheet"] ?? null);
        echo "</a></li>
                        <li><a href=\"#tab-configuration\" data-toggle=\"tab\">";
        // line 44
        echo ($context["tab_configuration"] ?? null);
        echo "</a></li>
                        <li><a href=\"#tab-database\" data-toggle=\"tab\">";
        // line 45
        echo ($context["tab_backup"] ?? null);
        echo "</a></li>
                    </ul>

                    <div class=\"tab-content\">
                        <div class=\"tab-pane active\" id=\"tab-stylesheet\">
                            <div class=\"form-group\">
                                <label class=\"col-sm-2 control-label\" for=\"input-stylesheet-store\">";
        // line 51
        echo ($context["entry_store"] ?? null);
        echo "</label>
                                <div class=\"col-sm-6\">
                                    <select id=\"input-stylesheet-store\" class=\"form-control\">
                                        ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 55
            echo "                                            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 55);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 55) == 0)) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 55);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                                    </select>
                                </div>
                            </div>

                            ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 62
            echo "                            <div id=\"frm-stylesheet-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 62);
            echo "\" class=\"frm-stylesheet\">
                                <div class=\"form-group\">
                                    <label class=\"col-sm-2 control-label\" for=\"input-status-";
            // line 64
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 64);
            echo "\">";
            echo ($context["entry_status"] ?? null);
            echo "</label>
                                    <div class=\"col-sm-6\">
                                        <select name=\"module_octhemeoption_status[";
            // line 66
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 66);
            echo "]\" id=\"input-status-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 66);
            echo "\" data-id=\"";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 66);
            echo "\" class=\"form-control style-status\">
                                            ";
            // line 67
            if ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["module_octhemeoption_status"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 67)] ?? null) : null)) {
                // line 68
                echo "                                                <option value=\"1\" selected=\"selected\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\">";
                // line 69
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            } else {
                // line 71
                echo "                                                <option value=\"1\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\" selected=\"selected\">";
                // line 72
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            }
            // line 74
            echo "                                        </select>
                                    </div>
                                </div>

                                <div class=\"row stylesheet-settings\" id=\"stylesheet-settings-";
            // line 78
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 78);
            echo "\">
                                    <div class=\"col-sm-2\">
                                        <ul class=\"nav nav-pills nav-stacked\" id=\"stylesheet\">
                                            <li class=\"active\"><a href=\"#tab-body-";
            // line 81
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 81);
            echo "\" data-toggle=\"tab\">";
            echo ($context["tab_body"] ?? null);
            echo "</a></li>
                                            <li><a href=\"#tab-a-";
            // line 82
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 82);
            echo "\" data-toggle=\"tab\">";
            echo ($context["tab_a"] ?? null);
            echo "</a></li>
                                            <li><a href=\"#tab-header-";
            // line 83
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 83);
            echo "\" data-toggle=\"tab\">";
            echo ($context["tab_header"] ?? null);
            echo "</a></li>
                                        </ul>
                                    </div>
                                    <div class=\"col-sm-10\">
                                        <div class=\"tab-content\">
                                            <div class=\"tab-pane active\" id=\"tab-body-";
            // line 88
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 88);
            echo "\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-body-color\">";
            // line 90
            echo ($context["entry_color"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-body-color\" class=\"jscolor form-control\" name=\"module_octhemeoption_body[";
            // line 92
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 92);
            echo "][color]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["module_octhemeoption_body"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 92)] ?? null) : null), "color", [], "any", false, false, false, 92);
            echo "\" />
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-body-font-family\">";
            // line 96
            echo ($context["entry_font_family"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-body-font-family\" class=\"form-control\" name=\"module_octhemeoption_body[";
            // line 98
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 98);
            echo "][font_family]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["module_octhemeoption_body"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 98)] ?? null) : null), "font_family", [], "any", false, false, false, 98);
            echo "\" />
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-body-font-size\">";
            // line 102
            echo ($context["entry_font_size"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-body-font-size\" class=\"form-control\" name=\"module_octhemeoption_body[";
            // line 104
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 104);
            echo "][font_size]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["module_octhemeoption_body"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 104)] ?? null) : null), "font_size", [], "any", false, false, false, 104);
            echo "\" />
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-body-font-weight\">";
            // line 108
            echo ($context["entry_font_weight"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-body-font-weight\" class=\"form-control\" name=\"module_octhemeoption_body[";
            // line 110
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 110);
            echo "][font_weight]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["module_octhemeoption_body"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 110)] ?? null) : null), "font_weight", [], "any", false, false, false, 110);
            echo "\" />
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-line-height\">";
            // line 114
            echo ($context["entry_line_height"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-line-height\" class=\"form-control\" name=\"module_octhemeoption_body[";
            // line 116
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 116);
            echo "][line_height]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["module_octhemeoption_body"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 116)] ?? null) : null), "line_height", [], "any", false, false, false, 116);
            echo "\" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=\"tab-pane\" id=\"tab-a-";
            // line 121
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 121);
            echo "\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-color\">";
            // line 123
            echo ($context["entry_color"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-color\" class=\"jscolor form-control\" name=\"module_octhemeoption_a_tag[";
            // line 125
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 125);
            echo "][color]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["module_octhemeoption_a_tag"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 125)] ?? null) : null), "color", [], "any", false, false, false, 125);
            echo "\" />
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-hover-color\">";
            // line 129
            echo ($context["entry_hover_color"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-hover-color\" class=\"jscolor form-control\" name=\"module_octhemeoption_a_tag[";
            // line 131
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 131);
            echo "][hover_color]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["module_octhemeoption_a_tag"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 131)] ?? null) : null), "hover_color", [], "any", false, false, false, 131);
            echo "\" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=\"tab-pane\" id=\"tab-header-";
            // line 136
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 136);
            echo "\">
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-hcolor\">";
            // line 138
            echo ($context["entry_color"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-hcolor\" class=\"jscolor form-control\" name=\"module_octhemeoption_header_tag[";
            // line 140
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 140);
            echo "][color]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 140)] ?? null) : null), "color", [], "any", false, false, false, 140);
            echo "\" />
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-hfont-family\">";
            // line 144
            echo ($context["entry_font_family"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-hfont-family\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 146
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 146);
            echo "][font_family]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 146)] ?? null) : null), "font_family", [], "any", false, false, false, 146);
            echo "\" />
                                                    </div>
                                                </div>
                                                <div class=\"form-group\">
                                                    <label class=\"col-sm-2 control-label\" for=\"input-hfont-weight\">";
            // line 150
            echo ($context["entry_font_weight"] ?? null);
            echo "</label>
                                                    <div class=\"col-sm-3\">
                                                        <input type=\"text\" id=\"input-hfont-weight\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 152
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 152);
            echo "][font_weight]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 152)] ?? null) : null), "font_weight", [], "any", false, false, false, 152);
            echo "\" />
                                                    </div>
                                                </div>

                                                <ul class=\"nav nav-tabs\">
                                                    <li class=\"active\"><a href=\"#tab-h1-";
            // line 157
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 157);
            echo "\" data-toggle=\"tab\">";
            echo "h1";
            echo "</a></li>
                                                    <li><a href=\"#tab-h2-";
            // line 158
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 158);
            echo "\" data-toggle=\"tab\">";
            echo "h2";
            echo "</a></li>
                                                    <li><a href=\"#tab-h3-";
            // line 159
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 159);
            echo "\" data-toggle=\"tab\">";
            echo "h3";
            echo "</a></li>
                                                    <li><a href=\"#tab-h4-";
            // line 160
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 160);
            echo "\" data-toggle=\"tab\">";
            echo "h4";
            echo "</a></li>
                                                    <li><a href=\"#tab-h5-";
            // line 161
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 161);
            echo "\" data-toggle=\"tab\">";
            echo "h5";
            echo "</a></li>
                                                    <li><a href=\"#tab-h6-";
            // line 162
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 162);
            echo "\" data-toggle=\"tab\">";
            echo "h6";
            echo "</a></li>
                                                </ul>
                                                <div class=\"tab-content\">
                                                    <div class=\"tab-pane active\" id=\"tab-h1-";
            // line 165
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 165);
            echo "\">
                                                        <div class=\"form-group\">
                                                            <label class=\"col-sm-2 control-label\" for=\"input-h1-font-size\">";
            // line 167
            echo ($context["entry_font_size"] ?? null);
            echo "</label>
                                                            <div class=\"col-sm-3\">
                                                                <input type=\"text\" id=\"input-h1-font-size\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 169
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 169);
            echo "][h1][font_size]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 169)] ?? null) : null), "h1", [], "any", false, false, false, 169), "font_size", [], "any", false, false, false, 169);
            echo "\" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"tab-pane\" id=\"tab-h2-";
            // line 173
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 173);
            echo "\">
                                                        <div class=\"form-group\">
                                                            <label class=\"col-sm-2 control-label\" for=\"input-h2-font-size\">";
            // line 175
            echo ($context["entry_font_size"] ?? null);
            echo "</label>
                                                            <div class=\"col-sm-3\">
                                                                <input type=\"text\" id=\"input-h2-font-size\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 177
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 177);
            echo "][h2][font_size]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 177)] ?? null) : null), "h2", [], "any", false, false, false, 177), "font_size", [], "any", false, false, false, 177);
            echo "\" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"tab-pane\" id=\"tab-h3-";
            // line 181
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 181);
            echo "\">
                                                        <div class=\"form-group\">
                                                            <label class=\"col-sm-2 control-label\" for=\"input-h3-font-size\">";
            // line 183
            echo ($context["entry_font_size"] ?? null);
            echo "</label>
                                                            <div class=\"col-sm-3\">
                                                                <input type=\"text\" id=\"input-h3-font-size\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 185
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 185);
            echo "][h3][font_size]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 185)] ?? null) : null), "h3", [], "any", false, false, false, 185), "font_size", [], "any", false, false, false, 185);
            echo "\" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"tab-pane\" id=\"tab-h4-";
            // line 189
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 189);
            echo "\">
                                                        <div class=\"form-group\">
                                                            <label class=\"col-sm-2 control-label\" for=\"input-h4-font-size\">";
            // line 191
            echo ($context["entry_font_size"] ?? null);
            echo "</label>
                                                            <div class=\"col-sm-3\">
                                                                <input type=\"text\" id=\"input-h4-font-size\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 193
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 193);
            echo "][h4][font_size]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 193)] ?? null) : null), "h4", [], "any", false, false, false, 193), "font_size", [], "any", false, false, false, 193);
            echo "\" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"tab-pane\" id=\"tab-h5-";
            // line 197
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 197);
            echo "\">
                                                        <div class=\"form-group\">
                                                            <label class=\"col-sm-2 control-label\" for=\"input-h5-font-size\">";
            // line 199
            echo ($context["entry_font_size"] ?? null);
            echo "</label>
                                                            <div class=\"col-sm-3\">
                                                                <input type=\"text\" id=\"input-h5-font-size\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 201
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 201);
            echo "][h5][font_size]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 201)] ?? null) : null), "h5", [], "any", false, false, false, 201), "font_size", [], "any", false, false, false, 201);
            echo "\" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"tab-pane\" id=\"tab-h6-";
            // line 205
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 205);
            echo "\">
                                                        <div class=\"form-group\">
                                                            <label class=\"col-sm-2 control-label\" for=\"input-h6-font-size\">";
            // line 207
            echo ($context["entry_font_size"] ?? null);
            echo "</label>
                                                            <div class=\"col-sm-3\">
                                                                <input type=\"text\" id=\"input-h6-font-size\" class=\"form-control\" name=\"module_octhemeoption_header_tag[";
            // line 209
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 209);
            echo "][h6][font_size]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce = ($context["module_octhemeoption_header_tag"] ?? null)) && is_array($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce) || $__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce instanceof ArrayAccess ? ($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 209)] ?? null) : null), "h6", [], "any", false, false, false, 209), "font_size", [], "any", false, false, false, 209);
            echo "\" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 220
        echo "                        </div>

                        <div class=\"tab-pane\" id=\"tab-configuration\">
                            <div class=\"form-group\">
                                <label class=\"col-sm-2 control-label\" for=\"input-image\">";
        // line 224
        echo ($context["entry_loader_image"] ?? null);
        echo "</label>
                                <div class=\"col-sm-10\">
                                    <a href=\"\" id=\"thumb-image\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 226
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\"  /></a>
                                    <input type=\"hidden\" name=\"module_octhemeoption_loader_img\" value=\"";
        // line 227
        echo ($context["module_octhemeoption_loader_img"] ?? null);
        echo "\" id=\"input-image\" />
                                </div>
                            </div>

                            <div class=\"form-group\">
                                <label class=\"col-sm-2 control-label\" for=\"input-configuration-store\">";
        // line 232
        echo ($context["entry_store"] ?? null);
        echo "</label>
                                <div class=\"col-sm-6\">
                                    <select id=\"input-configuration-store\" class=\"form-control\">
                                        ";
        // line 235
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 236
            echo "                                            <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 236);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 236) == 0)) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 236);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 238
        echo "                                    </select>
                                </div>
                            </div>

                            ";
        // line 242
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 243
            echo "                            <div id=\"frm-configuration-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 243);
            echo "\" class=\"frm-configuration\">
                                <div class=\"form-group\">
                                    <label class=\"col-sm-2 control-label\" for=\"input-catalog-";
            // line 245
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 245);
            echo "\">";
            echo ($context["entry_catalog"] ?? null);
            echo "</label>
                                    <div class=\"col-sm-6\">
                                        <select name=\"module_octhemeoption_catalog[";
            // line 247
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 247);
            echo "]\" id=\"input-catalog-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 247);
            echo "\" class=\"form-control\">
                                            ";
            // line 248
            if ((($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b = ($context["module_octhemeoption_catalog"] ?? null)) && is_array($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b) || $__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b instanceof ArrayAccess ? ($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 248)] ?? null) : null)) {
                // line 249
                echo "                                                <option value=\"1\" selected=\"selected\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\">";
                // line 250
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            } else {
                // line 252
                echo "                                                <option value=\"1\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\" selected=\"selected\">";
                // line 253
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            }
            // line 255
            echo "                                        </select>
                                    </div>
                                </div>

                                <div class=\"form-group\">
                                    <label class=\"col-sm-2 control-label\" for=\"input-rotator-";
            // line 260
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 260);
            echo "\">";
            echo ($context["entry_rotator"] ?? null);
            echo "</label>
                                    <div class=\"col-sm-6\">
                                        <select name=\"module_octhemeoption_rotator[";
            // line 262
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 262);
            echo "]\" id=\"input-rotator-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 262);
            echo "\" class=\"form-control\">
                                            ";
            // line 263
            if ((($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c = ($context["module_octhemeoption_rotator"] ?? null)) && is_array($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c) || $__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c instanceof ArrayAccess ? ($__internal_73db8eef4d2582468dab79a6b09c77ce3b48675a610afd65a1f325b68804a60c[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 263)] ?? null) : null)) {
                // line 264
                echo "                                                <option value=\"1\" selected=\"selected\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\">";
                // line 265
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            } else {
                // line 267
                echo "                                                <option value=\"1\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\" selected=\"selected\">";
                // line 268
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            }
            // line 270
            echo "                                        </select>
                                    </div>
                                </div>

                                <div class=\"form-group\">
                                    <label class=\"col-sm-2 control-label\" for=\"input-quickview-";
            // line 275
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 275);
            echo "\">";
            echo ($context["entry_quickview"] ?? null);
            echo "</label>
                                    <div class=\"col-sm-6\">
                                        <select name=\"module_octhemeoption_quickview[";
            // line 277
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 277);
            echo "]\" id=\"input-quickview-";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 277);
            echo "\" class=\"form-control\">
                                            ";
            // line 278
            if ((($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972 = ($context["module_octhemeoption_quickview"] ?? null)) && is_array($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972) || $__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972 instanceof ArrayAccess ? ($__internal_d8ad5934f1874c52fa2ac9a4dfae52038b39b8b03cfc82eeb53de6151d883972[twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 278)] ?? null) : null)) {
                // line 279
                echo "                                                <option value=\"1\" selected=\"selected\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\">";
                // line 280
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            } else {
                // line 282
                echo "                                                <option value=\"1\">";
                echo ($context["text_enabled"] ?? null);
                echo "</option>
                                                <option value=\"0\" selected=\"selected\">";
                // line 283
                echo ($context["text_disabled"] ?? null);
                echo "</option>
                                            ";
            }
            // line 285
            echo "                                        </select>
                                    </div>
                                </div>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 290
        echo "

                        </div>

                        <div class=\"tab-pane\" id=\"tab-database\">
                            <div class=\"form-group\">
                                <label class=\"col-sm-2 control-label\" for=\"input-theme\">";
        // line 296
        echo ($context["entry_theme_database"] ?? null);
        echo "</label>
                                <div class=\"col-sm-10\">
                                    <div class=\"row\">
                                        <div class=\"col-sm-6\">
                                            <select id=\"input-theme\" class=\"form-control\" name=\"file\">
                                            ";
        // line 301
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["database"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 302
            echo "                                                <option value=\"";
            echo $context["key"];
            echo "\">";
            echo $context["value"];
            echo "</option>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 304
        echo "                                            </select>
                                        </div>
                                        <div class=\"col-sm-6\">
                                            <button type=\"button\" id=\"button-import\" class=\"btn btn-primary\"><i class=\"fa fa-upload\"></i> ";
        // line 307
        echo ($context["button_import"] ?? null);
        echo "</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type=\"text/javascript\">
    \$(document).ready(function () {
        // Configuration of Stores
        \$('.frm-configuration').hide();
        \$('#frm-configuration-0').show();
        \$('#input-configuration-store').change(function () {
            var store_id = \$(this).val();
            \$('.frm-configuration').hide();
            \$('#frm-configuration-' + store_id).show();
        });

        // Stylesheet of Stores
        \$('.frm-stylesheet').hide();
        \$('#frm-stylesheet-0').show();
        \$('#input-stylesheet-store').change(function () {
            var store_id = \$(this).val();
            \$('.frm-stylesheet').hide();
            \$('#frm-stylesheet-' + store_id).show();
        });

        // Enable / Disable Settings
        \$('.stylesheet-settings').hide();
        var style_selection = \$('.style-status');
        style_selection.each(function () {
            var store_id = \$(this).data('id');
            var status = parseInt(\$('#input-status-' + store_id).val());

            if(status === 1) {
                \$('#stylesheet-settings-' + store_id).show();
            } else {
                \$('#stylesheet-settings-' + store_id).hide();
            }
        });

        style_selection.change(function () {
            var store_id = \$(this).data('id');
            var status = parseInt(\$('#input-status-' + store_id).val());

            if(status === 1) {
                \$('#stylesheet-settings-' + store_id).show();
            } else {
                \$('#stylesheet-settings-' + store_id).hide();
            }
        });
    });
</script>

<script type=\"text/javascript\"><!--
    \$('#button-import').on('click', function() {

        \$('#form-data input[name=\\'file\\']').val(\$('#input-theme').val());

        \$('#form-data').submit();
    });
    //--></script>
";
        // line 375
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/octhemeoption.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  885 => 375,  814 => 307,  809 => 304,  798 => 302,  794 => 301,  786 => 296,  778 => 290,  768 => 285,  763 => 283,  758 => 282,  753 => 280,  748 => 279,  746 => 278,  740 => 277,  733 => 275,  726 => 270,  721 => 268,  716 => 267,  711 => 265,  706 => 264,  704 => 263,  698 => 262,  691 => 260,  684 => 255,  679 => 253,  674 => 252,  669 => 250,  664 => 249,  662 => 248,  656 => 247,  649 => 245,  643 => 243,  639 => 242,  633 => 238,  618 => 236,  614 => 235,  608 => 232,  600 => 227,  596 => 226,  591 => 224,  585 => 220,  566 => 209,  561 => 207,  556 => 205,  547 => 201,  542 => 199,  537 => 197,  528 => 193,  523 => 191,  518 => 189,  509 => 185,  504 => 183,  499 => 181,  490 => 177,  485 => 175,  480 => 173,  471 => 169,  466 => 167,  461 => 165,  453 => 162,  447 => 161,  441 => 160,  435 => 159,  429 => 158,  423 => 157,  413 => 152,  408 => 150,  399 => 146,  394 => 144,  385 => 140,  380 => 138,  375 => 136,  365 => 131,  360 => 129,  351 => 125,  346 => 123,  341 => 121,  331 => 116,  326 => 114,  317 => 110,  312 => 108,  303 => 104,  298 => 102,  289 => 98,  284 => 96,  275 => 92,  270 => 90,  265 => 88,  255 => 83,  249 => 82,  243 => 81,  237 => 78,  231 => 74,  226 => 72,  221 => 71,  216 => 69,  211 => 68,  209 => 67,  201 => 66,  194 => 64,  188 => 62,  184 => 61,  178 => 57,  163 => 55,  159 => 54,  153 => 51,  144 => 45,  140 => 44,  136 => 43,  131 => 41,  124 => 37,  118 => 34,  114 => 32,  106 => 28,  103 => 27,  95 => 23,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/octhemeoption.twig", "");
    }
}
