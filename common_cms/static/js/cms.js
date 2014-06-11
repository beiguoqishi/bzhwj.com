/**
 * Created by liupengtao on 14-6-8.
 */

;
(function ($) {
    $.fn.common_cms = function (table, app_id, id_field, options) {
        if (this.length === 0) {
            return this;
        }
        var defaults = {
            pageSize: 10,
            idField: 'id',
            showField: 'title',
            urlPrefix: 'common_cms'
        };
        var fieldConfigCache = {};
        var $el = $(this[0]), $body = $('body');
        options = $.extend({}, defaults, options);
        (function () {
            var params = {
                pageSize: options.pageSize,
                idField: options.idField,
                showField: options.showField
            }, listContainer = $el;

            if (options.tabs && options.tabs.field) {
                var fieldMap = options.tabs.fieldMap,
                    defaultFieldVal = options.tabs.defaultFieldVal || (fieldMap[0] && fieldMap[0]['v']) || 0;

                params['tabField'] = options.tabs.field;
                params['tabFieldVal'] = defaultFieldVal;
                $el.empty().append(_renderTabs(fieldMap, defaultFieldVal));
                listContainer = $el.find('.cms-tabs-list');
            }

            function _renderTabs(map, val) {
                var container = $('<div class="cms-tabs-container"></div>'),
                    tabs = $('<ul class="nav nav-tabs cms-tabs-nav"></ul>'),
                    tab;
                $.each(map, function (idx, el) {
                    tab = $('<li></li>');
                    tab.data('cid', el['v']);
                    if (el['v'] == val) {
                        tab.addClass('active');
                    }
                    tab.append(
                        $('<a href="javascript:void(0)"></a>').text(el['k'])
                    );
                    tabs.append(tab);
                });
                container.append(tabs, $('<div class="cms-tabs-list"></div>'));
                return container;
            }

            function renderList(container, data, idField, showField) {
                var cnt = $('<div class="list-container"></div>'),
                    ul = $('<ul></ul>')
                        .addClass('list-group data-list')
                        .data({
                            table: table,
                            app_id: app_id
                        }),
                    li, list = data.list,
                    totalPage = data.totalPage,
                    page = data.page;
                $.each(list || [], function (idx, el) {
                    li = $('<li></li>')
                        .addClass('list-group-item data-list-item')
                        .data({
                            cid: el[idField]
                        });

                    li.append(
                        $('<a href="javascript:void(0)" class="item-tle"></a>').text(el[showField]),
                        $('<a href="javascript:void(0)" class="fui-cross list-group-item-danger remove-item"></a>')
                    );

                    ul.append(li);
                });
                cnt.append(ul);
                var pager = $.jqPaginator('<div style="text-align: center"></div>', {
                    totalPages: totalPage,
                    visiblePages: 10,
                    currentPage: page,
                    wrapper: '<ul class="pagination"></ul>',
                    first: '<li class="first"><a href="javascript:void(0);">首页</a></li>',
                    prev: '<li class="prev"><a href="javascript:void(0);">上一页</a></li>',
                    next: '<li class="next"><a href="javascript:void(0);">下一页</a></li>',
                    last: '<li class="last"><a href="javascript:void(0);">尾页</a></li>',
                    page: '<li class="page"><a href="javascript:void(0);">{{page}}</a></li>',
                    onPageChange: function (num) {
                        loadDataList(num);
                    }
                });
                container.empty().append(cnt, pager);
            }

            var loadDataList = function (page) {
                page = page || 1;
                $.getJSON('/' + options.urlPrefix + '/list/' + table + '/' + page, params, function (data) {
                    renderList(listContainer, data, options.idField, options.showField);
                });
            };

            listContainer.html(
                '<p style="text-align: center;font-size: 18px;font-weight: bold">数据加载中......</p>'
            );
            loadDataList();
            $body.on('click', '.cms-tabs-nav li', function (e) {
                var $this = $(this),
                    cid = $this.data('cid');

                params['tabFieldVal'] = cid;
                loadDataList();
                $this.closest('.cms-tabs-nav')
                    .find('li')
                    .removeClass('active');
                $this.addClass('active');
                e.preventDefault();
            });
        })();

        var fetchFieldConfig = function (table, app_id, $id) {
            if (fieldConfigCache.hasOwnProperty(table + app_id)) {
                return $.Deferred().resolve(fieldConfigCache[table + app_id]);
            }
            return $.getJSON('/' + options.urlPrefix + '/config/' + table + '/' + app_id + '/' + $id);
        };

        var editTableData = function (data) {
            fieldConfigCache[table + app_id] = data;
            var dom = $('<div class="modal fade in"></div>').
                        append($('<div class="modal-dialog"></div>').append(render(data)));

            dom.appendTo(document.body).modal('show')
        };

        $('body').on('click', '.data-list .data-list-item', function (e) {
            var $this = $(this);
            var ul = $this.closest('ul.data-list');
            var table = ul.data('table');
            var app_id = ul.data('app_id');
            var id = $this.data('cid');
            fetchFieldConfig(table, app_id, id).then(editTableData);
        });


        var fieldsInterpose = $('<div class="fields-interpose modal-content"></div>');

        function generateControlGroup(k, type) {
            var formControl;
            switch (type) {
                case 'single_select':
                case 'select':
                case 'multiple_select':
                    formControl = $('<select class="form-control m-form-control"></select>');
                    if (type == 'multiple_select') {
                        formControl.attr('multiple', "");
                    }
                    break;
                case 'checkbox':
                    formControl = $('<div class="m-checkbox-group m-form-control"></div>');
                    break;
                case 'radio':
                    formControl = $('<div class="m-radio-group m-form-control"></div>');
                    break;
                case 'manual_group_input':
                    formControl = $('<input class="form-control">');
                    break;
                case 'manual_group_textarea':
                    formControl = $('<textarea class="form-control"></textarea>');
                    break;
                default :
                    break;
            }
            formControl.data(
                {'type': type, 'field': k}
            );
            return formControl;
        }

        function generateControlGroupItem(type, el, k) {
            switch (type) {
                case 'single_select':
                case 'select':
                case 'multiple_select':
                    return $('<option>').val(el['v']).text(el['k']);
                case 'checkbox':
                    return $('<div>').append($('<input type="checkbox">').attr('name', k).val(el['v']), $('<label>').text(el['k']));
                case 'radio':
                    return $('<div>').append($('<input type="radio">').attr('name', k).val(el['v']), $('<label>').text(el['k']));
                case 'manual_group_input':
                case 'manual_group_textarea':
                    return el['k'];
            }
        }

        function renderControlGroup(type, control, data, k) {
            if (control.data('fields')) {
                var fields = control.data('fields');
                $.each(data, function (idx, el) {
                    el['v'] = el[fields['v']];
                    el['k'] = el[fields['display']];
                });
            }

            $.each(data, function (idx, el) {
                var item = generateControlGroupItem(type, el, k);

                if ($.type(item) !== 'string') {
                    if (el['v'] == control.attr('selected_v')) {
                        item.attr('selected', "");
                    }
                    control.append(item);
                } else {
                    var del = control.data('delimiter') || ',', val = $.trim(control.val());
                    control.val(val ? val + del + item : item);
                }
            });
        }

        function render(fieldsConfig) {
            $.each(fieldsConfig, function (k, v) {
                var fieldW = $('<div class="input-group"></div>'),
                    config = v['config'],
                    formControl,
                    type = config['type'];
                fieldW.append(
                    $('<span class="input-group-addon"></span>').text(config && config['show'])
                );

                switch (type) {
                    case 'single_select':
                    case 'multiple_select':
                    case 'select':
                    case 'checkbox':
                    case 'radio':
                    case 'manual_group_input':
                        formControl = generateControlGroup(k, type);
                        formControl.attr('selected_v', v['data'])
                        if (config['required']) {
                            formControl.attr('required', true);
                        }
                        var dataSource = config['data_source'];
                        if (dataSource) {
                            var model = config['model'],
                                data = model['data'];
                            switch (dataSource) {
                                case "local":
                                    renderControlGroup(type, formControl, data, k);
                                    break;
                                case "db":
                                    if (data['query_table']) {
                                        var queryTable = data['query_table'],
                                            table = queryTable['name'],
                                            fields = queryTable['fields'] || [],
                                            conds = queryTable['conds'] || [],
                                            params = {'act': 'fetch_relation_table_data'}, idx = 0;
                                        idx = 0;
                                        params['table_name'] = table;
                                        formControl.data('fields', fields);
                                        $.each(fields, function (k, v) {
                                            params['fields[' + idx + ']'] = v;
                                            idx++;
                                        });
                                        $.each(conds, function (k, v) {
                                            params['conds[' + k + ']'] = v;
                                        });
                                        if (data['insert_table']) {
                                            var insertTable = data['insert_table'],
                                                relationFks = insertTable['fields'],
                                                relationName = insertTable['name'];
                                            params['relation_table'] = relationName;
                                            params['cur_table_id'] = relationFks['cur_table_id'];
                                            params['relation_table_id'] = relationFks['relation_table_id'];
                                            params['record_id'] = table_id;
                                            formControl.data('delimiter', data['delimiter']);
                                            formControl.attr('insert_table', true)
                                                .data('insert_table', data['insert_table']);
                                        }
                                        $.post('/generaldata/page_interpose_op', params, function (d) {
                                            renderControlGroup(type, formControl, d || [], k);
                                        });
                                    }
                                    break;
                                default :
                                    break;
                            }
                        }
                        break;
                    case 'image':
                        formControl = $('<div class="m-form-control m-form-control-image"></div>');
                        var left = $('<div class="lft"></div>'),
                            rht = $('<div class="rht preview-image"></div>');
                        left.append(
                            $('<input class="form-control">').data('field', k).val(v['data']),
                            $('<form class="upload-file-form" enctype="multipart/form-data" method="post" target="bridge_win" action="/generaldata/upload"></form>').append(
                                $('<input type="file" name="fileinfo">'),
                                $('<input type="submit" value="上传">'),
                                $('<iframe name="bridge_win" src="/generaldata/bridge" style="display: none"></iframe>')
                            )
                        );
                        rht.append(
                            $('<img>').attr('src', v['data'])
                        );
                        formControl.append(left, rht);
                        break;
                    case 'textarea':
                        formControl = $('<div class="m-form-control"></div>');
                        formControl.append(
                            $('<textarea class="form-control">').data('field', k).val(v['data'])
                        );
                        break;
                    case 'editor':
                        formControl = $('<div class="m-form-control"></div>');
                        formControl.append(
                            $('<textarea style="height: 400px" class="form-control editor">').
                                attr('editor', k).data('field', k).val(v['data'])
                        );
                        break;
                    case 'hidden':
                        formControl = $('<div class="m-form-control"></div>');
                        formControl.append(
                            $('<input class="form-control" type="hidden">').data('field', k).val(new Function(config['ref'])())
                        );
                        break;
                    default:
                        formControl = $('<div class="m-form-control"></div>');
                        formControl.append(
                            $('<input class="form-control">').data('field', k).val(v['data'])
                        );
                        break;
                }
                formControl.data({'initVal': v['data'], 'field': k});
                fieldW.append(formControl);
                if (type == 'hidden') {
                    fieldW.css('display', 'none');
                }
                fieldsInterpose.append(fieldW);
            });

            fieldsInterpose.append(
                $('<div class="fields-decision">').append(
                    $('<button class="btn btn-success fields-save" id="fields-save" type="button">保存</button>')
                )
            );
            return fieldsInterpose;
        }

        $('#fields-save').on('click', function (e) {
            var $this = $(this),
                fields = $this.parents('.fields-interpose').find('.form-control'),
                args = {};
            $('[editor]').each(function (idx, el) {
                el = $(el);
                if (el.data('editor')) {
                    el.val(el.data('editor').html());
                }
            });
            fields.each(function (idx, el) {
                el = $(el);
                args[el.data('field')] = el.val();
            });
            var params = {};
            $.each(args, function (idx, el) {
                if (idx != 'subject') {
                    params['data[' + idx + ']'] = el;
                }
            });
            table_id == 0 ? params['act'] = 'add_record' : params['act'] = 'update_fields';
            params['table'] = table;
            params['table_id'] = table_id;
            params['app_id'] = app_id;
            params['id_field'] = id_field;
            $.post('/generaldata/page_interpose_op', params, function (id) {
                if (id > 0) {
                    alert('保存成功');
                    window.location = '/generaldata/page_interpose_intellij' + location.search + '&id=' + (table_id == 0 ? id : table_id)
                }
            });
        });

        $('textarea[editor]').each(function (idx, el) {
            el = $(el);
            var name = el.attr('editor'),
                editor = KindEditor.create('textarea[editor="' + name + '"]');
            editor.html(el.val());
            el.data('editor', editor);
        });
        var pubTxt = '已发布', noPubTxt = '未发布', global = window,
            entitiesMap = {
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                '&': '&amp;'
            };

        function htmlEscape(str) {
            return str.replace(/(<|>|"|&)/g, function (m, m1) {
                return entitiesMap[m1];
            });
        }

        global.callback = function (data) {
            var attachmentInput = global.attachmentInput, preImg;
            attachmentInput.val(htmlEscape(data.imgurl));
            if ((preImg = attachmentInput.parents('.m-form-control-image:eq(0)').find('.preview-image img')).length > 0) {
                preImg.attr('src', data.imgurl);
            }
        };

    }
})(jQuery);
