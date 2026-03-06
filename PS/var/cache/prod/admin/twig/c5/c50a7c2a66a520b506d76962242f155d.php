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

/* @PrestaShop/Admin/Module/Includes/modal_confirm.html.twig */
class __TwigTemplate_bd64e8cc581651f2012217e51b18bfd4 extends Template
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
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 25), "urls", [], "any", false, false, false, 25)) >= 1)) {
            // line 26
            yield "  ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 26), "urls", [], "any", false, false, false, 26));
            foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                // line 27
                yield "    ";
                if (CoreExtension::inFilter($context["module_action"], ["disable", "uninstall", "reset"])) {
                    // line 28
                    yield "      <div id=\"module-modal-confirm-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 28), "name", [], "any", false, false, false, 28), "html", null, true);
                    yield "-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["module_action"], "html", null, true);
                    yield "\" class=\"modal modal-vcenter fade\" role=\"dialog\">
        <div class=\"modal-dialog\">
          <!-- Modal content-->
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h4 class=\"modal-title module-modal-title\">
                ";
                    // line 34
                    if (($context["module_action"] == "disable")) {
                        // line 35
                        yield "                  ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Disable module?", [], "Admin.Modules.Feature"), "html", null, true);
                        yield "
                ";
                    }
                    // line 37
                    yield "                ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 38
                        yield "                  ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uninstall module?", [], "Admin.Modules.Feature"), "html", null, true);
                        yield "
                ";
                    }
                    // line 40
                    yield "                ";
                    if (($context["module_action"] == "reset")) {
                        // line 41
                        yield "                  ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset module?", [], "Admin.Modules.Feature"), "html", null, true);
                        yield "
                ";
                    }
                    // line 43
                    yield "              </h4>
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>
            <div class=\"modal-body\">
              <p>
                ";
                    // line 50
                    if (($context["module_action"] == "disable")) {
                        // line 51
                        yield "                  ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You are about to disable %moduleName% module.", ["%moduleName%" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 51), "displayName", [], "any", false, false, false, 51)], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                  <br>
                  <br>
                  ";
                        // line 54
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Your current settings will be saved, but the module will no longer be active.", [], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                ";
                    }
                    // line 56
                    yield "                ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 57
                        yield "                  ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You are about to uninstall %moduleName% module.", ["%moduleName%" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 57), "displayName", [], "any", false, false, false, 57)], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                  <br>
                  ";
                        // line 59
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 59), "confirmUninstall", [], "any", false, false, false, 59), "html", null, true);
                        yield "
                  <br>
                  <br>
                  ";
                        // line 62
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This will disable the module and delete all its files. For good.", [], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                  <br>
                  <label>
                    <input type=\"checkbox\" id=\"force_deletion\" name=\"force_deletion\" data-tech-name=\"";
                        // line 65
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 65), "name", [], "any", false, false, false, 65), "html", null, true);
                        yield "\">
                    ";
                        // line 66
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Optional: delete module folder after uninstall.", [], "Admin.Modules.Feature"), "html", null, true);
                        yield "
                  </label>
                  <br>
                  <span class=\"italic red\">
                    ";
                        // line 70
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This action cannot be undone.", [], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                  </span>
                ";
                    }
                    // line 73
                    yield "                ";
                    if (($context["module_action"] == "reset")) {
                        // line 74
                        yield "                  ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You're about to reset %moduleName% module.", ["%moduleName%" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 74), "displayName", [], "any", false, false, false, 74)], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                  <br>
                  <br>
                  ";
                        // line 77
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This will restore the defaults settings.", [], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                  <br>
                  <span class=\"italic red\">
                    ";
                        // line 80
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("This action cannot be undone.", [], "Admin.Modules.Notification"), "html", null, true);
                        yield "
                  </span>
                ";
                    }
                    // line 83
                    yield "              </p>
            </div>
            <div class=\"modal-footer\">
              <input type=\"button\" class=\"btn btn-outline-secondary\" data-dismiss=\"modal\" value=\"";
                    // line 86
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
                    yield "\"/>
              ";
                    // line 87
                    if (($context["module_action"] == "disable")) {
                        // line 88
                        yield "                <a class=\"btn btn-primary uppercase module_action_modal_";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["module_action"], "html", null, true);
                        yield "\" href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["module_url"], "html", null, true);
                        yield "\"
                data-dismiss=\"modal\" data-tech-name=\"";
                        // line 89
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 89), "name", [], "any", false, false, false, 89), "html", null, true);
                        yield "\">
                  ";
                        // line 90
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Yes, disable it", [], "Admin.Modules.Feature"), "html", null, true);
                        yield "
                </a>
              ";
                    }
                    // line 93
                    yield "              ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 94
                        yield "                <a class=\"btn btn-primary uppercase module_action_modal_";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["module_action"], "html", null, true);
                        yield "\" href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["module_url"], "html", null, true);
                        yield "\"
                data-dismiss=\"modal\" data-tech-name=\"";
                        // line 95
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 95), "name", [], "any", false, false, false, 95), "html", null, true);
                        yield "\">
                  ";
                        // line 96
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Yes, uninstall it", [], "Admin.Modules.Feature"), "html", null, true);
                        yield "
                </a>
              ";
                    }
                    // line 99
                    yield "              ";
                    if (($context["module_action"] == "reset")) {
                        // line 100
                        yield "                <a class=\"btn btn-primary uppercase module_action_modal_";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["module_action"], "html", null, true);
                        yield "\" href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["module_url"], "html", null, true);
                        yield "\"
                data-dismiss=\"modal\" data-tech-name=\"";
                        // line 101
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 101), "name", [], "any", false, false, false, 101), "html", null, true);
                        yield "\">
                  ";
                        // line 102
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Yes, reset it", [], "Admin.Modules.Feature"), "html", null, true);
                        yield "
                </a>
              ";
                    }
                    // line 105
                    yield "            </div>
          </div>
        </div>
      </div>
    ";
                }
                // line 110
                yield "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['module_action'], $context['module_url'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig";
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
        return array (  248 => 110,  241 => 105,  235 => 102,  231 => 101,  224 => 100,  221 => 99,  215 => 96,  211 => 95,  204 => 94,  201 => 93,  195 => 90,  191 => 89,  184 => 88,  182 => 87,  178 => 86,  173 => 83,  167 => 80,  161 => 77,  154 => 74,  151 => 73,  145 => 70,  138 => 66,  134 => 65,  128 => 62,  122 => 59,  116 => 57,  113 => 56,  108 => 54,  101 => 51,  99 => 50,  90 => 43,  84 => 41,  81 => 40,  75 => 38,  72 => 37,  66 => 35,  64 => 34,  52 => 28,  49 => 27,  44 => 26,  42 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_confirm.html.twig");
    }
}
