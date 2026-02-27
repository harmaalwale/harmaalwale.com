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

/* @PrestaShop/Admin/Helpers/bootstrap_popup.html.twig */
class __TwigTemplate_00f66c76dbf8ddcd6a4b0816c3a468d0 extends Template
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
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "<div class=\"modal fade\" id=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "\" tabindex=\"-1\">
    <div class=\"modal-dialog ";
        // line 26
        if (array_key_exists("class", $context)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
        }
        yield "\">
        <div class=\"modal-content\">
            ";
        // line 28
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 36
        yield "
            ";
        // line 37
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 39
        yield "
            ";
        // line 40
        if (array_key_exists("progressbar", $context)) {
            // line 41
            yield "                <div class=\"modal-body\" id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["progressbar"] ?? null), "id", [], "any", false, false, false, 41), "html", null, true);
            yield "\">
                    <div class=\"float-right progress-details-text\" default-value=\"";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", false, false, false, 42), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))), "html", null, true);
            yield "\">
                        ";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", true, true, false, 43)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["progressbar"] ?? null), "label", [], "any", false, false, false, 43), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Processing...", [], "Admin.Global"))), "html", null, true);
            yield "
                    </div>
                    <div class=\"progress\" style=\"width: 100%\">
                        <div class=\"progress-bar progress-bar-striped\" role=\"progressbar\" style=\"width: 0%\">
                            <span>0 %</span>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 52
        yield "
            ";
        // line 53
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 77
        yield "        </div>
    </div>
</div>
<script>
    \$(function() {
        var closable = ";
        // line 82
        if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
            yield "true";
        } else {
            yield "false";
        }
        yield ";
        \$('#";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "').modal({
            backdrop: (closable ? true : 'static'),
            keyboard: closable,
            closable: closable,
            show: false
        });
    });
</script>
";
        yield from [];
    }

    // line 28
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 29
        yield "                ";
        if (array_key_exists("title", $context)) {
            // line 30
            yield "                    <div class=\"modal-header\">
                        <h4 class=\"modal-title\">";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
            yield "</h4>
                        ";
            // line 32
            if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
                yield "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
            }
            // line 33
            yield "                    </div>
                ";
        }
        // line 35
        yield "            ";
        yield from [];
    }

    // line 37
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 38
        yield "            ";
        yield from [];
    }

    // line 53
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 54
        yield "                ";
        if (array_key_exists("actions", $context)) {
            // line 55
            yield "                    <div class=\"modal-footer\">
                        ";
            // line 56
            if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
                // line 57
                yield "                            <button type=\"button\" class=\"btn btn-outline-secondary btn-lg\" data-dismiss=\"modal\">
                              ";
                // line 58
                if (array_key_exists("closeLabel", $context)) {
                    // line 59
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["closeLabel"] ?? null), "html", null, true);
                    yield "
                              ";
                } else {
                    // line 61
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Close", [], "Admin.Actions"), "html", null, true);
                    yield "
                              ";
                }
                // line 63
                yield "                            </button>
                        ";
            }
            // line 65
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["actions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 66
                yield "                            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "type", [], "any", true, true, false, 66) && (CoreExtension::getAttribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 66) == "link"))) {
                    // line 67
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "href", [], "any", true, true, false, 67)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "href", [], "any", false, false, false, 67), "#")) : ("#")), "html", null, true);
                    yield "\" class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "class", [], "any", true, true, false, 67)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "class", [], "any", false, false, false, 67), "btn")) : ("btn")), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "label", [], "any", true, true, false, 67)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "label", [], "any", false, false, false, 67), "Label is missing")) : ("Label is missing")), "html", null, true);
                    yield "</a>
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 68
$context["action"], "type", [], "any", true, true, false, 68) && (CoreExtension::getAttribute($this->env, $this->source, $context["action"], "type", [], "any", false, false, false, 68) == "button"))) {
                    // line 69
                    yield "                                <button type=\"button\" value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "value", [], "any", true, true, false, 69)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "value", [], "any", false, false, false, 69), "")) : ("")), "html", null, true);
                    yield "\" class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "class", [], "any", true, true, false, 69)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "class", [], "any", false, false, false, 69), "btn")) : ("btn")), "html", null, true);
                    yield "\">
                                    ";
                    // line 70
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["action"], "label", [], "any", true, true, false, 70)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["action"], "label", [], "any", false, false, false, 70), "Label is missing")) : ("Label is missing")), "html", null, true);
                    yield "
                                </button>
                            ";
                }
                // line 73
                yield "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            yield "                    </div>
                ";
        }
        // line 76
        yield "            ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig";
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
        return array (  244 => 76,  240 => 74,  234 => 73,  228 => 70,  221 => 69,  219 => 68,  210 => 67,  207 => 66,  202 => 65,  198 => 63,  192 => 61,  186 => 59,  184 => 58,  181 => 57,  179 => 56,  176 => 55,  173 => 54,  166 => 53,  161 => 38,  154 => 37,  149 => 35,  145 => 33,  141 => 32,  137 => 31,  134 => 30,  131 => 29,  124 => 28,  110 => 83,  102 => 82,  95 => 77,  93 => 53,  90 => 52,  78 => 43,  74 => 42,  69 => 41,  67 => 40,  64 => 39,  62 => 37,  59 => 36,  57 => 28,  50 => 26,  45 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Helpers/bootstrap_popup.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Helpers/bootstrap_popup.html.twig");
    }
}
