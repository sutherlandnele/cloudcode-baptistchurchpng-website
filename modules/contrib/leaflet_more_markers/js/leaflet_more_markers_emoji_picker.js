(function (drupalSettings) {

  new FgEmojiPicker({
    trigger: ['.trigger-emoji-picker'],
    position: ['bottom', 'right'],
    dir: drupalSettings.path.baseUrl + drupalSettings.leaflet_more_markers.dataDir,
    preFetch: false,
    emit(obj, triggerElement) {
      // Find the closest text input element (via the parent div).
      triggerElement.closest('div').querySelector('input[type="text"]').value = obj.emoji
    }
  })

})(drupalSettings)
