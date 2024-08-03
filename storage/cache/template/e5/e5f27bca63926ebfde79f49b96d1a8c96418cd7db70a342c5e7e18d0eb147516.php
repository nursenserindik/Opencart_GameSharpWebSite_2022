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

/* tt_lazio8/template/extension/module/ocproduct.twig */
class __TwigTemplate_28f1f655105ce272a0e1588e5baf2738192dc00136699b8c52c8bec072d566d8 extends \Twig\Template
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
        echo "<div class=\"tt_product_module ";
        echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "class", [], "any", false, false, false, 1);
        echo "\" id=\"product_module";
        echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 1);
        echo "\">
    <div class=\"module-title\">
\t  <h2>
\t\t";
        // line 4
        if (twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 4)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 4)) {
            // line 5
            echo "\t\t  ";
            echo twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 5)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 5);
            echo "
\t\t";
        } else {
            // line 7
            echo "\t\t  ";
            echo ($context["heading_title"] ?? null);
            echo "
\t\t";
        }
        // line 9
        echo "\t  </h2>
\t  ";
        // line 10
        if (($context["module_description"] ?? null)) {
            // line 11
            echo "\t\t<div class=\"module-description\">
\t\t  ";
            // line 12
            echo ($context["module_description"] ?? null);
            echo "
\t\t</div>
\t  ";
        }
        // line 15
        echo "\t</div>
\t";
        // line 16
        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 16)) {
            // line 17
            echo "\t\t";
            $context["class_slider"] = " owl-carousel owl-theme ";
            // line 18
            echo "\t";
        } else {
            // line 19
            echo "\t\t";
            $context["class_slider"] = "";
            // line 20
            echo "\t";
        }
        // line 21
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 21) == 0)) {
            // line 22
            echo "\t\t";
            $context["class"] = "two_items col-lg-6 col-md-6 col-sm-6 col-xs-12";
            // line 23
            echo "\t";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 23) == 1)) {
            // line 24
            echo "\t\t";
            $context["class"] = "three_items col-lg-4 col-md-4 col-sm-4 col-xs-12";
            // line 25
            echo "\t";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 25) == 2)) {
            // line 26
            echo "\t\t";
            $context["class"] = "four_items col-lg-3 col-md-3 col-sm-3 col-xs-12";
            // line 27
            echo "\t";
        } else {
            echo "\t\t
\t\t";
            // line 28
            $context["class"] = "six_items col-lg-2 col-md-2 col-sm-2 col-xs-12";
            // line 29
            echo "\t";
        }
        // line 30
        echo "\t";
        if ((twig_length_filter($this->env, ($context["products"] ?? null)) > 0)) {
            // line 31
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 31)) {
                // line 32
                echo "\t\t\t";
                $context["rows"] = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 32);
                // line 33
                echo "\t\t";
            } else {
                // line 34
                echo "\t\t\t";
                $context["rows"] = 1;
                // line 35
                echo "\t\t";
            }
            // line 36
            echo "\t\t";
            $context["count"] = 0;
            // line 37
            echo "    <div class=\"tt-product ";
            echo ($context["class_slider"] ?? null);
            echo "\">\t
        ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo "            
            <!-- Grid -->
\t\t\t";
                // line 40
                if (((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0)) {
                    // line 41
                    echo "\t\t\t<div class=\"row_items ";
                    if ( !twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 41)) {
                        echo ($context["class"] ?? null);
                    }
                    echo "\">
\t\t\t";
                }
                // line 43
                echo "\t\t\t";
                $context["count"] = (($context["count"] ?? null) + 1);
                // line 44
                echo "            ";
                if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "type", [], "any", false, false, false, 44) == 0)) {
                    // line 45
                    echo "\t\t\t\t<div class=\"product-layout product-grid\">
\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t<div class=\"item-inner\">
\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t<a href=\"";
                    // line 49
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 49);
                    echo "\">
\t\t\t\t\t\t\t\t\t";
                    // line 50
                    if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 50) && twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 50))) {
                        echo "<img class=\"img-r\" src=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 50);
                        echo "\" alt=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 50);
                        echo "\" />";
                    }
                    // line 51
                    echo "\t\t\t\t\t\t\t\t\t<img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 51);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 51);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 51);
                    echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t</a>\t\t\t\t  
\t\t\t\t\t\t\t\t";
                    // line 53
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 53)) {
                        // line 54
                        echo "\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 54)) {
                            // line 55
                            echo "\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\"><span>";
                            echo ($context["text_label_sale"] ?? null);
                            echo "</span></div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 57
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 58
                    echo "\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 58)) {
                        // line 59
                        echo "\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 59)) {
                            // line 60
                            echo "\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                            echo ($context["text_label_new"] ?? null);
                            echo "</div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 62
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 63
                    echo "\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t";
                    // line 65
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 65)) {
                        // line 66
                        echo "\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 67
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 67);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 67);
                        echo "</a>
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
                    }
                    // line 70
                    echo "\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 70);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 70);
                    echo "</a></h4>                  
\t\t\t\t\t\t\t\t";
                    // line 71
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 71)) {
                        // line 72
                        echo "\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 72);
                        echo "</p>
\t\t\t\t\t\t\t\t";
                    }
                    // line 74
                    echo "\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 74)) {
                        // line 75
                        echo "\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t";
                        // line 77
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(range(0, 5));
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 78
                            echo "\t\t\t\t\t\t\t\t\t\t";
                            if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 78) == $context["i"])) {
                                // line 79
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                $context["class_r"] = ("rating" . $context["i"]);
                                // line 80
                                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                echo ($context["class_r"] ?? null);
                                echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 82
                            echo "\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 83
                        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                    }
                    // line 86
                    echo "\t\t\t\t\t\t\t\t";
                    if (($context["use_catalog"] ?? null)) {
                        // line 87
                        echo "\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 87)) {
                            // line 88
                            echo "\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t";
                            // line 89
                            if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 89)) {
                                // line 90
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 90);
                                echo "
\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 92
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 92);
                                echo "</span><span class=\"price-new\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 92);
                                echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 94
                            echo "\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 94)) {
                                // line 95
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                echo ($context["text_tax"] ?? null);
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 95);
                                echo "</span>
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 97
                            echo "\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
                        }
                        // line 99
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 100
                    echo "\t\t\t\t\t\t\t\t<div class=\"action-links\">
\t\t\t\t\t\t\t\t\t";
                    // line 101
                    if (($context["use_catalog"] ?? null)) {
                        // line 102
                        echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-cart\" type=\"button\" title=\"";
                        echo ($context["button_cart"] ?? null);
                        echo "\" onclick=\"cart.add('";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 102);
                        echo "');\"><i class=\"ion-bag\"></i><span>";
                        echo ($context["button_cart"] ?? null);
                        echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 104
                    echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-wishlist\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 104);
                    echo "');\"><i class=\"zmdi zmdi-favorite-outline zmdi-hc-fw\"></i><span>";
                    echo ($context["button_wishlist"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t<button class=\"btn-compare\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    // line 105
                    echo ($context["button_compare"] ?? null);
                    echo "\" onclick=\"compare.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 105);
                    echo "');\"><i class=\"zmdi zmdi-refresh-alt\"></i><span>";
                    echo ($context["button_compare"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    // line 106
                    if (($context["use_quickview"] ?? null)) {
                        // line 107
                        echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                        echo ($context["button_quickview"] ?? null);
                        echo "\" onclick=\"ocquickview.ajaxView('";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 107);
                        echo "')\"><i class=\"zmdi zmdi-search zmdi-hc-fw\"></i><span>";
                        echo ($context["button_quickview"] ?? null);
                        echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 109
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t";
                    // line 111
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 111)) {
                        echo "<div id=\"Countdown";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 111);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "\" class=\"box-timer\"></div> ";
                    }
                    // line 112
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t";
                    // line 114
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 114) && twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 114))) {
                        // line 115
                        echo "\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\$('#Countdown";
                        // line 117
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 117);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "').countdown({
\t\t\t\t\t\tuntil: new Date(";
                        // line 118
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 118), "Y");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 118), "m");
                        echo "-1, ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 118), "d");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 118), "H");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 118), "i");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 118), "s");
                        echo "),
\t\t\t\t\t\tlabels: ['";
                        // line 119
                        echo ($context["text_years"] ?? null);
                        echo "', '";
                        echo ($context["text_months"] ?? null);
                        echo " ', '";
                        echo ($context["text_weeks"] ?? null);
                        echo "', '";
                        echo ($context["text_days"] ?? null);
                        echo "', '";
                        echo ($context["text_hrs"] ?? null);
                        echo "', '";
                        echo ($context["text_mins"] ?? null);
                        echo "', '";
                        echo ($context["text_secs"] ?? null);
                        echo "'],
\t\t\t\t\t\tlabels1: ['";
                        // line 120
                        echo ($context["text_year"] ?? null);
                        echo "', '";
                        echo ($context["text_month"] ?? null);
                        echo " ', '";
                        echo ($context["text_week"] ?? null);
                        echo "', '";
                        echo ($context["text_day"] ?? null);
                        echo "', '";
                        echo ($context["text_hr"] ?? null);
                        echo "', '";
                        echo ($context["text_min"] ?? null);
                        echo "', '";
                        echo ($context["text_sec"] ?? null);
                        echo "'],
\t\t\t\t\t\t});
\t\t\t\t\t\t// \$('#Countdown";
                        // line 122
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 122);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "').countdown('pause');
\t\t\t\t\t\t});
\t\t\t\t\t\t</script>
\t\t\t\t\t\t";
                    }
                    // line 126
                    echo "\t\t\t\t</div><!-- product-layout -->

            ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 128
($context["config_module"] ?? null), "type", [], "any", false, false, false, 128) == 1)) {
                    // line 129
                    echo "            <!-- List -->
            <div class=\"product-layout list-style\">
\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t<div class=\"item-inner\">
\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t";
                    // line 134
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 134)) {
                        // line 135
                        echo "\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 135)) {
                            // line 136
                            echo "\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                            echo ($context["text_label_sale"] ?? null);
                            echo "</div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 138
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 139
                    echo "\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 139)) {
                        // line 140
                        echo "\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 140)) {
                            // line 141
                            echo "\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                            echo ($context["text_label_new"] ?? null);
                            echo "</div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 143
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 144
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 144);
                    echo "\">
\t\t\t\t\t\t\t\t\t";
                    // line 145
                    if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 145) && twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 145))) {
                        echo "<img class=\"img-r\" src=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 145);
                        echo "\" alt=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 145);
                        echo "\" />";
                    }
                    // line 146
                    echo "\t\t\t\t\t\t\t\t\t<img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 146);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 146);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 146);
                    echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<div class=\"action-links\">
\t\t\t\t\t\t\t\t\t";
                    // line 149
                    if (($context["use_catalog"] ?? null)) {
                        // line 150
                        echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-cart\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                        echo ($context["button_cart"] ?? null);
                        echo "\" onclick=\"cart.add('";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 150);
                        echo "');\"><i class=\"zmdi zmdi-shopping-cart-plus\"></i><span>";
                        echo ($context["button_cart"] ?? null);
                        echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 152
                    echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-wishlist\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 152);
                    echo "');\"><i class=\"zmdi zmdi-favorite-outline zmdi-hc-fw\"></i><span>";
                    echo ($context["button_wishlist"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t<button class=\"btn-compare\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    // line 153
                    echo ($context["button_compare"] ?? null);
                    echo "\" onclick=\"compare.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 153);
                    echo "');\"><i class=\"zmdi zmdi-refresh-alt\"></i><span>";
                    echo ($context["button_compare"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    // line 154
                    if (($context["use_quickview"] ?? null)) {
                        // line 155
                        echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                        echo ($context["button_quickview"] ?? null);
                        echo "\" onclick=\"ocquickview.ajaxView('";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 155);
                        echo "')\"><i class=\"zmdi zmdi-search zmdi-hc-fw\"></i><span>";
                        echo ($context["button_quickview"] ?? null);
                        echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 157
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    // line 158
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 158)) {
                        // line 159
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 161
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(range(1, 5));
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 162
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 162) == $context["i"])) {
                                // line 163
                                echo "\t\t\t\t\t\t\t\t\t\t\t";
                                $context["class_r"] = ("rating" . $context["i"]);
                                // line 164
                                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                echo ($context["class_r"] ?? null);
                                echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 166
                            echo "\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 167
                        echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                    }
                    // line 169
                    echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t";
                    // line 172
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 172)) {
                        // line 173
                        echo "\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 174
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 174);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 174);
                        echo "</a>
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
                    }
                    // line 177
                    echo "\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 177);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 177);
                    echo "</a></h4>                  
\t\t\t\t\t\t\t\t";
                    // line 178
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 178)) {
                        // line 179
                        echo "\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 179);
                        echo "</p>
\t\t\t\t\t\t\t\t";
                    }
                    // line 181
                    echo "\t\t\t\t\t\t\t\t";
                    if (($context["use_catalog"] ?? null)) {
                        // line 182
                        echo "\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 182)) {
                            // line 183
                            echo "\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t";
                            // line 184
                            if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 184)) {
                                // line 185
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 185);
                                echo "
\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 187
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 187);
                                echo "</span><span class=\"price-new\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 187);
                                echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 189
                            echo "\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 189)) {
                                // line 190
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                echo ($context["text_tax"] ?? null);
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 190);
                                echo "</span>
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 192
                            echo "\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
                        }
                        // line 194
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 195
                    echo "\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t";
                    // line 196
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 196)) {
                        echo "<div id=\"Countdown";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 196);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "\" class=\"box-timer\"></div> ";
                    }
                    // line 197
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t";
                    // line 199
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 199) && twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 199))) {
                        // line 200
                        echo "\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\$('#Countdown";
                        // line 202
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 202);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "').countdown({
\t\t\t\t\t\tuntil: new Date(";
                        // line 203
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 203), "Y");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 203), "m");
                        echo "-1, ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 203), "d");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 203), "H");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 203), "i");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 203), "s");
                        echo "),
\t\t\t\t\t\tlabels: ['";
                        // line 204
                        echo ($context["text_years"] ?? null);
                        echo "', '";
                        echo ($context["text_months"] ?? null);
                        echo " ', '";
                        echo ($context["text_weeks"] ?? null);
                        echo "', '";
                        echo ($context["text_days"] ?? null);
                        echo "', '";
                        echo ($context["text_hrs"] ?? null);
                        echo "', '";
                        echo ($context["text_mins"] ?? null);
                        echo "', '";
                        echo ($context["text_secs"] ?? null);
                        echo "'],
\t\t\t\t\t\tlabels1: ['";
                        // line 205
                        echo ($context["text_year"] ?? null);
                        echo "', '";
                        echo ($context["text_month"] ?? null);
                        echo " ', '";
                        echo ($context["text_week"] ?? null);
                        echo "', '";
                        echo ($context["text_day"] ?? null);
                        echo "', '";
                        echo ($context["text_hr"] ?? null);
                        echo "', '";
                        echo ($context["text_min"] ?? null);
                        echo "', '";
                        echo ($context["text_sec"] ?? null);
                        echo "'],
\t\t\t\t\t\t});
\t\t\t\t\t\t// \$('#Countdown";
                        // line 207
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 207);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "').countdown('pause');
\t\t\t\t\t\t});
\t\t\t\t\t\t</script>
\t\t\t\t\t\t";
                    }
                    // line 211
                    echo "\t\t\t\t</div><!-- product-layout -->
            ";
                } else {
                    // line 213
                    echo "            <!-- other type -->
            <div class=\"product-layout product-customize\">
\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t<div class=\"item-inner\">
\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t";
                    // line 218
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 218)) {
                        // line 219
                        echo "\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 219)) {
                            // line 220
                            echo "\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                            echo ($context["text_label_sale"] ?? null);
                            echo "</div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 222
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 223
                    echo "\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 223)) {
                        // line 224
                        echo "\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 224)) {
                            // line 225
                            echo "\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                            echo ($context["text_label_new"] ?? null);
                            echo "</div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 227
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 228
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 228);
                    echo "\">
\t\t\t\t\t\t\t\t\t";
                    // line 229
                    if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 229) && twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 229))) {
                        echo "<img class=\"img-r\" src=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 229);
                        echo "\" alt=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 229);
                        echo "\" />";
                    }
                    // line 230
                    echo "\t\t\t\t\t\t\t\t\t<img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 230);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 230);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 230);
                    echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<div class=\"action-links\">
\t\t\t\t\t\t\t\t\t";
                    // line 233
                    if (($context["use_catalog"] ?? null)) {
                        // line 234
                        echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-cart\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                        echo ($context["button_cart"] ?? null);
                        echo "\" onclick=\"cart.add('";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 234);
                        echo "');\"><i class=\"zmdi zmdi-shopping-cart-plus\"></i><span>";
                        echo ($context["button_cart"] ?? null);
                        echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 236
                    echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-wishlist\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 236);
                    echo "');\"><i class=\"zmdi zmdi-favorite-outline zmdi-hc-fw\"></i><span>";
                    echo ($context["button_wishlist"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t<button class=\"btn-compare\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    // line 237
                    echo ($context["button_compare"] ?? null);
                    echo "\" onclick=\"compare.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 237);
                    echo "');\"><i class=\"zmdi zmdi-refresh-alt\"></i><span>";
                    echo ($context["button_compare"] ?? null);
                    echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    // line 238
                    if (($context["use_quickview"] ?? null)) {
                        // line 239
                        echo "\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                        echo ($context["button_quickview"] ?? null);
                        echo "\" onclick=\"ocquickview.ajaxView('";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 239);
                        echo "')\"><i class=\"zmdi zmdi-search zmdi-hc-fw\"></i><span>";
                        echo ($context["button_quickview"] ?? null);
                        echo "</span></button>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 241
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    // line 242
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 242)) {
                        // line 243
                        echo "\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t";
                        // line 245
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(range(1, 5));
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 246
                            echo "\t\t\t\t\t\t\t\t\t\t";
                            if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 246) == $context["i"])) {
                                // line 247
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                $context["class_r"] = ("rating" . $context["i"]);
                                // line 248
                                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                echo ($context["class_r"] ?? null);
                                echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 250
                            echo "\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 251
                        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                    }
                    // line 254
                    echo "\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t";
                    // line 256
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 256)) {
                        // line 257
                        echo "\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 258
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 258);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 258);
                        echo "</a>
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
                    }
                    // line 261
                    echo "\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 261);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 261);
                    echo "</a></h4>                  
\t\t\t\t\t\t\t\t";
                    // line 262
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 262)) {
                        // line 263
                        echo "\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 263);
                        echo "</p>
\t\t\t\t\t\t\t\t";
                    }
                    // line 265
                    echo "\t\t\t\t\t\t\t\t";
                    if (($context["use_catalog"] ?? null)) {
                        // line 266
                        echo "\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 266)) {
                            // line 267
                            echo "\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t";
                            // line 268
                            if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 268)) {
                                // line 269
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 269);
                                echo "
\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 271
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 271);
                                echo "</span><span class=\"price-new\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 271);
                                echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 273
                            echo "\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 273)) {
                                // line 274
                                echo "\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                echo ($context["text_tax"] ?? null);
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 274);
                                echo "</span>
\t\t\t\t\t\t\t\t\t";
                            }
                            // line 276
                            echo "\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
                        }
                        // line 278
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 279
                    echo "\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t";
                    // line 280
                    if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 280)) {
                        echo "<div id=\"Countdown";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 280);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "\" class=\"box-timer\"></div> ";
                    }
                    // line 281
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t";
                    // line 283
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 283) && twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 283))) {
                        // line 284
                        echo "\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\$('#Countdown";
                        // line 286
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 286);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "').countdown({
\t\t\t\t\t\tuntil: new Date(";
                        // line 287
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 287), "Y");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 287), "m");
                        echo "-1, ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 287), "d");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 287), "H");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 287), "i");
                        echo ", ";
                        echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 287), "s");
                        echo "),
\t\t\t\t\t\tlabels: ['";
                        // line 288
                        echo ($context["text_years"] ?? null);
                        echo "', '";
                        echo ($context["text_months"] ?? null);
                        echo " ', '";
                        echo ($context["text_weeks"] ?? null);
                        echo "', '";
                        echo ($context["text_days"] ?? null);
                        echo "', '";
                        echo ($context["text_hrs"] ?? null);
                        echo "', '";
                        echo ($context["text_mins"] ?? null);
                        echo "', '";
                        echo ($context["text_secs"] ?? null);
                        echo "'],
\t\t\t\t\t\tlabels1: ['";
                        // line 289
                        echo ($context["text_year"] ?? null);
                        echo "', '";
                        echo ($context["text_month"] ?? null);
                        echo " ', '";
                        echo ($context["text_week"] ?? null);
                        echo "', '";
                        echo ($context["text_day"] ?? null);
                        echo "', '";
                        echo ($context["text_hr"] ?? null);
                        echo "', '";
                        echo ($context["text_min"] ?? null);
                        echo "', '";
                        echo ($context["text_sec"] ?? null);
                        echo "'],
\t\t\t\t\t\t});
\t\t\t\t\t\t// \$('#Countdown";
                        // line 291
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 291);
                        echo "-";
                        echo ($context["i"] ?? null);
                        echo "').countdown('pause');
\t\t\t\t\t\t});
\t\t\t\t\t\t</script>
\t\t\t\t\t\t";
                    }
                    // line 295
                    echo "\t\t\t\t</div><!-- product-layout -->
            ";
                }
                // line 297
                echo "\t\t\t\t";
                if ((((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0) || (($context["count"] ?? null) == twig_length_filter($this->env, ($context["products"] ?? null))))) {
                    // line 298
                    echo "\t\t\t\t</div>
\t\t\t\t";
                }
                // line 300
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "\t
    </div>
\t";
        } else {
            // line 303
            echo "\t\t<p class=\"text_empty\">";
            echo ($context["text_empty"] ?? null);
            echo "</p>
\t";
        }
        // line 305
        echo "</div>
";
        // line 306
        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 306)) {
            // line 307
            echo "    <script type=\"text/javascript\">
        \$(document).ready(function() {
            \$(\"#product_module";
            // line 309
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 309);
            echo " .tt-product\").owlCarousel({
                loop: ";
            // line 310
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "loop", [], "any", false, false, false, 310)) {
                echo " true ";
            } else {
                echo " false ";
            }
            echo ",
                margin: ";
            // line 311
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 311)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 311);
                echo " ";
            } else {
                echo " 20 ";
            }
            echo ",
                nav: ";
            // line 312
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "navigation", [], "any", false, false, false, 312)) {
                echo " true ";
            } else {
                echo " false ";
            }
            echo ",
                dots: ";
            // line 313
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "pagination", [], "any", false, false, false, 313)) {
                echo " true ";
            } else {
                echo " false ";
            }
            echo ",
                autoplay:  ";
            // line 314
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "auto", [], "any", false, false, false, 314)) {
                echo " true ";
            } else {
                echo " false ";
            }
            echo ",
                autoplayTimeout: ";
            // line 315
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 315)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 315);
                echo " ";
            } else {
                echo " 2000 ";
            }
            echo ",
                autoplayHoverPause: true,
                autoplaySpeed: ";
            // line 317
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 317)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 317);
                echo " ";
            } else {
                echo " 3000 ";
            }
            echo ",
                navSpeed: ";
            // line 318
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 318)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 318);
                echo " ";
            } else {
                echo " 3000 ";
            }
            echo ",
                dotsSpeed: ";
            // line 319
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 319)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 319);
                echo " ";
            } else {
                echo " 3000 ";
            }
            echo ",
\t\t\t\tlazyLoad: true,
                responsive:{
\t\t\t\t\t0:{
\t\t\t\t\t\titems: ";
            // line 323
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "smobile", [], "any", false, false, false, 323);
            echo "
\t\t\t\t\t},
\t\t\t\t\t481:{
\t\t\t\t\t\titems: ";
            // line 326
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "mobile", [], "any", false, false, false, 326);
            echo "
\t\t\t\t\t},
\t\t\t\t\t769:{
\t\t\t\t\t\titems: ";
            // line 329
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "tablet", [], "any", false, false, false, 329);
            echo "
\t\t\t\t\t},
\t\t\t\t\t1024:{
\t\t\t\t\t\titems: ";
            // line 332
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "desktop", [], "any", false, false, false, 332);
            echo "
\t\t\t\t\t},
\t\t\t\t\t1200:{
\t\t\t\t\t\titems: ";
            // line 335
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "items", [], "any", false, false, false, 335);
            echo "
\t\t\t\t\t},
                }
            });

        });
    </script>
";
        }
    }

    public function getTemplateName()
    {
        return "tt_lazio8/template/extension/module/ocproduct.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1213 => 335,  1207 => 332,  1201 => 329,  1195 => 326,  1189 => 323,  1176 => 319,  1166 => 318,  1156 => 317,  1145 => 315,  1137 => 314,  1129 => 313,  1121 => 312,  1111 => 311,  1103 => 310,  1099 => 309,  1095 => 307,  1093 => 306,  1090 => 305,  1084 => 303,  1074 => 300,  1070 => 298,  1067 => 297,  1063 => 295,  1054 => 291,  1037 => 289,  1021 => 288,  1007 => 287,  1001 => 286,  997 => 284,  995 => 283,  991 => 281,  983 => 280,  980 => 279,  977 => 278,  973 => 276,  965 => 274,  962 => 273,  954 => 271,  948 => 269,  946 => 268,  943 => 267,  940 => 266,  937 => 265,  931 => 263,  929 => 262,  922 => 261,  914 => 258,  911 => 257,  909 => 256,  905 => 254,  900 => 251,  894 => 250,  888 => 248,  885 => 247,  882 => 246,  878 => 245,  874 => 243,  872 => 242,  869 => 241,  859 => 239,  857 => 238,  849 => 237,  840 => 236,  830 => 234,  828 => 233,  817 => 230,  809 => 229,  804 => 228,  801 => 227,  795 => 225,  792 => 224,  789 => 223,  786 => 222,  780 => 220,  777 => 219,  775 => 218,  768 => 213,  764 => 211,  755 => 207,  738 => 205,  722 => 204,  708 => 203,  702 => 202,  698 => 200,  696 => 199,  692 => 197,  684 => 196,  681 => 195,  678 => 194,  674 => 192,  666 => 190,  663 => 189,  655 => 187,  649 => 185,  647 => 184,  644 => 183,  641 => 182,  638 => 181,  632 => 179,  630 => 178,  623 => 177,  615 => 174,  612 => 173,  610 => 172,  605 => 169,  600 => 167,  594 => 166,  588 => 164,  585 => 163,  582 => 162,  578 => 161,  574 => 159,  572 => 158,  569 => 157,  559 => 155,  557 => 154,  549 => 153,  540 => 152,  530 => 150,  528 => 149,  517 => 146,  509 => 145,  504 => 144,  501 => 143,  495 => 141,  492 => 140,  489 => 139,  486 => 138,  480 => 136,  477 => 135,  475 => 134,  468 => 129,  466 => 128,  462 => 126,  453 => 122,  436 => 120,  420 => 119,  406 => 118,  400 => 117,  396 => 115,  394 => 114,  390 => 112,  382 => 111,  378 => 109,  368 => 107,  366 => 106,  358 => 105,  349 => 104,  339 => 102,  337 => 101,  334 => 100,  331 => 99,  327 => 97,  319 => 95,  316 => 94,  308 => 92,  302 => 90,  300 => 89,  297 => 88,  294 => 87,  291 => 86,  286 => 83,  280 => 82,  274 => 80,  271 => 79,  268 => 78,  264 => 77,  260 => 75,  257 => 74,  251 => 72,  249 => 71,  242 => 70,  234 => 67,  231 => 66,  229 => 65,  225 => 63,  222 => 62,  216 => 60,  213 => 59,  210 => 58,  207 => 57,  201 => 55,  198 => 54,  196 => 53,  186 => 51,  178 => 50,  174 => 49,  168 => 45,  165 => 44,  162 => 43,  154 => 41,  152 => 40,  145 => 38,  140 => 37,  137 => 36,  134 => 35,  131 => 34,  128 => 33,  125 => 32,  122 => 31,  119 => 30,  116 => 29,  114 => 28,  109 => 27,  106 => 26,  103 => 25,  100 => 24,  97 => 23,  94 => 22,  91 => 21,  88 => 20,  85 => 19,  82 => 18,  79 => 17,  77 => 16,  74 => 15,  68 => 12,  65 => 11,  63 => 10,  60 => 9,  54 => 7,  48 => 5,  46 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio8/template/extension/module/ocproduct.twig", "");
    }
}
