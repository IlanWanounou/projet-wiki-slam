/* global $ */

$(document).ready(function () {
  const btnClose = '<button type="button" class="close" data-dismiss="alert" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>'
  const spinner = '<div class="spinner-grow" role="status"></div><p> Chargement ...</p>'
  const successLogDelete = '<div class="alert alert-dismissible alert-success" role="alert">Ce fichier de journalisation vient d\'être supprimé' + btnClose + '</div>'

  function getParent (element) {
    return $(element).parent().parent().parent()
  }

  function slowShowMessage (parent, message) {
    $(parent).fadeOut('slow', function () {
      $(parent).remove()
      $('.alerts').html(message)
    })
  }

  function showTimerDiff (start) {
    return Date.now() - start
  }

  function updateList () {
    $('#select').load(document.URL + ' #selectLog')
  }

  function showMessageAndUpdateList (parent, message) {
    slowShowMessage(parent, message)
    updateList()
  }

  function removeAlerts () {
    $('.alert').remove()
  }

  function showDeleteFail () {
    $('.alerts').html('<div class="alert alert-dismissible alert-danger" role="alert"><b>Echec :</b> Une erreur est survenue lors de la suppression' + btnClose + '</div>')
  }

  function replace (element, value) {
    $(element).html(value)
  }

  function showSpinner () {
    replace('#logs', spinner)
  }

  function setDefaultSelectedValue () {
    $('#selectLog').val('')
  }

  function getAttr (element, attribute) {
    return $(element).attr(attribute)
  }

  function trySearchLike (value) {
    const start = Date.now()
    setDefaultSelectedValue()
    $.post('',
      {
        search: value
      }, function (data) {
        if (data) {
          $('#logs').html(data)
          replace('#log-content', ' ')
          const diff = showTimerDiff(start)
          $('#logs small.multiple').append(' en ' + diff + ' ms')
        }
      }
    )
  }

  function deleteFile (elm) {
    const parent = getParent($(elm))
    const message = successLogDelete
    showMessageAndUpdateList(parent, message)
  }

  function deleteFolder (elm, dateFR) {
    const parent = $(elm).parent().parent().parent()
    const message = '<div class="alert alert-dismissible alert-success" role="alert">Les fichiers de journalisation du <b>' + dateFR + '</b> ont été supprimé' + btnClose + '</div>'
    showMessageAndUpdateList(parent, message)
  }

  function tryDeleteFile (file, element) {
    $.post('',
      {
        delete: file
      }, function (data) {
        if (data === 1) {
          deleteFile($(element))
        } else {
          showDeleteFail()
        }
      }
    )
  }

  function tryDeleteRepertory (repertory, element) {
    $.post('',
      {
        delete: repertory
      }, function (data) {
        if (data === 1) {
          deleteFolder($(element), repertory)
        } else {
          showDeleteFail()
        }
      }
    )
  }

  function tryOpenDirectory (repertory) {
    showSpinner()
    $.post('',
      {
        log: repertory
      }, function (data) {
        if (data) {
          replace('#logs', data)
          replace('#log-content', ' ')
        }
      }
    )
  }

  function tryOpenFile (file) {
    $.post('',
      {
        open: file
      }, function (data) {
        if (data) {
          replace('#log-content', data)
        }
      }
    )
  }

  // Recherche de fichiers via clavier
  $('#search').keyup(function () {
    removeAlerts()
    const value = $(this).val()
    trySearchLike(value)
  })

  // Suppression d'un fichier d'un zip
  $('body').on('click', '.delete-file', function (e) {
    e.preventDefault()
    removeAlerts()
    const file = getAttr($(this), 'deleteto')
    const element = $(this)
    tryDeleteFile(file, element)
  })

  // Suppression d'un zip
  $('body').on('click', '.delete-directory', function (e) {
    e.preventDefault()
    removeAlerts()
    const repertory = getAttr($(this), 'deleteto')
    const element = $(this)
    tryDeleteRepertory(repertory, element)
  })

  // Ouverture du contenu d'un zip
  $('body').on('click', '.open-directory', function (e) {
    e.preventDefault()
    removeAlerts()
    const repertory = getAttr($(this), 'openTo')
    $('#search').val(repertory)
    tryOpenDirectory(repertory)
  })

  // Choix d'une date parmis la liste du select
  $('body').on('change', '#selectLog', function () {
    removeAlerts()
    const repertory = $('#selectLog').val()
    $('#search').val('')
    tryOpenDirectory(repertory)
  })

  // Affichage du contenu d'un fichier d'un zip
  $('body').on('click', '.open-file', function (e) {
    e.preventDefault()
    removeAlerts()
    const file = getAttr($(this), 'openTo')
    tryOpenFile(file)
  })
})
