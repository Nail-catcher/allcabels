$(function() {

  $('[data-modal]').on('click', function() {
    let _id = $(this).data('target');
    $('#' + _id).show('fade', 300);
    $('#' + _id).find('.modal__content').delay(100).show('drop', 500);
    return false;
  })

  $('[data-dismiss]').on('click', function() {
    $(this).closest('.modal__content').hide('drop', 600);
    $(this).closest('.modal').delay(300).hide('fade', 600);
    return false;
  })

  $('.modal__overlay').on('click', function() {
    $(this).next('.modal__content').hide('drop', 600);
    $(this).closest('.modal').delay(300).hide('fade', 600);
    return false;
  })

  $('[data-accordion]').on('click', function() {
    $(this).toggleClass('open')
  })

  $('#sortable').sortable({
    placeholder: "ui-state-highlight",
    cursor: 'move'
  })

  $('.js-select').multiSelect()

  let _input = []
  let _tags = []

  $('.select__container-button').on('click', function() {
    $(this).closest('.select__container').toggleClass('open')

    if ($(this).closest('.select__container').hasClass('single')) {
      _input = []
      $(this).closest('.select__container').find('.select__dropdown-item').each(function(i, e) {
        _input.push($(e).find('input:checked').val())
      })
      _input = _input.filter(e => e !== undefined)
      if (_input.length > 0) {
        $(this).closest('.select__container').find('.select__container-button').html('<span>' + _input + '</span><i></i>')
      } else {
        let _ph = $(this).closest('.select__container').find('.select__container-button').data('placeholder')
        $(this).closest('.select__container').find('.select__container-button').html(_ph + '<i></i>')
      }
    }

    if ($(this).closest('.select__container').hasClass('tags')) {
      _tags = []
      $(this).closest('.select__container').find('.select__dropdown-item').each(function(i, e) {
        _tags.push($(e).find('input:checked').val())
      })
      _tags = _tags.filter(e => e !== undefined)

      if (_tags.length > 0) {
      	$('.content__filter-tags').empty()
      	_tags.forEach(function(e) {
      		$('.content__filter-tags').append("<span>" + e + "</span>")
      	})
      }
    }
  })

  $('body').on('click', function(e) {
    if ($(e.target).parents('.select__container').length < 1) {
    	$('.select__container').removeClass('open')

    	if ($('.select__container').hasClass('single')) {
    	  _input = []
    	  $('.select__container.single').find('.select__dropdown-item').each(function(i, e) {
    	    _input.push($(e).find('input:checked').val())
    	  })
    	  _input = _input.filter(e => e !== undefined)
    	  if (_input.length > 0) {
    	    $('.select__container.single').find('.select__container-button').html('<span>' + _input + '</span><i></i>')
    	  } else {
    	    let _ph = $('.select__container.single').find('.select__container-button').data('placeholder')
    	    $('.select__container.single').find('.select__container-button').html(_ph + '<i></i>')
    	  }
    	}
    	if ($('.select__container').hasClass('tags')) {
	      _tags = []
	      $('.select__container.tags').find('.select__dropdown-item').each(function(i, e) {
	        _tags.push($(e).find('input:checked').val())
	      })
	      _tags = _tags.filter(e => e !== undefined)

	      if (_tags.length > 0) {
	      	$('.content__filter-tags').empty()
	      	_tags.forEach(function(e) {
	      		$('.content__filter-tags').append("<span>" + e + "</span>")
	      	})
	      }
	    }
    }
  })

})