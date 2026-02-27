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

/* @PrestaShop/Admin/Module/Includes/modal_import.html.twig */
class __TwigTemplate_71ca5b233636b1677d9fef2920ba0021 extends Template
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
        yield "<div id=\"module-modal-import\" class=\"modal modal-vcenter fade\" role=\"dialog\" data-backdrop=\"static\" data-keyboard=\"false\">
  <div class=\"modal-dialog\">
    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h4 class=\"modal-title module-modal-title\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload a module", [], "Admin.Modules.Feature"), "html", null, true);
        yield "</h4>
        <button id=\"module-modal-import-closing-cross\" type=\"button\" class=\"close\">&times;</button>
      </div>
      <div class=\"modal-body\">
        ";
        // line 34
        if ((($context["level"] ?? null) <= Twig\Extension\CoreExtension::constant("PrestaShop\\PrestaShop\\Core\\Security\\Permission::LEVEL_UPDATE"))) {
            // line 35
            yield "          <div class=\"alert alert-danger\" role=\"alert\">
            <p class=\"alert-text\">
              ";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["errorMessage"] ?? null), "html", null, true);
            yield "
            </p>
          </div>
        ";
        } else {
            // line 41
            yield "          <form action=\"#\" class=\"dropzone\" id=\"importDropzone\">
            <div class=\"module-import-start\">
              <i class=\"module-import-start-icon material-icons\">cloud_upload</i><br/>
              <p class=\"module-import-start-main-text\">
                ";
            // line 45
            yield Twig\Extension\CoreExtension::replace($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Drop your module archive here or [1]select file[/1]", [], "Admin.Modules.Feature"), ["[1]" => "<a href=\"#\" class=\"module-import-start-select-manual\">", "[/1]" => "</a>"]);
            yield "
              </p>
              <p class=\"module-import-start-footer-text\">
                ";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Please upload one file at a time, .zip or tarball format (.tar, .tar.gz or .tgz).", [], "Admin.Modules.Help"), "html", null, true);
            yield "
                ";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Your module will be installed right after that.", [], "Admin.Modules.Help"), "html", null, true);
            yield "
              </p>
            </div>
            <div
              class=\"module-import-processing\">
              <!-- Loader -->
              <div class=\"spinner\"></div>
              <p class=\"module-import-processing-main-text\">";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Installing module...", [], "Admin.Modules.Notification"), "html", null, true);
            yield "</p>
              <p class=\"module-import-processing-footer-text\">
                ";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("It will close as soon as the module is installed. It won't be long!", [], "Admin.Modules.Notification"), "html", null, true);
            yield "
              </p>
            </div>
            <div class=\"module-import-success\">
              <i class=\"module-import-success-icon material-icons\">done</i><br/>
              <p class=\"module-import-success-msg\">";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Module installed!", [], "Admin.Modules.Notification"), "html", null, true);
            yield "</p>
              <p class=\"module-import-success-details\"></p>
              <a class=\"module-import-success-configure btn btn-primary\" href=\"#\">";
            // line 65
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configure", [], "Admin.Actions"), "html", null, true);
            yield "</a>
            </div>
            <div class=\"module-import-failure\">
              <i class=\"module-import-failure-icon material-icons\">error</i><br/>
              <p class=\"module-import-failure-msg\">";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Oops... Upload failed.", [], "Admin.Modules.Notification"), "html", null, true);
            yield "</p>
              <a href=\"#\" class=\"module-import-failure-details-action\">";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("What happened?", [], "Admin.Modules.Help"), "html", null, true);
            yield "</a>
              <div class=\"module-import-failure-details\"></div>
              <a class=\"module-import-failure-retry btn btn-secondary\" href=\"#\">";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Try again", [], "Admin.Actions"), "html", null, true);
            yield "</a>
            </div>
            <div class=\"module-import-confirm\"></div>
          </form>
        ";
        }
        // line 77
        yield "      </div>
      <div class=\"modal-footer\"></div>
    </div>
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
        return "@PrestaShop/Admin/Module/Includes/modal_import.html.twig";
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
        return array (  137 => 77,  129 => 72,  124 => 70,  120 => 69,  113 => 65,  108 => 63,  100 => 58,  95 => 56,  85 => 49,  81 => 48,  75 => 45,  69 => 41,  62 => 37,  58 => 35,  56 => 34,  49 => 30,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/modal_import.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_import.html.twig");
    }
}
