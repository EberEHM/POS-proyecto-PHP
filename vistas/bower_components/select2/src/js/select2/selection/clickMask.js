define([
  'jquery'
], function ($) {
  function ClickMask () { }

  ClickMask.prototype.bind = function (Decorate, $container, container) {
    var self = this;

    Decorate.call(this, $container, container);

    this.$mask = $(
      '<div class="select2-close-mask"></div>'
    );

    this.$mask.on('mousedown touchstart click', function () {
      self.trigger('close', {});
    });
  };

  ClickMask.prototype._attachCloseHandler = function (Decorate, container) {
    $(document.body).append(this.$mask);
  };

  ClickMask.prototype._detachCloseHandler = function (deocrate, container) {
    this.$mask.detach();
  };

  return ClickMask;
});
