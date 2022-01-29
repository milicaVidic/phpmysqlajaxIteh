$(document).ready(function () {
    pretraziPatike();
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