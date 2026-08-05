<?php /* Template Name: Proxmox */ ?>
<?php
/**
 * Page Proxmox — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * La page précédente reprenait des textes publiés par un tiers : elle a été
 * entièrement réécrite (formulations 100 % originales) tout en conservant
 * le même périmètre fonctionnel — Proxmox Virtual Environment, Proxmox
 * Backup Server et Proxmox Mail Gateway — et la présentation par onglets.
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_pmx_contact_subjects' ) ) {
	/**
	 * Sujets du formulaire de contact propres à la page Proxmox.
	 *
	 * @return string[]
	 */
	function ika_pmx_contact_subjects() {
		return array(
			__( 'Proxmox Virtual Environment (virtualisation)', 'ika-solution' ),
			__( 'Proxmox Backup Server (sauvegarde)', 'ika-solution' ),
			__( 'Proxmox Mail Gateway (sécurité messagerie)', 'ika-solution' ),
			__( 'Autre demande liée à Proxmox', 'ika-solution' ),
		);
	}
}

/**
 * Rend un groupe d'onglets (boutons + panneaux de cartes).
 *
 * @param string $group_id Préfixe unique du groupe (ex : 've').
 * @param array  $tabs     Onglets : id, label, icon, items[ {title, text} ].
 */
function pmx_render_tabs( $group_id, $tabs ) {
	?>
	<div class="mt-10" data-pmx-tabs>
		<div class="flex flex-wrap gap-2.5" role="tablist">
			<?php foreach ( $tabs as $pmx_tab ) : ?>
			<button type="button" role="tab" class="pmx-tab rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue" data-pmx-target="<?php echo esc_attr( $group_id . '-' . $pmx_tab['id'] ); ?>" aria-selected="false">
				<span aria-hidden="true"><?php echo esc_html( $pmx_tab['icon'] ); ?></span> <?php echo esc_html( $pmx_tab['label'] ); ?>
			</button>
			<?php endforeach; ?>
		</div>
		<?php foreach ( $tabs as $pmx_tab ) : ?>
		<div id="<?php echo esc_attr( $group_id . '-' . $pmx_tab['id'] ); ?>" class="pmx-panel mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3" role="tabpanel" hidden>
			<?php foreach ( $pmx_tab['items'] as $pmx_item ) : ?>
			<article class="flex h-full flex-col rounded-2xl bg-white p-6 shadow-clean transition hover:-translate-y-1 hover:shadow-premium">
				<h3 class="text-lg font-black leading-snug text-ikaBlue"><?php echo esc_html( $pmx_item['title'] ); ?></h3>
				<p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( $pmx_item['text'] ); ?></p>
				<?php if ( ! empty( $pmx_item['links'] ) ) : ?>
				<div class="mt-4 flex flex-wrap gap-2">
					<?php foreach ( $pmx_item['links'] as $pmx_link ) : ?>
					<a class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue transition hover:bg-ikaBlue hover:text-white" href="<?php echo esc_url( $pmx_link[1] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $pmx_link[0] ); ?> ↗</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</article>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

// Onglets édités depuis l'administration (menu « Onglets Proxmox »),
// avec repli sur le contenu d'origine si aucun n'a encore été créé.
$pmx_ve_tabs  = ika_pmx_tabs_for( 've' );
$pmx_pbs_tabs = ika_pmx_tabs_for( 'pbs' );
$pmx_pmg_tabs = ika_pmx_tabs_for( 'pmg' );

get_header();
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo esc_url( ika_asset( 'images/proxmox-hero.jpg' ) ); ?>" alt="Infrastructure virtualisée Proxmox">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_pmx_hero_back' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_pmx_hero_eyebrow' ) ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_pmx_hero_title' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo esc_html( ika_opt( 'ika_pmx_hero_text' ) ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( ika_list_option( 'ika_pmx_hero_badges' ) as $ika_badge ) : ?>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
          <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_pmx_hero_cta_primary' ) ); ?></a>
          <a href="#proxmox-ve" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pmx_hero_cta_secondary' ) ); ?></a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/proxmox-hero.jpg' ) ); ?>" alt="Salle serveur virtualisée sous Proxmox">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_pmx_hero_stat_label' ) ); ?></p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_pmx_hero_stat_value' ) ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== OPEN SOURCE + REPO ENTREPRISE ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <span class="flex h-16 w-16 items-center justify-center rounded-2xl bg-ikaRed text-2xl" aria-hidden="true">🛡</span>
        <div>
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_pmx_repo_title' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_pmx_repo_text' ) ); ?></p>
        </div>
        <a href="<?php echo esc_url( ika_opt( 'ika_pmx_repo_link_url' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_pmx_repo_link_label' ) ); ?> ↗</a>
      </div>
    </div>
  </section>

  <!-- ===================== PROXMOX VE ===================== -->
  <section id="proxmox-ve" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_pmx_ve_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_pmx_ve_title' ) ); ?></h2>
          <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pmx_ve_text1' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pmx_ve_text2' ) ); ?></p>
          <div class="mt-6 flex flex-wrap items-center gap-6">
            <img class="h-8 w-auto opacity-60 transition hover:opacity-100" src="<?php echo esc_url( ika_asset( 'images/proxmox/logo-debian.png' ) ); ?>" alt="Debian GNU/Linux" loading="lazy">
            <img class="h-11 w-auto opacity-60 transition hover:opacity-100" src="<?php echo esc_url( ika_asset( 'images/proxmox/logo-kvm.png' ) ); ?>" alt="KVM — virtualisation complète" loading="lazy">
            <img class="h-9 w-auto opacity-60 transition hover:opacity-100" src="<?php echo esc_url( ika_asset( 'images/proxmox/logo-lxc.png' ) ); ?>" alt="LXC — conteneurs Linux" loading="lazy">
          </div>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_pmx_ve_caption' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/proxmox/proxmox-backup-server-dashboard.png' ) ); ?>" alt="Interface web de Proxmox Virtual Environment" loading="lazy">
        </div>
      </div>

      <?php pmx_render_tabs( 've', $pmx_ve_tabs ); ?>
    </div>
  </section>

  <!-- ===================== CEPH ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo esc_url( ika_asset( 'images/proxmox/logo-ceph.png' ) ); ?>" alt="Ceph" loading="lazy">
        <div>
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_pmx_ceph_title' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_pmx_ceph_text' ) ); ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?php echo esc_url( ika_opt( 'ika_pmx_ceph_link1_url' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_pmx_ceph_link1_label' ) ); ?></a>
          <a href="<?php echo esc_url( ika_opt( 'ika_pmx_ceph_link2_url' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pmx_ceph_link2_label' ) ); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PROXMOX BACKUP SERVER ===================== -->
  <section id="proxmox-backup" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo esc_url( ika_asset( 'images/proxmox-backup.jpg' ) ); ?>" alt="Protection des données">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_pmx_pbs_eyebrow' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl"><?php echo esc_html( ika_opt( 'ika_pmx_pbs_title' ) ); ?></h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p><?php echo esc_html( ika_opt( 'ika_pmx_pbs_text1' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_pmx_pbs_text2' ) ); ?></p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_pmx_pbs_cta' ) ); ?></a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/proxmox-backup.jpg' ) ); ?>" alt="Protection des données avec Proxmox Backup Server">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_pmx_pbs_feat_eyebrow' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_pmx_pbs_feat_title' ) ); ?></h2>
        <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pmx_pbs_feat_text' ) ); ?></p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_pmx_pbs_feat_caption' ) ); ?></span>
        </div>
        <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/proxmox/proxmox-backup-server-dashboard.png' ) ); ?>" alt="Tableau de bord de Proxmox Backup Server" loading="lazy">
      </div>

      <?php pmx_render_tabs( 'pbs', $pmx_pbs_tabs ); ?>
    </div>
  </section>

  <!-- ===================== PROXMOX MAIL GATEWAY ===================== -->
  <section id="proxmox-mail-gateway" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_pmx_pmg_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_pmx_pmg_title' ) ); ?></h2>
          <div class="mt-5 grid gap-4 text-base leading-8 text-slate-600">
            <p><?php echo esc_html( ika_opt( 'ika_pmx_pmg_text1' ) ); ?></p>
            <p><?php echo esc_html( ika_opt( 'ika_pmx_pmg_text2' ) ); ?></p>
          </div>
          <div class="mt-6 flex flex-wrap gap-3">
            <?php foreach ( ika_list_option( 'ika_pmx_pmg_badges' ) as $ika_badge ) : ?>
            <span class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
            <?php endforeach; ?>
          </div>
          <a href="<?php echo esc_url( ika_opt( 'ika_pmx_pmg_doc_url' ) ); ?>" target="_blank" rel="noopener" class="mt-7 inline-flex items-center gap-2 text-sm font-black text-ikaRed transition hover:text-red-700"><?php echo esc_html( ika_opt( 'ika_pmx_pmg_doc_label' ) ); ?> <span aria-hidden="true">→</span></a>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_pmx_pmg_caption' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/proxmox/proxmox-mail-gateway-infrastructure.png' ) ); ?>" alt="Schéma d’architecture : Proxmox Mail Gateway entre le pare-feu et le serveur de messagerie" loading="lazy">
        </div>
      </div>

      <?php pmx_render_tabs( 'pmg', $pmx_pmg_tabs ); ?>
    </div>
  </section>

  <!-- ===================== VOTRE PROJET PROXMOX ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-3">
        <article class="reveal flex h-full flex-col rounded-2xl bg-white p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">01</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pmx_proj_1_title' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pmx_proj_1_text' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-white p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pmx_proj_2_title' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pmx_proj_2_text' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-white p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pmx_proj_3_title' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pmx_proj_3_text' ) ); ?></p>
        </article>
      </div>
    </div>
  </section>

  <?php
  // Bloc contact commun au thème, avec les sujets adaptés à cette page
  // et sans la carte Google Maps (comme sur la page d'origine).
  $GLOBALS['ika_contact_hide_map'] = true;
  add_filter( 'ika_contact_subjects', 'ika_pmx_contact_subjects' );
  get_template_part( 'template-parts/contact' );
  remove_filter( 'ika_contact_subjects', 'ika_pmx_contact_subjects' );
  unset( $GLOBALS['ika_contact_hide_map'] );
  ?>

</main>

<?php get_footer(); ?>
