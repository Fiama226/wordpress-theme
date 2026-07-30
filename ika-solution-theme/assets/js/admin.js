/**
 * Media Library upload for IKA Solution meta boxes.
 * Adds a "Select Image" button next to image fields that opens the
 * WordPress media library and fills the field with the attachment URL.
 */
(function () {
  'use strict';

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.ika-media-upload');
    if (!btn) {
      return;
    }

    e.preventDefault();

    var fieldId = btn.getAttribute('data-field');
    var field = document.getElementById(fieldId);
    var preview = document.getElementById(fieldId + '_preview');

    var frame = wp.media({
      title: 'Choisir une image',
      button: { text: 'Utiliser cette image' },
      multiple: false,
    });

    frame.on('select', function () {
      var attachment = frame.state().get('selection').first().toJSON();
      if (field) {
        // Stocke l'URL de l'image dans le champ.
        field.value = attachment.url;
        // Déclenche l'événement change pour les frameworks éventuels.
        field.dispatchEvent(new Event('change', { bubbles: true }));
      }
      if (preview) {
        preview.innerHTML =
          '<img src="' +
          attachment.url +
          '" style="max-width:200px;max-height:120px;border-radius:8px;margin-top:4px;">';
      }
    });

    frame.open();
  });

  // Supprimer le média sélectionné.
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.ika-media-remove');
    if (!btn) {
      return;
    }

    e.preventDefault();

    var fieldId = btn.getAttribute('data-field');
    var field = document.getElementById(fieldId);
    var preview = document.getElementById(fieldId + '_preview');

    if (field) {
      field.value = '';
      field.dispatchEvent(new Event('change', { bubbles: true }));
    }
    if (preview) {
      preview.innerHTML = '';
    }
  });
})();
