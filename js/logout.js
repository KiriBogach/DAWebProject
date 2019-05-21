$(function () {

    $("#signOutButton").click(function () {
        $.ajax({
            url: 'ajax/logout.php',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (!data.success) {
                    alert('Error haciendo logout');
                }
                window.location.href = "index.php";
            }
        });
    });

});