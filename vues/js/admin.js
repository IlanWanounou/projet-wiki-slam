/* global $, img, prew, confirm, CodeMirror, fileid, preview */

$(document).ready(function () {
  $('#form-favicon').click(function () {
    $('#fileid').click()
  })
  fileid.onchange = evt => {
    const [file] = fileid.files
    if (file) {
      $('#preview').attr('src', URL.createObjectURL(file))
      $('#form-favicon-delete').removeAttr('hidden')
      $('#form-favicon-push').removeAttr('hidden')
      $('#fav-prev-msg').html('Prévisualisation du favicon : ')
    }
  }
  $('#form-favicon-delete').click(function (e) {
    preview.src = '/favicon.ico'
    $('#form-favicon-delete').attr('hidden', '')
    $('#form-favicon-push').attr('hidden', '')
    fileid.value = ''
    $('#fav-prev-msg').html('Favicon actuel : ')
    e.preventDefault()
  })
  $('body').on('click', '#form-maintenance-on', function () {
    const isExecuted = confirm('Êtes vous sur de vouloir mettre en maintenance le site ?')
    if (isExecuted) {
      call('danger')
    }
  })
  $('body').on('click', '#form-maintenance-off', function () {
    const isExecuted = confirm('Êtes vous sur de vouloir désactiver la maintenance sur le site ?')
    if (isExecuted) {
      call('info')
    }
  })

  let success = '<div class="alert alert-success" role="alert">'
  success += 'Les modifications ont bien été effectuées'
  success += '<button type="button" class="close" data-dismiss="alert" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>'
  success += '</div>'

  function call (bgColor) {
    $('#message').html('').hide()
    let btn = '<button class="btn btn-" + bgColor + " btn-sm" type="button" disabled>'
    btn += '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
    btn += ' Chargement...'
    btn += '</button>'

    $('.form-maintenance').replaceWith(btn)
    $.post('',
      {
        maintenance: 'toggle'
      }, function (data) {
        loadMaintenance()
        $('#message').html(success).hide().show(100)
      }
    )
  }

  function loadMaintenance () {
    $('.form-group.maintenance').load(document.URL + ' .form-group.maintenance > div')
  }

  const initFooter1 = $('#footer-content-1').val()
  const initFooter2 = $('#footer-content-2').val()

  $('.form-group.footer input').keyup(function (e) {
    verifFooter()
  })
  document.getElementById('footer-form').addEventListener('reset', resetFooter)

  function verifFooter () {
    if ($('#footer-content-1').val() === initFooter1 && $('#footer-content-2').val() === initFooter2) {
      resetFooter()
    } else {
      $('#send-footer-content').removeAttr('disabled')
      $('#reset-footer-content').removeAttr('disabled')
    }
  }

  let editor
  editor = CodeMirror.fromTextArea(document.getElementById('myTextArea'), {
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true,
    mode: 'css',
    theme: 'ayu-dark',
    indentUnit: 4
  })
  $('body').on('DOMSubtreeModified', '.CodeMirror-code', function () {
    verifCss()
  })

  let initCodeCss = $('.CodeMirror-code').html()

  function verifCss () {
    if ($('.CodeMirror-code').html() === initCodeCss) {
      resetCss()
    } else {
      $('#send-css-content').removeAttr('disabled')
      $('#reset-css-content').removeAttr('disabled')
    }
  }

  $('#send-css-content').click(function () {
    $.post('',
      {
        css: editor.getValue()
      }, function (data) {
        if (data) {
          console.log(data)
          $('#message').html(data).hide().show(500)
          initCodeCss = $('.CodeMirror-code').html()
          $('html, body').delay(50).animate({
            scrollTop: $('#top').offset().top
          }, 800, function () {
            window.location.hash = ''
          })
        }
      }
    )
  })

  $('#reset-css-content').click(function () {
    $('.CodeMirror').remove('')
    $('.CodeMirror-code').html(initCodeCss)
    editor = CodeMirror.fromTextArea(document.getElementById('myTextArea'), {
      lineNumbers: true,
      styleActiveLine: true,
      matchBrackets: true,
      mode: 'css',
      theme: 'ayu-dark',
      indentUnit: 4
    })
  })

  setTimeout(function () {
    img.onchange = evt => {
      const [file] = img.files
      if (file) {
        prew.src = URL.createObjectURL(file)
      }
    }
  }, 1)
})

function resetFooter () {
  $('#send-footer-content').attr('disabled', '')
  $('#reset-footer-content').attr('disabled', '')
}
function resetCss () {
  $('#send-css-content').attr('disabled', '')
  $('#reset-css-content').attr('disabled', '')
}
