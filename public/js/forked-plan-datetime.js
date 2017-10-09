$(function () {
    $("div[id*='start_date_']").datetimepicker();
    $("div[id*='due_date_']").datetimepicker({
        useCurrent: false
    });
    $("div[id*='start_date_']").on("dp.change", function (e) {
        var current_id = e.currentTarget.attributes.id.value;
        var item = current_id.replace("start_date_", "");
        $("#due_date_" + item).data("DateTimePicker").minDate(e.date);
    });
    $("div[id*='due_date_']").on("dp.change", function (e) {
        var current_id = e.currentTarget.attributes.id.value;
        var item = current_id.replace("start_date_", "");
        $("#start_date_" + item).data("DateTimePicker").maxDate(e.date);
    });

    $("#plan_start_date").datetimepicker();
    $("#plan_due_date").datetimepicker({
        useCurrent: false
    });
    $("#plan_start_date").on("dp.change", function (e) {
        $("#plan_due_date").data("DateTimePicker").minDate(e.date);
    });
    $("#plan_due_date").on("dp.change", function (e) {
        $("#plan_start_date").data("DateTimePicker").maxDate(e.date);
    });

    $("#plan_start_date").on("dp.change", function (e) {
        $("#div[id*='start_date_']").data("DateTimePicker").minDate(e.date);
    });

    $("#plan_due_date").on("dp.change", function (e) {
        $("#div[id*='due_date_']").data("DateTimePicker").maxDate(e.date);
    });
});
