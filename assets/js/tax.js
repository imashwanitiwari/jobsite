var base_url = window.location.pathname;

function add_tax(tax_id, product_id, op_id, task) {
    var name = $("#" + tax_id).text();
    var rate = name.split("@");
    var rate = rate[1];
    var rate = rate.split("%");
    var rate = rate[0];
    switch (task) {
        case 1:
            var pre_url = "add_tax";
            var msg = "Added";
            var msg1 = "Add";
            var data = {
                "api_key": "1234",
                "OP_ID": op_id,
                "PRODUCT_ID": product_id,
                "ACCOUNT_ID": tax_id,
                "RATE": rate,
                "RATE_TYPE": 1
            }
            var btn_type = "#5cb85c";
            break;
        case 2:
            var pre_url = "remove_tax";
            var msg = "Removed"
            var msg1 = "Remove"
            var data = {
                "api_key": "1234",
                "OP_ID": op_id,
                "PRODUCT_ID": product_id,
                "ACCOUNT_ID": tax_id,
                "RATE": rate,
                "RATE_TYPE": 1
            };
            var btn_type = "#d9534f";
            break;
    }
    swal({
            title: "Are you sure?",
            text: "To " + msg1 + " " + name + " Tax",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: btn_type,
            confirmButtonText: "Yes, " + msg1 + " it!",
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                url: "../../api/invoice/" + pre_url,
                type: "POST",
                dataType: "json",
                data: {
                    "api_key": "1234",
                    "OP_ID": op_id,
                    "PRODUCT_ID": product_id,
                    "ACCOUNT_ID": tax_id,
                    "RATE": rate,
                    "RATE_TYPE": 1
                },
                success: function(response) {
                    if (response.status == 1) {
                        swal("Added", "This Tax has been " + msg + " successfully ", "success");
                    } else {
                        swal("Failed", "This Tax did not " + msg + ". Please Try again ", "error");
                    }
                }
            });
            // alert("done");
        });
}


document.ready(function(){
var tax_table = $("#add_tax_table").DataTable({
    //"processing": true,
    //"serverSide": true,

    "ajax": {

        "url": "get_products",
        "type": "POST"
    },


    "columns": [{
            "data": "NAME"
        },
        {
            render: function(data, type, row, meta) {
                return "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo'><i class='fa fa-pencil text-inverse m-r-10'></i></button>";

            },
            "searchable": false
        }
    ]

});

$('#add_tax_table tbody').on('click', 'button', function() {
    $("#add_tax_table2 tbody").html("");
    var data = tax_table.row($(this).parents('tr')).data();
    var id = data.ID;
    $.ajax({
        "url": "get_taxes/" + id + "/2",
        "type": "POST",
        "dataType": "json",
        "success": function(response) {
            for (i = 0; i <= response.data.length; i++) {

                $("#add_tax_table2 #tbody1").append(
                    "<tr>" +
                    "<td id='" + response.data[i].ID + "'>" + response.data[i].NAME + "</td>" +
                    "<td>" + '<button onclick=add_tax(' + response.data[i].ID + ',' + id + ',' + response.op_id + ',1)>Add</button></td>' +
                    "</tr>"

                );

            }
        }
    });
    $.ajax({
        "url": "get_taxes/" + id + "/1",
        "type": "POST",
        "dataType": "json",
        "success": function(response) {
            for (i = 0; i <= response.data.length; i++) {

                $("#add_tax_table2 #tbody2").append(
                    "<tr>" +
                    "<td id='" + response.data[i].ID + "'>" + response.data[i].NAME + "</td>" +
                    "<td>" + '<button onclick=add_tax(' + response.data[i].ID + ',' + id + ',' + response.op_id + ',2)>Remove</button></td>' +
                    "</tr>"

                );

            }
        }
    });
});
});