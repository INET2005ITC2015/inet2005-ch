$(document).ready(function () {
    $('#searchQuery').keyup(function () {
        var t = this;
        if (t.value.length > 2) {
            $("#txtHint").load("../commonFiles/newEmployeeSearcher.php?q=" + t.value);
        } else {
            $("#txtHint").text("");
        }
    });
});