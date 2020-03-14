
    $(document).ready(function () {

        $('#selectall').on('click', function (e) {
            

            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });

    });
