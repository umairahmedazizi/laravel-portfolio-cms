@php($domain = rtrim($s['seo_domain'] ?? '', '/'))<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- SEO -->
<title>{{ $s['seo_title'] }}</title>
<meta name="description" content="{{ $s['seo_description'] }}" />
<meta name="author" content="{{ $s['hero_name'] }}" />
<meta name="robots" content="index, follow, max-image-preview:large" />
<meta name="theme-color" content="#FAF6F2" />
<link rel="canonical" href="{{ $domain }}/" />

<!-- Icons -->
<link rel="icon" href="favicon.svg" type="image/svg+xml" />
<link rel="apple-touch-icon" href="favicon.svg" />
<link rel="manifest" href="site.webmanifest" />

<!-- Social -->
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{ $s['hero_name'] }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:url" content="{{ $domain }}/" />
<meta property="og:title" content="{{ $s['seo_title'] }}" />
<meta property="og:description" content="{{ $s['seo_description'] }}" />
<meta property="og:image" content="{{ $domain }}/{{ $s['hero_image'] }}" />
<meta property="og:image:alt" content="Portrait of {{ $s['hero_name'] }}" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $s['seo_title'] }}" />
<meta name="twitter:description" content="{{ $s['seo_description'] }}" />
<meta name="twitter:image" content="{{ $domain }}/{{ $s['hero_image'] }}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

<!-- Preload -->
<link rel="preload" as="image" href="assets/gradient-1.webp" type="image/webp" fetchpriority="high" />

<!-- Schema -->
<script type="application/ld+json">
{!! $jsonLd ?? '' !!}
</script>

@verbatim
<style>
/* Tokens */
:root{
  --cream:      #FAF6F2;
  --cream-2:    #FFFBF8;
  --pink-50:    #FFF1F5;
  --pink-100:   #FDE3EC;
  --pink-200:   #FBD3DF;
  --pink-300:   #F7B6CC;
  --pink-400:   #F197B6;
  --pink-500:   #ED7BA3;
  --pink-600:   #E25C8C;
  --peach:      #E89B7A;
  --peach-soft: #F3C2A8;
  --peach-100:  #FBE3D6;
  --ink:        #17161B;
  --ink-2:      #393742;
  --ink-soft:   #4A4853;
  --line:       rgba(42,36,32,.10);

  --glass:      rgba(255,255,255,.55);
  --glass-strong: rgba(255,255,255,.72);
  --glass-brd:  rgba(255,255,255,.65);
  --glass-shadow: 0 8px 16px -4px rgba(26,20,28,.18), 0 20px 48px -8px rgba(100,38,68,.42), 0 36px 72px -16px rgba(26,20,28,.22);

  --serif: "DM Serif Display", "Georgia", serif;
  --sans:  "Inter", system-ui, -apple-system, "Segoe UI", sans-serif;

  --maxw: 1180px;
  --ease: cubic-bezier(.22,.61,.36,1);
  --ease-out: cubic-bezier(.16,1,.3,1);

  --r-sm: 14px;
  --r-md: 22px;
  --r-lg: 32px;
  --r-pill: 999px;
}

/* Reset */
*,*::before,*::after{ box-sizing:border-box; margin:0; padding:0; }
html{ scroll-behavior:smooth; -webkit-text-size-adjust:100%; }
@media (prefers-reduced-motion: reduce){ html{ scroll-behavior:auto; } }
body{
  font-family:var(--sans);
  color:var(--ink);
  background:var(--cream);
  line-height:1.6;
  overflow-x:hidden;
  -webkit-font-smoothing:antialiased;
  text-rendering:optimizeLegibility;
}
img{ max-width:100%; display:block; }
a{ color:inherit; text-decoration:none; }
button{ font-family:inherit; cursor:pointer; border:none; background:none; }
::selection{ background:var(--pink-300); color:var(--ink); }

/* Background */
.bg-wash{
  position:fixed; inset:-80px; z-index:-2; pointer-events:none;
  background-color:var(--cream);
  background-image:
    linear-gradient(180deg, rgba(250,246,242,.42) 0%, rgba(250,246,242,.30) 45%, rgba(250,246,242,.52) 100%),
    url("assets/gradient-1.webp");
  background-repeat:no-repeat, no-repeat;
  background-position:center, center;
  background-size:cover, cover;
  filter:saturate(108%);
}
.bg-grain{
  position:fixed; inset:0; z-index:-1; pointer-events:none; opacity:.035;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='160' height='160'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

/* Layout */
.wrap{ width:100%; max-width:var(--maxw); margin-inline:auto; padding-inline:clamp(20px,5vw,48px); }
section{ position:relative; padding-block:clamp(80px,12vh,140px); }
.eyebrow{
  font-family:var(--sans);
  font-size:1rem; font-weight:700; letter-spacing:.22em; text-transform:uppercase;
  color:#B42C60;
  display:inline-flex; align-items:center;
}
.section-title{
  font-family:var(--serif); font-weight:400;
  font-size:clamp(2.1rem,5vw,3.4rem); line-height:1.05; letter-spacing:-.01em;
  color:var(--ink);
}
.section-lead{
  max-width:54ch; color:var(--ink-soft); font-size:clamp(1rem,1.4vw,1.12rem); margin-top:18px;
}

/* Glass */
.glass{
  background:var(--glass);
  -webkit-backdrop-filter:blur(22px) saturate(160%);
  backdrop-filter:blur(22px) saturate(160%);
  border:1px solid var(--glass-brd);
  box-shadow:var(--glass-shadow);
  border-radius:var(--r-lg);
}

/* Buttons */
.btn{
  position:relative; display:inline-flex; align-items:center; gap:.6em;
  font-size:.98rem; font-weight:600; letter-spacing:.01em;
  padding:15px 28px; border-radius:var(--r-pill);
  transition:transform .35s var(--ease-out), box-shadow .35s var(--ease-out), background .35s var(--ease);
  will-change:transform;
}
.btn .arrow{ transition:transform .35s var(--ease-out); }
.btn:hover .arrow{ transform:translateX(4px); }
.btn:active{ transform:translateY(1px) scale(.99); }

.btn-primary{
  color:#fff; overflow:hidden;
  background:linear-gradient(135deg, #DA4A86 0%, #CF5C3C 100%);
  box-shadow:0 10px 24px -8px rgba(150,40,80,.6), inset 0 1px 0 rgba(255,255,255,.4);
}
.btn-primary::after{ content:""; position:absolute; top:0; left:-130%; width:55%; height:100%;
  background:linear-gradient(105deg,transparent,rgba(255,255,255,.5),transparent); transform:skewX(-18deg);
  transition:left 1s var(--ease-out); pointer-events:none; }
.btn-primary:hover::after{ left:150%; }
.btn-primary:hover{
  transform:translateY(-3px);
  box-shadow:0 20px 40px -10px rgba(120,30,62,.62), 0 0 0 5px rgba(247,182,204,.32), inset 0 1px 0 rgba(255,255,255,.5);
}
.btn-ghost{
  color:var(--ink);
  background:var(--glass-strong);
  -webkit-backdrop-filter:blur(12px); backdrop-filter:blur(12px);
  border:1px solid rgba(255,255,255,.8);
  box-shadow:0 8px 20px -10px rgba(42,36,32,.18), inset 0 1px 0 rgba(255,255,255,.7);
}
.btn-ghost:hover{
  transform:translateY(-3px);
  box-shadow:0 18px 34px -12px rgba(110,48,76,.5), inset 0 1px 0 rgba(255,255,255,.9);
  background:#fff;
}
.btn-sm{ padding:11px 20px; font-size:.86rem; }

/* Nav */
.nav{
  position:fixed; top:14px; left:50%; transform:translateX(-50%);
  z-index:100; width:min(var(--maxw), calc(100% - 28px));
  display:flex; align-items:center; justify-content:space-between;
  padding:10px 12px 10px 22px; border-radius:var(--r-pill);
  background:rgba(255,251,248,.6);
  -webkit-backdrop-filter:blur(18px) saturate(160%); backdrop-filter:blur(18px) saturate(160%);
  border:1px solid rgba(255,255,255,.6);
  box-shadow:0 10px 30px -16px rgba(42,36,32,.28);
  transition:box-shadow .4s var(--ease), background .4s var(--ease), transform .5s var(--ease-out);
}
.nav.scrolled{ background:rgba(255,251,248,.82); box-shadow:0 14px 40px -18px rgba(196,108,140,.5); }
.nav .brand{ font-family:var(--serif); font-weight:400; font-size:1.18rem; letter-spacing:-.01em; display:flex; align-items:center; gap:.55em; }
.nav .brand .dot{ width:9px; height:9px; border-radius:50%; background:linear-gradient(135deg,var(--pink-400),var(--peach)); box-shadow:0 0 0 4px rgba(247,182,204,.35); }
.nav-links{ display:flex; align-items:center; gap:4px; }
.nav-links a{
  font-size:.9rem; font-weight:500; color:var(--ink-2); padding:9px 15px; border-radius:var(--r-pill);
  position:relative; transition:color .25s var(--ease), background .25s var(--ease);
}
.nav-links a:hover{ color:var(--ink); background:rgba(255,255,255,.55); }
.nav-links a.active{ color:var(--pink-600); }
.nav-links a:not(.nav-cta)::after{ content:""; position:absolute; left:15px; right:15px; bottom:5px; height:2px; border-radius:2px;
  background:linear-gradient(90deg,var(--pink-400),var(--pink-600)); transform:scaleX(0); transform-origin:left;
  transition:transform .35s var(--ease-out); }
.nav-links a:not(.nav-cta):hover::after,.nav-links a.active::after{ transform:scaleX(1); }
.nav-cta{ display:inline-flex; }
.nav-cta:hover{ color:var(--ink) !important; }
.nav-toggle{ display:none; width:42px; height:42px; border-radius:50%; align-items:center; justify-content:center; background:rgba(255,255,255,.55); }
.nav-toggle span{ width:18px; height:2px; background:var(--ink); border-radius:2px; position:relative; transition:.3s var(--ease); }
.nav-toggle span::before,.nav-toggle span::after{ content:""; position:absolute; left:0; width:18px; height:2px; background:var(--ink); border-radius:2px; transition:.3s var(--ease); }
.nav-toggle span::before{ top:-6px; } .nav-toggle span::after{ top:6px; }
.nav.open .nav-toggle span{ background:transparent; }
.nav.open .nav-toggle span::before{ top:0; transform:rotate(45deg); }
.nav.open .nav-toggle span::after{ top:0; transform:rotate(-45deg); }

/* Progress */
.scroll-progress{ position:fixed; top:0; left:0; height:3px; width:0%; z-index:101;
  background:linear-gradient(90deg,var(--peach),var(--pink-400),var(--pink-500)); }

/* Hero */
.hero{ min-height:100svh; display:flex; align-items:center; padding-top:120px; padding-bottom:60px; overflow:hidden; }

.hero-inner{ position:relative; left:-2.75vw; display:grid; align-items:center;
  grid-template-columns:1fr clamp(240px,26vw,340px); gap:clamp(28px,5vw,68px); }
.hero-text{ max-width:720px; }
.hero-portrait{ position:relative; left:6vw; }
.hero-photo{ position:relative; aspect-ratio:4/5; overflow:hidden; display:grid; place-items:center; }
.hero-photo img{ position:absolute; inset:0; width:100%; height:100%; object-fit:cover; object-position:center 35%; }
.hero-photo .hp-mono{ width:60%; aspect-ratio:1; border-radius:50%; display:grid; place-items:center;
  font-family:var(--serif); font-style:italic; font-size:clamp(2.6rem,6vw,4rem); color:#fff;
  background:linear-gradient(150deg,var(--pink-300),var(--peach));
  box-shadow:inset 0 2px 20px rgba(255,255,255,.4); }
@media(max-width:860px){
  .hero-inner{ grid-template-columns:1fr; }
  .hero-portrait{ display:none; }
}

/* Reveal */
.reveal-word{ display:inline-block; overflow:hidden; vertical-align:top; padding-bottom:.2em; margin-bottom:-.2em; }
.reveal-word > span{ display:inline-block; transition:transform .9s var(--ease-out); }
.hero.reveal-armed .reveal-word > span{ transform:translateY(130%); }
.hero.reveal-armed.is-in .reveal-word > span{ transform:translateY(0); }

.hero h1{
  font-family:var(--serif); font-weight:380; font-optical-sizing:auto;
  font-size:clamp(2.09rem,5.02vw,3.85rem); line-height:1.06; letter-spacing:-.02em; text-wrap:balance;
  margin:26px 0 0; color:var(--ink);
}
.hero h1 .accent{ font-style:italic; color:transparent;
  background:linear-gradient(115deg,#DA4A86 0%,#CF5C3C 100%); -webkit-background-clip:text; background-clip:text; }
.hero h1 .name-line,.hero h1 .hl-line{ display:block; }
.hero h1 .hl-line{ font-style:italic; }
.hero h1 .name-line{
  font-family:"Playfair Display", "Georgia", serif;
  font-weight:675; font-optical-sizing:auto;
  font-size:clamp(2.88rem,7.2vw,5.4rem);
  color:#2E2024; letter-spacing:-.025em;
  line-height:1; margin-bottom:.16em;
}

.hero .sub{ max-width:50ch; margin-top:26px; font-size:clamp(1.02rem,1.5vw,1.22rem); color:var(--ink-2); }
.hero .cgpa{ color:var(--ink); font-weight:600; }
.hero-cta{ display:flex; flex-wrap:wrap; gap:14px; margin-top:38px; }

/* Reveal */
[data-reveal]{ opacity:0; transform:translateY(18px) scale(.985); filter:blur(10px);
  transition:opacity .85s var(--ease-out), transform .9s var(--ease-out), filter .85s var(--ease-out); }
[data-reveal].in{ opacity:1; transform:none; filter:blur(0); }
[data-reveal][data-d="1"]{ transition-delay:.08s; }
[data-reveal][data-d="2"]{ transition-delay:.16s; }
[data-reveal][data-d="3"]{ transition-delay:.24s; }
[data-reveal][data-d="4"]{ transition-delay:.32s; }

/* Titles */
[data-reveal].title-split{ opacity:1; transform:none; filter:none; }
.title-split .tw{ display:inline-block; opacity:0; transform:translateY(22px); filter:blur(8px);
  transition:opacity .7s var(--ease-out), transform .7s var(--ease-out), filter .7s var(--ease-out); }
[data-reveal].title-split.in .tw{ opacity:1; transform:none; filter:blur(0); }

/* About */
.about-grid{ display:grid; grid-template-columns:0.85fr 1.15fr; gap:clamp(28px,5vw,64px); align-items:start; }
.about-copy p{ font-size:clamp(1.08rem,1.7vw,1.32rem); line-height:1.7; color:var(--ink-2); }
.about-copy p .hl{ color:var(--ink); font-weight:600; }
.about-copy .serif-emph{ font-family:var(--serif); font-style:italic; color:var(--pink-600); font-weight:400; }
.stats{ display:grid; grid-template-columns:repeat(2,1fr); gap:16px; margin-top:38px; }
.stat{ padding:22px 22px 20px; border-radius:var(--r-md); }
.stat .num{ font-family:var(--serif); font-size:2.1rem; line-height:1; color:var(--ink); display:flex; align-items:baseline; gap:0; }
.stat .num small{ font-size:1.3rem; color:#C9663A; font-family:var(--sans); font-weight:700; margin-left:.18em; }
.stat .num small.plus{ font-size:1.6rem; margin-left:0; }
.stat .lbl{ margin-top:8px; font-size:.86rem; color:var(--ink-soft); }
.about-portrait{ position:sticky; top:120px; }
.portrait-card{ position:relative; border-radius:var(--r-lg); padding:30px; overflow:hidden;
  background:rgba(255,255,255,.42);
  -webkit-backdrop-filter:blur(18px) saturate(100%);
  backdrop-filter:blur(18px) saturate(100%); }
.monogram{ position:relative; overflow:hidden; width:100%; aspect-ratio:1/1; border-radius:24px; display:grid; place-items:center;
  background:linear-gradient(150deg,var(--pink-300),var(--peach)); box-shadow:inset 0 2px 20px rgba(255,255,255,.4); }
.monogram img{ position:absolute; inset:0; width:100%; height:100%; object-fit:cover; border-radius:inherit; }
.monogram span{ font-family:var(--serif); font-size:clamp(4rem,12vw,6.5rem); color:#fff; text-shadow:0 6px 24px rgba(226,92,140,.4); font-style:italic; }
.portrait-meta{ margin-top:22px; display:flex; flex-direction:column; gap:6px; }
.portrait-meta .nm{ font-family:var(--serif); font-size:1.5rem; }
.portrait-meta .rl{ color:var(--ink-soft); font-size:.92rem; }
.portrait-loc{ margin-top:14px; display:inline-flex; align-items:center; gap:.5em; font-size:.84rem; color:var(--ink-soft); }

/* Projects */
.projects-head{ display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:24px; }
.project{ display:grid; grid-template-columns:1.05fr .95fr; gap:clamp(24px,4vw,56px); align-items:center; margin-top:clamp(48px,7vw,90px); }
.project:nth-child(even) .project-visual{ order:2; }
.project-card{ padding:clamp(26px,3.2vw,40px); border-radius:var(--r-lg); transition:transform .5s var(--ease-out), box-shadow .5s var(--ease-out); }
.project-card h3{ font-family:var(--serif); font-weight:400; font-size:clamp(1.7rem,3vw,2.35rem); line-height:1.08; margin-top:6px; letter-spacing:-.01em; }
.project-sub{ color:#C9663A; font-weight:600; font-size:.96rem; margin-top:8px; }
.stack-row{ display:flex; flex-wrap:wrap; gap:8px; margin-top:18px; }
.chip{ font-size:.78rem; font-weight:500; color:var(--ink-2); padding:6px 13px; border-radius:var(--r-pill);
  background:rgba(255,255,255,.6); border:1px solid rgba(255,255,255,.7); }
.project-desc{ margin-top:18px; color:var(--ink-2); font-size:1.01rem; }
.highlights{ list-style:none; margin-top:18px; display:grid; gap:10px; }
.highlights li{ position:relative; padding-left:26px; font-size:.95rem; color:var(--ink-2); }
.highlights li::before{ content:""; position:absolute; left:2px; top:.55em; width:11px; height:11px; border-radius:50%;
  background:radial-gradient(circle at 35% 35%, var(--pink-300), var(--pink-500)); box-shadow:0 0 0 4px rgba(247,182,204,.28); }
.project-links{ display:flex; flex-wrap:wrap; gap:12px; margin-top:26px; }

/* Mockups */
.project-visual{ perspective:1200px; }
.mock{ position:relative; border-radius:var(--r-md); overflow:hidden; transform-style:preserve-3d; transition:transform .5s var(--ease-out), box-shadow .5s var(--ease-out);
  border:1px solid rgba(255,255,255,.7); box-shadow:0 6px 14px -4px rgba(26,20,28,.18), 0 20px 48px -8px rgba(100,38,68,.4), 0 36px 72px -12px rgba(26,20,28,.22); will-change:transform; }
.mock .bar{ display:flex; align-items:center; gap:7px; padding:13px 16px; background:rgba(255,255,255,.7); -webkit-backdrop-filter:blur(8px); backdrop-filter:blur(8px); border-bottom:1px solid rgba(42,36,32,.06); }
.mock .bar i{ width:11px; height:11px; border-radius:50%; }
.mock .bar i:nth-child(1){ background:#F3A0A0; } .mock .bar i:nth-child(2){ background:#F6C98A; } .mock .bar i:nth-child(3){ background:#A7D8A0; }
.mock .bar .url{ margin-left:10px; flex:1; height:20px; border-radius:6px; background:rgba(42,36,32,.06); }
.mock .screen{ position:relative; aspect-ratio:4/3; padding:18px; display:flex; flex-direction:column; gap:12px; }
.mock .screen.tint-rose{ background:linear-gradient(160deg,#FFF1F5,#FBD3DF); }
.mock .screen.tint-peach{ background:linear-gradient(160deg,#FFF6EF,#FBE3D6); }
.mock .screen.tint-mauve{ background:linear-gradient(160deg,#FCEFF4,#F3D6E2); }
.mock .screen.tint-cream{ background:linear-gradient(160deg,#FFFBF5,#F6EADF); }
.mock .gleam{ position:absolute; top:0; left:-60%; width:55%; height:100%; transform:skewX(-18deg);
  background:linear-gradient(90deg,transparent,rgba(255,255,255,.55),transparent); transition:left .8s var(--ease); pointer-events:none; }
.mock:hover .gleam{ left:130%; }
.ui-row{ display:flex; gap:10px; align-items:center; }
.ui-pill{ height:14px; border-radius:8px; background:rgba(255,255,255,.85); }
.ui-block{ border-radius:12px; background:rgba(255,255,255,.7); box-shadow:0 6px 16px -10px rgba(42,36,32,.25); }
.ui-accent{ background:linear-gradient(120deg,var(--pink-400),var(--peach)); }
.ui-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:10px; flex:1; }
.ui-side{ display:flex; gap:12px; flex:1; }
.ui-col{ display:flex; flex-direction:column; gap:8px; }

/* Skills */
.skills-layout{ display:grid; grid-template-columns:1fr; gap:clamp(40px,6vw,72px); }
.skills-grid{ display:grid; grid-template-columns:repeat(4,1fr); gap:18px; margin-top:8px; }
.skill-cat{ padding:26px 24px 28px; border-radius:var(--r-md); transition:transform .4s var(--ease-out), box-shadow .4s var(--ease-out); }
.skill-cat:hover{ transform:translateY(-5px); box-shadow:0 6px 14px -4px rgba(26,20,28,.18), 0 20px 44px -8px rgba(100,38,68,.42), 0 32px 64px -12px rgba(26,20,28,.22); }
.skill-cat h4{ font-size:1rem; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:#B42C60; }
.skill-cat ul{ list-style:none; margin-top:16px; display:grid; gap:11px; }
.skill-cat li{ font-size:1rem; color:var(--ink-2); display:flex; align-items:center; gap:.6em; }
.skill-cat li::before{ content:""; width:6px; height:6px; border-radius:50%; background:var(--peach); flex:none; }
.skill-cat li.learning{ color:var(--ink-soft); }
.skill-cat li.learning::after{ content:"learning"; font-size:.62rem; letter-spacing:.08em; text-transform:uppercase; color:var(--peach); background:var(--peach-100); padding:2px 7px; border-radius:6px; }

.stack-showcase{ position:relative; border-radius:var(--r-lg); overflow:hidden; padding:38px clamp(20px,4vw,48px); }
.stack-showcase .ss-copy{ max-width:none; margin-top:clamp(12px,1.9vw,22px); }
.stack-showcase h3{ font-family:var(--serif); font-weight:400; font-size:clamp(1.5rem,2.6vw,2.1rem); line-height:1.1; }
.stack-showcase p{ color:var(--ink-2); margin-top:12px; font-size:1rem; }

/* Mearn */
.mearn-wrap{ display:grid; place-items:center; padding:clamp(14px,3vw,32px) 0 8px; }
.mearn{ --reveal:0; display:flex; align-items:flex-start; justify-content:center; gap:clamp(18px,5.5vw,68px); margin-top:clamp(16px,2.6vw,30px); }
.mearn-letter{ position:relative; display:flex; flex-direction:column; align-items:center; gap:2px;
  background:none; border:0; padding:8px 6px 0; cursor:pointer; -webkit-tap-highlight-color:transparent; }
.mearn-letter:focus{ outline:none; }
.mearn-letter:focus-visible{ outline:2px solid var(--pink-400); outline-offset:6px; border-radius:16px; }
.ml-char{ display:block; font-family:var(--sans); font-weight:800; font-size:clamp(2.8rem,8.5vw,7rem); line-height:.72; letter-spacing:-.01em;
  color:color-mix(in srgb, #D24A78, var(--ink) calc(var(--reveal,0) * 100%));
  transform:translateY(calc(var(--reveal,0) * -4px)) scale(calc(1 - var(--reveal,0) * .22));
  text-shadow:0 calc(var(--reveal,0) * 14px) calc(var(--reveal,0) * 30px) rgba(26,20,28,calc(var(--reveal,0) * .22));
  -webkit-text-stroke:.04em #DDD0D4; paint-order:stroke fill;
  transition:transform .45s var(--ease-out), color .45s var(--ease), text-shadow .45s var(--ease); }
.ml-pop{ display:flex; flex-direction:column; align-items:center; width:0;
  opacity:var(--reveal,0);
  transform:translateY(calc((1 - var(--reveal,0)) * 10px)) scale(calc(.9 + var(--reveal,0) * .1));
  transition:opacity .45s var(--ease), transform .45s var(--ease-out); pointer-events:none; }
.ml-pop img{ height:clamp(50px,6.2vw,72px); width:auto; max-width:none; object-fit:contain; filter:drop-shadow(0 10px 22px rgba(42,36,32,.24)); }
.ml-pop img.logo-wide{ height:clamp(34px,4.2vw,48px); margin-top:-6px; }
.ml-pop img.logo-md{ height:clamp(44px,5.4vw,62px); }
.ml-pop img.logo-sm{ height:clamp(36px,4.4vw,48px); }
.ml-pop img.logo-xs{ height:clamp(30px,3.6vw,40px); }
.ml-pop img.logo-react{ margin-top:-10px; }
.mearn-letter:hover .ml-char,
.mearn-letter:focus-visible .ml-char,
.mearn-letter.on .ml-char{ transform:translateY(-4px) scale(.78); color:var(--ink); text-shadow:0 14px 30px rgba(26,20,28,.22); }
.mearn-letter:hover .ml-pop,
.mearn-letter:focus-visible .ml-pop,
.mearn-letter.on .ml-pop{ opacity:1; transform:translateY(0) scale(1); }

/* Beyond */
.beyond-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:22px; margin-top:46px; }
.beyond-card{ position:relative; padding:32px; border-radius:var(--r-lg); overflow:hidden; transition:transform .4s var(--ease-out), box-shadow .4s var(--ease-out); }
.beyond-card:hover{ transform:translateY(-5px); box-shadow:0 6px 14px -4px rgba(26,20,28,.18), 0 20px 44px -8px rgba(100,38,68,.42), 0 32px 64px -12px rgba(26,20,28,.22); }
.beyond-card .bdate{ font-size:.78rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:#C9663A; }
.beyond-card h4{ font-family:var(--serif); font-weight:400; font-size:1.5rem; margin-top:10px; line-height:1.12; }
.beyond-card .borg{ color:var(--pink-600); font-weight:600; font-size:.92rem; margin-top:6px; }
.beyond-card p{ color:var(--ink-2); margin-top:14px; font-size:.98rem; }

/* Contact */
.contact{ text-align:center; }
.contact-panel{ padding:clamp(40px,7vw,90px) clamp(24px,5vw,80px); border-radius:var(--r-lg); position:relative; overflow:hidden; }
.contact-panel::before{ content:""; position:absolute; inset:0; z-index:-1;
  background:radial-gradient(60% 80% at 50% -10%, rgba(247,182,204,.5), transparent 60%); }
.contact h2{ font-family:var(--serif); font-weight:400; font-size:clamp(2.4rem,6vw,4.2rem); line-height:1.05; letter-spacing:-.02em; }
.contact h2 .it{ font-style:italic; color:#D24A78; }
.contact p{ max-width:52ch; margin:22px auto 0; color:var(--ink-2); font-size:clamp(1rem,1.5vw,1.15rem); }
.contact-links{ display:flex; flex-direction:column; gap:12px; max-width:560px; margin:40px auto 0; }
.clink{ display:flex; align-items:center; justify-content:space-between; gap:16px; padding:18px 24px; border-radius:var(--r-pill);
  background:var(--glass-strong); border:1px solid rgba(255,255,255,.8); -webkit-backdrop-filter:blur(10px); backdrop-filter:blur(10px);
  transition:transform .35s var(--ease-out), box-shadow .35s var(--ease-out), background .35s var(--ease); text-align:left; }
.clink:hover{ transform:translateY(-3px); background:#fff; box-shadow:0 18px 38px -18px rgba(196,108,140,.55); }
.clink .cl-l{ display:flex; align-items:center; gap:14px; }
.clink .cl-ico{ width:42px; height:42px; border-radius:50%; display:grid; place-items:center; flex:none;
  background:linear-gradient(135deg,var(--pink-200),var(--peach-100)); color:var(--pink-600); }
.clink .cl-k{ font-size:.74rem; letter-spacing:.14em; text-transform:uppercase; color:var(--ink-soft); }
.clink .cl-v{ font-weight:600; color:var(--ink); font-size:1.02rem; word-break:break-word; }
.clink .cl-arrow{ color:var(--pink-500); transition:transform .35s var(--ease-out); flex:none; }
.clink:hover .cl-arrow{ transform:translate(4px,-4px); }

.footer{ padding:40px 0 60px; text-align:center; }
.footer .frow{ display:flex; align-items:center; justify-content:center; gap:.7em; flex-wrap:wrap; color:var(--ink-soft); font-size:.9rem; }
.footer .dotsep{ width:4px; height:4px; border-radius:50%; background:var(--peach); }
.footer .brand-sm{ font-family:var(--serif); color:var(--ink); font-size:1.1rem; }

/* Responsive */
@media (max-width: 920px){
  .about-grid{ grid-template-columns:1fr; }
  .about-portrait{ position:static; order:-1; max-width:380px; }
  .project{ grid-template-columns:1fr; }
  .project:nth-child(even) .project-visual{ order:0; }
  .project-visual{ max-width:560px; }
  .skills-grid{ grid-template-columns:repeat(2,1fr); }
  .beyond-grid{ grid-template-columns:1fr; }
}
@media (max-width: 760px){
  .nav-links{ position:absolute; top:calc(100% + 10px); right:0; left:0;
    flex-direction:column; align-items:stretch; gap:4px; padding:12px;
    background:rgba(255,251,248,.92); -webkit-backdrop-filter:blur(20px); backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.7); border-radius:var(--r-md);
    box-shadow:0 24px 50px -20px rgba(196,108,140,.5);
    opacity:0; visibility:hidden; transform:translateY(-10px); transition:.35s var(--ease); }
  .nav.open .nav-links{ opacity:1; visibility:visible; transform:none; }
  .nav-links a{ padding:13px 16px; }
  .nav-links .nav-cta{ margin-top:6px; justify-content:center; }
  .nav-toggle{ display:flex; }
}
@media (max-width: 520px){
  .skills-grid{ grid-template-columns:1fr; }
  .stats{ grid-template-columns:1fr 1fr; }
  /* keep the MEARN logos from colliding on phones: give the letters room and cap each logo */
  .mearn{ gap:clamp(14px,5vw,26px); }
  .ml-pop img,
  .ml-pop img.logo-wide,
  .ml-pop img.logo-md,
  .ml-pop img.logo-sm,
  .ml-pop img.logo-xs{
    height:auto; width:auto;
    max-width:clamp(32px,8.5vw,46px); max-height:clamp(26px,7vw,36px);
    margin-top:4px;
  }
  .ml-pop img.logo-react{ margin-top:2px; }

  /* phone: center the hero and slim down the CTA buttons */
  .hero-inner{ left:0; }
  .hero-text{ text-align:center; }
  .hero .sub{ margin-left:auto; margin-right:auto; }
  .hero-cta{ justify-content:center; gap:10px; margin-top:30px; }
  .hero-cta .btn{ flex:0 1 auto; padding:11px 18px; font-size:.86rem; }

  /* phone: slimmer, neater contact rows */
  .contact-panel{ padding:clamp(26px,7vw,90px) clamp(16px,5vw,80px); }
  .clink{ padding:12px 15px; gap:10px; }
  .clink .cl-l{ gap:11px; }
  .clink .cl-ico{ width:34px; height:34px; }
  .clink .cl-k{ font-size:.62rem; letter-spacing:.1em; }
  .clink .cl-v{ font-size:.9rem; }
}

/* Dock */
.social-dock{
  position:fixed; right:20px; top:50%; transform:translateY(-50%);
  z-index:90; display:flex; flex-direction:column; gap:12px;
}
.social-btn{
  position:relative; display:flex; align-items:center; justify-content:center;
  width:46px; height:46px; border-radius:var(--r-pill);
  background:rgba(22,17,15,.7);
  -webkit-backdrop-filter:blur(14px) saturate(140%);
  backdrop-filter:blur(14px) saturate(140%);
  border:1px solid rgba(255,255,255,.12);
  box-shadow:0 6px 18px -6px rgba(0,0,0,.35), 0 2px 6px -2px rgba(0,0,0,.2);
  color:#fff;
  transition:transform .3s var(--ease-out), box-shadow .3s var(--ease-out), background .3s var(--ease), color .3s var(--ease);
  text-decoration:none;
}
.social-btn:hover{
  transform:translateX(-5px) scale(1.08);
  background:rgba(30,24,21,.9);
  color:#fff;
  box-shadow:0 10px 28px -8px rgba(0,0,0,.45), 0 4px 10px -4px rgba(0,0,0,.25);
}
.social-btn svg{ flex:none; }
.social-btn .s-label{
  position:absolute; right:calc(100% + 10px);
  font-family:var(--sans); font-size:.72rem; font-weight:600; letter-spacing:.06em;
  text-transform:uppercase; color:var(--ink); white-space:nowrap;
  background:rgba(255,255,255,.75);
  -webkit-backdrop-filter:blur(10px); backdrop-filter:blur(10px);
  border:1px solid rgba(255,255,255,.7);
  padding:5px 11px; border-radius:var(--r-pill);
  box-shadow:0 4px 12px -4px rgba(26,20,28,.15);
  opacity:0; transform:translateX(6px);
  transition:opacity .25s var(--ease), transform .25s var(--ease);
  pointer-events:none;
}
.social-btn:hover .s-label{ opacity:1; transform:translateX(0); }
@media(max-width:760px){ .social-dock{ display:none; } }

/* Motion */
@media (prefers-reduced-motion: reduce){
  .badge .pulse i::after{ animation:none !important; }
  .reveal-word > span{ transform:none !important; }
  [data-reveal]{ opacity:1 !important; transform:none !important; filter:none !important; }
  .title-split .tw{ opacity:1 !important; transform:none !important; filter:none !important; }
  [data-parallax]{ transform:none !important; }
  *{ transition-duration:.001ms !important; }
}
</style>
@endverbatim
</head>
<body>

<div class="bg-wash"></div>
<div class="bg-grain"></div>
<div class="scroll-progress" id="progress"></div>

<!-- Nav -->
<nav class="nav" id="nav">
  <a href="#hero" class="brand"><span class="dot"></span>{{ $s['brand_name'] }}</a>
  <div class="nav-links" id="navLinks">
    <a href="#about">About</a>
    <a href="#projects">Projects</a>
    <a href="#skills">Skills</a>
    <a href="#beyond">Beyond Code</a>
    <a href="#contact" class="btn btn-primary btn-sm nav-cta" style="color:#fff;">{{ $s['nav_cta_label'] }}</a>
  </div>
  <button class="nav-toggle" id="navToggle" aria-label="Toggle menu"><span></span></button>
</nav>

<!-- Hero -->
<header class="hero" id="hero">
  <div class="wrap hero-inner">
    <div class="hero-text">
      <h1>
        <span class="name-line reveal-word"><span>{{ $s['hero_name'] }}</span></span>
        <span class="hl-line">{!! \App\Support\Fmt::heroWords($s['hero_tagline']) !!}</span>
      </h1>

      <p class="sub">{{ $s['hero_sub'] }}</p>

      <div class="hero-cta">
        <a href="{{ $s['hero_cta1_url'] }}" class="btn btn-{{ $s['hero_cta1_style'] }}">{{ $s['hero_cta1_label'] }}</a>
        <a href="{{ $s['hero_cta2_url'] }}" class="btn btn-{{ $s['hero_cta2_style'] }}">{{ $s['hero_cta2_label'] }}</a>
      </div>
    </div>

    <div class="hero-portrait" data-reveal data-d="2">
      <figure class="hero-photo glass" data-parallax="0.05">
        <span class="hp-mono">{{ $s['hero_initials'] }}</span>
        <img src="{{ $s['hero_image'] }}" alt="Portrait of {{ $s['hero_name'] }}" width="900" height="1118" fetchpriority="high" decoding="async" onerror="this.remove()">
      </figure>
    </div>
  </div>
</header>

<!-- About -->
<section id="about">
  <div class="wrap">
    <div class="about-grid">
      <div class="about-portrait" data-reveal>
        <div class="portrait-card glass" data-parallax="0.04">
          <div class="monogram"><img src="{{ $s['about_image'] }}" alt="Portrait of {{ $s['about_name'] }}" width="900" height="1113" loading="lazy" decoding="async" onerror="this.remove()"><span>{{ $s['hero_initials'] }}</span></div>
          <div class="portrait-meta">
            <span class="nm">{{ $s['about_name'] }}</span>
            <span class="rl">{{ $s['about_role'] }}</span>
          </div>
          <span class="portrait-loc">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7-6.5-7-11a7 7 0 0 1 14 0c0 4.5-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>
            {{ $s['about_location'] }}
          </span>
        </div>
      </div>

      <div class="about-copy">
        <span class="eyebrow" data-reveal>{{ $s['about_eyebrow'] }}</span>
        <h2 class="section-title" data-reveal data-d="1" style="margin-top:18px;">{!! \App\Support\Fmt::emph($s['about_title'], 'serif-emph') !!}</h2>
        <p data-reveal data-d="2" style="margin-top:26px;">{!! \App\Support\Fmt::hl($s['about_p1']) !!}</p>
        <p data-reveal data-d="3" style="margin-top:18px;">{!! \App\Support\Fmt::hl($s['about_p2']) !!}</p>

        <div class="stats">
          @foreach($stats as $i => $stat)
          <div class="stat glass" data-reveal data-d="{{ $i + 1 }}">
            <span class="num">{{ $stat->number }}<small @class(['plus' => $stat->suffix === '+'])>{{ $stat->suffix }}</small></span>
            <span class="lbl">{{ $stat->label }}</span>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Projects -->
<section id="projects">
  <div class="wrap">
    <div class="projects-head">
      <div>
        <span class="eyebrow" data-reveal>{{ $s['projects_eyebrow'] }}</span>
        <h2 class="section-title" data-reveal data-d="1" style="margin-top:18px;">{{ $s['projects_title'] }}</h2>
      </div>
      <p class="section-lead" data-reveal data-d="2" style="margin-bottom:6px;">{{ $s['projects_lead'] }}</p>
    </div>

@foreach($projects as $project)
    <article class="project">
      <div class="project-card glass" data-reveal>
        <h3>{{ $project->title }}</h3>
        <div class="project-sub">{{ $project->subtitle }}</div>
        <div class="stack-row">
          @foreach($project->chips ?? [] as $chip)<span class="chip">{{ $chip }}</span>@endforeach
        </div>
        <p class="project-desc">{{ $project->description }}</p>
        <ul class="highlights">
          @foreach($project->highlights ?? [] as $h)<li>{{ $h }}</li>@endforeach
        </ul>
        <div class="project-links">
          @foreach($project->links ?? [] as $link)
          <a href="{{ $link['url'] }}" class="btn btn-{{ $link['style'] }} btn-sm" target="_blank" rel="noopener">{{ $link['label'] }} <span class="arrow">{{ ($link['style'] ?? '') === 'primary' ? '→' : '↗' }}</span></a>
          @endforeach
        </div>
      </div>
      <div class="project-visual" data-reveal data-d="1">
        @include('partials.project-visual', ['project' => $project])
      </div>
    </article>
    @endforeach
  </div>
</section>

<!-- Skills -->
<section id="skills">
  <div class="wrap">
    <span class="eyebrow" data-reveal>{{ $s['skills_eyebrow'] }}</span>
    <h2 class="section-title" data-reveal data-d="1" style="margin-top:18px;">{{ $s['skills_title'] }}</h2>
    <p class="section-lead" data-reveal data-d="2">{{ $s['skills_lead'] }}</p>

    <div class="skills-layout" style="margin-top:46px;">
      <div class="skills-grid">
        @foreach($skills as $i => $cat)
        <div class="skill-cat glass" data-reveal @if($i > 0)data-d="{{ $i }}"@endif>
          <h4>{{ $cat->name }}</h4>
          <ul>
            @foreach($cat->items ?? [] as $item)<li>{{ $item }}</li>@endforeach
          </ul>
        </div>
        @endforeach
      </div>

      <div class="stack-showcase glass" data-reveal>
        <div class="mearn-wrap">
          <div class="mearn" id="mearn">
            <button class="mearn-letter" type="button" aria-label="M for MongoDB">
              <span class="ml-char">M</span>
              <span class="ml-pop">
                <img src="assets/logos/mongodb.webp" alt="MongoDB logo" class="logo-wide" width="1500" height="500" loading="lazy" decoding="async">
              </span>
            </button>
            <button class="mearn-letter" type="button" aria-label="E for Express">
              <span class="ml-char">E</span>
              <span class="ml-pop">
                <img src="assets/logos/express.webp" alt="Express.js logo" class="logo-xs" width="579" height="166" loading="lazy" decoding="async">
              </span>
            </button>
            <button class="mearn-letter" type="button" aria-label="A for Angular">
              <span class="ml-char">A</span>
              <span class="ml-pop">
                <img src="assets/logos/angular.webp" alt="Angular logo" class="logo-sm" width="2560" height="800" loading="lazy" decoding="async">
              </span>
            </button>
            <button class="mearn-letter" type="button" aria-label="R for React">
              <span class="ml-char">R</span>
              <span class="ml-pop">
                <img src="assets/logos/react.webp" alt="React logo" class="logo-react" width="512" height="256" loading="lazy" decoding="async">
              </span>
            </button>
            <button class="mearn-letter" type="button" aria-label="N for Node.js">
              <span class="ml-char">N</span>
              <span class="ml-pop">
                <img src="assets/logos/node.webp" alt="Node.js logo" class="logo-md" width="590" height="361" loading="lazy" decoding="async">
              </span>
            </button>
          </div>
        </div>
        <div class="ss-copy">
          <h3>{{ $s['showcase_title'] }}</h3>
          <p>{{ $s['showcase_text'] }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Beyond -->
<section id="beyond">
  <div class="wrap">
    <span class="eyebrow" data-reveal>{{ $s['beyond_eyebrow'] }}</span>
    <h2 class="section-title" data-reveal data-d="1" style="margin-top:18px;">{{ $s['beyond_title'] }}</h2>

    <div class="beyond-grid">
      @foreach($activities as $i => $act)
      <div class="beyond-card glass" data-reveal @if($i > 0)data-d="{{ $i }}"@endif>
        <span class="bdate">{{ $act->date_label }}</span>
        <h4>{{ $act->title }}</h4>
        <div class="borg">{{ $act->org }}</div>
        <p>{{ $act->description }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact" class="contact">
  <div class="wrap">
    <div class="contact-panel glass" data-reveal>
      <span class="eyebrow" style="justify-content:center;">{{ $s['contact_eyebrow'] }}</span>
      <h2 style="margin-top:18px;">{!! \App\Support\Fmt::emph($s['contact_title'], 'it') !!}</h2>
      <p>{{ $s['contact_text'] }}</p>

      <div class="contact-links">
        @foreach($contacts as $c)
        <a class="clink" href="{{ $c->url }}" @if(!in_array($c->type, ['email','phone']))target="_blank" rel="noopener"@endif>
          <span class="cl-l">
            <span class="cl-ico">@include('partials.icon', ['kind' => $c->type])</span>
            <span><span class="cl-k">{{ $c->label }}</span><br><span class="cl-v">{{ $c->value }}</span></span>
          </span>
          <span class="cl-arrow"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17 17 7M9 7h8v8"/></svg></span>
        </a>
        @endforeach
      </div>
    </div>

    <footer class="footer">
      <div class="frow">
        <span class="brand-sm">{{ $s['footer_brand'] }}</span>
        <span class="dotsep"></span>
        {{ $s['footer_location'] }}
        <span class="dotsep"></span>
        {{ $s['footer_copyright'] }}
      </div>
    </footer>
  </div>
</section>

<script src="assets/lenis.min.js"></script>
@verbatim
<script>
(function(){
  "use strict";
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* Hero */
  var heroEl = document.querySelector(".hero");
  heroEl.classList.add("reveal-armed");
  window.requestAnimationFrame(function(){
    window.requestAnimationFrame(function(){ heroEl.classList.add("is-in"); });
  });

  /* Nav */
  var nav = document.getElementById("nav");
  var progress = document.getElementById("progress");
  function onScroll(){
    var h = document.documentElement;
    var sc = h.scrollTop || document.body.scrollTop;
    var max = (h.scrollHeight - h.clientHeight) || 1;
    progress.style.width = (sc / max * 100) + "%";
    nav.classList.toggle("scrolled", sc > 30);
  }
  document.addEventListener("scroll", onScroll, {passive:true});
  onScroll();

  /* Menu */
  var toggle = document.getElementById("navToggle");
  var links = document.getElementById("navLinks");
  toggle.addEventListener("click", function(){ nav.classList.toggle("open"); });
  links.addEventListener("click", function(e){ if(e.target.tagName === "A") nav.classList.remove("open"); });

  /* Active */
  var navAnchors = Array.prototype.slice.call(document.querySelectorAll('.nav-links a[href^="#"]'));
  var sections = navAnchors.map(function(a){ return document.querySelector(a.getAttribute("href")); });
  var spy = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(en.isIntersecting){
        var id = "#" + en.target.id;
        navAnchors.forEach(function(a){ a.classList.toggle("active", a.getAttribute("href") === id && !a.classList.contains("nav-cta")); });
      }
    });
  }, {rootMargin:"-45% 0px -50% 0px"});
  sections.forEach(function(s){ if(s) spy.observe(s); });

  /* Reveal */
  var revealEls = document.querySelectorAll("[data-reveal]");
  if(reduce){
    revealEls.forEach(function(el){ el.classList.add("in"); });
  } else {
    var ro = new IntersectionObserver(function(entries){
      entries.forEach(function(en){
        if(en.isIntersecting){ en.target.classList.add("in"); ro.unobserve(en.target); }
      });
    }, {threshold:0.12, rootMargin:"0px 0px -8% 0px"});
    revealEls.forEach(function(el){ ro.observe(el); });
  }

  /* Tap */
  var isTouch = window.matchMedia("(hover: none)").matches;
  var mearn = document.getElementById("mearn");
  if(mearn){
    var mletters = mearn.querySelectorAll(".mearn-letter");
    mletters.forEach(function(btn){
      btn.addEventListener("click", function(){
        var wasOn = btn.classList.contains("on");
        mletters.forEach(function(b){ b.classList.remove("on"); });
        if(!wasOn){ btn.classList.add("on"); }
      });
    });
  }

  /* Scroll */
  if(mearn && !reduce){
    var mTicking = false;
    function mearnUpdate(){
      mTicking = false;
      var rect = mearn.getBoundingClientRect();
      var vh = window.innerHeight || document.documentElement.clientHeight;
      var p = (vh - rect.top) / (vh + rect.height);
      p = Math.max(0, Math.min(1, p));
      var r;
      if(p < 0.25)      r = 0;
      else if(p < 0.50) r = (p - 0.25) / 0.25;
      else if(p < 0.75) r = 1;
      else              r = Math.max(0, 1 - (p - 0.75) / 0.25);
      mearn.style.setProperty("--reveal", r.toFixed(3));
    }
    function mearnTick(){ if(!mTicking){ mTicking = true; requestAnimationFrame(mearnUpdate); } }
    window.addEventListener("scroll", mearnTick, { passive:true });
    window.addEventListener("resize", mearnTick);
    mearnUpdate();
  }

  /* Tilt */
  if(!reduce && !isTouch){
    document.querySelectorAll(".tilt").forEach(function(card){
      card.addEventListener("mousemove", function(e){
        var r = card.getBoundingClientRect();
        var px = (e.clientX - r.left) / r.width - .5;
        var py = (e.clientY - r.top) / r.height - .5;
        card.style.transform = "rotateY(" + (px*9) + "deg) rotateX(" + (-py*9) + "deg) translateY(-6px)";
      });
      card.addEventListener("mouseleave", function(){ card.style.transform = ""; });
    });
  }

  /* Titles */
  if(!reduce){
    document.querySelectorAll(".section-title[data-reveal]").forEach(function(el){
      var nodes = Array.prototype.slice.call(el.childNodes);
      el.textContent = "";
      var words = [];
      nodes.forEach(function(node){
        if(node.nodeType === 3){
          node.nodeValue.split(/(\s+)/).forEach(function(part){
            if(part === "") return;
            if(/^\s+$/.test(part)){ el.appendChild(document.createTextNode(" ")); }
            else { var s = document.createElement("span"); s.className = "tw"; s.textContent = part; el.appendChild(s); words.push(s); }
          });
        } else if(node.nodeType === 1){
          var w = document.createElement("span"); w.className = "tw"; w.appendChild(node); el.appendChild(w); words.push(w);
        }
      });
      words.forEach(function(w,i){ w.style.transitionDelay = (i * 0.06) + "s"; });
      el.classList.add("title-split");
    });
  }

  /* Counters */
  function countUp(numEl){
    var node = numEl.firstChild;
    if(!node || node.nodeType !== 3) return;
    var target = parseInt(numEl.getAttribute("data-target"), 10);
    if(isNaN(target)) return;
    var dur = 1500, start = null;
    function step(ts){
      if(!start) start = ts;
      var p = Math.min((ts - start) / dur, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      node.nodeValue = Math.round(eased * target).toString();
      if(p < 1) requestAnimationFrame(step); else node.nodeValue = target.toString();
    }
    requestAnimationFrame(step);
  }
  if(!reduce){
    var nums = document.querySelectorAll(".stat .num");
    nums.forEach(function(n){
      if(n.firstChild && n.firstChild.nodeType === 3){
        var t = parseInt(n.firstChild.nodeValue.replace(/\D/g,""), 10);
        if(!isNaN(t)){ n.setAttribute("data-target", String(t)); n.firstChild.nodeValue = "0"; }
      }
    });
    var numObs = new IntersectionObserver(function(entries){
      entries.forEach(function(en){ if(en.isIntersecting){ countUp(en.target); numObs.unobserve(en.target); } });
    }, {threshold:0.6});
    nums.forEach(function(n){ numObs.observe(n); });
  }

  /* Magnetic */
  if(!reduce && !isTouch){
    document.querySelectorAll(".hero-cta .btn").forEach(function(btn){
      btn.addEventListener("mousemove", function(e){
        var r = btn.getBoundingClientRect();
        var mx = (e.clientX - r.left - r.width/2) / r.width;
        var my = (e.clientY - r.top - r.height/2) / r.height;
        btn.style.transform = "translate(" + (mx*10) + "px," + (my*7) + "px)";
      });
      btn.addEventListener("mouseleave", function(){ btn.style.transform = ""; });
    });
  }

  /* Parallax */
  if(!reduce){
    var parEls = Array.prototype.slice.call(document.querySelectorAll("[data-parallax]"));
    if(parEls.length){
      var pTick = false;
      function parallax(){
        var vh = window.innerHeight;
        parEls.forEach(function(el){
          var r = el.getBoundingClientRect();
          var center = r.top + r.height/2 - vh/2;
          var speed = parseFloat(el.getAttribute("data-parallax")) || 0.05;
          el.style.transform = "translate3d(0," + (-center*speed) + "px,0)";
        });
        pTick = false;
      }
      function pRequest(){ if(!pTick){ pTick = true; window.requestAnimationFrame(parallax); } }
      document.addEventListener("scroll", pRequest, {passive:true});
      window.addEventListener("resize", pRequest);
      parallax();
    }
  }

  /* Smooth */
  if(!reduce && window.Lenis){
    document.documentElement.style.scrollBehavior = "auto";
    var lenis = new Lenis({ duration:1.1, easing:function(t){ return Math.min(1, 1.001 - Math.pow(2, -10*t)); } });
    function lraf(time){ lenis.raf(time); requestAnimationFrame(lraf); }
    requestAnimationFrame(lraf);
    document.querySelectorAll('a[href^="#"]').forEach(function(a){
      a.addEventListener("click", function(e){
        var id = a.getAttribute("href");
        if(id.length > 1){
          var target = document.querySelector(id);
          if(target){ e.preventDefault(); lenis.scrollTo(target, {offset:-64}); nav.classList.remove("open"); }
        }
      });
    });
  }
})();
</script>
@endverbatim

<!-- Social -->
<div class="social-dock">
  @foreach($socials as $soc)
  <a href="{{ $soc->url }}" class="social-btn" @if($soc->platform !== 'email')target="_blank" rel="noopener"@endif aria-label="{{ ucfirst($soc->platform) }}">
    <span class="s-label">{{ ucfirst($soc->platform) }}</span>
    @include('partials.icon', ['kind' => $soc->platform, 'size' => 18])
  </a>
  @endforeach
</div>
</body>
</html>
