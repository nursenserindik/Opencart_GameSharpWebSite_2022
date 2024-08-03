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

/* tt_lazio6/template/extension/module/oclayerednavigation/oclayerednavigation.twig */
class __TwigTemplate_b062782057044bd1cceed756ee344f377de464cc1612f1500ed2c1e380e975d7 extends \Twig\Template
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
        echo "<div class=\"layernavigation-module\">
<div class=\"panel panel-default\">
    <div class=\"layered-heading module-title3\">";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</div>
    <div class=\"layered\">
        <div class=\"list-group\">
            <div class=\"filter-attribute-container filter-attribute-remove-container\">
                ";
        // line 7
        $context["is_filter"] = false;
        // line 8
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["filter_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["filter_group"]) {
            // line 9
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["filter_group"], "filter", [], "any", false, false, false, 9));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 10
                echo "                        ";
                $context["filter_id"] = twig_get_attribute($this->env, $this->source, $context["filter"], "filter_id", [], "any", false, false, false, 10);
                // line 11
                echo "                        ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["filter"], "filter_id", [], "any", false, false, false, 11), ($context["filter_category"] ?? null))) {
                    // line 12
                    echo "                            ";
                    $context["is_filter"] = true;
                    // line 13
                    echo "                            <div class=\"list-group-item filter-act-name\">
                                <p>";
                    // line 14
                    echo twig_get_attribute($this->env, $this->source, $context["filter"], "e_name", [], "any", false, false, false, 14);
                    echo "</p>
                                <a class=\"a-filter remove-filter\" href=\"javascript:void(0);\" name=\"";
                    // line 15
                    echo ($context["filter_id"] ?? null);
                    echo "\"><span>Remove</span></a>
                            </div>
                        ";
                }
                // line 18
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                ";
        if (($context["is_filter"] ?? null)) {
            // line 21
            echo "                    <div class=\"list-group-item filter-clear-all\">
                        <a class=\"clear-filter\" href=\"javascript:void(0);\" onclick=\"oclayerednavigationajax.filter('";
            // line 22
            echo ($context["clear_action"] ?? null);
            echo "')\">Clear all</a>
                    </div>
                ";
        }
        // line 25
        echo "            </div>
            <div class=\"filter-attribute-container filter-prices\">
                <label>";
        // line 27
        echo ($context["text_byprice"] ?? null);
        echo "</label>
                <div class=\"list-group-item\">
                    <div class=\"filter-price\">
                        <div id=\"slider-price\"></div>
                        <div class=\"slider-values\">
                            <span>";
        // line 32
        echo ($context["currency_symbol_left"] ?? null);
        echo "</span>
                            <input id=\"price-from\" disabled=\"disabled\" class=\"input-price\" type=\"text\" value=\"";
        // line 33
        echo ($context["min_price"] ?? null);
        echo "\" placeholder=\"Min\" name=\"price-from\"/>
                            <span>";
        // line 34
        echo ($context["currency_symbol_right"] ?? null);
        echo "</span> -
                            <span>";
        // line 35
        echo ($context["currency_symbol_left"] ?? null);
        echo "</span>
                            <input id=\"price-to\" disabled=\"disabled\" class=\"input-price\" type=\"text\" value=\"";
        // line 36
        echo ($context["max_price"] ?? null);
        echo "\" placeholder=\"Max\" name=\"price-to\" />
                            <span>";
        // line 37
        echo ($context["currency_symbol_right"] ?? null);
        echo "</span>
                        </div>
                    </div>
                </div>
            </div>
            ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["filter_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["filter_group"]) {
            // line 43
            echo "            <div class=\"filter-attribute-container\">
                <label>";
            // line 44
            echo twig_get_attribute($this->env, $this->source, $context["filter_group"], "name", [], "any", false, false, false, 44);
            echo "</label>
                <div class=\"list-group-item\">
                    <div id=\"filter-group";
            // line 46
            echo twig_get_attribute($this->env, $this->source, $context["filter_group"], "filter_group_id", [], "any", false, false, false, 46);
            echo "\">
                        ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["filter_group"], "filter", [], "any", false, false, false, 47));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 48
                echo "                            ";
                $context["filter_id"] = twig_get_attribute($this->env, $this->source, $context["filter"], "filter_id", [], "any", false, false, false, 48);
                // line 49
                echo "                            ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["filter"], "filter_id", [], "any", false, false, false, 49), ($context["filter_category"] ?? null))) {
                    // line 50
                    echo "                                <!-- Not show filter attribute -->
                            ";
                } else {
                    // line 52
                    echo "                                <a class=\"a-filter add-filter\" href=\"javascript:void(0);\" name=\"";
                    echo ($context["filter_id"] ?? null);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["filter"], "name", [], "any", false, false, false, 52);
                    echo "</a>
                            ";
                }
                // line 54
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "                    </div>
                </div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "        </div>
    </div>
    <input type=\"hidden\" class=\"filter-url\" value=\"";
        // line 61
        echo ($context["action"] ?? null);
        echo "\" />
    <input type=\"hidden\" class=\"price-url\" value=\"";
        // line 62
        echo ($context["action"] ?? null);
        echo "\" />
</div>
</div>
<script type=\"text/javascript\">
    var filter_url = '';
    var ids = [];
    var min_price = parseFloat('";
        // line 68
        echo ($context["min_price"] ?? null);
        echo "');
    var max_price = parseFloat('";
        // line 69
        echo ($context["max_price"] ?? null);
        echo "');
    var current_min_price = parseFloat(\$('#price-from').val());
    var current_max_price = parseFloat(\$('#price-to').val());

    \$('#slider-price').slider({
        range   : true,
        min     : min_price,
        max     : max_price,
        values  : [ current_min_price, current_max_price ],
        slide   : function (event, ui) {
            \$('#price-from').val(ui.values[0]);
            \$('#price-to').val(ui.values[1]);
            current_min_price = ui.values[0];
            current_max_price = ui.values[1];
        },
        stop    : function (event, ui) {
            filter_url = \$('.price-url').val();
            filter_url += '&price=' + current_min_price + ',' + current_max_price;
            oclayerednavigationajax.filter(filter_url);
        }
    });

    \$('.a-filter').click(function () {
        var id = \$(this).attr('name');
        var filter_ids;
        filter_url = \$('.filter-url').val();
        if(\$(this).hasClass('add-filter') == true) {
            ids.push(id);
        } else if(\$(this).hasClass('remove-filter') == true) {
            ids = \$.grep(ids, function (value) {
                return value != id;
            });
        }
        filter_ids = ids.join(',');
        filter_url += '&filter=' + filter_ids;
        oclayerednavigationajax.filter(filter_url);
    });

    \$('.clear-filter').click(function () {
        ids = [];
    });

    \$(document).ajaxComplete(function () {
        var current_min_price = parseFloat(\$('#price-from').val());
        var current_max_price = parseFloat(\$('#price-to').val());

        \$('#slider-price').slider({
            range   : true,
            min     : min_price,
            max     : max_price,
            values  : [ current_min_price, current_max_price ],
            slide   : function (event, ui) {
                \$('#price-from').val(ui.values[0]);
                \$('#price-to').val(ui.values[1]);
                current_min_price = ui.values[0];
                current_max_price = ui.values[1];
            },
            stop    : function (event, ui) {
                filter_url = \$('.price-url').val();
                filter_url += '&price=' + current_min_price + ',' + current_max_price;
                oclayerednavigationajax.filter(filter_url);
            }
        });

        \$('.a-filter').click(function () {
            var id = \$(this).attr('name');
            var filter_ids = '';
            filter_url = \$('.filter-url').val();

            if(\$(this).hasClass('add-filter') == true) {
                ids.push(id);
            } else if(\$(this).hasClass('remove-filter') == true) {
                ids = \$.grep(ids, function (value) {
                    return value != id;
                });
            }
            filter_ids = ids.join(',');
            filter_url += '&filter=' + filter_ids;
            oclayerednavigationajax.filter(filter_url);
        });

        \$('.clear-filter').click(function () {
            ids = [];
        });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "tt_lazio6/template/extension/module/oclayerednavigation/oclayerednavigation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 69,  216 => 68,  207 => 62,  203 => 61,  199 => 59,  190 => 55,  184 => 54,  176 => 52,  172 => 50,  169 => 49,  166 => 48,  162 => 47,  158 => 46,  153 => 44,  150 => 43,  146 => 42,  138 => 37,  134 => 36,  130 => 35,  126 => 34,  122 => 33,  118 => 32,  110 => 27,  106 => 25,  100 => 22,  97 => 21,  94 => 20,  88 => 19,  82 => 18,  76 => 15,  72 => 14,  69 => 13,  66 => 12,  63 => 11,  60 => 10,  55 => 9,  50 => 8,  48 => 7,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio6/template/extension/module/oclayerednavigation/oclayerednavigation.twig", "");
    }
}
