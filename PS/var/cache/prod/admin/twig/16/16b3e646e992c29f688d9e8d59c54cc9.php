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

/* @PrestaShop/Admin/Module/Includes/menu_top.html.twig */
class __TwigTemplate_df748bd6603fb746c34af1b56bde1d3b extends Template
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
        yield "<div class=\"module-top-menu\">
  <div class=\"row\">
    <div class=\"col-md-8\">
      <div class=\"input-group\" id=\"search-input-group\">
        <input type=\"text\" id=\"module-search-bar\" class=\"form-control\">
        <div class=\"input-group-append\">
          <button class=\"btn btn-primary float-right search-button\" id=\"module-search-button\">
            <i class=\"material-icons\">search</i>
          </button>
        </div>
      </div>
    </div>
    <div class=\"col-md-4 module-menu-item\">
    </div>
  </div>

  <div class=\"row\">
    ";
        // line 42
        if (array_key_exists("topMenuData", $context)) {
            // line 43
            yield "      <div class=\"col-md-4 module-top-menu-item\">
        <h3>";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Category", [], "Admin.Catalog.Feature"), "html", null, true);
            yield "</h3>
        ";
            // line 45
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/dropdown_categories.html.twig", ["topMenuData" => ($context["topMenuData"] ?? null)]);
            yield "
      </div>
    ";
        }
        // line 48
        yield "
    ";
        // line 49
        if ((array_key_exists("requireFilterStatus", $context) && (($context["requireFilterStatus"] ?? null) == true))) {
            // line 50
            yield "      <div class=\"col-md-4 module-top-menu-item\">
        <h3>";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "Admin.Global"), "html", null, true);
            yield "</h3>
        ";
            // line 52
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/dropdown_status.html.twig");
            yield "
      </div>
    ";
        }
        // line 55
        yield "
    ";
        // line 56
        if (((($context["level"] ?? null) > Twig\Extension\CoreExtension::constant("PrestaShop\\PrestaShop\\Core\\Security\\Permission::LEVEL_UPDATE")) && array_key_exists("bulkActions", $context))) {
            // line 57
            yield "      <div class=\"col-md-4 module-top-menu-item disabled\">
        <h3>";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bulk Actions", [], "Admin.Global"), "html", null, true);
            yield "</h3>
        ";
            // line 59
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/dropdown_bulk.html.twig");
            yield "
      </div>
    ";
        }
        // line 62
        yield "  </div>
</div>

<hr class=\"top-menu-separator\"/>

";
        // line 67
        $context["js_translatable"] = Twig\Extension\CoreExtension::merge(["Search - placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Search modules: keyword, name, author...", [], "Admin.Modules.Help")],         // line 69
($context["js_translatable"] ?? null));
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/Includes/menu_top.html.twig";
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
        return array (  120 => 69,  119 => 67,  112 => 62,  106 => 59,  102 => 58,  99 => 57,  97 => 56,  94 => 55,  88 => 52,  84 => 51,  81 => 50,  79 => 49,  76 => 48,  70 => 45,  66 => 44,  63 => 43,  61 => 42,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/menu_top.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/menu_top.html.twig");
    }
}
