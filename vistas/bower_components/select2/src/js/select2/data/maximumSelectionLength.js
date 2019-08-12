define([

], function (){
  function MaximumSelectionLength (Decorated, $e, options) {
    this.maximumSelectionLength = options.get('maximumSelectionLength');

    Decorated.call(this, $e, options);
  }

  MaximumSelectionLength.prototype.query =
    function (Decorated, params, callback) {
      var self = this;

      this.current(function (currentData) {
        var count = currentData != null ? currentData.length : 0;
        if (self.maximumSelectionLength > 0 &&
          count >= self.maximumSelectionLength) {
          self.trigger('results:message', {
            message: 'maximumSelected',
            args: {
              maximum: self.maximumSelectionLength
            }
          });
          return;
        }
        Decorated.call(self, params, callback);
      });
  };

  return MaximumSelectionLength;
});
