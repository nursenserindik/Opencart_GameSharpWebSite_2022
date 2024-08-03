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

/* tt_lazio6/template/extension/module/ocajaxlogin/ajaxregister.twig */
class __TwigTemplate_116d5d824b5ab8f7b1d6b86a4fd786b392e99751963902d5f220f38098e6be63 extends \Twig\Template
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
        echo "<div class=\"ajax-container\">
    <div class=\"register-form-content\">
        <h1>";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</h1>
        <p>";
        // line 4
        echo ($context["text_account_already"] ?? null);
        echo "</p>
        <form action=\"";
        // line 5
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" id=\"ajax-register-form\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
            <fieldset id=\"account\">
                <legend>";
        // line 7
        echo ($context["text_your_details"] ?? null);
        echo "</legend>
                <div class=\"form-group required\" style=\"display: ";
        // line 8
        if ((twig_length_filter($this->env, ($context["customer_groups"] ?? null)) > 1)) {
            echo " block ";
        } else {
            echo " none ";
        }
        echo ";\">
                    <label class=\"col-sm-2 control-label\">";
        // line 9
        echo ($context["entry_customer_group"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 12
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 12) == ($context["customer_group_id"] ?? null))) {
                // line 13
                echo "                        <div class=\"radio\">
                            <label>
                                <input type=\"radio\" name=\"customer_group_id\" value=\"";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 15);
                echo "\" checked=\"checked\" />
                                ";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 16);
                echo "</label>
                        </div>
                        ";
            } else {
                // line 19
                echo "                        <div class=\"radio\">
                            <label>
                                <input type=\"radio\" name=\"customer_group_id\" value=\"";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 21);
                echo "\" />
                                ";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 22);
                echo "</label>
                        </div>
                        ";
            }
            // line 25
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "                    </div>
                </div>
                <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-firstname\">";
        // line 29
        echo ($context["entry_firstname"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"firstname\" value=\"";
        // line 31
        echo ($context["firstname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_firstname"] ?? null);
        echo "\" id=\"input-firstname\" class=\"form-control\" />
                        <!-- Error First Name -->
                        <div class=\"for-error error-firstname\"></div>
                    </div>
                </div>
                <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-lastname\">";
        // line 37
        echo ($context["entry_lastname"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name=\"lastname\" value=\"";
        // line 39
        echo ($context["lastname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_lastname"] ?? null);
        echo "\" id=\"input-lastname\" class=\"form-control\" />
                        <!-- Error Last Name -->
                        <div class=\"for-error error-lastname\"></div>
                    </div>
                </div>
                <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-register-email\">";
        // line 45
        echo ($context["entry_email"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"email\" name=\"email\" value=\"";
        // line 47
        echo ($context["email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-register-email\" class=\"form-control\" />
                        <!-- Error Email -->
                        <div class=\"for-error error-email\"></div>
                    </div>
                </div>
                <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-telephone\">";
        // line 53
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"tel\" name=\"telephone\" value=\"";
        // line 55
        echo ($context["telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\" />
                        <!-- Error Phone -->
                        <div class=\"for-error error-telephone\"></div>
                    </div>
                </div>
                ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["custom_fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
            // line 61
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 61) == "select")) {
                // line 62
                echo "                <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 62);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 62);
                echo "\">
                    <label class=\"col-sm-2 control-label\" for=\"input-custom-field";
                // line 63
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 63);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 63);
                echo "</label>
                    <div class=\"col-sm-10\">
                        <select name=\"custom_field[";
                // line 65
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 65);
                echo "]\" id=\"input-custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 65);
                echo "\" class=\"form-control\">
                            <option value=\"\">";
                // line 66
                echo ($context["text_select"] ?? null);
                echo "</option>
                            ";
                // line 67
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 67));
                foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                    // line 68
                    echo "                            ";
                    if (((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["register_custom_field"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 68)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 68) == (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["register_custom_field"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 68)] ?? null) : null)))) {
                        // line 69
                        echo "                            <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 69);
                        echo "\" selected=\"selected\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 69);
                        echo "</option>
                            ";
                    } else {
                        // line 71
                        echo "                            <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 71);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 71);
                        echo "</option>
                            ";
                    }
                    // line 73
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 74
                echo "                        </select>
                        <!-- Error Custom -->
                        <div class=\"for-error error-custom\"></div>
                    </div>
                </div>
                ";
            }
            // line 80
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 80) == "radio")) {
                // line 81
                echo "                <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 81);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 81);
                echo "\">
                    <label class=\"col-sm-2 control-label\">";
                // line 82
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 82);
                echo "</label>
                    <div class=\"col-sm-10\">
                        <div>
                            ";
                // line 85
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 85));
                foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                    // line 86
                    echo "                            <div class=\"radio\">
                                ";
                    // line 87
                    if (((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["register_custom_field"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 87)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 87) == (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["register_custom_field"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 87)] ?? null) : null)))) {
                        // line 88
                        echo "                                <label>
                                    <input type=\"radio\" name=\"custom_field[";
                        // line 89
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 89);
                        echo "]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 89);
                        echo "\" checked=\"checked\" />
                                    ";
                        // line 90
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 90);
                        echo "</label>
                                ";
                    } else {
                        // line 92
                        echo "                                <label>
                                    <input type=\"radio\" name=\"custom_field[";
                        // line 93
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 93);
                        echo "]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 93);
                        echo "\" />
                                    ";
                        // line 94
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 94);
                        echo "</label>
                                ";
                    }
                    // line 96
                    echo "                            </div>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 98
                echo "                        </div>
                        <!-- Error Custom -->
                        <div class=\"for-error error-custom\"></div>
                    </div>
                </div>
                ";
            }
            // line 104
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 104) == "checkbox")) {
                // line 105
                echo "                <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 105);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 105);
                echo "\">
                    <label class=\"col-sm-2 control-label\">";
                // line 106
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 106);
                echo "</label>
                    <div class=\"col-sm-10\">
                        <div>
                            ";
                // line 109
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 109));
                foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                    // line 110
                    echo "                            <div class=\"checkbox\">
                                ";
                    // line 111
                    if (((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["register_custom_field"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 111)] ?? null) : null) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 111), (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["register_custom_field"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 111)] ?? null) : null)))) {
                        // line 112
                        echo "                                    <label>
                                        <input type=\"checkbox\" name=\"custom_field[";
                        // line 113
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 113);
                        echo "][]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 113);
                        echo "\" checked=\"checked\" />
                                        ";
                        // line 114
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 114);
                        echo "
                                    </label>
                                ";
                    } else {
                        // line 117
                        echo "                                    <label>
                                        <input type=\"checkbox\" name=\"custom_field[";
                        // line 118
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 118);
                        echo "][]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 118);
                        echo "\" />
                                        ";
                        // line 119
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 119);
                        echo "
                                    </label>
                                ";
                    }
                    // line 122
                    echo "                            </div>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 124
                echo "                        </div>
                        <!-- Error Custom -->
                        <div class=\"for-error error-custom\"></div>
                    </div>
                </div>
                ";
            }
            // line 130
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 130) == "text")) {
                // line 131
                echo "                    <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 131);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 131);
                echo "\">
                        <label class=\"col-sm-2 control-label\" for=\"input-custom-field";
                // line 132
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 132);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 132);
                echo "</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"custom_field[";
                // line 134
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 134);
                echo "]\" value=\"";
                if ((($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["register_custom_field"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 134)] ?? null) : null)) {
                    echo (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["register_custom_field"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 134)] ?? null) : null);
                } else {
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 134);
                }
                echo "\" placeholder=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 134);
                echo "\" id=\"input-custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 134);
                echo "\" class=\"form-control\" />

                            <!-- Error Custom -->
                            <div class=\"for-error error-custom\"></div>
                        </div>
                    </div>
                ";
            }
            // line 141
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 141) == "textarea")) {
                // line 142
                echo "                    <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 142);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 142);
                echo "\">
                        <label class=\"col-sm-2 control-label\" for=\"input-custom-field";
                // line 143
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 143);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 143);
                echo "</label>
                        <div class=\"col-sm-10\">
                            <textarea name=\"custom_field[";
                // line 145
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 145);
                echo "]\" rows=\"5\" placeholder=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 145);
                echo "\" id=\"input-custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 145);
                echo "\" class=\"form-control\">";
                if ((($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["register_custom_field"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 145)] ?? null) : null)) {
                    echo (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = ($context["register_custom_field"] ?? null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 145)] ?? null) : null);
                } else {
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 145);
                }
                echo "</textarea>

                            <!-- Error Custom -->
                            <div class=\"for-error error-custom\"></div>
                        </div>
                    </div>
                ";
            }
            // line 152
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 152) == "file")) {
                // line 153
                echo "                    <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 153);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 153);
                echo "\">
                        <label class=\"col-sm-2 control-label\">";
                // line 154
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 154);
                echo "</label>
                        <div class=\"col-sm-10\">
                            <button type=\"button\" id=\"button-custom-field";
                // line 156
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 156);
                echo "\" data-loading-text=\"";
                echo ($context["text_loading"] ?? null);
                echo "\" class=\"btn btn-default\"><i class=\"fa fa-upload\"></i> ";
                echo ($context["button_upload"] ?? null);
                echo "</button>
                            <input type=\"hidden\" name=\"custom_field[";
                // line 157
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 157);
                echo "]\" value=\"";
                if ((($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = ($context["register_custom_field"] ?? null)) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 157)] ?? null) : null)) {
                    echo "  ";
                    echo (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = ($context["register_custom_field"] ?? null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 157)] ?? null) : null);
                    echo " ";
                }
                echo "\" />

                            <!-- Error Custom -->
                            <div class=\"for-error error-custom\"></div>
                        </div>
                    </div>
                ";
            }
            // line 164
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 164) == "date")) {
                // line 165
                echo "                    <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 165);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 165);
                echo "\">
                        <label class=\"col-sm-2 control-label\" for=\"input-custom-field";
                // line 166
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 166);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 166);
                echo "</label>
                        <div class=\"col-sm-10\">
                            <div class=\"input-group date\">
                                <input type=\"text\" name=\"custom_field[";
                // line 169
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 169);
                echo "]\" value=\"";
                if ((($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = ($context["register_custom_field"] ?? null)) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 169)] ?? null) : null)) {
                    echo (($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = ($context["register_custom_field"] ?? null)) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 169)] ?? null) : null);
                } else {
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 169);
                }
                echo "\" placeholder=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 169);
                echo "\" data-date-format=\"YYYY-MM-DD\" id=\"input-custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 169);
                echo "\" class=\"form-control\" />
                                <span class=\"input-group-btn\">
                                    <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
                                </span>
                            </div>

                            <!-- Error Custom -->
                            <div class=\"for-error error-custom\"></div>
                        </div>
                    </div>
                ";
            }
            // line 180
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 180) == "time")) {
                // line 181
                echo "                    <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 181);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 181);
                echo "\">
                        <label class=\"col-sm-2 control-label\" for=\"input-custom-field";
                // line 182
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 182);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 182);
                echo "</label>
                        <div class=\"col-sm-10\">
                            <div class=\"input-group time\">
                                <input type=\"text\" name=\"custom_field[";
                // line 185
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 185);
                echo "]\" value=\"";
                if ((($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = ($context["register_custom_field"] ?? null)) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 185)] ?? null) : null)) {
                    echo (($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = ($context["register_custom_field"] ?? null)) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 185)] ?? null) : null);
                } else {
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 185);
                }
                echo "\" placeholder=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 185);
                echo "\" data-date-format=\"HH:mm\" id=\"input-custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 185);
                echo "\" class=\"form-control\" />
                                <span class=\"input-group-btn\">
                                    <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
                                </span>
                            </div>

                            <!-- Error Custom -->
                            <div class=\"for-error error-custom\"></div>
                        </div>
                    </div>
                ";
            }
            // line 196
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 196) == "datetime")) {
                // line 197
                echo "                    <div id=\"custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 197);
                echo "\" class=\"form-group custom-field\" data-sort=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "sort_order", [], "any", false, false, false, 197);
                echo "\">
                        <label class=\"col-sm-2 control-label\" for=\"input-custom-field";
                // line 198
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 198);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 198);
                echo "</label>
                        <div class=\"col-sm-10\">
                            <div class=\"input-group datetime\">
                                <input type=\"text\" name=\"custom_field[";
                // line 201
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 201);
                echo "]\" value=\"";
                if ((($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce = ($context["register_custom_field"] ?? null)) && is_array($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce) || $__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce instanceof ArrayAccess ? ($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 201)] ?? null) : null)) {
                    echo (($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b = ($context["register_custom_field"] ?? null)) && is_array($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b) || $__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b instanceof ArrayAccess ? ($__internal_ba9f0a3bb95c082f61c9fbf892a05514d732703d52edc77b51f2e6284135900b[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 201)] ?? null) : null);
                } else {
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 201);
                }
                echo "\" placeholder=\"";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 201);
                echo "\" data-date-format=\"YYYY-MM-DD HH:mm\" id=\"input-custom-field";
                echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 201);
                echo "\" class=\"form-control\" />
                                <span class=\"input-group-btn\">
                                    <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
                                </span>
                            </div>

                            <!-- Error Custom -->
                            <div class=\"for-error error-custom\"></div>
                        </div>
                    </div>
                ";
            }
            // line 212
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 213
        echo "            </fieldset>
            <fieldset>
                <legend>";
        // line 215
        echo ($context["text_your_password"] ?? null);
        echo "</legend>
                <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-register-password\">";
        // line 217
        echo ($context["entry_password"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"password\" name=\"password\" value=\"";
        // line 219
        echo ($context["password"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_password"] ?? null);
        echo "\" id=\"input-register-password\" class=\"form-control\" />
                        <!-- Error Password -->
                        <div class=\"for-error error-password\"></div>
                    </div>
                </div>
                <div class=\"form-group required\">
                    <label class=\"col-sm-2 control-label\" for=\"input-confirm\">";
        // line 225
        echo ($context["entry_confirm"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"password\" name=\"confirm\" value=\"";
        // line 227
        echo ($context["confirm"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_confirm"] ?? null);
        echo "\" id=\"input-confirm\" class=\"form-control\" />
                        <!-- Error Confirm Password -->
                        <div class=\"for-error error-confirm\"></div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>";
        // line 234
        echo ($context["text_newsletter"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">";
        // line 236
        echo ($context["entry_newsletter"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                        ";
        // line 238
        if (($context["newsletter"] ?? null)) {
            // line 239
            echo "                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"newsletter\" value=\"1\" checked=\"checked\" />
                            ";
            // line 241
            echo ($context["text_yes"] ?? null);
            echo "</label>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"newsletter\" value=\"0\" />
                            ";
            // line 244
            echo ($context["text_no"] ?? null);
            echo "</label>
                        ";
        } else {
            // line 246
            echo "                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"newsletter\" value=\"1\" />
                            ";
            // line 248
            echo ($context["text_yes"] ?? null);
            echo "</label>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"newsletter\" value=\"0\" checked=\"checked\" />
                            ";
            // line 251
            echo ($context["text_no"] ?? null);
            echo "</label>
                        ";
        }
        // line 253
        echo "                    </div>
                </div>
            </fieldset>
            ";
        // line 256
        echo ($context["captcha"] ?? null);
        echo "
            ";
        // line 257
        if (($context["text_agree"] ?? null)) {
            // line 258
            echo "            <div class=\"buttons\">
                <div class=\"pull-right\">";
            // line 259
            echo ($context["text_agree"] ?? null);
            echo "
                    ";
            // line 260
            if (($context["agree"] ?? null)) {
                // line 261
                echo "                        <input type=\"checkbox\" name=\"agree\" value=\"1\" checked=\"checked\" />
                    ";
            } else {
                // line 263
                echo "                        <input type=\"checkbox\" name=\"agree\" value=\"1\" />
                    ";
            }
            // line 265
            echo "                    &nbsp;
                    <input type=\"button\" onclick=\"ocajaxlogin.registerAction();\" value=\"";
            // line 266
            echo ($context["button_continue"] ?? null);
            echo "\" class=\"btn btn-primary\" />
                    <img class=\"ajax-load-img\" alt=\"\" src=\"";
            // line 267
            echo ($context["loader_img"] ?? null);
            echo "\" width=\"30\" height=\"30\" />
                </div>
            </div>
            ";
        } else {
            // line 271
            echo "            <div class=\"buttons\">
                <div class=\"pull-right\">
                    <button type=\"button\" onclick=\"ocajaxlogin.registerAction();\"  class=\"button\"><span>";
            // line 273
            echo ($context["button_continue"] ?? null);
            echo "</span></button>
                    <img class=\"ajax-load-img\" alt=\"\" src=\"";
            // line 274
            echo ($context["loader_img"] ?? null);
            echo "\" width=\"30\" height=\"30\" />
                </div>
            </div>
            ";
        }
        // line 278
        echo "        </form>
    </div>
    <div class=\"alert alert-danger for-error error-warning\"><i class=\"fa fa-exclamation-circle\"></i><span></span></div>
</div>
<script type=\"text/javascript\"><!--
    // Sort the custom fields
    \$('#account .form-group[data-sort]').detach().each(function() {
        if (\$(this).attr('data-sort') >= 0 && \$(this).attr('data-sort') <= \$('#account .form-group').length) {
            \$('#account .form-group').eq(\$(this).attr('data-sort')).before(this);
        }

        if (\$(this).attr('data-sort') > \$('#account .form-group').length) {
            \$('#account .form-group:last').after(this);
        }

        if (\$(this).attr('data-sort') < -\$('#account .form-group').length) {
            \$('#account .form-group:first').before(this);
        }
    });

    \$('#address .form-group[data-sort]').detach().each(function() {
        if (\$(this).attr('data-sort') >= 0 && \$(this).attr('data-sort') <= \$('#address .form-group').length) {
            \$('#address .form-group').eq(\$(this).attr('data-sort')).before(this);
        }

        if (\$(this).attr('data-sort') > \$('#address .form-group').length) {
            \$('#address .form-group:last').after(this);
        }

        if (\$(this).attr('data-sort') < -\$('#address .form-group').length) {
            \$('#address .form-group:first').before(this);
        }
    });

    \$('input[name=\\'customer_group_id\\']').on('change', function() {
        \$.ajax({
            url: 'index.php?route=account/register/customfield&customer_group_id=' + this.value,
            dataType: 'json',
            success: function(json) {
                \$('.custom-field').hide();
                \$('.custom-field').removeClass('required');

                for (i = 0; i < json.length; i++) {
                    custom_field = json[i];

                    \$('#custom-field' + custom_field['custom_field_id']).show();

                    if (custom_field['required']) {
                        \$('#custom-field' + custom_field['custom_field_id']).addClass('required');
                    }
                }


            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    });

    \$('input[name=\\'customer_group_id\\']:checked').trigger('change');
    //--></script>
<script type=\"text/javascript\"><!--
    \$('button[id^=\\'button-custom-field\\']').on('click', function() {
        var element = this;

        \$('#form-upload').remove();

        \$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');

        \$('#form-upload input[name=\\'file\\']').trigger('click');

        if (typeof timer != 'undefined') {
            clearInterval(timer);
        }

        timer = setInterval(function() {
            if (\$('#form-upload input[name=\\'file\\']').val() != '') {
                clearInterval(timer);

                \$.ajax({
                    url: 'index.php?route=tool/upload',
                    type: 'post',
                    dataType: 'json',
                    data: new FormData(\$('#form-upload')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        \$(element).button('loading');
                    },
                    complete: function() {
                        \$(element).button('reset');
                    },
                    success: function(json) {
                        \$(element).parent().find('.text-danger').remove();

                        if (json['error']) {
                            \$(node).parent().find('input').after('<div class=\"text-danger\">' + json['error'] + '</div>');
                        }

                        if (json['success']) {
                            alert(json['success']);

                            \$(element).parent().find('input').val(json['code']);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                    }
                });
            }
        }, 500);
    });
    //--></script>
<script type=\"text/javascript\"><!--
    \$('.date').datetimepicker({
        language: document.cookie.match(new RegExp('language=([^;]+)'))[1],
        pickTime: false
    });

    \$('.time').datetimepicker({
        language: document.cookie.match(new RegExp('language=([^;]+)'))[1],
        pickDate: false
    });

    \$('.datetime').datetimepicker({
        language: document.cookie.match(new RegExp('language=([^;]+)'))[1],
        pickDate: true,
        pickTime: true
    });
    //--></script>";
    }

    public function getTemplateName()
    {
        return "tt_lazio6/template/extension/module/ocajaxlogin/ajaxregister.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  772 => 278,  765 => 274,  761 => 273,  757 => 271,  750 => 267,  746 => 266,  743 => 265,  739 => 263,  735 => 261,  733 => 260,  729 => 259,  726 => 258,  724 => 257,  720 => 256,  715 => 253,  710 => 251,  704 => 248,  700 => 246,  695 => 244,  689 => 241,  685 => 239,  683 => 238,  678 => 236,  673 => 234,  661 => 227,  656 => 225,  645 => 219,  640 => 217,  635 => 215,  631 => 213,  625 => 212,  601 => 201,  593 => 198,  586 => 197,  583 => 196,  559 => 185,  551 => 182,  544 => 181,  541 => 180,  517 => 169,  509 => 166,  502 => 165,  499 => 164,  483 => 157,  475 => 156,  470 => 154,  463 => 153,  460 => 152,  440 => 145,  433 => 143,  426 => 142,  423 => 141,  403 => 134,  396 => 132,  389 => 131,  386 => 130,  378 => 124,  371 => 122,  365 => 119,  359 => 118,  356 => 117,  350 => 114,  344 => 113,  341 => 112,  339 => 111,  336 => 110,  332 => 109,  326 => 106,  319 => 105,  316 => 104,  308 => 98,  301 => 96,  296 => 94,  290 => 93,  287 => 92,  282 => 90,  276 => 89,  273 => 88,  271 => 87,  268 => 86,  264 => 85,  258 => 82,  251 => 81,  248 => 80,  240 => 74,  234 => 73,  226 => 71,  218 => 69,  215 => 68,  211 => 67,  207 => 66,  201 => 65,  194 => 63,  187 => 62,  184 => 61,  180 => 60,  170 => 55,  165 => 53,  154 => 47,  149 => 45,  138 => 39,  133 => 37,  122 => 31,  117 => 29,  112 => 26,  106 => 25,  100 => 22,  96 => 21,  92 => 19,  86 => 16,  82 => 15,  78 => 13,  75 => 12,  71 => 11,  66 => 9,  58 => 8,  54 => 7,  49 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio6/template/extension/module/ocajaxlogin/ajaxregister.twig", "");
    }
}
