@extends('layouts.admin')


@section('page-css')
    <link href="{{ asset('/be/assets/js/plugins/nestable/jquery.nestable.min.css') }}" rel="stylesheet" />
    <style type="text/css">
        .mjs-nestedSortable-error {
            background: #fbe3e4;
            border-color: transparent;
        }

        #tree {
            width: 550px;
            margin: 0;
        }

        ol {
            padding-left: 15px;
        }

        ol.sortable,
        ol.sortable ol {
            list-style-type: none;
        }

        .sortable li div:not(.btn-group) {
            border: 1px solid #d4d4d4;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            cursor: move;
            border-color: #D4D4D4 #D4D4D4 #BCBCBC;
            margin: 10px;
            padding: 10px;
        }

        li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
            border-color: #999;
        }

        .disclose,
        .expandEditor {
            cursor: pointer;
            width: 20px;
            display: none;
        }

        .sortable li.mjs-nestedSortable-collapsed>ol {
            display: none;
        }

        .sortable li.mjs-nestedSortable-branch>div>.disclose {
            display: inline-block;
        }

        .sortable span.ui-icon {
            display: inline-block;
            margin: 0;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <x-page.breadcrumb :breadcrumb="[
        [
            'route' => '',
            'name' => 'Dashboard',
        ],
        [
            'route' => '',
            'name' => 'Menu',
        ],
    ]" :title="'Menu'"></x-page.breadcrumb>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm m-2 btn-add">
                            <i class="bi bi-plus me-1"></i> Tambah
                        </button>
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-info btn-sm m-2"> <i class="bi bi-gear"></i> Set Permissions</a>
                        <div class="table-responsive">
                            <div id="list" class="dd"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('content_scripts')
    <script src="{{ asset('/be/assets/js/plugins/nestable/jquery.nestable.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            render_list();

            function render_list() {
                $.ajax({
                        url: "{{ route('admin.menu.list') }}",
                        method: "GET"
                    })
                    .done(function(res) {
                        // console.log(res);
                        $("#list").html(res);
                        $('.dd').nestable({
                            callback: function(l, e) {
                                // l is the main container
                                // e is the element that was moved
                                var sequence = $('.dd').nestable('serialize');
                                // console.log(sequence);
                                update_sequence(sequence);
                            }
                        });
                    });
            }

            $(document).on("click", ".btn-add", function() {
                    var id = $(this).data("id") || 0;
                    $("#modal-menu-tree").find(".modal-title").text("Create Menu");
                    $.get("/admin/menu/" + id + "/add", function(res) {
                        showAlertDialog('Tambah Menu', res);
                    })
                })
                .on("click", ".btn-edit", function() {
                    $("#modal-menu").find(".modal-title").text("Edit Menu");
                    $.get("/admin/menu/" + $(this).data("id") + "/edit", function(res) {
                        showAlertDialog('Edit Menu', res);
                    })
                })
                .on("click", ".btn-delete", function() {
                    var id = $(this).data("id");
                    $.ajax({
                            url: "{{ url('admin/menu') }}/" + id,
                            method: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                _method: "DELETE"
                            }
                        })
                        .done(function(response) {
                            var {
                                message
                            } = response;
                            iziToast.success({
                                title: 'Success',
                                message: message,
                                position: 'topRight'
                            });
                            render_list();
                        })
                        .fail(function(xhr) {
                            var {
                                message
                            } = xhr.responseJSON;
                            iziToast.error({
                                title: 'Error',
                                message: message,
                                position: 'topRight'
                            });
                        })
                })
        });

        function update_sequence(seq) {
            $.ajax({
                    url: `{{ route('admin.menu.update-sequence') }}`,
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "_method": "PUT",
                        sequence: seq
                    },
                })
                .done(function(response) {
                    var {
                        message
                    } = response;
                    iziToast.success({
                        title: 'Success',
                        message: message,
                        position: 'topRight'
                    });
                })
                .fail(function(xhr) {
                    var {
                        message
                    } = xhr.responseJSON;
                    showAlertDialog("99", $message);

                });
        }
    </script>
@endpush
