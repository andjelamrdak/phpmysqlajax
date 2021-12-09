$(document).ready(function () {
    prikaziZaposlene();
    dodajZaposlenog();
    obrisiZaposlenog();
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

function dodajZaposlenog() {

    $(document).on('click', '#btn_save', function () {

        var ime = $('#addime').val();
        var prezime = $('#addprezime').val();
        var plata = $('#addplata').val();
        var kompanija = $('#addkompanija').val();


        if (ime == '' || prezime == '' || plata == '' || kompanija == '') {
            $('#praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {
            $.ajax(
                {
                    url: 'save.php',
                    method: 'post',
                    data: { ime: ime, prezime: prezime, plata: plata, kompanija: kompanija },

                    success: function (data) {
                        $('#praznaPolja').hide();
                        $('#uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');

                        prikaziZaposlene();

                        $('#addime').val('');
                        $('#addprezime').val('');
                        $('#addplata').val('');
                        $('#addkompanija').val(1);

                    }
                });
        }
    })
}

function obrisiZaposlenog() {

    $(document).on('click', '#btn_delete', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#uspesnoObrisan').fadeIn().html(data).delay(1800).fadeOut('slow');
                prikaziZaposlene();
            }
        })
    })
}
