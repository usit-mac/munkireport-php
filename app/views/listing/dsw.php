<?php $this->view('partials/head'); ?>

<?php //Initialize models needed for the table
new Machine_model;
new Reportdata_model;
new Dsw_model;
?>

<div class="container">

  <div class="row">

  	<div class="col-lg-12">
		<script type="text/javascript">

		$(document).on('appReady', function(e, lang) {

				// Get column names from data attribute
				var myCols = [];
				$('.table th').map(function(){
					  myCols.push({'mData' : $(this).data('colname')});
				});
			    oTable = $('.table').dataTable( {
			        "aoColumns": myCols,
			        "sAjaxSource": "<?php echo url('datatables/data'); ?>",
			        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
			        	// Update name in first column to link
			        	var name=$('td:eq(0)', nRow).html();
			        	if(name == ''){name = "No Name"};
			        	var sn=$('td:eq(1)', nRow).html();
			        	var link = get_client_detail_link(name, sn, '<?php echo url(); ?>/');
			        	$('td:eq(0)', nRow).html(link);

			        }
			    } );
			} );
		</script>

		  <h3><span data-i18n="listing.deploystudio.title">DeployStudio report</span> <span id="total-count" class='label label-primary'>…</span></h3>
		  
		  <table class="table table-striped table-condensed table-bordered">
		    <thead>
		      <tr>
		      	<th data-i18n="listing.computername" data-colname='machine#computer_name'>Name</th>
		        <th data-i18n="serial" data-colname='machine#serial_number'>Serial</th>
		        <th data-colname='deploystudio#workflow'>Workflow</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<tr>
					<td colspan="7" class="dataTables_empty">Loading data from server</td>
				</tr>
		    </tbody>
		  </table>
    </div> <!-- /span 12 -->
  </div> <!-- /row -->
</div>  <!-- /container -->

<?php $this->view('partials/foot'); ?>
