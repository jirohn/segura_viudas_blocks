(function ($, Drupal, drupalSettings) {
    'use strict';

    Drupal.behaviors.modalMessages = {
      attach: function (context, settings) {
        if (drupalSettings.change_password_success) {
          window.showModalMessage(drupalSettings.change_password_success);
        }
      }
    };

    window.showModalMessage = function (message) {
      // Crear el modal y su contenido.
      Drupal.ajax({
        url: '/modal-message',
        submit: {
          message: message
        }
      }).execute();
    };

  })(jQuery, Drupal, drupalSettings);