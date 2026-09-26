import './bootstrap';


$(document).ready(function() {
    $('#report_sum').click(function() {
        $.ajax({
            url: "/report/sum",
            method: "POST",
            data: {},
            dataType: "json",
            beforeSend: function () {
            },
            success: function (data) {
                console.log(data);
            }
        })
    })
})


$(document).ready(function() {
    $('#report_cdr').click(function() {
        $.ajax({
            url: "/report/cdr",
            method: "POST",
            data: {},
            dataType: "json",
            beforeSend: function () {
            },
            success: function (data) {
                console.log(data);
            }
        })
    })
})


