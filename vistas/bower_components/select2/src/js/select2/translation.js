define([
  'jquery',
  'require'
], function ($, require) {
  function Translation (Dect) {
    this.Dect = Dect || {};
  }

  Translation.prototype.all = function () {
    return this.Dect;
  };

  Translation.prototype.get = function (key) {
    return this.Dect[key];
  };

  Translation.prototype.extend = function (translation) {
    this.Dect = $.extend({}, translation.all(), this.Dect);
  };

  // Static functions

  Translation._cache = {};

  Translation.loadPath = function (path) {
    if (!(path in Translation._cache)) {
      var translations = require(path);

      Translation._cache[path] = translations;
    }

    return new Translation(Translation._cache[path]);
  };

  return Translation;
});
