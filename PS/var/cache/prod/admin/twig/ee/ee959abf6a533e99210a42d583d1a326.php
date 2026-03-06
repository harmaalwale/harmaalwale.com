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

/* @PrestaShop/Admin/Improve/Design/Theme/index.html.twig */
class __TwigTemplate_12778d66267eef261310e14bdc99f596 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 26
        $context["layoutHeaderToolbarBtn"] = ["add" => ["href" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_import"), "desc" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add new theme", [], "Admin.Design.Feature"), "icon" => "add_circle_outline"], "export" => ["href" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_export_current"), "desc" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Export current theme", [], "Admin.Design.Feature"), "icon" => "cloud_download"]];
        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", 25);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 39
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 40
        yield "  <div id=\"themes-logo-page\">

    ";
        // line 42
        if ( !($context["isSingleShopContext"] ?? null)) {
            // line 43
            yield "      <div class=\"alert alert-info\">
        <p class=\"alert-text\">
          ";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("You must select a shop from the above list if you wish to choose a theme.", [], "Admin.Design.Help"), "html", null, true);
            yield "
        </p>
      </div>
    ";
        }
        // line 49
        yield "
    ";
        // line 50
        if (($context["isInstalledRtlLanguage"] ?? null)) {
            // line 51
            yield "      ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig");
            yield "
    ";
        }
        // line 53
        yield "
    ";
        // line 54
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["shopLogosForm"] ?? null), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_upload_logos")]);
        yield "
    ";
        // line 55
        if ((( !($context["isInstalledRtlLanguage"] ?? null) && ($context["isSingleShopContext"] ?? null)) && ($context["isMultiShopFeatureUsed"] ?? null))) {
            // line 56
            yield "      ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Improve/Design/Theme/Blocks/multishop_switch.html.twig");
            yield "
    ";
        }
        // line 58
        yield "    <div class=\"card\">
      <div class=\"card-header\">
        ";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Logo", [], "Admin.Global"), "html", null, true);
        yield "
      </div>
      <div class=\"card-body logo-configuration-card-body\">
        ";
        // line 63
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Improve/Design/Theme/Blocks/logo_configuration.html.twig");
        yield "
      </div>
      <div class=\"card-footer\">
        <button class=\"btn btn-primary float-right\">
          ";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        yield "
        </button>
        <div class=\"clearfix\">&nbsp;</div>
      </div>
    </div>
    ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["shopLogosForm"] ?? null), 'rest');
        yield "
    ";
        // line 73
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["shopLogosForm"] ?? null), 'form_end');
        yield "

    <div class=\"card\">
      <div class=\"card-header\" data-role=\"theme-shop\">
        ";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("My theme for %name% shop", ["%name%" => ($context["shopName"] ?? null)], "Admin.Design.Feature"), "html", null, true);
        yield "
      </div>
      <div class=\"card-body\">
        <div class=\"row\">
          ";
        // line 81
        yield from $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", 81, "3908686")->unwrap()->yield(CoreExtension::merge($context, ["themeName" => CoreExtension::getAttribute($this->env, $this->source,         // line 82
($context["theme"] ?? null), "get", ["name"], "method", false, false, false, 82), "themeDisplayName" => CoreExtension::getAttribute($this->env, $this->source,         // line 83
($context["theme"] ?? null), "get", ["display_name"], "method", false, false, false, 83), "themeVersion" => CoreExtension::getAttribute($this->env, $this->source,         // line 84
($context["currentlyUsedTheme"] ?? null), "get", ["version"], "method", false, false, false, 84), "themeAuthor" => CoreExtension::getAttribute($this->env, $this->source,         // line 85
($context["currentlyUsedTheme"] ?? null), "get", ["author.name"], "method", false, false, false, 85), "themeAuthorUrl" => CoreExtension::getAttribute($this->env, $this->source,         // line 86
($context["theme"] ?? null), "get", ["author.url"], "method", false, false, false, 86), "themeFramework" => CoreExtension::getAttribute($this->env, $this->source,         // line 87
($context["theme"] ?? null), "get", ["meta.compatibility.framework"], "method", false, false, false, 87), "isActive" => true]));
        // line 100
        yield "
          ";
        // line 101
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["notUsedThemes"] ?? null))) {
            // line 102
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["notUsedThemes"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
                // line 103
                yield "              ";
                yield from $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", 103, "1370918013")->unwrap()->yield(CoreExtension::merge($context, ["themeName" => CoreExtension::getAttribute($this->env, $this->source,                 // line 104
$context["theme"], "get", ["name"], "method", false, false, false, 104), "themeDisplayName" => CoreExtension::getAttribute($this->env, $this->source,                 // line 105
$context["theme"], "get", ["display_name"], "method", false, false, false, 105), "themeVersion" => CoreExtension::getAttribute($this->env, $this->source,                 // line 106
$context["theme"], "get", ["version"], "method", false, false, false, 106), "themeAuthor" => CoreExtension::getAttribute($this->env, $this->source,                 // line 107
$context["theme"], "get", ["author.name"], "method", false, false, false, 107), "themeAuthorUrl" => CoreExtension::getAttribute($this->env, $this->source,                 // line 108
$context["theme"], "get", ["author.url"], "method", false, false, false, 108), "themeFramework" => CoreExtension::getAttribute($this->env, $this->source,                 // line 109
$context["theme"], "get", ["meta.compatibility.framework"], "method", false, false, false, 109), "isActive" => false]));
                // line 135
                yield "            ";
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
            unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            yield "          </div>

          ";
            // line 138
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Improve/Design/Theme/Blocks/use_theme_modal.html.twig");
            yield "
          ";
            // line 139
            yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Improve/Design/Theme/Blocks/delete_theme_modal.html.twig");
            yield "
        ";
        }
        // line 141
        yield "
        ";
        // line 142
        yield $this->extensions['PrestaShopBundle\Twig\HookExtension']->renderHook("displayAdminThemesListAfter", ["current_theme_name" => CoreExtension::getAttribute($this->env, $this->source, ($context["currentlyUsedTheme"] ?? null), "get", ["name"], "method", false, false, false, 142)]);
        yield "

        ";
        // line 144
        yield Twig\Extension\CoreExtension::include($this->env, $context, "@PrestaShop/Admin/Improve/Design/Theme/Blocks/layouts_configuration.html.twig");
        yield "
      </div>
    </div>

  </div>
";
        yield from [];
    }

    // line 151
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 152
        yield "  ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "

  <script src=\"";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("themes/new-theme/public/themes.bundle.js"), "html", null, true);
        yield "\"></script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig";
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
        return array (  247 => 154,  241 => 152,  234 => 151,  223 => 144,  218 => 142,  215 => 141,  210 => 139,  206 => 138,  202 => 136,  188 => 135,  186 => 109,  185 => 108,  184 => 107,  183 => 106,  182 => 105,  181 => 104,  179 => 103,  161 => 102,  159 => 101,  156 => 100,  154 => 87,  153 => 86,  152 => 85,  151 => 84,  150 => 83,  149 => 82,  148 => 81,  141 => 77,  134 => 73,  130 => 72,  122 => 67,  115 => 63,  109 => 60,  105 => 58,  99 => 56,  97 => 55,  93 => 54,  90 => 53,  84 => 51,  82 => 50,  79 => 49,  72 => 45,  68 => 43,  66 => 42,  62 => 40,  55 => 39,  50 => 25,  48 => 26,  41 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig");
    }
}


/* @PrestaShop/Admin/Improve/Design/Theme/index.html.twig */
class __TwigTemplate_12778d66267eef261310e14bdc99f596___3908686 extends Template
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
            'image' => [$this, 'block_image'],
            'button_container' => [$this, 'block_button_container'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 81
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", 81);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 90
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_image(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 91
        yield "              <img src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseShopUrl"] ?? null), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentlyUsedTheme"] ?? null), "get", ["preview"], "method", false, false, false, 91), "html", null, true);
        yield "\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentlyUsedTheme"] ?? null), "get", ["display_name"], "method", false, false, false, 91), "html", null, true);
        yield "\">
            ";
        yield from [];
    }

    // line 93
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_button_container(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 94
        yield "              <button class=\"btn action-button\">
                <i class=\"material-icons icon-current-theme\">done</i>
                ";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("My current theme", [], "Admin.Design.Feature"), "html", null, true);
        yield "
              </button>
            ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig";
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
        return array (  348 => 96,  344 => 94,  337 => 93,  326 => 91,  319 => 90,  308 => 81,  247 => 154,  241 => 152,  234 => 151,  223 => 144,  218 => 142,  215 => 141,  210 => 139,  206 => 138,  202 => 136,  188 => 135,  186 => 109,  185 => 108,  184 => 107,  183 => 106,  182 => 105,  181 => 104,  179 => 103,  161 => 102,  159 => 101,  156 => 100,  154 => 87,  153 => 86,  152 => 85,  151 => 84,  150 => 83,  149 => 82,  148 => 81,  141 => 77,  134 => 73,  130 => 72,  122 => 67,  115 => 63,  109 => 60,  105 => 58,  99 => 56,  97 => 55,  93 => 54,  90 => 53,  84 => 51,  82 => 50,  79 => 49,  72 => 45,  68 => 43,  66 => 42,  62 => 40,  55 => 39,  50 => 25,  48 => 26,  41 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig");
    }
}


/* @PrestaShop/Admin/Improve/Design/Theme/index.html.twig */
class __TwigTemplate_12778d66267eef261310e14bdc99f596___1370918013 extends Template
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
            'image' => [$this, 'block_image'],
            'button_container' => [$this, 'block_button_container'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 103
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", 103);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 112
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_image(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 113
        yield "                  <img src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseShopUrl"] ?? null), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["theme"] ?? null), "get", ["preview"], "method", false, false, false, 113), "html", null, true);
        yield "\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["theme"] ?? null), "get", ["display_name"], "method", false, false, false, 113), "html", null, true);
        yield "\">
                ";
        yield from [];
    }

    // line 115
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_button_container(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 116
        yield "                  <form action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_enable", ["themeName" => CoreExtension::getAttribute($this->env, $this->source, ($context["theme"] ?? null), "name", [], "any", false, false, false, 116)]), "html", null, true);
        yield "\" method=\"post\" class=\"d-inline\">
                    <input type=\"hidden\" name=\"token\" value=\"";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("enable-theme"), "html", null, true);
        yield "\"/>
                    <button type=\"button\" class=\"btn action-button js-display-use-theme-modal\" ";
        // line 118
        yield (((!($context["isSingleShopContext"] ?? null))) ? ("disabled") : (""));
        yield ">
                      <i class=\"material-icons\">
                        present_to_all
                      </i>
                      <span>";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Use this theme", [], "Admin.Design.Feature"), "html", null, true);
        yield "</span>
                    </button>
                  </form>
                  <form action=\"";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_themes_delete", ["themeName" => CoreExtension::getAttribute($this->env, $this->source, ($context["theme"] ?? null), "name", [], "any", false, false, false, 125)]), "html", null, true);
        yield "\" method=\"post\" class=\"d-inline\">
                    <input type=\"hidden\" name=\"token\" value=\"";
        // line 126
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete-theme"), "html", null, true);
        yield "\"/>
                    <button type=\"button\" class=\"btn delete-button js-display-delete-theme-modal\">
                      <i class=\"material-icons\">
                        delete
                      </i>
                    </button>
                  </form>
                ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig";
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
        return array (  472 => 126,  468 => 125,  462 => 122,  455 => 118,  451 => 117,  446 => 116,  439 => 115,  428 => 113,  421 => 112,  410 => 103,  348 => 96,  344 => 94,  337 => 93,  326 => 91,  319 => 90,  308 => 81,  247 => 154,  241 => 152,  234 => 151,  223 => 144,  218 => 142,  215 => 141,  210 => 139,  206 => 138,  202 => 136,  188 => 135,  186 => 109,  185 => 108,  184 => 107,  183 => 106,  182 => 105,  181 => 104,  179 => 103,  161 => 102,  159 => 101,  156 => 100,  154 => 87,  153 => 86,  152 => 85,  151 => 84,  150 => 83,  149 => 82,  148 => 81,  141 => 77,  134 => 73,  130 => 72,  122 => 67,  115 => 63,  109 => 60,  105 => 58,  99 => 56,  97 => 55,  93 => 54,  90 => 53,  84 => 51,  82 => 50,  79 => 49,  72 => 45,  68 => 43,  66 => 42,  62 => 40,  55 => 39,  50 => 25,  48 => 26,  41 => 25,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/index.html.twig", "/home1/harmakko/public_html/PS/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig");
    }
}
