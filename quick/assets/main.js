$('#cut').on('submit', function (e) {
    e.preventDefault();
    var url = $('#url').val();
    $.ajax({
        type: 'post',
        url: 'config/addurl.php',
        data: {
            url: url
        },
        success: function (data, status, xhr) {
            document.getElementById("log").style.opacity="1";
            document.getElementById("log").style.display="block";
            $('#log').html(data);        
        },
        error: function (jqXhr, textStatus, errorMessage) {
            document.getElementById("log").style.opacity="1";
            document.getElementById("log").style.display="block";
            $('#log').append('Ошибка: ' + errorMessage);
        }
    });

});


function copy() {
    let copyText = document.getElementById("redirect");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Скопировано: " + copyText.value);
  }

  function hide() {
    let log = document.getElementById("log");
    log.style.display="none";
    let clear = document.getElementById("url");
    clear.value = "";
  }