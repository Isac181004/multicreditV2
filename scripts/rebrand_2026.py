from __future__ import annotations

import colorsys
import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
NEW_LOGO = "uploads/logo/20260904_232938_5c89c80d.png"

PALETTE = {
    "navy": "#0B1F3A",
    "navy_2": "#163A5F",
    "navy_dark": "#071525",
    "gray": "#6B7280",
    "gray_dark": "#374151",
    "gray_light": "#D1D5DB",
    "gray_xlight": "#F3F4F6",
    "white": "#FFFFFF",
    "black": "#0A0A0A",
}

THEME_CSS = r'''/* Multicredit 2026 · sistema visual corporativo
   Paleta permitida: azul marino, grises, blanco y negro. */
:root {
  --mc-navy: #0B1F3A;
  --mc-navy-2: #163A5F;
  --mc-navy-dark: #071525;
  --mc-gray: #6B7280;
  --mc-gray-dark: #374151;
  --mc-gray-light: #D1D5DB;
  --mc-gray-xlight: #F3F4F6;
  --mc-white: #FFFFFF;
  --mc-black: #0A0A0A;
  --mc-border: #D1D5DB;
  --mc-surface: #FFFFFF;
  --mc-surface-soft: #F3F4F6;
  --mc-text: #111827;
  --mc-muted: #6B7280;
  --mc-focus: #163A5F;
  --mc-shadow: 0 14px 36px rgba(7,21,37,.12);
  --mc-shadow-lg: 0 24px 60px rgba(7,21,37,.18);

  /* Alias heredados: conservamos nombres para no romper componentes existentes. */
  --mc-green: #0B1F3A;
  --mc-green-2: #163A5F;
  --mc-orange: #6B7280;
  --brand-green: #0B1F3A;
  --brand-green-dark: #071525;
  --brand-green-deep: #071525;
  --brand-orange: #6B7280;
}

html { color-scheme: light; }
body {
  background: #F3F4F6 !important;
  color: #111827 !important;
}

::selection { background: #163A5F; color: #FFFFFF; }

/* Accesibilidad de teclado */
:where(a, button, input, select, textarea, summary, [tabindex]):focus-visible {
  outline: 3px solid #163A5F !important;
  outline-offset: 3px !important;
}

/* Encabezado y navegación */
#main-header,
.mc-header,
.site-header,
header.main-header {
  background: rgba(11,31,58,.96) !important;
  border-color: rgba(255,255,255,.14) !important;
  color: #FFFFFF !important;
}
#main-header a,
#main-header button,
.mc-header a,
.site-header a { color: #FFFFFF !important; }
#main-header .mc-desktop-nav a::after,
#main-header .mc-credit-trigger::after { background: #D1D5DB !important; }
#main-header .mc-credit-trigger i,
#main-header .mc-credit-section-heading i,
#main-header .mc-credit-card > .fa-arrow-right { color: #6B7280 !important; }
#main-header .mc-credit-mega {
  background: #FFFFFF !important;
  border-color: #D1D5DB !important;
  border-top-color: #163A5F !important;
  box-shadow: var(--mc-shadow-lg) !important;
}
#main-header .mc-credit-mega-top {
  background: linear-gradient(120deg,#071525 0%,#0B1F3A 52%,#163A5F 100%) !important;
  color: #FFFFFF !important;
}
#main-header .mc-credit-mega-body { background: #F3F4F6 !important; }
#main-header .mc-credit-section-heading {
  background: #E5E7EB !important;
  color: #0B1F3A !important;
}
#main-header .mc-credit-card {
  background: #FFFFFF !important;
  border-color: #D1D5DB !important;
  color: #111827 !important;
  box-shadow: 0 7px 18px rgba(7,21,37,.08) !important;
}
#main-header .mc-credit-card strong { color: #0A0A0A !important; }
#main-header .mc-credit-card small { color: #6B7280 !important; }
#main-header .mc-credit-card-icon {
  background: #E5E7EB !important;
  color: #0B1F3A !important;
}
#main-header .mc-credit-card:hover {
  background: #F9FAFB !important;
  border-color: #163A5F !important;
  box-shadow: var(--mc-shadow) !important;
}
#main-header .mc-credit-card:hover .mc-credit-card-icon {
  background: #0B1F3A !important;
  color: #FFFFFF !important;
}
#main-header .mc-header-button,
#main-header .mc-credit-mega-all:hover {
  background: #FFFFFF !important;
  color: #0B1F3A !important;
  border: 1px solid #FFFFFF !important;
  box-shadow: none !important;
}
#main-header .mc-header-button:hover {
  background: #D1D5DB !important;
  color: #071525 !important;
}
#main-header .mc-mobile-toggle {
  background: rgba(255,255,255,.08) !important;
  border-color: rgba(255,255,255,.25) !important;
  color: #FFFFFF !important;
}
#mc-mobile-menu {
  background: #0B1F3A !important;
  border-color: #374151 !important;
  color: #FFFFFF !important;
}

/* Botones y llamadas a la acción */
:where(.btn-primary,.button-primary,.primary-btn,.mc-btn-primary,.cta-button,.hero-cta,.submit-btn,
       button[type="submit"],input[type="submit"],input[type="button"]) {
  background: #0B1F3A !important;
  border-color: #0B1F3A !important;
  color: #FFFFFF !important;
  box-shadow: 0 10px 24px rgba(7,21,37,.16) !important;
}
:where(.btn-primary,.button-primary,.primary-btn,.mc-btn-primary,.cta-button,.hero-cta,.submit-btn,
       button[type="submit"],input[type="submit"],input[type="button"]):hover {
  background: #163A5F !important;
  border-color: #163A5F !important;
  color: #FFFFFF !important;
}
:where(.btn-secondary,.button-secondary,.secondary-btn,.btn-outline,.btn-ghost,.mc-btn-secondary) {
  background: #FFFFFF !important;
  border: 1px solid #0B1F3A !important;
  color: #0B1F3A !important;
  box-shadow: none !important;
}
:where(.btn-secondary,.button-secondary,.secondary-btn,.btn-outline,.btn-ghost,.mc-btn-secondary):hover {
  background: #F3F4F6 !important;
  color: #071525 !important;
}

/* Enlaces */
a { text-underline-offset: .18em; }
main a:not([class*="btn"]):not([class*="button"]),
article a:not([class*="btn"]):not([class*="button"]) { color: #163A5F; }
main a:not([class*="btn"]):not([class*="button"]):hover,
article a:not([class*="btn"]):not([class*="button"]):hover { color: #071525; }

/* Fondos y superficies */
:where(.card,.service-card,.news-card,.product-card,.credit-card,.feature-card,.benefit-card,
       .info-card,.faq-item,.testimonial-card,.opinion-card,.form-card,.panel,.box,.content-box,
       [class*="-card"]):not(#main-header *) {
  background-color: #FFFFFF;
  border-color: #D1D5DB;
}
:where(.section-soft,.bg-soft,.light-section,.alternate-section,.stats-wrap,.features-section) {
  background-color: #F3F4F6 !important;
}

/* Tipografía */
:where(h1,h2,h3,h4,h5,h6) { color: #0A0A0A; }
:where(p,li,dd,figcaption,.caption,.subtitle,.description,.muted,.text-muted) { color: inherit; }
:where(.text-muted,.muted,.caption,small) { color: #6B7280; }

/* Formularios */
:where(input:not([type="checkbox"]):not([type="radio"]):not([type="submit"]):not([type="button"]),
       select,textarea) {
  background: #FFFFFF !important;
  color: #0A0A0A !important;
  border-color: #D1D5DB !important;
  caret-color: #0B1F3A;
}
:where(input,select,textarea)::placeholder { color: #6B7280 !important; opacity: 1; }
:where(input,select,textarea):focus {
  border-color: #163A5F !important;
  box-shadow: 0 0 0 3px rgba(22,58,95,.16) !important;
}
input[type="checkbox"], input[type="radio"] { accent-color: #0B1F3A !important; }

/* Tablas y grillas */
:where(table,.table,.data-grid) {
  background: #FFFFFF !important;
  color: #111827 !important;
  border-color: #D1D5DB !important;
}
:where(th,.table thead,.data-grid-header) {
  background: #0B1F3A !important;
  color: #FFFFFF !important;
  border-color: #374151 !important;
}
:where(td,.table td,.data-grid-cell) { border-color: #D1D5DB !important; }
:where(tbody tr:nth-child(even),.table tbody tr:nth-child(even)) { background: #F3F4F6 !important; }
:where(tbody tr:hover,.table tbody tr:hover) { background: #E5E7EB !important; }

/* Alertas / banners: misma paleta, diferenciación por icono, texto y borde */
:where(.alert,.notice,.notification,.banner,.message,.flash) {
  background: #F3F4F6 !important;
  color: #111827 !important;
  border-color: #6B7280 !important;
}
:where(.alert-success,.success,.notice-success) { border-left: 4px solid #163A5F !important; }
:where(.alert-warning,.warning,.notice-warning) { border-left: 4px solid #6B7280 !important; }
:where(.alert-error,.alert-danger,.error,.danger,.notice-error) {
  border-left: 4px solid #0A0A0A !important;
  background: #E5E7EB !important;
}

/* Modales y overlays */
:where(.modal,.dialog,.popup,.mc-modal,.admin-modal) {
  background: #FFFFFF !important;
  color: #111827 !important;
  border-color: #D1D5DB !important;
}
:where(.modal-overlay,.overlay,.backdrop,.mc-overlay) { background: rgba(7,21,37,.72) !important; }

/* Opiniones / estrellas / badges */
:where(.stars,.star,.rating,.rating-star,[class*="star"]) { color: #163A5F !important; }
:where(.badge,.pill,.tag,.chip) {
  background: #E5E7EB !important;
  color: #0B1F3A !important;
  border-color: #D1D5DB !important;
}

/* Separadores e iconos */
hr { border-color: #D1D5DB !important; }
:where(.icon-circle,.icon-box,.feature-icon,.service-icon,.credit-icon) {
  background: #E5E7EB !important;
  color: #0B1F3A !important;
}

/* Footer */
footer,
#main-footer,
.site-footer,
.mc-footer {
  background: #071525 !important;
  color: #FFFFFF !important;
  border-color: #374151 !important;
}
footer a,
#main-footer a,
.site-footer a,
.mc-footer a { color: #FFFFFF !important; }
footer a:hover,
#main-footer a:hover,
.site-footer a:hover,
.mc-footer a:hover { color: #D1D5DB !important; }
footer :where(p,small,span),
#main-footer :where(p,small,span),
.site-footer :where(p,small,span),
.mc-footer :where(p,small,span) { color: #D1D5DB; }

/* Panel administrativo */
body.mc-admin-body,
.admin-body { background: #F3F4F6 !important; color: #111827 !important; }
.mc-admin-sidebar,
.admin-sidebar { background: #071525 !important; color: #FFFFFF !important; }
.mc-admin-sidebar a,
.admin-sidebar a { color: #D1D5DB !important; }
.mc-admin-sidebar a:hover,
.mc-admin-sidebar a.active,
.admin-sidebar a:hover,
.admin-sidebar a.active {
  background: #163A5F !important;
  color: #FFFFFF !important;
}
.mc-admin-card,
.admin-card { background: #FFFFFF !important; border-color: #D1D5DB !important; box-shadow: var(--mc-shadow) !important; }
.mc-admin-topbar,
.admin-topbar { background: #FFFFFF !important; border-color: #D1D5DB !important; }

/* WhatsApp y otros botones de marca heredados: sin verde. */
:where(.whatsapp,.whatsapp-btn,.btn-whatsapp,[class*="whatsapp"]) {
  background-color: #0B1F3A !important;
  border-color: #0B1F3A !important;
  color: #FFFFFF !important;
}
:where(.whatsapp,.whatsapp-btn,.btn-whatsapp,[class*="whatsapp"]):hover {
  background-color: #163A5F !important;
}

/* Estados disabled */
:disabled,[aria-disabled="true"] {
  background-color: #D1D5DB !important;
  border-color: #D1D5DB !important;
  color: #6B7280 !important;
  cursor: not-allowed !important;
}

/* Scrollbar discreta */
* { scrollbar-color: #6B7280 #F3F4F6; }
'''

BRANDING_MD = '''# Branding Multicredit 2026\n\nPaleta corporativa aplicada a la web pública y al panel administrativo.\n\n| Uso | Color |\n|---|---|\n| Azul marino principal | `#0B1F3A` |\n| Azul marino secundario / hover | `#163A5F` |\n| Azul marino profundo | `#071525` |\n| Gris principal | `#6B7280` |\n| Gris oscuro | `#374151` |\n| Gris de borde | `#D1D5DB` |\n| Gris de fondo | `#F3F4F6` |\n| Blanco | `#FFFFFF` |\n| Negro | `#0A0A0A` |\n\nEl archivo `css/mc-brand-2026.css` es la capa global de marca. Los nombres de variables heredados (`--mc-green`, `--mc-orange`, `brand-green`, etc.) se mantienen solo como alias de compatibilidad, pero sus valores ya pertenecen a la nueva paleta.\n\nLogo corporativo activo: `uploads/logo/20260904_232938_5c89c80d.png`.\n'''

HEX_RE = re.compile(r"#(?P<h>[0-9a-fA-F]{3,4}|[0-9a-fA-F]{6}|[0-9a-fA-F]{8})(?![0-9a-fA-F])")
RGB_RE = re.compile(r"(?P<fn>rgba?|RGBA?)\(\s*(?P<r>\d{1,3})\s*,\s*(?P<g>\d{1,3})\s*,\s*(?P<b>\d{1,3})(?P<a>\s*,\s*(?:0|1|0?\.\d+))?\s*\)")
HSL_RE = re.compile(r"(?P<fn>hsla?|HSLA?)\(\s*(?P<h>-?\d+(?:\.\d+)?)\s*,\s*(?P<s>\d+(?:\.\d+)?)%\s*,\s*(?P<l>\d+(?:\.\d+)?)%(?P<a>\s*,\s*(?:0|1|0?\.\d+))?\s*\)")


def _expand_hex(raw: str) -> tuple[int, int, int, str]:
    if len(raw) in (3, 4):
        raw = ''.join(ch * 2 for ch in raw)
    alpha = raw[6:8] if len(raw) == 8 else ''
    return int(raw[0:2], 16), int(raw[2:4], 16), int(raw[4:6], 16), alpha


def _map_rgb(r: int, g: int, b: int) -> str:
    r1, g1, b1 = r / 255.0, g / 255.0, b / 255.0
    h, l, s = colorsys.rgb_to_hls(r1, g1, b1)

    # Neutros: los acercamos a la escala gris oficial.
    if s <= 0.16:
        if l >= 0.93:
            return PALETTE["white"]
        if l >= 0.82:
            return PALETTE["gray_xlight"]
        if l >= 0.68:
            return PALETTE["gray_light"]
        if l >= 0.46:
            return PALETTE["gray"]
        if l >= 0.20:
            return PALETTE["gray_dark"]
        return PALETTE["black"]

    # Cualquier acento cromático previo (verde, naranja, rojo, azul vivo, etc.)
    # pasa a azul marino o gris según luminosidad.
    if l >= 0.86:
        return PALETTE["gray_xlight"]
    if l >= 0.68:
        return PALETTE["gray_light"]
    if l >= 0.49:
        return PALETTE["navy_2"]
    if l >= 0.24:
        return PALETTE["navy"]
    return PALETTE["navy_dark"]


def replace_hex(match: re.Match[str]) -> str:
    raw = match.group('h')
    r, g, b, alpha = _expand_hex(raw)
    mapped = _map_rgb(r, g, b)
    if alpha:
        return mapped + alpha.upper()
    return mapped


def replace_rgb(match: re.Match[str]) -> str:
    r = min(255, int(match.group('r')))
    g = min(255, int(match.group('g')))
    b = min(255, int(match.group('b')))
    mapped = _map_rgb(r, g, b)
    mr, mg, mb, _ = _expand_hex(mapped[1:])
    alpha = match.group('a') or ''
    fn = 'rgba' if alpha else 'rgb'
    return f"{fn}({mr},{mg},{mb}{alpha})"


def replace_hsl(match: re.Match[str]) -> str:
    l = float(match.group('l')) / 100.0
    s = float(match.group('s')) / 100.0
    h = (float(match.group('h')) % 360) / 360.0
    r, g, b = colorsys.hls_to_rgb(h, l, s)
    mapped = _map_rgb(round(r * 255), round(g * 255), round(b * 255))
    mr, mg, mb, _ = _expand_hex(mapped[1:])
    alpha = match.group('a') or ''
    fn = 'rgba' if alpha else 'rgb'
    return f"{fn}({mr},{mg},{mb}{alpha})"


def recolor_text(text: str) -> str:
    text = HEX_RE.sub(replace_hex, text)
    text = RGB_RE.sub(replace_rgb, text)
    text = HSL_RE.sub(replace_hsl, text)

    # Data SVG URL-encoded y colores CSS nombrados frecuentes.
    encoded = {
        '%23f26e22': '%230B1F3A',
        '%23ff7d32': '%23163A5F',
        '%23ff7c30': '%23163A5F',
        '%230d5c2e': '%230B1F3A',
        '%23063718': '%230B1F3A',
        '%23052712': '%23071525',
        '%23083d1f': '%23071525',
        '%23334576': '%230B1F3A',
        '%2325d366': '%230B1F3A',
    }
    for old, new in encoded.items():
        text = re.sub(re.escape(old), new, text, flags=re.I)

    return text


def replace_logo_paths(text: str) -> str:
    candidates = [
        'img/multicredit-logo-color.webp',
        'img/logo.jpg',
        'uploads/logo/20260904_232715_2b273f73.png',
    ]
    for old in candidates:
        text = text.replace(old, NEW_LOGO)
    return text


def inject_brand_assets(path: Path, text: str) -> str:
    if '<head' not in text.lower() or '</head>' not in text.lower():
        return text

    rel = '../' if path.parts and path.parts[0] == 'admin' else ''
    css_href = f"{rel}css/mc-brand-2026.css?v=20260915"
    logo_href = f"{rel}{NEW_LOGO}"

    additions = []
    if 'mc-brand-2026.css' not in text:
        additions.append(f'    <link rel="stylesheet" href="{css_href}">')
    if 'rel="icon"' not in text and "rel='icon'" not in text:
        additions.append(f'    <link rel="icon" type="image/png" href="{logo_href}">')
    if not additions:
        return text

    idx = text.lower().rfind('</head>')
    return text[:idx] + '\n' + '\n'.join(additions) + '\n' + text[idx:]


def should_process(path: Path) -> bool:
    if any(part in {'.git', 'docs', 'vendor', 'node_modules'} for part in path.parts):
        return False
    if path.name.endswith('.bak') or '.bak.' in path.name:
        return False
    return path.suffix.lower() in {'.php', '.css', '.js', '.json', '.html', '.svg'}


def main() -> None:
    changed: list[str] = []

    # Capa global de marca.
    theme_path = ROOT / 'css' / 'mc-brand-2026.css'
    theme_path.parent.mkdir(parents=True, exist_ok=True)
    theme_path.write_text(THEME_CSS, encoding='utf-8')
    changed.append(str(theme_path.relative_to(ROOT)))

    for path in ROOT.rglob('*'):
        if not path.is_file() or not should_process(path):
            continue
        if path == theme_path or path == Path(__file__):
            continue

        try:
            original = path.read_text(encoding='utf-8')
        except UnicodeDecodeError:
            continue

        updated = replace_logo_paths(original)
        updated = recolor_text(updated)
        if path.suffix.lower() == '.php':
            updated = inject_brand_assets(path.relative_to(ROOT), updated)

        if updated != original:
            path.write_text(updated, encoding='utf-8')
            changed.append(str(path.relative_to(ROOT)))

    # site.json debe apuntar de forma inequívoca al logo nuevo.
    site_path = ROOT / 'cms' / 'data' / 'site.json'
    site = json.loads(site_path.read_text(encoding='utf-8'))
    site['logo'] = NEW_LOGO
    site_path.write_text(json.dumps(site, ensure_ascii=False, indent=4) + '\n', encoding='utf-8')
    if str(site_path.relative_to(ROOT)) not in changed:
        changed.append(str(site_path.relative_to(ROOT)))

    branding_path = ROOT / 'BRANDING_2026.md'
    branding_path.write_text(BRANDING_MD, encoding='utf-8')
    changed.append(str(branding_path.relative_to(ROOT)))

    print(f"Archivos actualizados: {len(set(changed))}")
    for item in sorted(set(changed)):
        print(item)


if __name__ == '__main__':
    main()
