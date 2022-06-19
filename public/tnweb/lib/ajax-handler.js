function getLevel_1(val) {
    var baseurl = "Indexes/ajax_level_1";
    $.ajax({
        type: "POST",
        url: baseurl,
        data: 'level_id_1=' + val,
        beforeSend: function () {
            $("#level2-list").addClass("loader");
        },
        success: function (data) {
            $("#level2-list").html(data);
            $("#level2-list").removeClass("loader");
        }
    });
}

function getLevel_2(val) {
    var baseurl = "Indexes/ajax_level_2";
    var level_id_1 = $("#level1-list").val();
    $.ajax({
        type: "POST",
        url: baseurl,
        data: {
            level_id_2:  val,level_id_1:level_id_1
        },
        beforeSend: function () {
            $("#response").addClass("loader");
        },
        success: function (data) {
            $("#response").html(data);
            $("#response").removeClass("loader");
        }
    });
}