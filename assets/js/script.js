var cur_select = document.getElementById('cur');
var two_select = document.getElementById('type_cur');
var summ = document.getElementById('summ');
cur_select.addEventListener("change", function () {
    var first_cur = $('#cur').val();
    var summa = $('#summ').val();
    $.ajax({
        url: '../ajax/currency.php',
        type: 'POST',
        data: {first_cur: first_cur, summa: summa},
        success: function (data) {
            document.getElementById("result").value = data;
        }
    });

});

summ.addEventListener("change", function () {
    var first_cur = $('#cur').val();
    var two_cur = $('#type_cur').val();
    var summa = $('#summ').val();
    $.ajax({   // отправляем запрос
        url: '../ajax/currency.php',
        type: 'POST',
        data: {first_cur: first_cur, summa: summa},
        success: function (data) {
            document.getElementById("result").value = data;
        }
    });
});
