#!/usr/bin/env node
/**
 * Contrôle de syntaxe PHP de tout le dépôt (site statique + thème).
 *
 * Une erreur de syntaxe dans functions.php rend WordPress totalement
 * inaccessible (« Parse error … on line N ») : ce contrôle doit passer
 * avant toute livraison.
 *
 * Utilisation :
 *   node tools/lint-php.js            # tout le dépôt
 *   node tools/lint-php.js fichier…   # fichiers précis
 *
 * Prérequis : npm install (php-parser est une devDependency du thème).
 * Si `php` est disponible en local, `php -l` fait le même travail fichier
 * par fichier.
 */
'use strict';

const fs = require('fs');
const path = require('path');

const ROOT = path.resolve(__dirname, '..');
const THEME = path.join(ROOT, 'ika-solution-theme');
const SKIP = new Set(['node_modules', 'vendor', '.git', '__pycache__']);

let Engine;
try {
  Engine = require(path.join(THEME, 'node_modules', 'php-parser'));
} catch (e) {
  try {
    Engine = require('php-parser');
  } catch (e2) {
    console.error(
      'php-parser introuvable. Lancez « npm install » dans ika-solution-theme,\n' +
      'ou utilisez « php -l » si PHP est installé.'
    );
    process.exit(2);
  }
}

const parser = new Engine({
  parser: { extractDoc: false, suppressErrors: false },
  ast: { withPositions: true },
});

function collect(dir, out) {
  for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
    if (SKIP.has(entry.name)) continue;
    const full = path.join(dir, entry.name);
    if (entry.isDirectory()) collect(full, out);
    else if (entry.name.endsWith('.php')) out.push(full);
  }
  return out;
}

const files = process.argv.length > 2 ? process.argv.slice(2) : collect(ROOT, []);
let failed = 0;

for (const file of files) {
  const rel = path.relative(ROOT, path.resolve(file));
  try {
    parser.parseCode(fs.readFileSync(file, 'utf8'), file);
  } catch (err) {
    failed++;
    const line = err.lineNumber || (err.token && err.token.line) || '?';
    console.log(`  ERREUR    ${rel} (ligne ${line}) : ${err.message.split('\n')[0]}`);
  }
}

if (failed) {
  console.log(`\nÉCHEC : ${failed} fichier(s) PHP avec une erreur de syntaxe sur ${files.length}.`);
  process.exit(1);
}
console.log(`OK : ${files.length} fichier(s) PHP sans erreur de syntaxe.`);
