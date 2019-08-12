define([

], function () {
  function AttachContainer (Decorated, $element, options) {
    Decorated.call(this, $element, options);
  }

  AttachContainer.prototype.position =
    function (Decorated, $dropdown, $container) {
    var $dropdownContainer = $container.find('.dropdown-wrapper');
    $dropdownContainer.append($dropdown);

    $dropdown.addClass('select2-dropdown--below');
    $container.addClass('select2-container--below');
  };

  return AttachContainer;
});
