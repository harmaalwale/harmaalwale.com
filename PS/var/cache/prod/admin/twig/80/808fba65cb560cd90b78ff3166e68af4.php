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

/* @PrestaShop/Admin/Improve/Design/Cms/Blocks/breadcrumb.html.twig */
class __TwigTemplate_780e761e826aa36d3af737bb81d0188e extends Template
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
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["cmsPageView"] ?? null), "breadcrumb_tree", [], "any", false, false, false, 26))) {
            // line 27
            yield "  <div class=\"card\">
    <div class=\"card-body\">
      <nav>
        <ol class=\"breadcrumb\">
          ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["cmsPageView"] ?? null), "breadcrumb_tree", [], "any", false, false, false, 31));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 32
                yield "            <li class=\"breadcrumb-item\">
              ";
                // line 33
                $context["cmsPageRouteParameters"] = [];
                // line 34
                yield "
              ";
                // line 35
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "cmsPageCategoryId", [], "any", false, false, false, 35), "value", [], "any", false, false, false, 35) != CoreExtension::getAttribute($this->env, $this->source, ($context["cmsPageView"] ?? null), "root_category_id", [], "any", false, false, false, 35))) {
                    // line 36
                    yield "                ";
                    $context["cmsPageRouteParameters"] = ["id_cms_category" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["category"], "cmsPageCategoryId", [], "any", false, false, false, 36), "value", [], "any", false, false, false, 36)];
                    // line 37
                    yield "              ";
                }
                // line 38
                yield "
              <a href=\"";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cms_pages_index", ($context["cmsPageRouteParameters"] ?? null)), "html", null, true);
                yield "\">
                ";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 40), "html", null, true);
                yield "
              </a>
            </li>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "        </ol>
      </nav>
    </div>
  </div>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Cms/Blocks/breadcrumb.html.twig";
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
        return array (  90 => 44,  80 => 40,  76 => 39,  73 => 38,  70 => 37,  67 => 36,  65 => 35,  62 => 34,  60 => 33,  57 => 32,  53 => 31,  47 => 27,  45 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Cms/Blocks/breadcrumb.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Cms/Blocks/breadcrumb.html.twig");
    }
}
