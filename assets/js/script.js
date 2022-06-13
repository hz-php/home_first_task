var cur_select = document.getElementById('cur');
var two_select = document.getElementById('type_cur');
var summ = document.getElementById('summ');
cur_select.addEventListener("change", function () {
    var first_cur = $('#cur').val();
    var summa = $('#summ').val();
    $.ajax({
        url: '../ajax/currency.php',
        type: 'POST',
        data: {
            first_cur: first_cur,
            summa: summa
        },
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
        data: {
            first_cur: first_cur,
            summa: summa
        },
        success: function (data) {
            document.getElementById("result").value = data;
        }
    });
});

$(document).ready(function (){

    var button = document.querySelector('.gen_arr');
    button.onclick = function (e) {
        e.preventDefault();
        var one_c = $('#one_index').val();
        var two_c = $('#two_index').val();
        $.ajax({   // отправляем запрос
            url: '../ajax/generate_array.php',
            type: 'POST',
            data: {
                one_c: one_c,
                two_c: two_c
            },
            success: function (data) {
                $('.generated_array').html("");
                $('.generated_array').html(data);
            }
        });
    }
    var button_type = document.getElementById('bubble');
    button_type.onclick = function (e) {
        e.preventDefault();
        var one_c = $('#one_index').val();
        var two_c = $('#two_index').val();
        var type_sort = $('#bubble').val();
        $.ajax({   // отправляем запрос
            url: '../ajax/generate_array.php',
            type: 'POST',
            data: {
                type_sort: type_sort,
                one_c: one_c,
                two_c: two_c
            },
            success: function (data) {
                $('.type_sort').html('Сортировка пузырьком');
                $('.generated_array').html('');
                $('.sort_array').html(data);
            }
        });
    }
    var button_type = document.getElementById('ins');
    button_type.onclick = function (e) {
        e.preventDefault();
        var type_sort = $('#ins').val();
        var one_c = $('#one_index').val();
        var two_c = $('#two_index').val();
        $.ajax({   // отправляем запрос
            url: '../ajax/generate_array.php',
            type: 'POST',
            data: {
                type_sort: type_sort,
                one_c: one_c,
                two_c: two_c
            },
            success: function (data) {
                $('.type_sort').html('Сортировка вставками');
                $('.generated_array').html('');
                $('.sort_array').html(data);
            }
        });
    }
    var button_type = document.getElementById('merg');
    button_type.onclick = function (e) {
        e.preventDefault();
        var type_sort = $('#merg').val();
        var one_c = $('#one_index').val();
        var two_c = $('#two_index').val();
        $.ajax({   // отправляем запрос
            url: '../ajax/generate_array.php',
            type: 'POST',
            data: {
                type_sort: type_sort,
                one_c: one_c,
                two_c: two_c
            },
            success: function (data) {
                $('.type_sort').html("Сортировка слиянием");
                $('.generated_array').html('');
                $('.sort_array').html(data);
            }
        });
    }
    var button_type = document.getElementById('fast');
    button_type.onclick = function (e) {
        e.preventDefault();
        var type_sort = $('#fast').val();
        var one_c = $('#one_index').val();
        var two_c = $('#two_index').val();
        $.ajax({   // отправляем запрос
            url: '../ajax/generate_array.php',
            type: 'POST',
            data: {
                type_sort: type_sort,
                one_c: one_c,
                two_c: two_c
            },
            success: function (data) {
                $('.type_sort').html('Быстрая сортировка');
                $('.generated_array').html('');
                $('.sort_array').html(data);
            }
        });
    }
    var button_type = document.getElementById('select');
    button_type.onclick = function (e) {
        e.preventDefault();
        var type_sort = $('#select').val();
        var one_c = $('#one_index').val();
        var two_c = $('#two_index').val();
        $.ajax({   // отправляем запрос
            url: '../ajax/generate_array.php',
            type: 'POST',
            data: {
                type_sort: type_sort,
                one_c: one_c,
                two_c: two_c
            },
            success: function (data) {
                $('.type_sort').html("Сортировка выбором");
                $('.generated_array').html('');
                $('.sort_array').html(data);
            }
        });
    }
    var button_search = document.getElementById('search');
    button_search.onclick = function (e) {
        e.preventDefault();
        var search_in = $('#search_numb').val();
        var one_c = $('#one_index').val();
        var two_c = $('#two_index').val();
        var select = document.getElementById("type_search").value;
        var type_search_array = document.getElementById("type_search_array").value;
        console.log(select);
        $.ajax({   // отправляем запрос
            url: '../ajax/search.php',
            type: 'POST',
            data: {
                search_in: search_in,
                one_c: one_c,
                two_c: two_c,
                select: select,
                type_search_array: type_search_array
            },
            success: function (data) {
                $('.search_title').html("Результат");
                $('.type_sort').html("");
                $('.generated_array').html('');
                $('.sort_array').html('');
                $('.search_result').html(data);
            }
        });
    }
});
