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

/* @PrestaShop/Admin/Module/manage.html.twig */
class __TwigTemplate_799573e2e05ba83ada8c05bc9ba2a6ff extends Template
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

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'catalog_categories_listing' => [$this, 'block_catalog_categories_listing'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 25
        return "@PrestaShop/Admin/Module/common.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Module/common.html.twig", "@PrestaShop/Admin/Module/manage.html.twig", 25);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "  <div class=\"row justify-content-center\">
    <div class=\"col-xl-10\">
      ";
        // line 31
        yield "      ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/modal_confirm_bulk_action.html.twig");
        yield "
      ";
        // line 33
        yield "      ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/modal_import.html.twig", ["level" => ($context["level"] ?? null), "errorMessage" => ($context["errorMessage"] ?? null)]);
        yield "
      ";
        // line 35
        yield "      ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/menu_top.html.twig", ["topMenuData" => ($context["topMenuData"] ?? null), "bulkActions" => ($context["bulkActions"] ?? null)]);
        yield "

      ";
        // line 37
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/grid_manage_recently_used.html.twig", ["display_type" => "list", "origin" => "manage"]);
        yield "

      ";
        // line 39
        yield from $this->unwrap()->yieldBlock('catalog_categories_listing', $context, $blocks);
        // line 51
        yield "    </div>
  </div>
";
        yield from [];
    }

    // line 39
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_catalog_categories_listing(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 40
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["categories"] ?? null), "subMenu", [], "any", false, false, false, 40));
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
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 41
            yield "          ";
            if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "modules", [], "any", false, false, false, 41))) {
                // line 42
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/grid_manage_empty.html.twig", ["category" => $context["category"], "display_type" => "list", "origin" => "manage"]);
                yield "
          ";
            } else {
                // line 44
                yield "            <div class=\"module-short-list\">
              <span id=\"";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "refMenu", [], "any", false, false, false, 45), "html", null, true);
                yield "_modules\" class=\"module-search-result-title\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 45), [], "Admin.Modules.Feature"), "html", null, true);
                yield "</span>
              ";
                // line 46
                yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/grid_manage_installed.html.twig", ["modules" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "modules", [], "any", false, false, false, 46), "display_type" => "list", "origin" => "manage", "id" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "refMenu", [], "any", false, false, false, 46)]);
                yield "
            </div>
          ";
            }
            // line 49
            yield "        ";
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
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        yield "      ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/manage.html.twig";
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
        return array (  156 => 50,  142 => 49,  136 => 46,  130 => 45,  127 => 44,  121 => 42,  118 => 41,  100 => 40,  93 => 39,  86 => 51,  84 => 39,  79 => 37,  73 => 35,  68 => 33,  63 => 31,  59 => 28,  52 => 27,  41 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/manage.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/manage.html.twig");
    }
}
