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

/* @PrestaShop/Admin/Module/Includes/card_list.html.twig */
class __TwigTemplate_10ea8fc9339dbc37a73358a566db9caf extends Template
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
            'addon_version' => [$this, 'block_addon_version'],
            'addon_description' => [$this, 'block_addon_description'],
            'addon_additional_description' => [$this, 'block_addon_additional_description'],
            'module_actions' => [$this, 'block_module_actions'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        $context["isModuleActive"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "database", [], "any", false, true, false, 25), "active", [], "any", true, true, false, 25)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "database", [], "any", false, false, false, 25), "active", [], "any", false, false, false, 25), "0")) : ("0"));
        // line 26
        yield "
<div
  class=\"module-item module-item-list col-md-12 ";
        // line 28
        if (((($context["origin"] ?? null) == "manage") && (($context["isModuleActive"] ?? null) == "0"))) {
            yield "module-item-list-isNotActive";
        }
        yield "\"
  data-id=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 29), "id", [], "any", false, false, false, 29), "html", null, true);
        yield "\"
  data-name=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 30), "displayName", [], "any", false, false, false, 30), "html", null, true);
        yield "\"
  data-scoring=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 31), "avgRate", [], "any", false, false, false, 31), "html", null, true);
        yield "\"
  data-logo=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 32), "img", [], "any", false, false, false, 32), "html", null, true);
        yield "\"
  data-author=\"";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 33), "author", [], "any", false, false, false, 33), "html", null, true);
        yield "\"
  data-version=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 34), "version", [], "any", false, false, false, 34), "html", null, true);
        yield "\"
  data-description=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 35), "description", [], "any", false, false, false, 35), "html", null, true);
        yield "\"
  data-tech-name=\"";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 36), "name", [], "any", false, false, false, 36), "html", null, true);
        yield "\"
  data-child-categories=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 37), "categoryName", [], "any", false, false, false, 37), "html", null, true);
        yield "\"
  data-categories=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["category"] ?? null), "html", null, true);
        yield "\"
  data-type=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 39), "productType", [], "any", false, false, false, 39), "html", null, true);
        yield "\"
  data-price=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 40), "price", [], "any", false, false, false, 40), "raw", [], "any", false, false, false, 40), "html", null, true);
        yield "\"
  data-active=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["isModuleActive"] ?? null), "html", null, true);
        yield "\"
  data-installed=\"";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "database", [], "any", false, true, false, 42), "installed", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "database", [], "any", false, false, false, 42), "installed", [], "any", false, false, false, 42), "0")) : ("0")), "html", null, true);
        yield "\"
  data-last-access=\"";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "database", [], "any", false, false, false, 43), "last_access_date", [], "any", false, false, false, 43), "html", null, true);
        yield "\"
>
  <div class=\"container-fluid\">
    <div class=\"module-item-wrapper-list row\">
      <div class=\"col-lg-1 text-sm-center\">
        <div class=\"module-logo-thumb-list\">
          <img src=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 49), "img", [], "any", false, false, false, 49), "html", null, true);
        yield "\" class=\"text-md-center\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 49), "displayName", [], "any", false, false, false, 49), "html", null, true);
        yield "\"/>
        </div>
      </div>
      <div class=\"col-lg-11 row\">
        <div class=\"col-md-10 col-lg-11\">
          <h3
            class=\"text-ellipsis module-name-list\"
            data-toggle=\"pstooltip\"
            data-placement=\"top\"
            title=\"";
        // line 58
        yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 58), "displayName", [], "any", false, false, false, 58);
        yield "\"
          >
            ";
        // line 60
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 60), "displayName", [], "any", false, false, false, 60)) {
            // line 61
            yield "              ";
            yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 61), "displayName", [], "any", false, false, false, 61);
            yield "

            ";
        } else {
            // line 64
            yield "              ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 64), "name", [], "any", false, false, false, 64), "html", null, true);
            yield "
            ";
        }
        // line 66
        yield "          </h3>
        </div>
        <div class=\"col-md-2\">
          <div class=\"text-ellipsis small-text\">
            ";
        // line 70
        yield from $this->unwrap()->yieldBlock('addon_version', $context, $blocks);
        // line 77
        yield "          </div>
          <div>
            ";
        // line 79
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, true, false, 79), "urls", [], "any", false, true, false, 79), "upgrade", [], "any", true, true, false, 79)) {
            // line 80
            yield "                <span class=\"badge badge-success my-1\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upgrade available", [], "Admin.Modules.Feature"), "html", null, true);
            yield "</span>
            ";
        }
        // line 82
        yield "          </div>
        </div>
        <div class=\"col-md-8 col-lg-7 scroll-300\">
          ";
        // line 85
        yield from $this->unwrap()->yieldBlock('addon_description', $context, $blocks);
        // line 91
        yield "          ";
        yield from $this->unwrap()->yieldBlock('addon_additional_description', $context, $blocks);
        // line 96
        yield "        </div>
        <div class=\"col-lg-3 text-md-right\">
          ";
        // line 98
        yield from $this->unwrap()->yieldBlock('module_actions', $context, $blocks);
        // line 109
        yield "        </div>
        ";
        // line 110
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/modal_confirm.html.twig", ["module" => ($context["module"] ?? null)]);
        yield "
      </div>
    </div>
  </div>
</div>
";
        yield from [];
    }

    // line 70
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_addon_version(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 71
        yield "              ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 71), "productType", [], "any", false, false, false, 71) == "service")) {
            // line 72
            yield "                ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Service by %author%", ["%author%" => (("<b>" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 72), "author", [], "any", false, false, false, 72)) . "</b>")], "Admin.Modules.Feature");
            yield "
              ";
        } else {
            // line 74
            yield "                ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("v%version% - by %author%", ["%version%" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 74), "version", [], "any", false, false, false, 74), "%author%" => (("<b>" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 74), "author", [], "any", false, false, false, 74)) . "</b>")], "Admin.Modules.Feature");
            yield "
              ";
        }
        // line 76
        yield "            ";
        yield from [];
    }

    // line 85
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_addon_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 86
        yield "            ";
        yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 86), "description", [], "any", false, false, false, 86);
        yield "
            ";
        // line 87
        if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 87), "description", [], "any", false, false, false, 87)) > 0) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 87), "description", [], "any", false, false, false, 87)) < Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 87), "fullDescription", [], "any", false, false, false, 87))))) {
            // line 88
            yield "              ...
            ";
        }
        // line 90
        yield "          ";
        yield from [];
    }

    // line 91
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_addon_additional_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 92
        yield "            ";
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, true, false, 92), "additional_description", [], "any", true, true, false, 92)) {
            // line 93
            yield "              ";
            yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 93), "additional_description", [], "any", false, false, false, 93);
            yield "
            ";
        }
        // line 95
        yield "          ";
        yield from [];
    }

    // line 98
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_module_actions(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 99
        yield "            ";
        if ((array_key_exists("requireBulkActions", $context) && (($context["requireBulkActions"] ?? null) == true))) {
            // line 100
            yield "              <div class=\"module-checkbox-bulk-list md-checkbox\">
                <label>
                  <input type=\"checkbox\" data-name=\"";
            // line 102
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 102), "displayName", [], "any", false, false, false, 102), "html", null, true);
            yield "\" data-tech-name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["module"] ?? null), "attributes", [], "any", false, false, false, 102), "name", [], "any", false, false, false, 102), "html", null, true);
            yield "\" />
                  <i class=\"md-checkbox-control\"></i>
                </label>
              </div>
            ";
        }
        // line 107
        yield "            ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Module/Includes/action_menu.html.twig", ["module" => ($context["module"] ?? null)]);
        yield "
          ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Module/Includes/card_list.html.twig";
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
        return array (  302 => 107,  292 => 102,  288 => 100,  285 => 99,  278 => 98,  273 => 95,  267 => 93,  264 => 92,  257 => 91,  252 => 90,  248 => 88,  246 => 87,  241 => 86,  234 => 85,  229 => 76,  223 => 74,  217 => 72,  214 => 71,  207 => 70,  196 => 110,  193 => 109,  191 => 98,  187 => 96,  184 => 91,  182 => 85,  177 => 82,  171 => 80,  169 => 79,  165 => 77,  163 => 70,  157 => 66,  151 => 64,  144 => 61,  142 => 60,  137 => 58,  123 => 49,  114 => 43,  110 => 42,  106 => 41,  102 => 40,  98 => 39,  94 => 38,  90 => 37,  86 => 36,  82 => 35,  78 => 34,  74 => 33,  70 => 32,  66 => 31,  62 => 30,  58 => 29,  52 => 28,  48 => 26,  46 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Module/Includes/card_list.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_list.html.twig");
    }
}
