(() => { function e(e, t) { for (var a = 0; a < t.length; a++) { var n = t[a]; n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n) } } var t = function () { function t() { !function (e, t) { if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function") }(this, t) } var a, n, l; return a = t, l = [{ key: "initDataTables", value: function () { jQuery.extend(jQuery.fn.dataTable.ext.classes, { sWrapper: "dataTables_wrapper dt-bootstrap5", sFilterInput: "form-control form-control-sm", sLengthSelect: "form-select form-select-sm" }), jQuery.extend(!0, jQuery.fn.dataTable.defaults,

    { language: { lengthMenu: "_MENU_", search: "_INPUT_", searchPlaceholder: "Search..", info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>", paginate: { first: '<i class="fa fa-angle-double-left"></i>', previous: '<i class="fa fa-angle-left"></i>', next: '<i class="fa fa-angle-right"></i>', last: '<i class="fa fa-angle-double-right"></i>' } } }),



    jQuery(".js-dataTable-full").dataTable({ pageLength: 5, lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]], autoWidth: !1 }),

    jQuery(".js-dataTable-buttons").dataTable(
        { pageLength: 10,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
,
            lengthMenu: [[10, 20, 30, 50, 100], [10, 20, 30, 50, 100]],
            autoWidth: !1,
            buttons: [{ extend: "copy", text: "Copiar", className: "btn btn-sm btn-primary" }, { extend: "csv", text: "Descargar CSV" , className: "btn btn-sm btn-primary", title: "tutors" }, { extend: "print", text: "Imprimir", className: "btn btn-sm btn-primary" }],
            dom: "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>" }) } },
            { key: "init", value: function () { this.initDataTables() } }], (n = null) && e(a.prototype, n), l && e(a, l), t }(); jQuery((function () { t.init() })) })();
