const { now } = require("lodash");
const printJS = require("print-js");
import "moment";
import moment from "moment";

$(document).ready(function () {
    function datatable(table) {
        $(table).DataTable({
            language: {
                emptyTable: "No records found",
                info: "Showing _START_ to _END_ of _TOTAL_ records",
                infoEmpty: "Showing 0 to 0 of 0 records",
                infoFiltered: "(Filtered from _MAX_ total records)",
                infoThousands: ",",
                loadingRecords: "Loading...",
                processing: "Processing...",
                zeroRecords: "No matching records found",
                search: "Search",
                paginate: {
                    next: "Next",
                    previous: "Previous",
                    first: "First",
                    last: "Last",
                },
                aria: {
                    sortAscending: ": Activate to sort column ascending",
                    sortDescending: ": Activate to sort column descending",
                },
                select: {
                    rows: {
                        _: "Selected %d rows",
                        1: "Selected 1 row",
                    },
                    cells: {
                        1: "1 cell selected",
                        _: "%d cells selected",
                    },
                    columns: {
                        1: "1 column selected",
                        _: "%d columns selected",
                    },
                },
                buttons: {
                    copySuccess: {
                        1: "1 row copied successfully",
                        _: "%d rows copied successfully",
                    },
                    collection:
                        'Collection  <span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span>',
                    colvis: "Column visibility",
                    colvisRestore: "Restore visibility",
                    copy: "Copy",
                    copyKeys:
                        "Press ctrl or u2318 + C to copy table data to your clipboard. To cancel, click on this message or press Esc.",
                    copyTitle: "Copy to Clipboard",
                    csv: "CSV",
                    excel: "Excel",
                    pageLength: {
                        "-1": "Show all records",
                        _: "Show %d records",
                    },
                    pdf: "PDF",
                    print: "Print",
                    createState: "Create state",
                    removeAllStates: "Remove all states",
                    removeState: "Remove",
                    renameState: "Rename",
                    savedStates: "Saved states",
                    stateRestore: "State %d",
                    updateState: "Update",
                },
                autoFill: {
                    cancel: "Cancel",
                    fill: "Fill all cells with",
                    fillHorizontal: "Fill cells horizontally",
                    fillVertical: "Fill cells vertically",
                },
                lengthMenu: "Show _MENU_ results per page",
                searchBuilder: {
                    add: "Add condition",
                    button: {
                        0: "Search Builder",
                        _: "Search Builder (%d)",
                    },
                    clearAll: "Clear All",
                    condition: "Condition",
                    conditions: {
                        date: {
                            after: "After",
                            before: "Before",
                            between: "Between",
                            empty: "Empty",
                            equals: "Equals",
                            not: "Not",
                            notBetween: "Not Between",
                            notEmpty: "Not Empty",
                        },
                        number: {
                            between: "Between",
                            empty: "Empty",
                            equals: "Equals",
                            gt: "Greater Than",
                            gte: "Greater Than or Equal To",
                            lt: "Less Than",
                            lte: "Less Than or Equal To",
                            not: "Not",
                            notBetween: "Not Between",
                            notEmpty: "Not Empty",
                        },
                        string: {
                            contains: "Contains",
                            empty: "Empty",
                            endsWith: "Ends With",
                            equals: "Equals",
                            not: "Not",
                            notEmpty: "Not Empty",
                            startsWith: "Starts With",
                            notContains: "Does Not Contain",
                            notStarts: "Does Not Start With",
                            notEnds: "Does Not End With",
                        },
                        array: {
                            contains: "Contains",
                            empty: "Empty",
                            equals: "Equals",
                            not: "Not",
                            notEmpty: "Not Empty",
                            without: "Does Not Contain",
                        },
                    },
                    data: "Data",
                    deleteTitle: "Delete filtering rule",
                    logicAnd: "And",
                    logicOr: "Or",
                    title: {
                        0: "Search Builder",
                        _: "Search Builder (%d)",
                    },
                    value: "Value",
                    leftTitle: "External criteria",
                    rightTitle: "Internal criteria",
                },
                searchPanes: {
                    clearMessage: "Clear All",
                    collapse: {
                        0: "Search Panes",
                        _: "Search Panes (%d)",
                    },
                    count: "{total}",
                    countFiltered: "{shown} ({total})",
                    emptyPanes: "No Search Panes",
                    loadMessage: "Loading Search Panes...",
                    title: "Active Filters",
                    showMessage: "Show all",
                    collapseMessage: "Collapse all",
                },
                thousands: ",",
                datetime: {
                    previous: "Previous",
                    next: "Next",
                    hours: "Hour",
                    minutes: "Minute",
                    seconds: "Second",
                    amPm: ["am", "pm"],
                    unknown: "-",
                    months: {
                        0: "January",
                        1: "February",
                        10: "November",
                        11: "December",
                        2: "March",
                        3: "April",
                        4: "May",
                        5: "June",
                        6: "July",
                        7: "August",
                        8: "September",
                        9: "October",
                    },
                    weekdays: [
                        "Sunday",
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                    ],
                },
                editor: {
                    close: "Close",
                    create: {
                        button: "New",
                        submit: "Create",
                        title: "Create new record",
                    },
                    edit: {
                        button: "Edit",
                        submit: "Update",
                        title: "Edit record",
                    },
                    error: {
                        system: 'A system error has occurred (<a target="\\" rel="nofollow" href="\\">More information</a>).',
                    },
                    multi: {
                        noMulti:
                            "This input can be edited individually, but not as part of a group",
                        restore: "Undo changes",
                        title: "Multiple values",
                        info: "The selected items contain different values for this input. To edit and set all items for this input to the same value, click or tap here, otherwise they will retain their individual values.",
                    },
                    remove: {
                        button: "Remove",
                        confirm: {
                            _: "Are you sure you want to delete %d rows?",
                            1: "Are you sure you want to delete 1 row?",
                        },
                        submit: "Remove",
                        title: "Remove record",
                    },
                },
                decimal: ",",
                stateRestore: {
                    creationModal: {
                        button: "Create",
                        columns: {
                            search: "Column Search",
                            visible: "Column Visibility",
                        },
                        name: "Name:",
                        order: "Order",
                        paging: "Pagination",
                        scroller: "Scroll position",
                        search: "Search",
                        searchBuilder: "Search Builder",
                        select: "Select",
                        title: "Create new state",
                        toggleLabel: "Include:",
                    },
                    duplicateError: "There is already a state with this name",
                    emptyError: "Cannot be empty",
                    emptyStates: "No saved states",
                    removeConfirm: "Confirm remove %s?",
                    removeError: "Failed to remove state",
                    removeJoiner: "and",
                    removeSubmit: "Remove",
                    removeTitle: "Remove state",
                    renameButton: "Rename",
                    renameLabel: "New name for %s:",
                    renameTitle: "Rename state",
                },
            },
            responsive: true,
            lengthMenu: [
                [5, 10, 15, 20, 25, 50, 100, -1],
                ["5", "10", "15", "20", "25", "50", "100", "Show all"],
            ],
            bLengthChange: false,
            bInfo: false,
        });
        //$('select').select2();
    }
    datatable("#example");
    datatable("#users_table");
    datatable("#periods_table");
    datatable("#civil_states_table");
    datatable("#payment_phases_table");
    datatable("#students_table");
    datatable("#veicle_classes_table");
    datatable("#exam_types_table");
    datatable("#class_rooms_table");
    datatable("#dashboard_payments_tables");

    const date = new Date("12/31/2001");
    date.setYear(new Date().getFullYear() - 15);
    console.log(date);

    $("#birth_day").daterangepicker({
        singleDatePicker: true,
        maxDate: date,
        startDate: date,
        showDropdowns: true,
        autoUpdateInput: true,
        drops: "auto",
    });

    $("#dates").daterangepicker({
        showDropdowns: true,
        autoUpdateInput: true,
        locale: {
            format: "D-MM-Y",
            separator: " to ",
        },
        ranges: {
            Today: [moment(), moment()],
            Yesterday: [
                moment().subtract(1, "days"),
                moment().subtract(1, "days"),
            ],
            "Last 7 Days": [moment().subtract(6, "days"), moment()],
            "Last 30 Days": [moment().subtract(29, "days"), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [
                moment().subtract(1, "month").startOf("month"),
                moment().subtract(1, "month").endOf("month"),
            ],
        },
    });

    const biDate = new Date();
    biDate.setYear(new Date().getFullYear() - 5);
    $("#id_emision_date").daterangepicker({
        singleDatePicker: true,
        maxDate: new Date(),
        startDate: biDate,
        minDate: biDate,
        showDropdowns: true,
        autoUpdateInput: true,
        drops: "auto",
    });

    $("#init_at").timepicker({
        use24hours: true,
        showMeridian: false,
        timeFormat: "H:i",
        disableTimeRanges: [
            ["0:00", "5:30"],
            ["21:00", "23:59"],
        ],
    });
    $("#end_at").timepicker({
        use24hours: true,
        showMeridian: false,
        timeFormat: "H:i",
        disableTimeRanges: [
            ["0:00", "5:30"],
            ["21:00", "23:59"],
        ],
    });
});
