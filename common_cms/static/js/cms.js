/**
 * Created by liupengtao on 14-6-8.
 */

;
(function ($) {
    $.fn.common_cms = function (table, app_id, table_id, id_field, options) {
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
                            table:table,
                            app_id:app_id
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

        var fetchFieldConfig = function (table, app_id) {
            if (fieldConfigCache.hasOwnProperty(table + app_id)) {
                return $.Deferred().resolve(fieldConfigCache[table + app_id]);
            }
            return $.getJSON('/' + options.urlPrefix + '/config/' + table + '/' + app_id);
        };

        var editTableData = function(data) {
            fieldConfigCache[table + app_id] = data;
            render(data);
        };

        $('body').on('click', '.data-list .data-list-item', function (e) {
            var $this = $(this);
            var ul = $this.closest('ul.data-list');
            var table = ul.data('table');
            var app_id = ul.data('app_id');
            fetchFieldConfig(table,app_id).then(editTableData);
        });


        var fieldsInterpose = $('<div class="fields-interpose"></div>');

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
                {'type': type,'field': k}
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

        var interposeSegs = $('[role="interpose_segs"]');

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
        function renderModule(idx, el, data, ul, depth, seg, extra) {
            var module = $('<li role="module-tab"></li>'), moduleData;
            ul.append(module);
            idx == 0 && module.addClass('active');
            moduleData = $('<a href="javascript:void(0)" role="module"></a>').text(
                    el.title && el.title.fixed ?
                        ($.trim(el.title.show) ? el.title.show : "无标题")
                        : "无标题"
                ).data({
                    'config': el,
                    'level': module.parents('[data-type="level"]').eq(0),
                    'data': data
                }).attr({'depth': depth});

            module.append(
                moduleData
            );
            if (seg) {
                moduleData.attr('seg', seg).data('pub_st', extra['pub_st']);
                var pubSt = $('<span class="label pub-st label-danger" style="display: none">未发布</span>').appendTo(moduleData);

                if (extra['pub_st'] && extra['pub_st'] != 1) {
                    pubSt.show();
                }
            }
            module.parents('[data-type="level"]')
                .eq(0).find('li.active a[role="module"]')
                .trigger('click')
        }

        function generateLeaf(fields, data) {
            var leafNode = $('<div class="leaf-node"></div>');

            $.each(fields, function (idx, el) {
                var field = $('<div class="input-group leaf-field"></div>');
                field.append(
                    $('<span class="input-group-addon"></span>').text(el['show'])
                );
                if (el['type'] == 'textarea') {
                    var textarea = $('<textarea class="form-control field" style="height: 150px">').data('name', idx).val(data && data[idx]);
                    field.append(textarea);
                } else if (el['type'] == 'editor') {
                    var textarea = $('<textarea class="form-control field" style="height: 300px">').attr('editor', idx).data('name', idx).val(data && data[idx]);
                    field.append(textarea);
                } else {
                    field.append($('<input type="text" class="form-control field">').data('name', idx).val(data && data[idx]))
                }
                if (el['input_type'] == 'file') {
                    field.append(
                        $('<form class="upload-file-form" enctype="multipart/form-data" method="post" target="bridge_win" action="/generaldata/upload"></form>').append(
                            $('<input type="file" name="fileinfo">'),
                            $('<input type="submit" value="上传">'),
                            $('<iframe name="bridge_win" src="/generaldata/bridge" style="display: none"></iframe>')
                        )
                    )
                }
                leafNode.append(field);
            });

            leafNode.append(
                $('<button type="button" class="btn btn-danger save-leaf-node"><span class="m-label">保存</span><span class="m-label">保存</span></button>'),
                $('<button type="button" class="btn btn-warning cancel-leaf-node"><span class="m-label">取消</span><span class="m-label">取消</span></button>')
            ).data('data', data);
            return leafNode;
        }

        function generateRecord(record, depth) {
            var node = $('<div class="record-tle-w"></div>');

            node.append(
                $('<div class="summery"></div>').append(
                    $('<a href="javascript:void(0)" class="record-tle"></a>')
                        .text(record && record['title'] || "请输入内容")
                        .data('data', record).attr('depth', depth),
                    $('<a class="glyphicon glyphicon-remove remove-leaf-node close" href="javascript:void(0)"></a>')
                )
            );
            return node;
        }

        function saveData(level) {
            var curNode, depth, parentNode, levelData = [];

            curNode = level.data('belongTo');
            level.find('[depth]').each(function (idx, record) {
                record = $(record);
                depth = parseInt(record.attr('depth'));
                levelData.push(record.data('data'));
            });
            curNode.data('data', levelData);

            if (curNode && curNode.attr('seg')) {
                $('[role="module"][seg]').attr('edit_seg', 'off');
                curNode.attr('edit_seg', 'on');
            }
            depth = parseInt(curNode.attr('depth'));
            while (curNode && (parentNode = curNode.parents('[data-type="level"]:eq(0)')).length === 1) {
                var dataSet = parentNode.find('[depth="' + depth + '"]'),
                    index = dataSet.index(curNode),
                    curData,
                    data;

                depth--;
                curData = curNode.data('data');
                curNode = parentNode.data('belongTo');
                if (curNode && curNode.attr('seg')) {
                    $('[role="module"][seg]').attr('edit_seg', 'off');
                    curNode.attr('edit_seg', 'on');
                }
                if (!curNode) {
                    break;
                }
                data = curNode.data('data') || [];
                data[index] = curData;
                curNode.data('data', data);
            }
        }


        $('body').on('click', 'li a[role="module"]',function (e) {
            var $this = $(this),
                config = $this.data("config"),
                level = $this.data('level'),
                data = $this.data('data'),
                depth = parseInt($this.attr('depth')) + 1;

            level.find('>[data-type="level"]').hide();
            $this.parents('ul.nav-tabs:eq(0)').find('>li').removeClass('active');
            $this.parents('li:eq(0)').addClass('active');

            if ($this.data('childLoaded') && $this.data('childLoaded').show()) return;

            if ($.isPlainObject(config['fields'])) {
                var childLevel = $('<div data-type="level"></div>'),
                    contentZone = $('<div class="content-zone"></div>'),
                    recordZone = $('<div class="record-zone"></div>'),
                    opZone = $('<div class="op-zone"></div>');

                data && $.each(data, function (idx, record) {
                    recordZone.append(generateRecord(record, depth));
                });
                contentZone.append(
                    opZone.append(
                        $('<button type="button" class="btn btn-info" role="add-record"><span class="m-label">增加</span><span class="m-label">增加</span></button>'),
                        $('<button class="btn btn-success save-page" type="button"><span class="m-label">保存</span><span class="m-label">保存</span></button>'),
                        $('<button class="btn btn-primary publish-page" type="button"><span class="m-label">发布</span><span class="m-label">发布</span></button>')
                    ),
                    recordZone
                );
                childLevel.append(contentZone).data('belongTo', $this);
                level.append(childLevel);
                $this.data('childLoaded', childLevel);
            } else {
                $.each(config, function (idx, el) {
                    if ($.isArray(el)) {
                        var list = $('<ul  class="nav nav-tabs"></ul>'),
                            childLevel = $('<div data-type="level"></div>');
                        level.append(childLevel.append(list));
                        $.each(el, function (idx, el1) {
                            renderModule(idx, el1, data && data[idx], list, depth);
                        });
                        childLevel.data('belongTo', $this);
                        $this.data('childLoaded', childLevel);
                    }
                });
            }
        }).on('click', 'button[role="add-record"]',function (e) {
            var $this = $(this),
                level = $this.parents('[data-type="level"]:eq(0)'),
                parentTrigger = level.data('belongTo'),
                depth = parseInt(parentTrigger.attr('depth')) + 1;

            $this.parents('.content-zone:eq(0)')
                .find('.record-zone')
                .append(
                    generateRecord({title: '请输入内容'}, depth)
                );
        }).on('click', 'a.record-tle',function (e) {

            var $this = $(this);

            $('.popup-leaf-node').each(function (idx, el) {
                if (el != $this[0]) {
                    $(el).addClass('cardOutBottom').removeClass('cardInBottom');
                }
            });
            if ($this.data('leafNode') && $this.data('leafNode').addClass('cardInBottom').removeClass('cardOutBottom')) {
                return;
            }

            var level = $this.parents('[data-type="level"]:eq(0)'),
                parentTrigger = level.data('belongTo'),
                config = parentTrigger.data('config'),
                leafNode = generateLeaf(config['fields'], $this.data('data')),
                recordTleW = $this.parents('.record-tle-w:eq(0)');

            leafNode.addClass('popup-leaf-node panel panel-success cardInBottom');
            recordTleW.append(leafNode);
            $this.data({
                leafNode: leafNode
            });

            $this.parents('.record-tle-w:eq(0)').find('textarea[editor]').each(function (idx, el) {
                el = $(el);
                if (!el.data['editor']) {
                    var name = el.attr('editor'),
                        editor = KindEditor.create('textarea[editor="' + name + '"]');
                    editor.html(el.val());
                    el.data('editor', editor);
                }
            });
        }).on('click', 'button.save-leaf-node',function (e) {
            var $this = $(this),
                leafNode = $this.parents('.leaf-node:eq(0)'),
                leafNodeW = leafNode.parents('.record-tle-w:eq(0)').find('a.record-tle'),
                d = {};

            leafNode.find('.field').each(function (idx, el) {
                el = $(el);
                if (el.attr('editor') && el.data('editor')) {
                    el.val(el.data('editor').html());
                }
                d[el.data('name')] = $.trim(el.val());
            });
            leafNodeW.text(d && d['title'] || '请输入内容');
            leafNodeW.data('data', d);
            leafNode.addClass('cardOutBottom').removeClass('cardInBottom').css('left', -(800 - leafNodeW.width()) / 2);
        }).on('click', 'button.cancel-leaf-node',function (e) {
            var $this = $(this),
                leafNode = $this.parents('.leaf-node:eq(0)'),
                leafNodeW = leafNode.parents('.record-tle-w:eq(0)').find('a.record-tle'),
                d = leafNodeW.data('data') || {};

            leafNode.addClass('cardOutBottom').removeClass('cardInBottom').removeClass('cardInBottom').css('left', -(800 - leafNodeW.width()) / 2);
            leafNode.find('input.field').each(function (idx, el) {
                $(el).val(d[$(el).data('name')]);
            });
        }).on('click', '.save-page',function (e) {
            var $this = $(this),
                level = $this.parents('[data-type="level"]:eq(0)');
            saveData(level);
            var editSeg = $('[edit_seg="on"]');
            $.post('/generaldata/page_interpose_op', {
                act: 'save_interpose',
                app_id: app_id,
                seg: editSeg.attr('seg'),
                id: table_id,
                'data[preview_interpose_data]': $.toJSON(editSeg.data('data'))
            }, function (d) {
                if (d > 0) {
                    $this.parents('[data-type="level"]').eq(-2).data('belongTo').data('pub_st', 0)
                        .find('.pub-st').addClass('label-danger').text(noPubTxt).show();
                    editSeg.attr('edit_seg', 'off');
                    alert('保存成功！');
                }
            });
        }).on('click', 'button.publish-page',function (e) {
            var $this = $(this);
            $.post('/generaldata/page_interpose_op', {
                act: 'pub_interpose',
                app_id: app_id,
                seg: $this.parents('[data-type="level"]').eq(-2).data('belongTo').attr('seg'),
                id: table_id
            }, function (d) {
                if (d > 0) {
                    alert('发布成功!');
                    $this.parents('[data-type="level"]').eq(-2).data('belongTo').data('pub_st', 1)
                        .find('.pub-st').hide();
                }
            })
        }).on('click', '.remove-leaf-node',function (e) {
            var $this = $(this);
            $this.parents('.record-tle-w:eq(0)').remove();
        }).on('mousedown', '.upload-file-form input[type="submit"]', function (e) {
            global.attachmentInput = $(this).parents('.upload-file-form:eq(0)').prev();
        });
        var initData = {};
        $.each(previewInterposeData, function (idx, el) {
            initData[el['seg']] = {data: el['preview_data'], pub_st: el['pub_st']};
        });
        $.each(interposeConfig, function (idx, config) {
            var seg = config['seg'],
                data = initData[seg] && initData[seg]['data'],
                extra = {pub_st: initData[seg] && initData[seg]['pub_st']};
            renderModule(idx, config['extra'], data, interposeSegs, 0, seg, extra);
        });
    }
})(jQuery);
