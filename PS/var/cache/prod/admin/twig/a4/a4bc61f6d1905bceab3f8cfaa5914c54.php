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

/* @PrestaShop/Admin/Module/Includes/action_menu.html.twig */
class __TwigTemplate_2104f65e7277fc388e57cec27ea16774 extends Template
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
 <div class=\"btn-group module-actions\">
  ";
        // line 27
        if (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 27), "urls", [], "any", false, false, false, 27))) {
            // line 28
            yield "    ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/action_button.html.twig", ["name" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 29
($context["module"] ?? null), "attributes", [], "any", false, false, false, 29), "name", [], "any", false, false, false, 29), "classes_form" => "btn-group form-action-button", "classes" => "btn btn-primary-reverse btn-outline-secondary", "url" => (($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 32
($context["module"] ?? null), "attributes", [], "any", false, false, false, 32), "urls", [], "any", false, false, false, 32)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 32), "url_active", [], "any", false, false, false, 32)] ?? null) : null), "action" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 33
($context["module"] ?? null), "attributes", [], "any", false, false, false, 33), "url_active", [], "any", false, false, false, 33), "label" => (($_v1 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 34
($context["module"] ?? null), "attributes", [], "any", false, false, false, 34), "urls_labels", [], "any", false, false, false, 34)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 34), "url_active", [], "any", false, false, false, 34)] ?? null) : null)]);
            // line 35
            yield "
    ";
            // line 36
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 36), "urls", [], "any", false, false, false, 36)) > 1)) {
                // line 37
                yield "        <input type=\"hidden\" class=\"btn\" />
        <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
          <span class=\"caret\"></span>
        </button>
        <span class=\"sr-only\">";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toggle dropdown", [], "Admin.Modules.Feature"), "html", null, true);
                yield "</span>
        <div class=\"dropdown-menu\">
          ";
                // line 43
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 43), "urls", [], "any", false, false, false, 43));
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
                foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                    // line 44
                    yield "            ";
                    if (($context["module_action"] != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 44), "url_active", [], "any", false, false, false, 44))) {
                        // line 45
                        yield "                <li>
                  ";
                        // line 46
                        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/action_button.html.twig", ["name" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 47
($context["module"] ?? null), "attributes", [], "any", false, false, false, 47), "name", [], "any", false, false, false, 47), "classes" => "dropdown-item", "url" =>                         // line 49
$context["module_url"], "action" =>                         // line 50
$context["module_action"], "label" => (($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                         // line 51
($context["module"] ?? null), "attributes", [], "any", false, false, false, 51), "urls_labels", [], "any", false, false, false, 51)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2[$context["module_action"]] ?? null) : null)]);
                        // line 52
                        yield "
                </li>
            ";
                    }
                    // line 55
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
                unset($context['_seq'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                yield "        </div>
    ";
            }
            // line 58
            yield "  ";
        }
        // line 59
        yield "</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/Includes/action_menu.html.twig";
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
        return array (  126 => 59,  123 => 58,  119 => 56,  105 => 55,  100 => 52,  98 => 51,  97 => 50,  96 => 49,  95 => 47,  94 => 46,  91 => 45,  88 => 44,  71 => 43,  66 => 41,  60 => 37,  58 => 36,  55 => 35,  53 => 34,  52 => 33,  51 => 32,  50 => 29,  48 => 28,  46 => 27,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/action_menu.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/action_menu.html.twig");
    }
}
