<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @PrestaShop/Admin/Common/Grid/Columns/Content/action.html.twig */
class __TwigTemplate_11a9b16c0a984d639218b7f42b66acac extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "
";
        // line 26
        $context["actions"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "options", [], "any", false, false, false, 26), "actions", [], "any", false, false, false, 26);
        // line 27
        yield "
";
        // line 28
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["actions"] ?? null))) {
            // line 29
            yield "    ";
            $context["inlineActions"] = [];
            // line 30
            yield "    ";
            $context["regularActions"] = [];
            // line 31
            yield "
    ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["actions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 33
                yield "      ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["action"], "isApplicable", [($context["record"] ?? null)], "method", false, false, false, 33)) {
                    // line 34
                    yield "        ";
                    if (((($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["action"], "options", [], "any", false, false, false, 34)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["use_inline_display"] ?? null) : null) == true)) {
                        // line 35
                        yield "            ";
                        $context["inlineActions"] = Twig\Extension\CoreExtension::merge(($context["inlineActions"] ?? null), [$context["action"]]);
                        // line 36
                        yield "          ";
                    } else {
                        // line 37
                        yield "            ";
                        $context["regularActions"] = Twig\Extension\CoreExtension::merge(($context["regularActions"] ?? null), [$context["action"]]);
                        // line 38
                        yield "        ";
                    }
                    // line 39
                    yield "      ";
                }
                // line 40
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            yield "
    <div class=\"btn-group-action text-right\">
      ";
            // line 43
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["inlineActions"] ?? null))) {
                // line 44
                yield "        <div class=\"btn-group btn-group-inline d-flex justify-content-start\">
          ";
                // line 45
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["inlineActions"] ?? null));
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
                foreach ($context['_seq'] as $context["_key"] => $context["inlineAction"]) {
                    // line 46
                    $context["class"] = ("dropdown-item inline-dropdown-item " . ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inlineAction"], "options", [], "any", false, true, false, 46), "attr", [], "any", false, true, false, 46), "class", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["inlineAction"], "options", [], "any", false, false, false, 46), "attr", [], "any", false, false, false, 46), "class", [], "any", false, false, false, 46), "")) : ("")));
                    // line 47
                    yield "
              ";
                    // line 48
                    yield Twig\Extension\CoreExtension::include($this->env, $context, (("@PrestaShop/Admin/Common/Grid/Actions/Row/" . CoreExtension::getAttribute($this->env, $this->source, $context["inlineAction"], "type", [], "any", false, false, false, 48)) . ".html.twig"), ["grid" =>                     // line 49
($context["grid"] ?? null), "column" =>                     // line 50
($context["column"] ?? null), "attributes" => ["class" => Twig\Extension\CoreExtension::trim(                    // line 51
($context["class"] ?? null)), "tooltip_name" => true], "record" =>                     // line 52
($context["record"] ?? null), "action" =>                     // line 53
$context["inlineAction"]]);
                    // line 54
                    yield "
          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['inlineAction'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                yield "        </div>
      ";
            }
            // line 58
            yield "
      ";
            // line 59
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["regularActions"] ?? null))) {
                // line 60
                yield "        <div class=\"btn-group\">
          ";
                // line 61
                [$context["skippedActions"], $context["isFirstRendered"]] =                 [0, false];
                // line 62
                yield "
          ";
                // line 64
                yield "          ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["regularActions"] ?? null));
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
                foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                    // line 65
                    yield "            ";
                    if ( !($context["isFirstRendered"] ?? null)) {
                        // line 66
                        yield "              ";
                        $context["skippedActions"] = (($context["skippedActions"] ?? null) + 1);
                        // line 67
                        yield "            ";
                    }
                    // line 68
                    yield "
            ";
                    // line 69
                    if ( !($context["isFirstRendered"] ?? null)) {
                        // line 70
                        yield "              ";
                        $context["class"] = ("dropdown-item " . ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "options", [], "any", false, true, false, 70), "attr", [], "any", false, true, false, 70), "class", [], "any", true, true, false, 70)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["action"], "options", [], "any", false, false, false, 70), "attr", [], "any", false, false, false, 70), "class", [], "any", false, false, false, 70), "")) : ("")));
                        // line 71
                        yield "
              ";
                        // line 72
                        yield Twig\Extension\CoreExtension::include($this->env, $context, (("@PrestaShop/Admin/Common/Grid/Actions/Row/" . CoreExtension::getAttribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 72)) . ".html.twig"), ["grid" =>                         // line 73
($context["grid"] ?? null), "column" =>                         // line 74
($context["column"] ?? null), "attributes" => ["class" => Twig\Extension\CoreExtension::trim(                        // line 75
($context["class"] ?? null)), "tooltip_name" => true], "record" =>                         // line 76
($context["record"] ?? null), "action" =>                         // line 77
$context["action"]]);
                        // line 78
                        yield "

              ";
                        // line 80
                        $context["isFirstRendered"] = true;
                        // line 81
                        yield "            ";
                    }
                    // line 82
                    yield "          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 83
                yield "
          ";
                // line 85
                yield "          ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["regularActions"] ?? null)) > ($context["skippedActions"] ?? null))) {
                    // line 86
                    yield "            <a class=\"btn btn-link dropdown-toggle dropdown-toggle-dots dropdown-toggle-split no-rotate\"
               data-toggle=\"dropdown\"
               aria-haspopup=\"true\"
               aria-expanded=\"false\"
            >
            </a>

            <div class=\"dropdown-menu dropdown-menu-right\">
              ";
                    // line 94
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["regularActions"] ?? null), ($context["skippedActions"] ?? null)));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                        // line 95
                        yield "                ";
                        yield Twig\Extension\CoreExtension::include($this->env, $context, (("@PrestaShop/Admin/Common/Grid/Actions/Row/" . CoreExtension::getAttribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 95)) . ".html.twig"), ["grid" =>                         // line 96
($context["grid"] ?? null), "column" =>                         // line 97
($context["column"] ?? null), "attributes" => ["class" => "dropdown-item", "tooltip_name" => false], "record" =>                         // line 99
($context["record"] ?? null), "action" =>                         // line 100
$context["action"]]);
                        // line 101
                        yield "
              ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 103
                    yield "            </div>
          ";
                }
                // line 105
                yield "        </div>
      ";
            }
            // line 107
            yield "    </div>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/action.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  293 => 107,  289 => 105,  285 => 103,  270 => 101,  268 => 100,  267 => 99,  266 => 97,  265 => 96,  263 => 95,  246 => 94,  236 => 86,  233 => 85,  230 => 83,  216 => 82,  213 => 81,  211 => 80,  207 => 78,  205 => 77,  204 => 76,  203 => 75,  202 => 74,  201 => 73,  200 => 72,  197 => 71,  194 => 70,  192 => 69,  189 => 68,  186 => 67,  183 => 66,  180 => 65,  162 => 64,  159 => 62,  157 => 61,  154 => 60,  152 => 59,  149 => 58,  145 => 56,  130 => 54,  128 => 53,  127 => 52,  126 => 51,  125 => 50,  124 => 49,  123 => 48,  120 => 47,  118 => 46,  101 => 45,  98 => 44,  96 => 43,  92 => 41,  86 => 40,  83 => 39,  80 => 38,  77 => 37,  74 => 36,  71 => 35,  68 => 34,  65 => 33,  61 => 32,  58 => 31,  55 => 30,  52 => 29,  50 => 28,  47 => 27,  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/action.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Columns/Content/action.html.twig");
    }
}
