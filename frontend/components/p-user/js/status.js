/**
 *  Plugin name:    User Status
 *  Author:         Chiffa
 *  Web:            http://goweb.pro
 */


;(function($) {
    "use strict";

    $.widget( "livestreet.lsUserStatus", $.livestreet.lsComponent, {

        options: {
            urls: {
                save: null
            },
            selectors: {
                text: '.js-user-status-text',
                date: '.js-user-status-date',
                trigger: '.js-user-status-trigger',
                editor: '.js-user-status-editor',
                form: '.js-user-status-form',
                form_text: '.js-user-status-form-text',
            },
            classes: {
            }
        },

        _create: function () {
            this._super();

            this._on(this.elements.trigger, { 'click' : function (event) {
                this.editorShow();
                event.preventDefault();
            }});

            this._on(this.elements.form, { 'submit' : function (event) {
                this.save();
                event.preventDefault();
            }});

            $(document).on( 'click', this.editorHide.bind(this) );

            $('body').on( 'click', '.js-user-status-editor, .js-user-status-trigger', function (event) {
                event.stopPropagation();
            });
        },

        /**
         * Показывает редактор
         */
        editorShow: function() {
            this.elements.editor.fadeIn('fast', function() {
                ls.utils.formUnlock(this.elements.form);
                this.elements.form_text.focus();
            }.bind(this));
        },

        /**
         * Скрывает редактор
         */
        editorHide: function() {
            this.elements.editor.fadeOut('fast', function() {
                ls.utils.formLock(this.elements.form);
            }.bind(this));
        },

        /**
         * Возвращает текст статуса из формы
         */
        getText: function() {
            return this.elements.form_text.val();
        },

        /**
         * Устанавливает текст статуса в форме
         */
        setText: function(value) {
            this.elements.form_text.val(value);
        },

        /**
         * Возвращает оригинал текста статуса из формы
         */
        getTextOriginal: function() {
            return this.elements.form_text.data('value');
        },

        /**
         * Устанавливает оригинал текста статуса в форме
         */
        setTextOriginal: function(value) {
            this.elements.form_text.data('value', value);
        },

        /**
         * Сохраняет статус
         */
        save: function() {
            var value    = this.getText(),
                original = this.getTextOriginal();

            if (value == original) {
                this.editorHide();
            } else {
                this._setParam( 'text', value );
                this._submit( 'save', this.elements.form, function ( response ) {
                    this.elements.text.text(response.sStatusText);
                    this.elements.date.text(response.sStatusDate);
                    this.setTextOriginal(value);
                    this.setText(value);
                    this.editorHide();
                });
            }
        },

    });
})(jQuery);
