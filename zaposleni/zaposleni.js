$(document).ready(function () {
    prikaziZaposlene();
    dodajZaposlenog();
    obrisiZaposlenog();
    vratiZaposlenog();
    azurirajZaposlenog();
    pretraga();
    napuniSortTabelu();
    sortiranje();
});


function prikaziZaposlene() {

    $.ajax(
        {
            url: 'crud/prikaz.php',
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
                    url: 'crud/save.php',
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
            url: 'crud/delete.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#uspesnoObrisan').fadeIn().html(data).delay(1800).fadeOut('slow');
                prikaziZaposlene();
            }
        })
    })
}

function vratiZaposlenog() {

    $(document).on('click', '#btn_edit', function () {

        var id = $(this).attr('value');

        $.ajax({
            url: 'crud/get.php',
            method: 'post',
            data: { id: id },
            dataType: 'json',

            success: function (data) {
                $('#izmenaZaposlenog').modal('show');
                $('#zaposleni_id').val(data.id);
                $('#upd_ime').val(data.ime);
                $('#upd_prezime').val(data.prezime);
                $('#upd_plata').val(data.plata);
                $('#upd_kompanija').val(data.kompanija_id);
            }
        });
    })

}


function azurirajZaposlenog() {

    $(document).on('click', '#btn_update', function () {


        var id = $('#zaposleni_id').val();
        var ime = $('#upd_ime').val();
        var prezime = $('#upd_prezime').val();
        var plata = $('#upd_plata').val();
        var kompanija = $('#upd_kompanija').val();

        if (id == '' || ime == '' || prezime == '' || plata == '' || kompanija == '') {
            $('#upd_praznaPolja').slideDown().delay(1500).fadeOut('slow');
        }
        else {

            $.ajax({
                url: 'crud/update.php',
                method: 'post',
                data: {
                    id: id,
                    ime: ime,
                    prezime: prezime,
                    plata: plata,
                    kompanija: kompanija,
                },

                success: function (data) {
                    $('#upd_uspesnoSacuvan').fadeIn().html(data).delay(1800).fadeOut('slow');
                    prikaziZaposlene();
                }
            })
        }
    });
}


function pretraga() {

    $(document).on('keyup', '#bar', function () {

        var key = this.value;

        $.ajax(
            {
                url: 'search.php',
                method: 'post',
                data: { key: key },
                success: function (data) {
                    {
                        $('#searchtabela').html(data);
                    }
                }
            }
        )

    })
}

function napuniSortTabelu() {
    $.ajax(
        {
            url: 'prikazPocetniSort.php',
            success: function (data) {
                {
                    $('#tabelasort').html(data);
                }
            }
        }
    )
}


function sortiranje() {

    $(document).on('click', 'th', function () {

        let kolona = $(this).attr('id');
        let sort = $(this).attr('name');

        $.ajax(
            {
                url: 'sort.php',
                method: 'post',
                data: { kolona: kolona, sort: sort },
                success: function (data) {
                    {
                        $('#tabelasort').html(data);
                    }
                }
            }
        )

    })

}