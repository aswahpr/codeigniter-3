
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
 
    <table id="dg" title="List Data Barang" class="easyui-datagrid" style="width:100%;height:550px"
            url="<?php echo base_url(); ?>barang/getbarang"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="kd_barang">Kode Barang</th>
                <th field="nm_barang">Nama Barang</th>
                <th field="satuan">Satuan</th>
                <th field="stok">Stok</th>
                <th field="stokmin">Stok Min</th>
                <th field="stokmax">Stok Max</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newBarang()">Tambah Barang</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editBarang  ()">Edit Barang</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapusBarang()">Hapus Barang</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            
            <div style="margin-bottom:10px">
                <input name="kd_barang" class="easyui-textbox" required="true" label="Kode Barang:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nm_barang" class="easyui-textbox" required="true" label="Nama Barang:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="satuan" class="easyui-textbox" required="true" label="Satuan:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="stok" class="easyui-textbox" required="true" label="Stok:" style="width:100%">
            </div>
			<div style="margin-bottom:10px">
                <input name="stokmin" class="easyui-textbox" required="true" label="Stok min:" style="width:100%">
            </div>
			<div style="margin-bottom:10px">
                <input name="stokmax" class="easyui-textbox" required="true" label="Stok max:" style="width:100%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newBarang(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Tambah Barang');
            $('#fm').form('clear');
            url = '<?php echo base_url(); ?>Barang/SimpanData';
        }
        function editBarang(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit Barang');
                $('#fm').form('load',row);
                url = '<?php echo base_url(); ?>Barang/UpdateData?id_kd_barang='+row.kd_barang;
            }
        }
        function saveUser(){
            $('#fm').form('submit',{
                url: url, 
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
						alert(result.Konfirmasi);
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function hapusBarang(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','Apakah Anda Yakin Ingin Menghapus Data Ini?',function(r){
                    if (r){
                        $.post('<?php echo base_url(); ?>barang/HapusData',{kd_barang:row.kd_barang},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }
    </script>
