$(document).ready(function () {
    pretraziPatike();
    sortirajPatike();
});

function pretraziPatike() {

    $(document).on('click', '#pretrazi_dugme', function () {

        var pretraga_unos = $('#pretrazi_unos').val();

        $.ajax(
            {
                url: 'pretrazi.php',
                method: 'post',
                data: { PretragaUnos: pretraga_unos },

                success: function (data_response) {
                    {
                        $(".patike_div_wrapper").empty();
                        $(".patike_div_wrapper").html(data_response);
                    }
                }
            }
        )
    })
}


function sortirajPatike() {

    $(document).on('click', '#sortiraj_dugme', function () {

        let mod_vel_boja = $('#sortiranje_select').val();
        let poredak = $('#poredak_select').val();

        $.ajax(
            {
                url: 'sortiraj.php',
                method: 'post',
                data: { Mod_Vel_Boja: mod_vel_boja, Poredak: poredak },

                success: function (data_response) {
                    {
                        $(".patike_div_wrapper").empty();
                        $(".patike_div_wrapper").html(data_response);
                    }
                }
            }
        )
    })

}