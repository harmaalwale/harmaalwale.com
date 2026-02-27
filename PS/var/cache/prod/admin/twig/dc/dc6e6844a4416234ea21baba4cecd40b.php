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

/* @PrestaShop/Admin/Module/Includes/dropdown_status.html.twig */
class __TwigTemplate_403290c1f37f882a6ada1a2037c389b9 extends Template
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
        yield "<div class=\"ps-dropdown dropdown btn-group bordered\">
    <div class=\"dropdown-label\" id=\"module-status-dropdown\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" data-flip=\"false\">
        <span class=\"js-selected-item selected-item module-status-selector-label\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Show all modules", [], "Admin.Modules.Feature"), "html", null, true);
        yield "</span>
        <i class=\"material-icons arrow-down float-right\">keyboard_arrow_down</i>
    </div>

    <div class=\"ps-dropdown-menu dropdown-menu items-list js-items-list module-status-selector\" aria-labelledby=\"module-status-dropdown\">
        <a class=\"dropdown-item module-status-reset\">
            ";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Show all modules", [], "Admin.Modules.Feature"), "html", null, true);
        yield "
        </a>

        <a class=\"dropdown-item module-status-menu\" data-status-ref=\"1\">
            ";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enabled modules", [], "Admin.Modules.Feature"), "html", null, true);
        yield "
        </a>

        <a class=\"dropdown-item module-status-menu\" data-status-ref=\"0\">
            ";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Disabled modules", [], "Admin.Modules.Feature"), "html", null, true);
        yield "
        </a>

        <a class=\"dropdown-item module-status-menu\" data-status-ref=\"2\">
          ";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uninstalled modules", [], "Admin.Modules.Feature"), "html", null, true);
        yield "
        </a>

        <a class=\"dropdown-item module-status-menu\" data-status-ref=\"3\">
          ";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Installed modules", [], "Admin.Modules.Feature"), "html", null, true);
        yield "
        </a>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/Includes/dropdown_status.html.twig";
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
        return array (  83 => 49,  76 => 45,  69 => 41,  62 => 37,  55 => 33,  46 => 27,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/dropdown_status.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/dropdown_status.html.twig");
    }
}
