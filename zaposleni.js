$(document).ready(function () {
    prikaziZaposlene();
});


function prikaziZaposlene() {

    $.ajax(
        {
            url: 'prikaz.php',
            success: function (data) {
                {
                    $('#tabelaZaposleni').html(data);
                }
            }
        }
    )
}

