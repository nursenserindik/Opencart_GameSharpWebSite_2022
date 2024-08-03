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

/* tt_lazio6/template/extension/module/octabproducts.twig */
class __TwigTemplate_465b1bb5d6c0b68f84bda6379879d7325d564789b6e33cf41a829ef51f209aa6 extends \Twig\Template
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
        echo "<!-- Grid type -->
";
        // line 2
        if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "type", [], "any", false, false, false, 2) == 0)) {
            // line 3
            echo "<div class=\"tt_tabsproduct_module ";
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "class", [], "any", false, false, false, 3);
            echo "\" id=\"product_module";
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 3);
            echo "\">
\t\t<div class=\"module-title\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-4 col-sm-4 col-sms-12\">
\t\t\t\t\t<h2>
\t\t\t\t\t\t";
            // line 8
            if (twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 8)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 8)) {
                // line 9
                echo "\t\t\t\t\t\t  ";
                echo twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 9)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 9);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 11
                echo "\t\t\t\t\t\t  ";
                echo ($context["heading_title"] ?? null);
                echo "
\t\t\t\t\t\t";
            }
            // line 13
            echo "\t\t\t\t\t</h2>
\t\t\t\t\t";
            // line 14
            if (($context["module_description"] ?? null)) {
                // line 15
                echo "\t\t\t\t\t\t<div class=\"module-description\">
\t\t\t\t\t\t  ";
                // line 16
                echo ($context["module_description"] ?? null);
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 19
            echo "\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-8 col-sm-8 col-sms-12\">
\t\t\t\t\t<ul class=\"tab-heading nav nav-pills\">
\t\t\t\t\t  ";
            // line 22
            $context["i"] = 0;
            // line 23
            echo "\t\t\t\t\t  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["octabs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["octab"]) {
                // line 24
                echo "\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["octab"], "manufacturer_logo", [], "any", false, false, false, 24)) {
                    // line 25
                    echo "\t\t\t\t\t\t\t<li ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "class=\"active\"";
                    }
                    echo "><a data-toggle=\"pill\" href=\"#tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 25);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["octab"], "manufacturer_logo", [], "any", false, false, false, 25);
                    echo "\" alt=\"\"/></a></li>
\t\t\t\t\t   ";
                } else {
                    // line 27
                    echo "\t\t\t\t\t\t\t<li ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "class=\"active\"";
                    }
                    echo "><a data-toggle=\"pill\" href=\"#tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 27);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["octab"], "title", [], "any", false, false, false, 27);
                    echo "</a></li>
\t\t\t\t\t\t";
                }
                // line 29
                echo "\t\t\t\t\t\t";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 30
                echo "\t\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['octab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t  ";
            // line 35
            if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 35) == 0)) {
                // line 36
                echo "\t\t";
                $context["class"] = "col-lg-2 col-md-2 col-sm-2 col-xs-12";
                // line 37
                echo "\t  ";
            } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 37) == 1)) {
                // line 38
                echo "\t\t";
                $context["class"] = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
                // line 39
                echo "\t  ";
            } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 39) == 2)) {
                // line 40
                echo "\t\t";
                $context["class"] = "col-lg-3 col-md-3 col-sm-3 col-xs-12";
                // line 41
                echo "\t  ";
            } else {
                // line 42
                echo "\t\t";
                $context["class"] = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
                // line 43
                echo "\t  ";
            }
            // line 44
            echo "\t  <div class=\"tt-product\">
\t\t<div class=\"tab-content\">
\t\t\t";
            // line 46
            $context["i"] = 0;
            // line 47
            echo "\t\t  
\t\t\t";
            // line 48
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 48)) {
                // line 49
                echo "\t\t\t\t";
                $context["rows"] = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 49);
                // line 50
                echo "\t\t\t";
            } else {
                // line 51
                echo "\t\t\t\t";
                $context["rows"] = 1;
                // line 52
                echo "\t\t\t";
            }
            echo "\t\t\t
\t\t\t";
            // line 53
            $context["break"] = false;
            // line 54
            echo "\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["octabs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["octab"]) {
                if ( !($context["break"] ?? null)) {
                    echo "\t
\t\t\t
\t\t\t<div class=\"tab-container ";
                    // line 56
                    if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "type", [], "any", false, false, false, 56) != 2)) {
                        echo "owl-carousel owl-theme tab-pane fade";
                    }
                    echo " ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "active in";
                    }
                    echo "\" id=\"tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 56);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\">
\t\t\t";
                    // line 57
                    if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 57)) > 0)) {
                        echo "\t
\t\t\t\t\t<div class=\"owl-carousel owl-theme tab-pane other-type\">
\t\t\t\t\t\t";
                        // line 59
                        $context["count"] = 0;
                        // line 60
                        echo "\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 60));
                        $context['loop'] = [
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        ];
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 61
                            echo "\t\t\t\t\t\t";
                            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 61)) {
                                // line 62
                                echo "\t\t\t\t\t\t";
                                if (((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0)) {
                                    // line 63
                                    echo "\t\t\t\t\t\t<div class=\"row_items\">
\t\t\t\t\t\t";
                                }
                                // line 65
                                echo "\t\t\t\t\t\t";
                                $context["count"] = (($context["count"] ?? null) + 1);
                                // line 66
                                echo "\t\t\t\t\t\t<div class=\"product-layout product-grid product-customize ";
                                if ( !twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 66)) {
                                    echo ($context["class"] ?? null);
                                }
                                echo "\">
\t\t\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t\t\t<div  class=\"item-inner\">
\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t";
                                // line 70
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 70)) {
                                    // line 71
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 71)) {
                                        // line 72
                                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                                        echo ($context["text_label_sale"] ?? null);
                                        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 74
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 75
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 75)) {
                                    // line 76
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 76)) {
                                        // line 77
                                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                                        echo ($context["text_label_new"] ?? null);
                                        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 79
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 80
                                echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 80);
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
                                // line 81
                                if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 81) && twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 81))) {
                                    echo "<img class=\"img-r\" src=\"";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 81);
                                    echo "\" alt=\"";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 81);
                                    echo "\" />";
                                }
                                // line 82
                                echo "\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 82);
                                echo "\" alt=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 82);
                                echo "\" title=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 82);
                                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t<div class=\"qv-button-container\">
\t\t\t\t\t\t\t\t\t\t";
                                // line 85
                                if (($context["use_quickview"] ?? null)) {
                                    // line 86
                                    echo "\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" title=\"";
                                    echo ($context["button_quickview"] ?? null);
                                    echo "\" onclick=\"ocquickview.ajaxView('";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 86);
                                    echo "')\"><span>";
                                    echo ($context["button_quickview"] ?? null);
                                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 88
                                echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t<!-- ";
                                // line 91
                                if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 91)) {
                                    // line 92
                                    echo "\t\t\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                    // line 93
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 93);
                                    echo "\">";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 93);
                                    echo "</a>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 95
                                echo " -->
\t\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                                // line 96
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 96);
                                echo "\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 96);
                                echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t";
                                // line 97
                                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 97)) {
                                    // line 98
                                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 100
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                        // line 101
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 101) == $context["i"])) {
                                            // line 102
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["class_r"] = ("rating" . $context["i"]);
                                            // line 103
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                            echo ($context["class_r"] ?? null);
                                            echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 105
                                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 106
                                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 109
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                if (($context["use_catalog"] ?? null)) {
                                    // line 110
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 110)) {
                                        // line 111
                                        echo "\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 112
                                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 112)) {
                                            // line 113
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 113);
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t";
                                        } else {
                                            // line 115
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 115);
                                            echo "</span><span class=\"price-new\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 115);
                                            echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 117
                                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 117)) {
                                            // line 118
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                            echo ($context["text_tax"] ?? null);
                                            echo " ";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 118);
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 120
                                        echo "\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 122
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 123
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 123)) {
                                    // line 124
                                    echo "\t\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 124);
                                    echo "</p>
\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 126
                                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"item-hover\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"add-to-links\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"wishlist\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                // line 130
                                echo ($context["button_wishlist"] ?? null);
                                echo "\" onclick=\"wishlist.add('";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 130);
                                echo "');\"><span>";
                                echo ($context["button_wishlist"] ?? null);
                                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cart\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 133
                                if (($context["use_catalog"] ?? null)) {
                                    // line 134
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                    echo ($context["button_cart"] ?? null);
                                    echo "\" onclick=\"cart.add('";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 134);
                                    echo "');\"><span>";
                                    echo ($context["button_cart"] ?? null);
                                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 136
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"compare\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                // line 138
                                echo ($context["button_compare"] ?? null);
                                echo "\" onclick=\"compare.add('";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 138);
                                echo "');\"><span>";
                                echo ($context["button_compare"] ?? null);
                                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t\t\t";
                                // line 144
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 144)) {
                                    echo "<div id=\"Countdown";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 144);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "\" class=\"box-timer\"></div> ";
                                }
                                // line 145
                                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t\t\t";
                                // line 147
                                if ((twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 147) && twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 147))) {
                                    // line 148
                                    echo "\t\t\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\t\t\$('#Countdown";
                                    // line 150
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 150);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "').countdown({
\t\t\t\t\t\t\t\tuntil: new Date(";
                                    // line 151
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 151), "Y");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 151), "m");
                                    echo "-1, ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 151), "d");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 151), "H");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 151), "i");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 151), "s");
                                    echo "),
\t\t\t\t\t\t\t\tlabels: ['";
                                    // line 152
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
\t\t\t\t\t\t\t\tlabels1: ['";
                                    // line 153
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
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t// \$('#Countdown";
                                    // line 155
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 155);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "').countdown('pause');
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t";
                                }
                                // line 159
                                echo "\t\t\t\t\t\t</div><!-- product-layout -->
\t\t\t\t\t\t";
                                // line 160
                                if ((((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0) || (($context["count"] ?? null) == (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 160)) - 1)))) {
                                    // line 161
                                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                                }
                                // line 163
                                echo "\t\t\t\t\t\t";
                            }
                            // line 164
                            echo "\t\t\t\t\t\t";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 165
                        echo "\t\t\t\t\t</div>
\t\t\t";
                        // line 166
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 166)) {
                            // line 167
                            echo "\t\t\t  <script type=\"text/javascript\">
\t\t\t\t\$(document).ready(function() {
\t\t\t\t  \$('#tab-'+";
                            // line 169
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 169);
                            echo "+'-'+";
                            echo ($context["i"] ?? null);
                            echo "+' .other-type').owlCarousel({
\t\t\t\t\titems: ";
                            // line 170
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "items", [], "any", false, false, false, 170);
                            echo ",
\t\t\t\t\tloop: ";
                            // line 171
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "loop", [], "any", false, false, false, 171)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\tmargin: ";
                            // line 172
                            if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 172) >= 0)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 172);
                                echo " ";
                            } else {
                                echo " 20 ";
                            }
                            echo ",
\t\t\t\t\tnav: ";
                            // line 173
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "navigation", [], "any", false, false, false, 173)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\tdots: ";
                            // line 174
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "pagination", [], "any", false, false, false, 174)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\tautoplay:  ";
                            // line 175
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "auto", [], "any", false, false, false, 175)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\tautoplayTimeout: ";
                            // line 176
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 176)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 176);
                                echo " ";
                            } else {
                                echo " 2000 ";
                            }
                            echo ",
\t\t\t\t\tautoplayHoverPause: true,
\t\t\t\t\tautoplaySpeed: ";
                            // line 178
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 178)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 178);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\tnavSpeed: ";
                            // line 179
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 179)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 179);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\tdotsSpeed: ";
                            // line 180
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 180)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 180);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\tlazyLoad: true,
\t\t\t\t\tnavText : [''],
\t\t\t\t\tresponsive:{
\t\t\t\t\t\t0:{
\t\t\t\t\t\t\titems: ";
                            // line 185
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "smobile", [], "any", false, false, false, 185);
                            echo "
\t\t\t\t\t\t},
\t\t\t\t\t\t481:{
\t\t\t\t\t\t\titems: ";
                            // line 188
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "mobile", [], "any", false, false, false, 188);
                            echo "
\t\t\t\t\t\t},
\t\t\t\t\t\t769:{
\t\t\t\t\t\t\titems: ";
                            // line 191
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "tablet", [], "any", false, false, false, 191);
                            echo "
\t\t\t\t\t\t},
\t\t\t\t\t\t1024:{
\t\t\t\t\t\t\titems: ";
                            // line 194
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "desktop", [], "any", false, false, false, 194);
                            echo "
\t\t\t\t\t\t},
\t\t\t\t\t\t1200:{
\t\t\t\t\t\t\titems: ";
                            // line 197
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "items", [], "any", false, false, false, 197);
                            echo "
\t\t\t\t\t\t},
\t\t\t\t\t}
\t\t\t\t  });
\t\t\t\t});
\t\t\t  </script>
\t\t\t";
                        }
                        // line 204
                        echo "\t\t\t";
                        $context["i"] = (($context["i"] ?? null) + 1);
                        // line 205
                        echo "\t\t";
                    } else {
                        // line 206
                        echo "\t\t\t<p class=\"text_empty\">";
                        echo ($context["text_empty"] ?? null);
                        echo "</p>
\t\t";
                    }
                    // line 208
                    echo "\t\t\t</div>
\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['octab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 210
            echo "\t\t</div>
\t\t<div class=\"module-image\">
\t\t\t<img src=";
            // line 212
            echo ($context["thumb2"] ?? null);
            echo " alt=\"\" />
\t\t</div>
\t</div>
</div>
";
        } elseif ((twig_get_attribute($this->env, $this->source,         // line 216
($context["config_module"] ?? null), "type", [], "any", false, false, false, 216) == 1)) {
            // line 217
            echo "<!-- List type -->
<div class=\"tt_tabsproduct_module ";
            // line 218
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "class", [], "any", false, false, false, 218);
            echo "\" id=\"product_module";
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 218);
            echo "\">
\t<div class=\"module-title\">
\t\t<h2>
\t\t\t";
            // line 221
            if (twig_get_attribute($this->env, $this->source, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 221)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 221)) {
                // line 222
                echo "\t\t\t  ";
                echo twig_get_attribute($this->env, $this->source, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 222)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 222);
                echo "
\t\t\t";
            } else {
                // line 224
                echo "\t\t\t  ";
                echo ($context["heading_title"] ?? null);
                echo "
\t\t\t";
            }
            // line 226
            echo "\t\t</h2>
\t\t";
            // line 227
            if (($context["module_description"] ?? null)) {
                // line 228
                echo "\t\t\t<div class=\"module-description\">
\t\t\t  ";
                // line 229
                echo ($context["module_description"] ?? null);
                echo "
\t\t\t</div>
\t\t";
            }
            // line 232
            echo "\t</div>
\t<div class=\"row\">
\t\t<div class=\"col-md-2 col-sm-12 col-sms-12\">
\t\t\t<ul class=\"tab-heading nav nav-pills\">
\t\t\t\t  ";
            // line 236
            $context["i"] = 0;
            // line 237
            echo "\t\t\t\t  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["octabs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["octab"]) {
                // line 238
                echo "\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["octab"], "manufacturer_logo", [], "any", false, false, false, 238)) {
                    // line 239
                    echo "\t\t\t\t\t\t<li ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "class=\"active\"";
                    }
                    echo "><a data-toggle=\"pill\" href=\"#tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 239);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["octab"], "manufacturer_logo", [], "any", false, false, false, 239);
                    echo "\" alt=\"\"/></a></li>
\t\t\t\t   ";
                } else {
                    // line 241
                    echo "\t\t\t\t\t\t<li ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "class=\"active\"";
                    }
                    echo "><a data-toggle=\"pill\" href=\"#tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 241);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["octab"], "title", [], "any", false, false, false, 241);
                    echo "</a></li>
\t\t\t\t\t";
                }
                // line 243
                echo "\t\t\t\t\t";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 244
                echo "\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['octab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 245
            echo "\t\t\t</ul>
\t\t</div>
\t\t<div class=\"col-md-10 col-sm-12 col-sms-12\">
\t  ";
            // line 248
            if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 248) == 0)) {
                // line 249
                echo "\t\t";
                $context["class"] = "col-lg-2 col-md-2 col-sm-2 col-xs-12";
                // line 250
                echo "\t  ";
            } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 250) == 1)) {
                // line 251
                echo "\t\t";
                $context["class"] = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
                // line 252
                echo "\t  ";
            } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 252) == 2)) {
                // line 253
                echo "\t\t";
                $context["class"] = "col-lg-3 col-md-3 col-sm-3 col-xs-12";
                // line 254
                echo "\t  ";
            } else {
                // line 255
                echo "\t\t";
                $context["class"] = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
                // line 256
                echo "\t  ";
            }
            // line 257
            echo "\t  <div class=\"tt-product\">
\t\t<div class=\"tab-content\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-6 col-sm-12 col-sms-12\">
\t\t\t\t\t<div class=\"module-image\">
\t\t\t\t\t\t<img src=";
            // line 262
            echo ($context["thumb3"] ?? null);
            echo " alt=\"\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-6 col-sm-12 col-sms-12\">
\t\t\t\t\t";
            // line 266
            $context["i"] = 0;
            // line 267
            echo "\t\t\t\t  
\t\t\t\t\t";
            // line 268
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 268)) {
                // line 269
                echo "\t\t\t\t\t\t";
                $context["rows"] = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 269);
                // line 270
                echo "\t\t\t\t\t";
            } else {
                // line 271
                echo "\t\t\t\t\t\t";
                $context["rows"] = 1;
                // line 272
                echo "\t\t\t\t\t";
            }
            echo "\t\t\t
\t\t\t\t\t";
            // line 273
            $context["break"] = false;
            // line 274
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["octabs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["octab"]) {
                if ( !($context["break"] ?? null)) {
                    echo "\t
\t\t\t\t\t
\t\t\t\t\t<div class=\"tab-container ";
                    // line 276
                    if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "type", [], "any", false, false, false, 276) != 2)) {
                        echo "owl-carousel owl-theme tab-pane fade";
                    }
                    echo " ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "active in";
                    }
                    echo "\" id=\"tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 276);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\">
\t\t\t\t\t";
                    // line 277
                    if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 277)) > 0)) {
                        echo "\t
\t\t\t\t\t\t\t";
                        // line 278
                        $context["firstproduct"] = (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 278)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4[0] ?? null) : null);
                        // line 279
                        echo "\t\t\t\t\t\t\t<div class=\"product-big-list\">
\t\t\t\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t\t\t\t<div  class=\"item-inner\">
\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 283
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 283)) {
                            // line 284
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "special", [], "any", false, false, false, 284)) {
                                // line 285
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                                echo ($context["text_label_sale"] ?? null);
                                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 287
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 288
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 288)) {
                            // line 289
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "is_new", [], "any", false, false, false, 289)) {
                                // line 290
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                                echo ($context["text_label_new"] ?? null);
                                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 292
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 293
                        echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "href", [], "any", false, false, false, 293);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 294
                        if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 294) && twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rotator_image", [], "any", false, false, false, 294))) {
                            echo "<img class=\"img-r\" src=\"";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rotator_image", [], "any", false, false, false, 294);
                            echo "\" alt=\"";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 294);
                            echo "\" />";
                        }
                        // line 295
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "thumb", [], "any", false, false, false, 295);
                        echo "\" alt=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 295);
                        echo "\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 295);
                        echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                        // line 299
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "href", [], "any", false, false, false, 299);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 299);
                        echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 300
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 300)) {
                            // line 301
                            echo "\t\t\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "description", [], "any", false, false, false, 301);
                            echo "</p>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 303
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rating", [], "any", false, false, false, 303)) {
                            // line 304
                            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 306
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(range(1, 5));
                            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                // line 307
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if ((twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rating", [], "any", false, false, false, 307) == $context["i"])) {
                                    // line 308
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["class_r"] = ("rating" . $context["i"]);
                                    // line 309
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                    echo ($context["class_r"] ?? null);
                                    echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 311
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 312
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 315
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($context["use_catalog"] ?? null)) {
                            // line 316
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "price", [], "any", false, false, false, 316)) {
                                // line 317
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 318
                                if ( !twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "special", [], "any", false, false, false, 318)) {
                                    // line 319
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "price", [], "any", false, false, false, 319);
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 321
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "price", [], "any", false, false, false, 321);
                                    echo "</span><span class=\"price-new\">";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "special", [], "any", false, false, false, 321);
                                    echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 323
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "tax", [], "any", false, false, false, 323)) {
                                    // line 324
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                    echo ($context["text_tax"] ?? null);
                                    echo " ";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "tax", [], "any", false, false, false, 324);
                                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 326
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 328
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 329
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"actions-big\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 330
                        if (($context["use_catalog"] ?? null)) {
                            // line 331
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-cart\" type=\"button\" title=\"";
                            echo ($context["button_cart"] ?? null);
                            echo "\" onclick=\"cart.add('";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "product_id", [], "any", false, false, false, 331);
                            echo "');\"><span>";
                            echo ($context["button_cart"] ?? null);
                            echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 333
                        echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"owl-carousel owl-theme tab-pane list-type\">
\t\t\t\t\t\t\t";
                        // line 339
                        $context["count"] = 0;
                        // line 340
                        echo "\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 340));
                        $context['loop'] = [
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        ];
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 341
                            echo "\t\t\t\t\t\t\t";
                            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 341)) {
                                // line 342
                                echo "\t\t\t\t\t\t\t";
                                if (((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0)) {
                                    // line 343
                                    echo "\t\t\t\t\t\t\t<div class=\"row_items\">
\t\t\t\t\t\t\t";
                                }
                                // line 345
                                echo "\t\t\t\t\t\t\t";
                                $context["count"] = (($context["count"] ?? null) + 1);
                                // line 346
                                echo "\t\t\t\t\t\t\t<div class=\"product-layout product-customize ";
                                if ( !twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 346)) {
                                    echo ($context["class"] ?? null);
                                }
                                echo "\">
\t\t\t\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t\t\t\t<div  class=\"item-inner\">
\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t";
                                // line 350
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 350)) {
                                    // line 351
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 351)) {
                                        // line 352
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                                        echo ($context["text_label_sale"] ?? null);
                                        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 354
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 355
                                echo "\t\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 355)) {
                                    // line 356
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 356)) {
                                        // line 357
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                                        echo ($context["text_label_new"] ?? null);
                                        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 359
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 360
                                echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 360);
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 361
                                if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 361) && twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 361))) {
                                    echo "<img class=\"img-r\" src=\"";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 361);
                                    echo "\" alt=\"";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 361);
                                    echo "\" />";
                                }
                                // line 362
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 362);
                                echo "\" alt=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 362);
                                echo "\" title=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 362);
                                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"qv-button-container\">
\t\t\t\t\t\t\t\t\t\t\t";
                                // line 365
                                if (($context["use_quickview"] ?? null)) {
                                    // line 366
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" title=\"";
                                    echo ($context["button_quickview"] ?? null);
                                    echo "\" onclick=\"ocquickview.ajaxView('";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 366);
                                    echo "')\"><span>";
                                    echo ($context["button_quickview"] ?? null);
                                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 368
                                echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t<!-- ";
                                // line 371
                                if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 371)) {
                                    // line 372
                                    echo "\t\t\t\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                    // line 373
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 373);
                                    echo "\">";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 373);
                                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 375
                                echo " -->
\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                                // line 376
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 376);
                                echo "\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 376);
                                echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t";
                                // line 377
                                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 377)) {
                                    // line 378
                                    echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 380
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                        // line 381
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 381) == $context["i"])) {
                                            // line 382
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["class_r"] = ("rating" . $context["i"]);
                                            // line 383
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                            echo ($context["class_r"] ?? null);
                                            echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 385
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 386
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 389
                                echo "\t\t\t\t\t\t\t\t\t\t\t";
                                if (($context["use_catalog"] ?? null)) {
                                    // line 390
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 390)) {
                                        // line 391
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 392
                                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 392)) {
                                            // line 393
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 393);
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } else {
                                            // line 395
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 395);
                                            echo "</span><span class=\"price-new\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 395);
                                            echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 397
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 397)) {
                                            // line 398
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                            echo ($context["text_tax"] ?? null);
                                            echo " ";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 398);
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 400
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 402
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 403
                                echo "\t\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 403)) {
                                    // line 404
                                    echo "\t\t\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 404);
                                    echo "</p>
\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 406
                                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"item-hover\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"add-to-links\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"wishlist\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                // line 410
                                echo ($context["button_wishlist"] ?? null);
                                echo "\" onclick=\"wishlist.add('";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 410);
                                echo "');\"><span>";
                                echo ($context["button_wishlist"] ?? null);
                                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cart\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 413
                                if (($context["use_catalog"] ?? null)) {
                                    // line 414
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                    echo ($context["button_cart"] ?? null);
                                    echo "\" onclick=\"cart.add('";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 414);
                                    echo "');\"><span>";
                                    echo ($context["button_cart"] ?? null);
                                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 416
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"compare\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                // line 418
                                echo ($context["button_compare"] ?? null);
                                echo "\" onclick=\"compare.add('";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 418);
                                echo "');\"><span>";
                                echo ($context["button_compare"] ?? null);
                                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t\t\t\t";
                                // line 424
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 424)) {
                                    echo "<div id=\"Countdown";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 424);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "\" class=\"box-timer\"></div> ";
                                }
                                // line 425
                                echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t\t\t\t";
                                // line 427
                                if ((twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 427) && twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 427))) {
                                    // line 428
                                    echo "\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\t\t\t\$('#Countdown";
                                    // line 430
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 430);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "').countdown({
\t\t\t\t\t\t\t\t\tuntil: new Date(";
                                    // line 431
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 431), "Y");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 431), "m");
                                    echo "-1, ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 431), "d");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 431), "H");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 431), "i");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 431), "s");
                                    echo "),
\t\t\t\t\t\t\t\t\tlabels: ['";
                                    // line 432
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
\t\t\t\t\t\t\t\t\tlabels1: ['";
                                    // line 433
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
\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t// \$('#Countdown";
                                    // line 435
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 435);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "').countdown('pause');
\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t";
                                }
                                // line 439
                                echo "\t\t\t\t\t\t\t</div><!-- product-layout -->
\t\t\t\t\t\t\t";
                                // line 440
                                if ((((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0) || (($context["count"] ?? null) == (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 440)) - 1)))) {
                                    // line 441
                                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                                }
                                // line 443
                                echo "\t\t\t\t\t\t\t";
                            }
                            // line 444
                            echo "\t\t\t\t\t\t\t";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        echo "\t\t\t\t  
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t";
                        // line 447
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 447)) {
                            // line 448
                            echo "\t\t\t\t\t  <script type=\"text/javascript\">
\t\t\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\t  \$('#tab-'+";
                            // line 450
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 450);
                            echo "+'-'+";
                            echo ($context["i"] ?? null);
                            echo "+' .list-type').owlCarousel({
\t\t\t\t\t\t\titems: ";
                            // line 451
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "items", [], "any", false, false, false, 451);
                            echo ",
\t\t\t\t\t\t\tloop: ";
                            // line 452
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "loop", [], "any", false, false, false, 452)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tmargin: ";
                            // line 453
                            if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 453) >= 0)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 453);
                                echo " ";
                            } else {
                                echo " 20 ";
                            }
                            echo ",
\t\t\t\t\t\t\tnav: ";
                            // line 454
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "navigation", [], "any", false, false, false, 454)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tdots: ";
                            // line 455
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "pagination", [], "any", false, false, false, 455)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tautoplay:  ";
                            // line 456
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "auto", [], "any", false, false, false, 456)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tautoplayTimeout: ";
                            // line 457
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 457)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 457);
                                echo " ";
                            } else {
                                echo " 2000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tautoplayHoverPause: true,
\t\t\t\t\t\t\tautoplaySpeed: ";
                            // line 459
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 459)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 459);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tnavSpeed: ";
                            // line 460
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 460)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 460);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tdotsSpeed: ";
                            // line 461
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 461)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 461);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tlazyLoad: true,
\t\t\t\t\t\t\tnavText : [''],
\t\t\t\t\t\t\tresponsive:{
\t\t\t\t\t\t\t\t0:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 466
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "smobile", [], "any", false, false, false, 466);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t481:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 469
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "mobile", [], "any", false, false, false, 469);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t769:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 472
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "tablet", [], "any", false, false, false, 472);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t1024:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 475
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "desktop", [], "any", false, false, false, 475);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t1200:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 478
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "items", [], "any", false, false, false, 478);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t}
\t\t\t\t\t\t  });
\t\t\t\t\t\t});
\t\t\t\t\t  </script>
\t\t\t\t\t";
                        }
                        // line 485
                        echo "\t\t\t\t\t";
                        $context["i"] = (($context["i"] ?? null) + 1);
                        // line 486
                        echo "\t\t\t\t";
                    } else {
                        // line 487
                        echo "\t\t\t\t\t<p class=\"text_empty\">";
                        echo ($context["text_empty"] ?? null);
                        echo "</p>
\t\t\t\t";
                    }
                    // line 489
                    echo "\t\t\t\t</div>
\t\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['octab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 491
            echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t  </div>
\t  </div>
\t</div>
</div>
";
        } else {
            // line 499
            echo "<!-- Other type -->
<div class=\"tt_tabsproduct_module ";
            // line 500
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "class", [], "any", false, false, false, 500);
            echo "\" id=\"product_module";
            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 500);
            echo "\">
\t\t<div class=\"module-title\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-3 col-sm-3 col-sms-12\">
\t\t\t\t\t<h2>
\t\t\t\t\t\t";
            // line 505
            if (twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 505)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 505)) {
                // line 506
                echo "\t\t\t\t\t\t  ";
                echo twig_get_attribute($this->env, $this->source, (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "title_lang", [], "any", false, false, false, 506)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e[($context["code"] ?? null)] ?? null) : null), "title", [], "any", false, false, false, 506);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 508
                echo "\t\t\t\t\t\t  ";
                echo ($context["heading_title"] ?? null);
                echo "
\t\t\t\t\t\t";
            }
            // line 510
            echo "\t\t\t\t\t</h2>
\t\t\t\t\t";
            // line 511
            if (($context["module_description"] ?? null)) {
                // line 512
                echo "\t\t\t\t\t\t<div class=\"module-description\">
\t\t\t\t\t\t  ";
                // line 513
                echo ($context["module_description"] ?? null);
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 516
            echo "\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-sms-12\">
\t\t\t\t\t<ul class=\"tab-heading nav nav-pills\">
\t\t\t\t\t\t  ";
            // line 519
            $context["i"] = 0;
            // line 520
            echo "\t\t\t\t\t\t  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["octabs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["octab"]) {
                // line 521
                echo "\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["octab"], "manufacturer_logo", [], "any", false, false, false, 521)) {
                    // line 522
                    echo "\t\t\t\t\t\t\t\t<li ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "class=\"active\"";
                    }
                    echo "><a data-toggle=\"pill\" href=\"#tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 522);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["octab"], "manufacturer_logo", [], "any", false, false, false, 522);
                    echo "\" alt=\"\"/></a></li>
\t\t\t\t\t\t   ";
                } else {
                    // line 524
                    echo "\t\t\t\t\t\t\t\t<li ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "class=\"active\"";
                    }
                    echo "><a data-toggle=\"pill\" href=\"#tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 524);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["octab"], "title", [], "any", false, false, false, 524);
                    echo "</a></li>
\t\t\t\t\t\t\t";
                }
                // line 526
                echo "\t\t\t\t\t\t\t";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 527
                echo "\t\t\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['octab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 528
            echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t  </div>
\t  ";
            // line 532
            if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 532) == 0)) {
                // line 533
                echo "\t\t";
                $context["class"] = "col-lg-2 col-md-2 col-sm-2 col-xs-12";
                // line 534
                echo "\t  ";
            } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 534) == 1)) {
                // line 535
                echo "\t\t";
                $context["class"] = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
                // line 536
                echo "\t  ";
            } elseif ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "nrow", [], "any", false, false, false, 536) == 2)) {
                // line 537
                echo "\t\t";
                $context["class"] = "col-lg-3 col-md-3 col-sm-3 col-xs-12";
                // line 538
                echo "\t  ";
            } else {
                // line 539
                echo "\t\t";
                $context["class"] = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
                // line 540
                echo "\t  ";
            }
            // line 541
            echo "\t  <div class=\"tt-product\">
\t\t<div class=\"tab-content\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-3 col-sm-12 col-sms-12\">
\t\t\t\t\t<div class=\"module-image\">
\t\t\t\t\t\t<img src=";
            // line 546
            echo ($context["thumb"] ?? null);
            echo " alt=\"\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-9 col-sm-12 col-sms-12\">
\t\t\t\t\t";
            // line 550
            $context["i"] = 0;
            // line 551
            echo "\t\t\t\t  
\t\t\t\t\t";
            // line 552
            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 552)) {
                // line 553
                echo "\t\t\t\t\t\t";
                $context["rows"] = twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "row", [], "any", false, false, false, 553);
                // line 554
                echo "\t\t\t\t\t";
            } else {
                // line 555
                echo "\t\t\t\t\t\t";
                $context["rows"] = 1;
                // line 556
                echo "\t\t\t\t\t";
            }
            echo "\t\t\t
\t\t\t\t\t";
            // line 557
            $context["break"] = false;
            // line 558
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["octabs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["octab"]) {
                if ( !($context["break"] ?? null)) {
                    echo "\t
\t\t\t\t\t
\t\t\t\t\t<div class=\"tab-container ";
                    // line 560
                    if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "type", [], "any", false, false, false, 560) != 2)) {
                        echo "owl-carousel owl-theme tab-pane fade";
                    }
                    echo " ";
                    if ((($context["i"] ?? null) == 0)) {
                        echo "active in";
                    }
                    echo "\" id=\"tab-";
                    echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 560);
                    echo "-";
                    echo ($context["i"] ?? null);
                    echo "\">
\t\t\t\t\t";
                    // line 561
                    if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 561)) > 0)) {
                        echo "\t
\t\t\t\t\t\t\t<div class=\"col-md-6 col-sm-12 col-sms-12\">
\t\t\t\t\t\t\t\t";
                        // line 563
                        $context["firstproduct"] = (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 563)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52[0] ?? null) : null);
                        // line 564
                        echo "\t\t\t\t\t\t\t\t<div class=\"product-big-container\">
\t\t\t\t\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t\t\t\t\t<div  class=\"item-inner\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 568
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 568)) {
                            // line 569
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "special", [], "any", false, false, false, 569)) {
                                // line 570
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                                echo ($context["text_label_sale"] ?? null);
                                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 572
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 573
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 573)) {
                            // line 574
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "is_new", [], "any", false, false, false, 574)) {
                                // line 575
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                                echo ($context["text_label_new"] ?? null);
                                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 577
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 578
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "href", [], "any", false, false, false, 578);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 579
                        if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 579) && twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rotator_image", [], "any", false, false, false, 579))) {
                            echo "<img class=\"img-r\" src=\"";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rotator_image", [], "any", false, false, false, 579);
                            echo "\" alt=\"";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 579);
                            echo "\" />";
                        }
                        // line 580
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "thumb", [], "any", false, false, false, 580);
                        echo "\" alt=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 580);
                        echo "\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 580);
                        echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                        // line 584
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "href", [], "any", false, false, false, 584);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "name", [], "any", false, false, false, 584);
                        echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 585
                        if (($context["use_catalog"] ?? null)) {
                            // line 586
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "price", [], "any", false, false, false, 586)) {
                                // line 587
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 588
                                if ( !twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "special", [], "any", false, false, false, 588)) {
                                    // line 589
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "price", [], "any", false, false, false, 589);
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 591
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "price", [], "any", false, false, false, 591);
                                    echo "</span><span class=\"price-new\">";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "special", [], "any", false, false, false, 591);
                                    echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 593
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "tax", [], "any", false, false, false, 593)) {
                                    // line 594
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                    echo ($context["text_tax"] ?? null);
                                    echo " ";
                                    echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "tax", [], "any", false, false, false, 594);
                                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 596
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 598
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 599
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rating", [], "any", false, false, false, 599)) {
                            // line 600
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 602
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(range(1, 5));
                            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                // line 603
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if ((twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "rating", [], "any", false, false, false, 603) == $context["i"])) {
                                    // line 604
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["class_r"] = ("rating" . $context["i"]);
                                    // line 605
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                    echo ($context["class_r"] ?? null);
                                    echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 607
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 608
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 610
                        echo "              
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 611
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 611)) {
                            // line 612
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "description", [], "any", false, false, false, 612);
                            echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 614
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"actions-big\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 615
                        if (($context["use_catalog"] ?? null)) {
                            // line 616
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-cart\" type=\"button\" title=\"";
                            echo ($context["button_cart"] ?? null);
                            echo "\" onclick=\"cart.add('";
                            echo twig_get_attribute($this->env, $this->source, ($context["firstproduct"] ?? null), "product_id", [], "any", false, false, false, 616);
                            echo "');\"><span>";
                            echo ($context["button_cart"] ?? null);
                            echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 618
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-md-6 col-sm-12 col-sms-12 owl-carousel owl-theme tab-pane other-type\">
\t\t\t\t\t\t\t\t";
                        // line 626
                        $context["count"] = 0;
                        // line 627
                        echo "\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 627));
                        $context['loop'] = [
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        ];
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 628
                            echo "\t\t\t\t\t\t\t\t";
                            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 628)) {
                                // line 629
                                echo "\t\t\t\t\t\t\t\t";
                                if (((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0)) {
                                    // line 630
                                    echo "\t\t\t\t\t\t\t\t<div class=\"row_items\">
\t\t\t\t\t\t\t\t";
                                }
                                // line 632
                                echo "\t\t\t\t\t\t\t\t";
                                $context["count"] = (($context["count"] ?? null) + 1);
                                // line 633
                                echo "\t\t\t\t\t\t\t\t<div class=\"product-layout product-customize ";
                                if ( !twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 633)) {
                                    echo ($context["class"] ?? null);
                                }
                                echo "\">
\t\t\t\t\t\t\t\t\t<div class=\"product-thumb transition\">
\t\t\t\t\t\t\t\t\t\t<div  class=\"item-inner\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 637
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "salelabel", [], "any", false, false, false, 637)) {
                                    // line 638
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 638)) {
                                        // line 639
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_sale\">";
                                        echo ($context["text_label_sale"] ?? null);
                                        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 641
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 642
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "newlabel", [], "any", false, false, false, 642)) {
                                    // line 643
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 643)) {
                                        // line 644
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label-product label_new\">";
                                        echo ($context["text_label_new"] ?? null);
                                        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 646
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 647
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 647);
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 648
                                if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "rotator", [], "any", false, false, false, 648) && twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 648))) {
                                    echo "<img class=\"img-r\" src=\"";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "rotator_image", [], "any", false, false, false, 648);
                                    echo "\" alt=\"";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 648);
                                    echo "\" />";
                                }
                                // line 649
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 649);
                                echo "\" alt=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 649);
                                echo "\" title=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 649);
                                echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"qv-button-container\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 652
                                if (($context["use_quickview"] ?? null)) {
                                    // line 653
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-quickview\" type=\"button\" title=\"";
                                    echo ($context["button_quickview"] ?? null);
                                    echo "\" onclick=\"ocquickview.ajaxView('";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 653);
                                    echo "')\"><span>";
                                    echo ($context["button_quickview"] ?? null);
                                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 655
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div><!-- image -->
\t\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t\t<!-- ";
                                // line 658
                                if (twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 658)) {
                                    // line 659
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"manufacture-product\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                    // line 660
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturers", [], "any", false, false, false, 660);
                                    echo "\">";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "manufacturer", [], "any", false, false, false, 660);
                                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 662
                                echo " -->
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"product-name\"><a href=\"";
                                // line 663
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 663);
                                echo "\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 663);
                                echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 664
                                if (twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 664)) {
                                    // line 665
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 667
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                        // line 668
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 668) == $context["i"])) {
                                            // line 669
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["class_r"] = ("rating" . $context["i"]);
                                            // line 670
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"";
                                            echo ($context["class_r"] ?? null);
                                            echo "\">rating</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 672
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 673
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 676
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (($context["use_catalog"] ?? null)) {
                                    // line 677
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 677)) {
                                        // line 678
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 679
                                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 679)) {
                                            // line 680
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 680);
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } else {
                                            // line 682
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 682);
                                            echo "</span><span class=\"price-new\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 682);
                                            echo "</span>\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 684
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 684)) {
                                            // line 685
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                            echo ($context["text_tax"] ?? null);
                                            echo " ";
                                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 685);
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 687
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 689
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 690
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "description", [], "any", false, false, false, 690)) {
                                    // line 691
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"product-des\">";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 691);
                                    echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 693
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item-hover\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"add-to-links\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"wishlist\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                // line 697
                                echo ($context["button_wishlist"] ?? null);
                                echo "\" onclick=\"wishlist.add('";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 697);
                                echo "');\"><span>";
                                echo ($context["button_wishlist"] ?? null);
                                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cart\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 700
                                if (($context["use_catalog"] ?? null)) {
                                    // line 701
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                    echo ($context["button_cart"] ?? null);
                                    echo "\" onclick=\"cart.add('";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 701);
                                    echo "');\"><span>";
                                    echo ($context["button_cart"] ?? null);
                                    echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 703
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"compare\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" title=\"";
                                // line 705
                                echo ($context["button_compare"] ?? null);
                                echo "\" onclick=\"compare.add('";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 705);
                                echo "');\"><span>";
                                echo ($context["button_compare"] ?? null);
                                echo "</span></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div><!-- caption -->
\t\t\t\t\t\t\t\t\t\t\t";
                                // line 711
                                if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 711)) {
                                    echo "<div id=\"Countdown";
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 711);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "\" class=\"box-timer\"></div> ";
                                }
                                // line 712
                                echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div><!-- product-thumb -->
\t\t\t\t\t\t\t\t\t\t";
                                // line 714
                                if ((twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 714) && twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "countdown", [], "any", false, false, false, 714))) {
                                    // line 715
                                    echo "\t\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\t\t\t\t\$('#Countdown";
                                    // line 717
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 717);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "').countdown({
\t\t\t\t\t\t\t\t\t\tuntil: new Date(";
                                    // line 718
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 718), "Y");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 718), "m");
                                    echo "-1, ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 718), "d");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 718), "H");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 718), "i");
                                    echo ", ";
                                    echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "date_end", [], "any", false, false, false, 718), "s");
                                    echo "),
\t\t\t\t\t\t\t\t\t\tlabels: ['";
                                    // line 719
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
\t\t\t\t\t\t\t\t\t\tlabels1: ['";
                                    // line 720
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
\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t// \$('#Countdown";
                                    // line 722
                                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 722);
                                    echo "-";
                                    echo ($context["i"] ?? null);
                                    echo "').countdown('pause');
\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 726
                                echo "\t\t\t\t\t\t\t\t</div><!-- product-layout -->
\t\t\t\t\t\t\t\t";
                                // line 727
                                if ((((($context["count"] ?? null) % ($context["rows"] ?? null)) == 0) || (($context["count"] ?? null) == (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["octab"], "products", [], "any", false, false, false, 727)) - 1)))) {
                                    // line 728
                                    echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                                }
                                // line 730
                                echo "\t\t\t\t\t\t\t\t";
                            }
                            // line 731
                            echo "\t\t\t\t\t\t\t\t";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 732
                        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t";
                        // line 733
                        if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "slider", [], "any", false, false, false, 733)) {
                            // line 734
                            echo "\t\t\t\t\t  <script type=\"text/javascript\">
\t\t\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\t  \$('#tab-'+";
                            // line 736
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "module_id", [], "any", false, false, false, 736);
                            echo "+'-'+";
                            echo ($context["i"] ?? null);
                            echo "+' .other-type').owlCarousel({
\t\t\t\t\t\t\titems: ";
                            // line 737
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "items", [], "any", false, false, false, 737);
                            echo ",
\t\t\t\t\t\t\tloop: ";
                            // line 738
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "loop", [], "any", false, false, false, 738)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tmargin: ";
                            // line 739
                            if ((twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 739) >= 0)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "margin", [], "any", false, false, false, 739);
                                echo " ";
                            } else {
                                echo " 20 ";
                            }
                            echo ",
\t\t\t\t\t\t\tnav: ";
                            // line 740
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "navigation", [], "any", false, false, false, 740)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tdots: ";
                            // line 741
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "pagination", [], "any", false, false, false, 741)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tautoplay:  ";
                            // line 742
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "auto", [], "any", false, false, false, 742)) {
                                echo " true ";
                            } else {
                                echo " false ";
                            }
                            echo ",
\t\t\t\t\t\t\tautoplayTimeout: ";
                            // line 743
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 743)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "time", [], "any", false, false, false, 743);
                                echo " ";
                            } else {
                                echo " 2000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tautoplayHoverPause: true,
\t\t\t\t\t\t\tautoplaySpeed: ";
                            // line 745
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 745)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 745);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tnavSpeed: ";
                            // line 746
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 746)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 746);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tdotsSpeed: ";
                            // line 747
                            if (twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 747)) {
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "speed", [], "any", false, false, false, 747);
                                echo " ";
                            } else {
                                echo " 3000 ";
                            }
                            echo ",
\t\t\t\t\t\t\tlazyLoad: true,
\t\t\t\t\t\t\tnavText : [''],
\t\t\t\t\t\t\tresponsive:{
\t\t\t\t\t\t\t\t0:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 752
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "smobile", [], "any", false, false, false, 752);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t481:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 755
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "mobile", [], "any", false, false, false, 755);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t769:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 758
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "tablet", [], "any", false, false, false, 758);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t1024:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 761
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "desktop", [], "any", false, false, false, 761);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t1200:{
\t\t\t\t\t\t\t\t\titems: ";
                            // line 764
                            echo twig_get_attribute($this->env, $this->source, ($context["config_module"] ?? null), "items", [], "any", false, false, false, 764);
                            echo "
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t}
\t\t\t\t\t\t  });
\t\t\t\t\t\t});
\t\t\t\t\t  </script>
\t\t\t\t\t";
                        }
                        // line 771
                        echo "\t\t\t\t\t";
                        $context["i"] = (($context["i"] ?? null) + 1);
                        // line 772
                        echo "\t\t\t\t";
                    } else {
                        // line 773
                        echo "\t\t\t\t\t<p class=\"text_empty\">";
                        echo ($context["text_empty"] ?? null);
                        echo "</p>
\t\t\t\t";
                    }
                    // line 775
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['octab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 777
            echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "tt_lazio6/template/extension/module/octabproducts.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2570 => 777,  2562 => 775,  2556 => 773,  2553 => 772,  2550 => 771,  2540 => 764,  2534 => 761,  2528 => 758,  2522 => 755,  2516 => 752,  2502 => 747,  2492 => 746,  2482 => 745,  2471 => 743,  2463 => 742,  2455 => 741,  2447 => 740,  2437 => 739,  2429 => 738,  2425 => 737,  2419 => 736,  2415 => 734,  2413 => 733,  2410 => 732,  2396 => 731,  2393 => 730,  2389 => 728,  2387 => 727,  2384 => 726,  2375 => 722,  2358 => 720,  2342 => 719,  2328 => 718,  2322 => 717,  2318 => 715,  2316 => 714,  2312 => 712,  2304 => 711,  2291 => 705,  2287 => 703,  2277 => 701,  2275 => 700,  2265 => 697,  2259 => 693,  2253 => 691,  2250 => 690,  2247 => 689,  2243 => 687,  2235 => 685,  2232 => 684,  2224 => 682,  2218 => 680,  2216 => 679,  2213 => 678,  2210 => 677,  2207 => 676,  2202 => 673,  2196 => 672,  2190 => 670,  2187 => 669,  2184 => 668,  2180 => 667,  2176 => 665,  2174 => 664,  2168 => 663,  2165 => 662,  2157 => 660,  2154 => 659,  2152 => 658,  2147 => 655,  2137 => 653,  2135 => 652,  2124 => 649,  2116 => 648,  2111 => 647,  2108 => 646,  2102 => 644,  2099 => 643,  2096 => 642,  2093 => 641,  2087 => 639,  2084 => 638,  2082 => 637,  2072 => 633,  2069 => 632,  2065 => 630,  2062 => 629,  2059 => 628,  2041 => 627,  2039 => 626,  2029 => 618,  2019 => 616,  2017 => 615,  2014 => 614,  2008 => 612,  2006 => 611,  2003 => 610,  1998 => 608,  1992 => 607,  1986 => 605,  1983 => 604,  1980 => 603,  1976 => 602,  1972 => 600,  1969 => 599,  1966 => 598,  1962 => 596,  1954 => 594,  1951 => 593,  1943 => 591,  1937 => 589,  1935 => 588,  1932 => 587,  1929 => 586,  1927 => 585,  1921 => 584,  1909 => 580,  1901 => 579,  1896 => 578,  1893 => 577,  1887 => 575,  1884 => 574,  1881 => 573,  1878 => 572,  1872 => 570,  1869 => 569,  1867 => 568,  1861 => 564,  1859 => 563,  1854 => 561,  1840 => 560,  1831 => 558,  1829 => 557,  1824 => 556,  1821 => 555,  1818 => 554,  1815 => 553,  1813 => 552,  1810 => 551,  1808 => 550,  1801 => 546,  1794 => 541,  1791 => 540,  1788 => 539,  1785 => 538,  1782 => 537,  1779 => 536,  1776 => 535,  1773 => 534,  1770 => 533,  1768 => 532,  1762 => 528,  1756 => 527,  1753 => 526,  1739 => 524,  1725 => 522,  1722 => 521,  1717 => 520,  1715 => 519,  1710 => 516,  1704 => 513,  1701 => 512,  1699 => 511,  1696 => 510,  1690 => 508,  1684 => 506,  1682 => 505,  1672 => 500,  1669 => 499,  1659 => 491,  1651 => 489,  1645 => 487,  1642 => 486,  1639 => 485,  1629 => 478,  1623 => 475,  1617 => 472,  1611 => 469,  1605 => 466,  1591 => 461,  1581 => 460,  1571 => 459,  1560 => 457,  1552 => 456,  1544 => 455,  1536 => 454,  1526 => 453,  1518 => 452,  1514 => 451,  1508 => 450,  1504 => 448,  1502 => 447,  1484 => 444,  1481 => 443,  1477 => 441,  1475 => 440,  1472 => 439,  1463 => 435,  1446 => 433,  1430 => 432,  1416 => 431,  1410 => 430,  1406 => 428,  1404 => 427,  1400 => 425,  1392 => 424,  1379 => 418,  1375 => 416,  1365 => 414,  1363 => 413,  1353 => 410,  1347 => 406,  1341 => 404,  1338 => 403,  1335 => 402,  1331 => 400,  1323 => 398,  1320 => 397,  1312 => 395,  1306 => 393,  1304 => 392,  1301 => 391,  1298 => 390,  1295 => 389,  1290 => 386,  1284 => 385,  1278 => 383,  1275 => 382,  1272 => 381,  1268 => 380,  1264 => 378,  1262 => 377,  1256 => 376,  1253 => 375,  1245 => 373,  1242 => 372,  1240 => 371,  1235 => 368,  1225 => 366,  1223 => 365,  1212 => 362,  1204 => 361,  1199 => 360,  1196 => 359,  1190 => 357,  1187 => 356,  1184 => 355,  1181 => 354,  1175 => 352,  1172 => 351,  1170 => 350,  1160 => 346,  1157 => 345,  1153 => 343,  1150 => 342,  1147 => 341,  1129 => 340,  1127 => 339,  1119 => 333,  1109 => 331,  1107 => 330,  1104 => 329,  1101 => 328,  1097 => 326,  1089 => 324,  1086 => 323,  1078 => 321,  1072 => 319,  1070 => 318,  1067 => 317,  1064 => 316,  1061 => 315,  1056 => 312,  1050 => 311,  1044 => 309,  1041 => 308,  1038 => 307,  1034 => 306,  1030 => 304,  1027 => 303,  1021 => 301,  1019 => 300,  1013 => 299,  1001 => 295,  993 => 294,  988 => 293,  985 => 292,  979 => 290,  976 => 289,  973 => 288,  970 => 287,  964 => 285,  961 => 284,  959 => 283,  953 => 279,  951 => 278,  947 => 277,  933 => 276,  924 => 274,  922 => 273,  917 => 272,  914 => 271,  911 => 270,  908 => 269,  906 => 268,  903 => 267,  901 => 266,  894 => 262,  887 => 257,  884 => 256,  881 => 255,  878 => 254,  875 => 253,  872 => 252,  869 => 251,  866 => 250,  863 => 249,  861 => 248,  856 => 245,  850 => 244,  847 => 243,  833 => 241,  819 => 239,  816 => 238,  811 => 237,  809 => 236,  803 => 232,  797 => 229,  794 => 228,  792 => 227,  789 => 226,  783 => 224,  777 => 222,  775 => 221,  767 => 218,  764 => 217,  762 => 216,  755 => 212,  751 => 210,  743 => 208,  737 => 206,  734 => 205,  731 => 204,  721 => 197,  715 => 194,  709 => 191,  703 => 188,  697 => 185,  683 => 180,  673 => 179,  663 => 178,  652 => 176,  644 => 175,  636 => 174,  628 => 173,  618 => 172,  610 => 171,  606 => 170,  600 => 169,  596 => 167,  594 => 166,  591 => 165,  577 => 164,  574 => 163,  570 => 161,  568 => 160,  565 => 159,  556 => 155,  539 => 153,  523 => 152,  509 => 151,  503 => 150,  499 => 148,  497 => 147,  493 => 145,  485 => 144,  472 => 138,  468 => 136,  458 => 134,  456 => 133,  446 => 130,  440 => 126,  434 => 124,  431 => 123,  428 => 122,  424 => 120,  416 => 118,  413 => 117,  405 => 115,  399 => 113,  397 => 112,  394 => 111,  391 => 110,  388 => 109,  383 => 106,  377 => 105,  371 => 103,  368 => 102,  365 => 101,  361 => 100,  357 => 98,  355 => 97,  349 => 96,  346 => 95,  338 => 93,  335 => 92,  333 => 91,  328 => 88,  318 => 86,  316 => 85,  305 => 82,  297 => 81,  292 => 80,  289 => 79,  283 => 77,  280 => 76,  277 => 75,  274 => 74,  268 => 72,  265 => 71,  263 => 70,  253 => 66,  250 => 65,  246 => 63,  243 => 62,  240 => 61,  222 => 60,  220 => 59,  215 => 57,  201 => 56,  192 => 54,  190 => 53,  185 => 52,  182 => 51,  179 => 50,  176 => 49,  174 => 48,  171 => 47,  169 => 46,  165 => 44,  162 => 43,  159 => 42,  156 => 41,  153 => 40,  150 => 39,  147 => 38,  144 => 37,  141 => 36,  139 => 35,  133 => 31,  127 => 30,  124 => 29,  110 => 27,  96 => 25,  93 => 24,  88 => 23,  86 => 22,  81 => 19,  75 => 16,  72 => 15,  70 => 14,  67 => 13,  61 => 11,  55 => 9,  53 => 8,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tt_lazio6/template/extension/module/octabproducts.twig", "");
    }
}
