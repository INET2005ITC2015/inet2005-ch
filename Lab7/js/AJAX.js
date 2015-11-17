$(document).ready(function () {
    $('#search').keyup(function () {
        var t = this;
        if (t.value.length > 2) {
            location.href = ("../public/index.php?search=" + t.value);
        } else {
            location.href = ("../public/index.php");
        }
    });
});