define([

], function () {
  function MaximumInputLength (Decorated, $e, options) {
    this.maximumInputLength = options.get('maximumInputLength');

    Decorated.call(this, $e, options);
  }

  MaximumInputLength.prototype.query = function (Decorated, params, callback) {
    params.term = params.term || '';

    if (this.maximumInputLength > 0 &&
        params.term.length > this.maximumInputLength) {
      this.trigger('results:message', {
        message: 'inputTooLong',
        args: {
          maximum: this.maximumInputLength,
          input: params.term,
          params: params
        }
      });

      return;
    }

    Decorated.call(this, params, callback);
  };

  return MaximumInputLength;
});
