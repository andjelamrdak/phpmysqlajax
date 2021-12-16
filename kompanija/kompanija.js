$(document).ready(function () {
    prikaziKompanije();
    dodajKompaniju();
    obrisiKompaniju();
    vratiKompaniju();
    azurirajKompaniju();
    pretraga();
    napuniSortTabelu();
    sortiranje();
});


function prikaziKompanije() {

    $.ajax(
        {
            url: 'crud/prikaz.php',
            success: function (data) {
                {
                    $('#tabelaKompanija').html(data);
                }
            }
        }
    )
}

function dodajKompaniju() {

    $(document).on('click', '#btn_save', function () {

        var naziv = $('#addnaziv').val();
        var lokacija = $('#addlokacija').val();
        var brojzaposlenih = $('#addbrojzaposlenih').val();


        if (naziv == '' || lokacija == '' || brojzaposlenih == '') {
            $('#praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {
            $.ajax(
                {
                    url: 'crud/save.php',
                    method: 'post',
                    data: { naziv: naziv, lokacija: lokacija, brojzaposlenih: brojzaposlenih },

                    success: function (data) {
                        $('#praznaPolja').hide();
                        $('#uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');

                        prikaziKompanije();

                        $('#addnaziv').val('');
                        $('#addlokacija').val('');
                        $('#addbrojzaposlenih').val('');

                    }
                });
        }
    })
}

function obrisiKompaniju() {

    $(document).on('click', '#btn_delete', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'crud/delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#uspesnoObrisan').fadeIn().html(data).delay(1800).fadeOut('slow');
                prikaziKompanije();
            }
        })
    })
}

function vratiKompaniju() {

    $(document).on('click', '#btn_edit', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'crud/get.php',
            method: 'post',
            data: { id: id },
            dataType: 'json',

            success: function (data) {
                $('#izmenaKompanije').modal('show');
                $('#kompanija_id').val(data.id);
                $('#upd_naziv').val(data.ime);
                $('#upd_lokacija').val(data.prezime);
                $('#upd_brojzaposlenih').val(data.plata);

            }
        });
    })

}

function azurirajKompaniju() {

    $(document).on('click', '#btn_update', function () {

        var id = $('#kompanija_id').val();
        var naziv = $('#upd_naziv').val();
        var lokacija = $('#upd_lokacija').val();
        var broj_zaposlenih = $('#upd_brojzaposlenih').val();

        if (id == '' || naziv == '' || lokacija == '' || broj_zaposlenih == '') {
            $('#upd_praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {

            $.ajax({
                url: 'crud/update.php',
                method: 'post',
                data: {
                    id: id,
                    naziv: naziv,
                    lokacija: lokacija,
                    broj_zaposlenih: broj_zaposlenih,
                },

                success: function (data) {
                    $('#upd_uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');
                    prikaziKompanije();
                }
            })
        }
    });
}





