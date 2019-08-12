define([

], function () {
  function MinimumInputLength (Decorated, $e, options) {
    this.minimumInputLength = options.get('minimumInputLength');

    Decorated.call(this, $e, options);
  }

  MinimumInputLength.prototype.query = function (Decorated, params, callback) {
    params.term = params.term || '';

    if (params.term.length < this.minimumInputLength) {
      this.trigger('results:message', {
        message: 'inputTooShort',
        args: {
          minimum: this.minimumInputLength,
          input: params.term,
          params: params
        }
      });

      return;
    }

    Decorated.call(this, params, callback);
  };

  return MinimumInputLength;
});
