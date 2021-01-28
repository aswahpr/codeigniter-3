	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
 <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:false,modal:true,border:'thin',buttons:'#dlg-buttons'" title="Laporan Barang">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            
            <div style="margin-bottom:10px">
			<p><input name="filter" id="kode" type="radio" checked="checked" />Berdasarkan Kode Barang:</p>
                <input name="kd_barang" id="kd_barang" class="easyui-textbox" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
			<p><input name="filter" id="nama" type="radio" />Berdasarkan Nama barang:</p>
                <input name="nm_barang" id="nm_barang" class="easyui-textbox" style="width:100%">
            </div>
            
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="Laporan('excel')">Cetak Excel</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="Laporan('pdf')">Cetak PDF</a>
      
    </div>
	<script type="text/javascript">
		function Laporan(ket){
			if(document.getElementById('kode').checked==true){
				var datalaporan="filter=kode&kd_barang="+document.getElementById('kd_barang').value;
			}
			if(document.getElementById('nama').checked==true){
				var datalaporan="filter=nama&nm_barang="+document.getElementById('nm_barang').value;
			}
			
			if(ket=='excel'){
				window.open('<?php echo base_url(); ?>lapbarang/cetakexcel?'+datalaporan);
			}else{
				window.open('<?php echo base_url(); ?>lapbarang/cetakpdf?'+datalaporan);
			}
		}

	</script>