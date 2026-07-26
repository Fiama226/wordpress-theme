/**
 * Configuration Tailwind du thème IKA Solution Pro.
 *
 * Compilation (voir package.json) :
 *   npm run build:css      → assets/css/tailwind.css minifié
 *   npm run watch:css      → recompilation à la volée pendant le développement
 *
 * Le CDN Tailwind n'est plus utilisé : il compilait le CSS dans le navigateur
 * à chaque visite (FOUC, pénalité Core Web Vitals, dépendance à un tiers).
 */
module.exports = {
  content: ['./*.php', './template-parts/**/*.php', './inc/**/*.php', './assets/js/**/*.js'],
  safelist: [
    // Classes construites dynamiquement en PHP/JS et donc invisibles au scan.
    'bg-ikaBlue',
    'bg-ikaRed',
    'bg-ikaSoft',
    'bg-white',
    'text-white',
    'text-ikaBlue',
    'text-slate-700',
    'shadow-clean',
    'bg-white/35',
    'max-h-14',
    'max-h-16',
    'max-h-20',
  ],
  theme: {
    extend: {
      colors: {
        ikaBlue: '#1270b8',
        ikaBlueDark: '#0d4a7e',
        ikaRed: '#e51a37',
        ikaInk: '#111827',
        ikaSoft: '#f4f7fb',
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'Segoe UI', 'Arial'],
      },
      boxShadow: {
        premium: '0 24px 70px rgba(4, 31, 77, 0.14)',
        clean: '0 12px 40px rgba(17, 24, 39, 0.10)',
      },
      animation: {
        float: 'float 7s ease-in-out infinite',
        reveal: 'reveal .8s ease forwards',
        marquee: 'marquee 26s linear infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-16px)' },
        },
        reveal: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        marquee: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' },
        },
      },
    },
  },
  plugins: [],
};
